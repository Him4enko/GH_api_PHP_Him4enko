<?php
require_once __DIR__ . '/vendor/autoload.php';

$default = 'free';
$client = new \Github\Client();
$token = "85c1c044585b301320305a77b65da2b0069d7a56";
$client->authenticate($token, Github\Client::AUTH_ACCESS_TOKEN);
$user = $client->api('user')->show('him4enko');
$plan = $user['plan']['name'];
if($plan == $default){
   
}else{
    $access_token = '1470430052:AAEhT4WnFeVmIO9Guv4IGesRudgNIvapvq0';
    $api = 'https://api.telegram.org/bot' . $access_token;
    $id = '795645060';
    $chat_id = $id;
    $to      = 'eugenelive@ya.ru';
    $subject = 'Обновление статуса GitHub!';
    $message = 'Внимание! Произошло обновление статуса аккаунта на GitHub, теперь ваш статус: '.$plan.'';
    $headers = 'From: no-reply@him4e.fun' . "\r\n" .
        'Reply-To: no-reply@him4e.fun' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    

    mail($to, $subject, $message, $headers);
    file_get_contents($api . '/sendMessage?chat_id=' . $chat_id . '&text=' . $message);
}
?>
