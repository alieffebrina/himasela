<?php 
$apiURL = 'https://eu90.chat-api.com/instance181059/';
$token = 'zydtegkm43f31ir6';

// $message = $_GET['text'];
// $phone = $_GET['phone'];

$message = "hallo";
$phone = '6283849390112';

$data = json_encode(
    array(
        'chatId'=>$phone.'@c.us',
        'body'=>$message
    )
);
$url = $apiURL.'message?token='.$token;
$options = stream_context_create(
    array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $data
        )
    )
);
$response = file_get_contents($url,false,$options);
echo $response; exit;
?>