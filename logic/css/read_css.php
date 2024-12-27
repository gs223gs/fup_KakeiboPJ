<?php
// includes/view/header.php
// $pagetitleは書くページで宣言する
// cssの読み込み専用の関数　複数ある場合は、複数読み込む
function read_css_files($css_files) {
    foreach ($css_files as $file) {
        echo '<link rel="stylesheet" type="text/css" href="' . $file . '">';
    }
}
?>