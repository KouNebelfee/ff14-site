<?php
include __DIR__ . "/../includes/header.php";
$url = "https://Kou-Nebelfee-s-workspace-j308qh.us-east-1.xata.sh/db/ff14_db:main/tables/uploads";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer xau_HlG7vQuTgRvwFLB5DRtct5hQEu6LZBVBe",
    "Content-Type: application/json"
]);
$response = curl_exec($ch);
if ($response === false) {
    echo "エラー: APIに接続できませんでした。URLまたはキーを確認してください。<br>";
    echo "デバッグ: URL = $url<br>";
    echo "cURLエラー: " . curl_error($ch);
} else {
    $data = json_decode($response, true);
    echo "ようこそ！私のFF14の世界へ<br>";
    print_r($data);
}
curl_close($ch);
?>