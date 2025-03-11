<?php
include __DIR__ . "/../includes/header.php";
$url = "https://Kou_Nebelfee.xata.sh/db/ff14_db:main/tables/uploads";
$context = stream_context_create([
    "http" => [
        "header" => "Authorization: Bearer xau_kPnYCExI9wjSBko08ffZxuf5vG43s8YE2"
    ]
]);
$response = file_get_contents($url, false, $context);
$data = json_decode($response, true);
echo "ようこそ！私のFF14の世界へ<br>";
print_r($data); // データ確認用
?>