<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicia a sessão
session_start();

// Inicializa a variável de erro
$error = '';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nome = isset($_POST['nome']) ? htmlspecialchars(trim($_POST['nome'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $confirmar_senha = isset($_POST['confirmar_senha']) ? $_POST['confirmar_senha'] : '';

    // Aqui você pode adicionar lógica para validar e armazenar os dados no banco de dados.
    // Exemplo de validação simples:
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($nome) && !empty($senha) && ($senha === $confirmar_senha)) {
        
        // Conectar ao banco de dados (substitua os parâmetros com suas credenciais)
        $servername = "localhost";
        $username = "seu_usuario";
        $password = "sua_senha";
        $dbname = "seu_banco";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Preparar e vincular
        $stmt = $conn->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $hashed_senha = password_hash($senha, PASSWORD_DEFAULT); // Hash da senha
        $stmt->bind_param("sss", $nome, $email, $hashed_senha);

        // Executar a consulta
        if ($stmt->execute()) {
            $_SESSION['loggedin'] = true; // Marca o usuário como logado
            header('Location: ../index.php'); // Redireciona para a página principal
            exit; // Garante que nenhum outro código seja executado
        } else {
            $error = "Erro: " . $stmt->error;
        }

        // Fechar conexões
        $stmt->close();
        $conn->close();
    } else {
        $error = "Dados inválidos. Verifique seu cadastro.";
    }
} else {
    $error = "Método de requisição inválido.";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu Cadastro</title>
    <link rel="stylesheet" href="../css/cad.css">
</head>
<body>
<div class="login-wrapper">
    <div class="welcome-container">
        <h2>Bem-vindo ao nosso site!</h2>
        <p>Crie uma conta para começar.</p>
        <a href="login.php" class="register-btn">Já tem uma conta? Faça login</a>
    </div>
    <div class="login-container">
        <h2>Cadastro</h2>
        
        <?php if (!empty($error)): ?>
            <p class="error-message"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <form action="telacadastro.php" method="POST">
            <input type="text" name="nome" placeholder="Nome completo" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="password" name="confirmar_senha" placeholder="Confirme a Senha" required>
            
            <button type="submit">Cadastrar</button>
        </form>

        <a class="forgot-password" href="#">Esqueceu sua senha?</a>
        
        <div class="social-icons">
            <a href="#"><img src="../favicon/facebook-icon.png" alt="Facebook"></a>
            <a href="#"><img src="../favicon/google-icon.png" alt="Google"></a>
        </div>
    </div>
</div>
</body>
</html>
