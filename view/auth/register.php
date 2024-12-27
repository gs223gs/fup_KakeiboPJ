<?php
//ページタイトルを設定
$pagetitle = 'アカウント登録ページ';
//読み込むCSSを設定
$css_files = ['../../assets/css/header.css', '../../assets/css/footer.css'];

require_once __DIR__ . '/../../config/config.php'; // config.phpを読み込む
//css読み込みファイルとheader読み込みファイルを定義
require_once INCLUDES_PATH . '/view/header.php';

$register_logic_path = LOGIC_URL . '/auth/register_logic.php';
?>
<br>
<!-- ユーザー登録画面への遷移 -->

<a href ="../../">indexへ戻る</a><br>
<a href="login.php">ログイン</a>

<!-- アカウント登録フォームを追加 -->
<form action="<?php echo $register_logic_path; ?>" method="post">
    <label for="username">ユーザーネーム:</label><br>
    <input type="text" id="username" name="username" required><br><br>
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>
    <label for="password">パスワード:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="登録">
</form>

<?php
require_once INCLUDES_PATH .'/view/footer.php';
?>