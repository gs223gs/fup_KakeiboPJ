<?php
require_once __DIR__ . '/../../config/config.php'; // config.phpを読み込む
// public/login_process.php
session_start();
require_once INCLUDES_PATH . '/DB/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力値の取得とサニタイズ
    $usernameOrEmail = trim($_POST['username']);
    $password = $_POST['password'];

    // バリデーション
    if (empty($usernameOrEmail) || empty($password)) {
        $_SESSION['error'] = '全てのフィールドを入力してください。';
        echo "バリデーションエラー: 全てのフィールドが入力されていません。<br>";
        header('Location: ' . VIEW_URL . '/auth/login.php');
        exit;
    }

    try {
        $pdo = new PDO('sqlite:' . DB_PATH . '/FUP_DB.sqlite');
        echo "データベースに接続しました。<br>";
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "PDOエラーモードを設定しました。<br>";

        // ユーザーの取得
        $stmt = $pdo->prepare("SELECT * FROM Users WHERE username = :username OR email = :email LIMIT 1");
        $stmt->bindParam(':username', $usernameOrEmail, PDO::PARAM_STR);
        $stmt->bindParam(':email', $usernameOrEmail, PDO::PARAM_STR);
        echo "クエリを準備しました。<br>";
        $stmt->execute();
        echo "クエリを実行しました。<br>";
        // ユーザーの取得
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            echo "ユーザーが見つかりました: " . htmlspecialchars($user['username']) . "<br>";
        } else {
            echo "ユーザーが見つかりませんでした。<br>";
        }
        // パスワード認証
        if ($user && $password === $user['password_hash']) {
            // 認証成功
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo "認証に成功しました。ダッシュボードへリダイレクトします。<br>";
            header('Location: ' . VIEW_URL . '/main/input.php');
            exit;
        } else {
            // 認証失敗
            $_SESSION['error'] = 'ユーザー名またはパスワードが正しくありません。';
            echo "認証に失敗しました: ユーザー名またはパスワードが間違っています。<br>";
            header('Location: ' . VIEW_URL . '/auth/login.php');
            exit;
        }
    } catch (PDOException $e) {
        echo "データベースエラー: " . htmlspecialchars($e->getMessage()) . "<br>";
        $_SESSION['error'] = 'ログイン中にエラーが発生しました。';
        error_log("Login failed: " . $e->getMessage(), 3, LOGS_PATH . '/error.log');
        header('Location: ' . VIEW_URL . '/auth/login.php');
        exit;
    }
} else {
    echo "不正なリクエストメソッドです。ログインページへリダイレクトします。<br>";
    header('Location: ' . VIEW_URL . '/auth/login.php');
    exit;
}
?>