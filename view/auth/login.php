<?php
$pagetitle = 'ログインページ';
$css_files = ['../../assets/css/header.css', '../../assets/css/footer.css'];
session_start();

require_once __DIR__ . '/../../config/config.php'; // config.phpを読み込む
//css読み込みファイルとheader読み込みファイルを定義
require_once INCLUDES_PATH . '/view/header.php';

require_once INCLUDES_PATH . '/DB/db.php';
//ロジックへのファイルパスを定義
$login_logic_path = LOGIC_URL . '/auth/login_logic.php';
?>
<br>
<!-- ユーザー登録画面への遷移 -->
<?php
if (isset($_SESSION['error'])) {
    echo '<p style="color:red;">' . htmlspecialchars($_SESSION['error']) . '</p>';
    unset($_SESSION['error']);
}

if (isset($_SESSION['success'])) {
    echo '<p style="color:green;">' . htmlspecialchars($_SESSION['success']) . '</p>';
    unset($_SESSION['success']);
}
?>
<form action="<?php echo $login_logic_path; ?>" method="POST">
    <label for="メールアドレス">メールアドレス:</label><br>
    <input type="text" id="username" name="username" required><br><br>

    <label for="8桁以上のパスワード">パスワード:</label><br>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">ログイン</button>
</form>

<a href ="../../">indexへ戻る</a><br>
<a href="register.php">ユーザー登録</a>

<?php
require_once INCLUDES_PATH .'/view/footer.php';
?>