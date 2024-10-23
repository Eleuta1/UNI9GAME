<?php
session_start();

// Verifica se o usuário está logado, caso contrário, redireciona para a tela de login
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redireciona para a página de login com uma mensagem
    header('Location: auth/login.php?error=not_logged_in'); // Passando um parâmetro de erro
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal - Gerenciador do Jogo</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>Bem-vindo ao Gerenciador do Jogo</h1>
    </header>

    <main>
        <p>Você está logado com sucesso!</p>
        <a href="auth/logout.php">Sair</a>
    </main>
</body>
</html>
