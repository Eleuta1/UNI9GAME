<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inicia a sessão
session_start(); 

// Encerra a sessão
session_destroy(); 

// Verifica se os cabeçalhos já foram enviados antes de tentar redirecionar
if (!headers_sent()) {
    header('Location: login.php?logout=success');
    exit; // Para garantir que nenhum código adicional seja executado
} else {
    // Se os cabeçalhos já foram enviados, informe ao usuário
    echo 'Redirecionamento falhou, cabeçalhos já enviados.'; 
    exit; // Para garantir que o script não continue
}
?>
