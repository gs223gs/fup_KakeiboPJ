<?php
$pagetitle = 'ようこそ';
$css_files = ['assets/css/header.css', 'assets/css/footer.css'];
include './logic/css/read_css.php';
include './includes/view/header.php';
?>

<!-- ログイン画面への遷移 -->
<a href="./view/auth/login.php">ログイン</a>
<br>
<!-- ユーザー登録画面への遷移 -->
<a href="./view/auth/register.php">ユーザー登録</a>

<?php
include './includes/view/footer.php';
?>