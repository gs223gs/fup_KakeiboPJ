<?php
// config/config.php
//何度も出現するファイルパスは定数にしておくと便利
//

//DB接続用のファイル

// リポジトリのルートディレクトリを基準にする
define('BASE_PATH', dirname(__DIR__));

//リポジトリから見た絶対パスを定義
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('LOGIC_PATH', BASE_PATH . '/logic');
define('DB_PATH', BASE_PATH . '/DB');
define('LOGS_PATH', BASE_PATH . '/logs');
?>

