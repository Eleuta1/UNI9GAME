<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Receber os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

// Aqui você pode adicionar lógica para validar e armazenar os dados no banco de dados.
// Exemplo de validação simples:
if (filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($nome) && !empty($senha)) {

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
$stmt->bind_param("sss", $nome, $email, password_hash($senha, PASSWORD_DEFAULT));

// Executar a consulta
if ($stmt->execute()) {
    echo "Cadastro realizado com sucesso!";
} else {
     echo "Erro: " . $stmt->error;
    }

    // Fechar conexões
$stmt->close();
$conn->close();
 } else {
     echo "Dados inválidos. Verifique seu cadastro.";
}
} else {
    echo "Método de requisição inválido.";
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu Cadastro</title>
    <link rel="stylesheet" href="../css/cad.css"> <!-- Opcional: link para CSS -->
</head>
<body>
    <div class="cadastro-container">
    <h1>Cadastro de Usuário</h1>
    <form action="telacadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Cadastrar">
    </form>
    </div>
</body>
</html>