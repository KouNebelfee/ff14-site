<?php
session_start();
include __DIR__ . "/../includes/header.php"; // 明示的に__DIR__使用
phpinfo(); // デバッグ用
$db = new PDO("pgsql:host=us-east-1.sql.xata.sh;dbname=ff14_db;sslmode=require", "j308qh", "xau_kPnYCExI9wjSBko08ffZxuf5vG43s8YE2");
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("Location: login.php");
    exit;
}
$db = new PDO("pgsql:host=us-east-1.sql.xata.sh;dbname=ff14_db;sslmode=require", "j308qh", "xau_kPnYCExI9wjSBko08ffZxuf5vG43s8YE2");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file_name = $_FILES["file"]["name"];
    $file_type = $_FILES["file"]["type"];
    $file_data = file_get_contents($_FILES["file"]["tmp_name"]);
    $stmt = $db->prepare("INSERT INTO uploads (filename, filetype, filedata) VALUES (:name, :type, :data)");
    $stmt->bindParam(":name", $file_name);
    $stmt->bindParam(":type", $file_type);
    $stmt->bindParam(":data", $file_data, PDO::PARAM_LOB);
    $stmt->execute();
    $message = "ファイルがアップロードされました！";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>管理モード</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h1>ファイルアップロード</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" value="アップロード">
    </form>
    <?php if (isset($message)) echo "<p>$message</p>"; ?>
    <a href="logout.php">ログアウト</a>
</body>
</html>