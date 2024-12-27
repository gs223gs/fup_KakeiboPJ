<?php
session_start();
require_once __DIR__ . '/../../config/config.php'; // config.phpを読み込む
require_once INCLUDES_PATH . '/DB/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力値の取得とサニタイズ
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // バリデーション
    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['error'] = 'すべてのフィールドを入力してください。';
        echo "バリデーションエラー: 全てのフィールドが入力されていません。<br>";
        header('Location: ' . VIEW_URL . '/auth/register.php');
        exit;
    }

    try {
        $pdo = new PDO('sqlite:' . DB_PATH . '/FUP_DB.sqlite');
        echo "データベースに接続しました。<br>";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "PDOエラーモードを設定しました。<br>";

        // ユーザー名とメールの重複確認
        $stmt = $pdo->prepare("SELECT id FROM Users WHERE username = :username OR email = :email LIMIT 1");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        echo "クエリを準備しました。<br>";
        $stmt->execute();
        echo "クエリを実行しました。<br>";

        if ($stmt->fetch()) {
            $_SESSION['error'] = 'ユーザー名またはメールが既に使用されています。';
            echo "バリデーションエラー: ユーザー名またはメールが既に使用されています。<br>";
            header('Location: ' . VIEW_URL . '/auth/register.php');
            exit;
        }

        // パスワードのハッシュ化をしない
        $password_hash = $password; // ここでハッシュ化を行わない

        // ユーザーの挿入
        $stmt = $pdo->prepare("INSERT INTO Users (username, email, password_hash, accent_color) VALUES (:username, :email, :password_hash, :accent_color)");
        $default_color = '#6CECFF';
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password_hash', $password_hash, PDO::PARAM_STR);
        $stmt->bindParam(':accent_color', $default_color, PDO::PARAM_STR);
        echo "ユーザー挿入クエリを準備しました。<br>";
        if ($stmt->execute()) {
            $user_id = $pdo->lastInsertId();
            echo "ユーザーが正常に挿入されました。ユーザーID: {$user_id}<br>";

            // デフォルトカテゴリーの定義
            $categories = [
                ['name' => '食費', 'type' => 'expense'],
                ['name' => '雑費', 'type' => 'expense'],
                ['name' => '娯楽費', 'type' => 'expense'],
                ['name' => '家賃', 'type' => 'expense'],
                ['name' => '給料', 'type' => 'income'],
                ['name' => '交通費', 'type' => 'expense'],
                ['name' => '交友費', 'type' => 'expense'],
                ['name' => '生活費', 'type' => 'expense']
            ];

            // カテゴリーの挿入
            $stmt = $pdo->prepare("INSERT INTO Categories (user_id, name, type) VALUES (:user_id, :name, :type)");
            foreach ($categories as $category) {
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':name', $category['name'], PDO::PARAM_STR);
                $stmt->bindParam(':type', $category['type'], PDO::PARAM_STR);
                $stmt->execute();
                echo "カテゴリー '{$category['name']}' を挿入しました。<br>";
            }

            $_SESSION['success'] = '登録が完了しました。';
            echo "登録が完了しました。ログインページへリダイレクトします。<br>";
            header('Location: ' . VIEW_URL . '/auth/login.php');
            exit;
        } else {
            $_SESSION['error'] = '登録中にエラーが発生しました。';
            echo "エラー: ユーザーを挿入できませんでした。<br>";
            header('Location: ' . VIEW_URL . '/auth/register.php');
            exit;
        }
    } catch (PDOException $e) {
        echo "データベースエラー: " . htmlspecialchars($e->getMessage()) . "<br>";
        $_SESSION['error'] = '登録中にエラーが発生しました。';
        error_log("Registration failed: " . $e->getMessage(), 3, LOGS_PATH . '/error.log');
        header('Location: ' . VIEW_URL . '/auth/register.php');
        exit;
    }
} else {
    echo "不正なリクエストメソッドです。登録ページへリダイレクトします。<br>";
    header('Location: ' . VIEW_URL . '/auth/register.php');
    exit;
}
?>