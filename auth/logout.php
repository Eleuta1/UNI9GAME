<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicia a sessão
session_start(); 

// Encerra a sessão
session_destroy(); 

// Redireciona para a tela de login
// Após a destruição da sessão
if (!headers_sent()) {
    header('Location: login.php?logout=success');
    exit;
}
 else {
    echo 'Redirecionamento falhou, cabeçalhos já enviados.'; // Mensagem de erro
    exit; // Para garantir que o script não continue
}
?>
