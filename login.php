<?php
session_start();
require_once 'config/Database.php';

class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

$db = (new Database())->connect();
$user = new User($db);

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $user->login($_POST['username'], $_POST['password']);
    if ($u) {
        $_SESSION['user'] = $u;
        header("Location: views/dashboard/" . $u['role'] . ".php");
        exit;
    } else {
        $error = 'Username atau password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login - Reservasi Hotel</title>
  <link href="views/layout/style.css" rel="stylesheet" />
  <style>
    body, html {
      height: 100%;
      margin: 0;
      background-color: #121212;
      color: #e0e0e0;
      font-family: 'Roboto', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-form {
      border: 1px solid #333;
      padding: 2rem;
      border-radius: 0.5rem;
      background-color: #1f1f1f;
      width: 320px;
      box-sizing: border-box;
    }
    .login-form h2 {
      margin-top: 0;
      margin-bottom: 1rem;
      color: #d4af37;
      font-family: 'Playfair Display', serif;
      font-weight: 700;
      text-align: center;
    }
    .login-form label {
      display: block;
      margin-bottom: 0.25rem;
    }
    .login-form input[type="text"],
    .login-form input[type="password"] {
      width: 100%;
      padding: 0.375rem 0.75rem;
      border-radius: 0.25rem;
      border: 1px solid #333;
      background-color: #1f1f1f;
      color: #e0e0e0;
      margin-bottom: 1rem;
      box-sizing: border-box;
    }
    .login-form button {
      width: 100%;
      padding: 0.5rem 1rem;
      background-color: #d4af37;
      border: none;
      border-radius: 0.25rem;
      color: #121212;
      font-weight: bold;
      cursor: pointer;
      font-family: 'Playfair Display', serif;
      transition: background-color 0.3s ease;
    }
    .login-form button:hover {
      background-color: #b9972e;
    }
    .error-message {
      background-color: #cf6679;
      color: #121212;
      padding: 0.75rem 1rem;
      border-radius: 0.25rem;
      margin-bottom: 1rem;
      text-align: center;
    }
  </style>
</head>
<body>
  <form method="post" class="login-form" novalidate>
    <h2>Login</h2>
    <?php if ($error): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required autofocus>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Login</button>
  </form>
</body>
</html>
