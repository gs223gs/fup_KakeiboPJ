<?php
$pagetitle = 'ログインページ';
$css_files = ['../../assets/css/header.css', '../../assets/css/footer.css'];

// logic/css/read_css.phpを読み込む
include '../../logic/css/read_css.php';
//header
include '../../includes/view/header.php';
?>
<br>
<!-- ユーザー登録画面への遷移 -->
<a href="register.php">ユーザー登録</a>

<?php
include '../../includes/view/footer.php';
?>