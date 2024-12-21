<?php
// includes/db.php
// データベース接続用のファイル

//PODクラスを使用してデータベースに接続する
require_once __DIR__ . './../config/config.php';
echo "<p>実行ファイル名:includes/db.php</p>";

//データベース接続テスト
getDB();//後で削除

/**
 * データベース接続を取得
 *
 * @return PDO データベース接続オブジェクト
 */
function getDB() {
    try {
        $pdo = new PDO('sqlite:' . DB_PATH);
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
