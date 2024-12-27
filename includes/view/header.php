<?php
// includes/view/header.php
// $pagetitleは書くページで宣言する
// cssの読み込み専用の関数　複数ある場合は、複数読み込む

// 読み込みたいCSSファイルを配列で指定
// $css_files = ['style1.css', 'style2.css'];



?>
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
  <nav>
    <ul>
      <li><a href="">foo</a></li>
      <li><a href="">bar</a></li>
      <li><a href="">fizz</a></li>
      <li><a href="">buzz</a></li>
      <li><a href="">ログイン</a></li>
      <li><a href="">登録</a></li>
    </ul>
  </nav>
  <p>ここを表示しているファイル名:includes/view/header.php</p>
  <p><?php echo '設定されたタイトル: ' . $pagetitle; ?></p>
