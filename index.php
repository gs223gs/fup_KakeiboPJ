<?php
require_once __DIR__ . '/config/config.php'; // config.phpを読み込む

//ページタイトルの設定
$pagetitle = 'ようこそ';

//css読み込み関数用の配列を定義
//ファイルパスの指定をconfigから取得
$css_files = [CSS_URL . '/header.css', CSS_URL. '/footer.css'];

// headerをインクルード
require_once INCLUDES_PATH . '/view/header.php';

?>

<!-- ログイン画面への遷移 -->
<a href="./view/auth/login.php">ログイン</a>
<br>
<!-- ユーザー登録画面への遷移 -->
<a href="./view/auth/register.php">ユーザー登録</a>

<?php
// footerをインクルード
require_once INCLUDES_PATH . '/view/footer.php';
?>