<?php
$pagetitle = 'ログインページ';
$css_files = ['../../assets/css/header.css', '../../assets/css/footer.css'];

require_once __DIR__ . '/../../config/config.php'; // config.phpを読み込む
//css読み込みファイルとheader読み込みファイルを定義
require_once INCLUDES_PATH . '/view/header.php';

require_once INCLUDES_PATH . '/DB/db.php';
connectDB();
?>
<br>
<!-- ユーザー登録画面への遷移 -->
<a href ="../../">indexへ戻る</a><br>
<a href="register.php">ユーザー登録</a>

<?php
require_once INCLUDES_PATH .'/view/footer.php';
?>