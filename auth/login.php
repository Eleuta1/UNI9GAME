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

</head>
<body>
    <div class="login-wrapper">
        <!-- Seção de boas-vindas -->
        <div class="welcome-container">
            <h2>Olá, Bem vindo de Volta!</h2>
            <p>Ainda não tem conta?</p>
            <a href="telacadastro.php" class="register-btn">Registre-se</a>
        </div>
        
        <!-- Seção de login -->
        <div class="login-container">
            <h2>Login</h2>
            
            <?php if (isset($_GET['error']) && $_GET['error'] === 'not_logged_in'): ?>
                <p class="error-message">Você precisa estar logado para acessar essa página.</p>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <input type="text" name="username" placeholder="Usuário" required>
                <input type="password" name="password" placeholder="Senha" required>
                <button type="submit">Login</button>
            </form>

            <a class="forgot-password" href="#">Forgot password?</a>

            <p>or login with social platforms</p>
            <div class="social-icons">
                <a href="#"><img src="../favicon/google-icon.png" alt="Google"></a>
                <a href="#"><img src="../favicon/facebook-icon.png" alt="Facebook"></a>
                
            </div>
            <div id="logout-popup" class="popup hidden">
                <p>Deslogado com sucesso!</P>
            </div>
        </div>
    </div>
    <script src="../js/logout-popup.js"></script>
</body>
</html>

