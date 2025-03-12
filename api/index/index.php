<?php
include __DIR__ . "/../includes/header.php";
$url = "https://Kou-Nebelfee-s-workspace-j308qh.us-east-1.xata.sh/db/ff14_db:main/tables/uploads";
$context = stream_context_create([
    "http" => [
        "header" => "Authorization: Bearer xau_HlG7vQuTgRvwFLB5DRtct5hQEu6LZBVBe\r\n" .
                    "Content-Type: application/json"
    ]
]);
$response = file_get_contents($url, false, $context);
if ($response === false) {
    echo "エラー: APIに接続できませんでした。URLまたはキーを確認してください。<br>";
    echo "デバッグ: URL = $url";
} else {
    $data = json_decode($response, true);
    echo "ようこそ！私のFF14の世界へ<br>";
    print_r($data);
}
?>