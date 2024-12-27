<?php
// includes/db.php
// データベース接続用のファイル

//PODクラスを使用してデータベースに接続する
require_once __DIR__ . '/../../config/config.php';
// require_once DB_PATH ;
echo "<p>実行ファイル名:includes/db.php</p>";

//! PDOを使用しています！
// 頑張って調べて下さい
/**
 * データベース接続を取得
 *
 * @return PDO データベース接続オブジェクト
 */
function connectDB() {
    try {
        $pdo = new PDO('sqlite:' . DB_PATH .'/FUP_DB.sqlite');
        // エラーモードを例外に設定
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // デフォルトのフェッチモードを連想配列に設定
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "<p>実行ファイル名:includes/db.php データベース接続成功</p>";
        return $pdo;
    } catch (PDOException $e) {
        error_log("Database Connection Error: " . $e->getMessage());
        echo "<p>実行ファイル名:includes/db.php データベース接続エラー</p>";
        die("データベース接続エラー。");
    }
}
?>
