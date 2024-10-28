<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../globals/globals.php';

// Inicia a sessão
session_start();
$error = '';

if (isset($_GET['error']) && $_GET['error'] === 'not_logged_in') {
    $error = 'Você precisa estar logado para acessar essa página.';
}
// Redireciona se o usuário já estiver logado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: ../index.php');
    exit;
}

// Inicializa a variável de erro
$error = '';

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Coleta as credenciais do formulário
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validação simples de login
    if ($username === 'admin' && $password === '1234') { // Substitua por sua lógica de validação real
        $_SESSION['loggedin'] = true; // Marca o usuário como logado
        header('Location: ../index.php'); // Redireciona para a página principal
        exit; // Garante que nenhum outro código seja executado
    } else {
        $error = 'Usuário ou senha incorretos!';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Login</title>
    <link rel="stylesheet" href="../main.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
    <div class="login-wrapper">
        <div class="image-container">
           <!-- <img src="../img/login-bg.jpg" alt="Imagem Ilustrativa"> -->
        </div>
        <div class="login-container">
            <h2>Bem-vindo de Volta!</h2>

            <?php if (isset($_GET['logout']) && $_GET['logout'] === 'success'): ?>
                <p id="success-message" class="message success">Você saiu com sucesso!</p>
            <?php endif; ?>

            <?php if ($error): ?>
                <p class="message error"><?php echo $error; ?></p>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="input-container">
                    <input type="text" name="username" placeholder="Usuario" required>
                    
                </div>
                <div class="input-container">
                    <input type="password" name="password" placeholder="Senha" required>
                    
                </div>
                <button type="submit" class="login-button">Entrar</button>
            </form>

            <a class="esqueceu" href="#">Esqueceu sua senha?</a>

            <div class="cadastro-container">
                <p>Não tem uma conta? <a href="telacadastro.php">Cadastre-se aqui</a></p>
            </div>
        </div>
    </div>
</body>
</html>
