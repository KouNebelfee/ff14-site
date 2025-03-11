<?php
session_start();
$admin_user = "admin";
$admin_pass = "password123";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_user = $_POST["username"];
    $input_pass = $_POST["password"];
    if ($input_user === $admin_user && $input_pass === $admin_pass) {
        $_SESSION["loggedin"] = true;
        header("Location: manage.php");
        exit;
    } else {
        $error = "ユーザー名かパスワードが違います。";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>管理モードログイン</h1>
    <form method="post">
        <label>ユーザー名: <input type="text" name="username"></label><br>
        <label>パスワード: <input type="password" name="password"></label><br>
        <input type="submit" value="ログイン">
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>