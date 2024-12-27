<?php
//ページタイトルを設定
$pagetitle = 'ログインページ';
//読み込むCSSを設定
$css_files = ['../../assets/css/header.css', '../../assets/css/footer.css'];

require_once __DIR__ . '/../../config/config.php'; // config.phpを読み込む
//css読み込みファイルとheader読み込みファイルを定義
require_once INCLUDES_PATH . '/view/header.php';
?>
<br>
<!-- ユーザー登録画面への遷移 -->

<a href ="../../">indexへ戻る</a><br>
<a href="login.php">ログイン</a>

<?php
require_once INCLUDES_PATH .'/view/footer.php';
?>