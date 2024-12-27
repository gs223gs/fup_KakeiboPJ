<?php
// includes/view/header.php
// $pagetitleは書くページで宣言する
// cssの読み込み専用の関数　複数ある場合は、複数読み込む

// 読み込みたいCSSファイルを配列で指定
// $css_files = ['style1.css', 'style2.css'];
?>

<!-- このヘッダーのmetaは適当に作成している -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pagetitle; ?></title>
  <?php
  // ここでCSSファイルを読み込む
  // 配列の中身があれば読み込む
  if (!empty($css_files)) {
    read_css_files($css_files);
  }
  ?>
</head>
<body>
  <p>ここを表示しているファイル名:includes/view/header.php</p>
  <p><?php echo $pagetitle; ?></p>