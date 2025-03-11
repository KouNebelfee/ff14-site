<?php
include "../includes/header.php"; // api/内から1階層上
phpinfo();
$db = new PDO("pgsql:host=us-east-1.sql.xata.sh;dbname=ff14_db;sslmode=require", "j308qh", "xau_kPnYCExI9wjSBko08ffZxuf5vG43s8YE2");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $db->query("SELECT filename, filetype, filedata FROM uploads");
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<h1>ようこそ！私のFF14の世界へ</h1>
<p>ここは私のFF14冒険記録です。</p>
<h2>アップロードしたファイル</h2>
<?php foreach ($files as $file): ?>
    <div>
        <h3><?php echo htmlspecialchars($file["filename"]); ?></h3>
        <?php if (strpos($file["filetype"], "image/") === 0): ?>
            <img src="data:<?php echo $file["filetype"]; ?>;base64,<?php echo base64_encode($file["filedata"]); ?>" alt="<?php echo $file["filename"]; ?>" style="max-width: 300px;">
        <?php elseif (strpos($file["filetype"], "audio/") === 0): ?>
            <audio controls>
                <source src="data:<?php echo $file["filetype"]; ?>;base64,<?php echo base64_encode($file["filedata"]); ?>" type="<?php echo $file["filetype"]; ?>">
            </audio>
        <?php endif; ?>
    </div>
<?php endforeach; ?>
<?php include "../includes/footer.php"; ?>