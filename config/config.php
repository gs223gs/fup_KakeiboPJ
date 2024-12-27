<?php
// config/config.php
//何度も出現するファイルパスは定数にしておくと便利
//


// リポジトリのルートディレクトリを基準にする
//? BASE_PATH = /fup_kakeibopj/ となる
define('BASE_PATH', dirname(__DIR__));
define('BASE_URL', '/fup_kakeibopj');

// リポジトリから見た絶対パスを定義
// BASE_PATHと組み合わせると以下になる
//? fup_kakeibopj/includes/fizz
//　つまり，どこからファイルパスを指定しようとしても，fup_kakeibopj/ スタートになるので，ファイルパスの指定が鬼ほど楽になります．
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('LOGIC_PATH', BASE_PATH . '/logic');
define('DB_PATH', BASE_PATH . '/DB');
define('LOGS_PATH', BASE_PATH . '/logs');
define('ASSETS_PATH', BASE_URL . '/assets');
define('CSS_PATH', ASSETS_PATH . '/css');
// define('IMAGES_PATH', BASE_URL . '/images');
?>

