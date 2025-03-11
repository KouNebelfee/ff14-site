<?php
session_start();
session_destroy();
header("Location: /login"); // パスを修正（includeはないのでこれだけ）
exit;