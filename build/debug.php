<?php
// URL do Build Hook do Netlify
$url = 'https://api.netlify.com/build_hooks/674db8bb76ebfe5c61daa8df'; // ou a URL que você copiou corretamente

// Dados a serem enviados com a solicitação
$data = json_encode(array(
    'triggered_by' => 'PHP Script'  // A razão do disparo
));

// Inicializa o cURL
$ch = curl_init($url);

// Configurações do cURL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
));

// Executa a solicitação e captura a resposta
$response = curl_exec($ch);

// Verifica se houve erro e mostra o código de status
if(curl_errno($ch)) {
    echo 'Erro cURL: ' . curl_error($ch);
} else {
    echo 'Build iniciado com sucesso!';
    echo 'Resposta do servidor: ' . $response;
}

// Fecha a conexão cURL
curl_close($ch);
?>
