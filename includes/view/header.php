<?php
// includes/view/header.php
// $pagetitleは書くページで宣言する
// cssの読み込み専用の関数　複数ある場合は、複数読み込む

// logic/css/read_css.phpを読み込む
include './logic/css/read_css.php';

// 読み込みたいCSSファイルを配列で指定
// $css_files = ['style1.css', 'style2.css'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pagetitle; ?></title>
  <?php
  // ここでCSSファイルを読み込む
  read_css_files($css_files);
  ?>
</head>
<body>
  <p>ここを表示しているファイル名:includes/view/header.php</p>
  <p><?php echo $pagetitle; ?></p>