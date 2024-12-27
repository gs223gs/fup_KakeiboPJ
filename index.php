<?php
$pagetitle = 'ようこそ';
$css_files = ['assets/css/header.css', 'assets/css/footer.css'];

require_once __DIR__ . '/config/config.php'; // config.phpを読み込む

require_once LOGIC_PATH . '/css/read_css.php';
require_once INCLUDES_PATH . '/view/header.php';
require_once INCLUDES_PATH . '/DB/db.php' ;
?>

<!-- ログイン画面への遷移 -->
<a href="./view/auth/login.php">ログイン</a>
<br>
<!-- ユーザー登録画面への遷移 -->
<a href="./view/auth/register.php">ユーザー登録</a>

<?php
require_once INCLUDES_PATH . '/view/footer.php';
?>