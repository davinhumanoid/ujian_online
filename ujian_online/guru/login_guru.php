<?php
session_start();
echo password_hash('passwordanda', PASSWORD_DEFAULT);
include '../config/db.php';

$error = '';
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ganti query sesuai struktur tabel user guru Anda
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND role='guru' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    if ($data && password_verify($password, $data['password'])) {
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Guru</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: #f5f6fa;
            font-family: Arial, sans-serif;
        }
        .login-box {
            background: #fff;
            max-width: 350px;
            margin: 60px auto;
            padding: 32px 28px;
            border-radius: 8px;
            box-shadow: 0 2px 12px #ddd;
        }
        .login-box h2 {
            margin-bottom: 22px;
            color: #2980b9;
        }
        .login-box input[type="text"], .login-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 14px;
            border-radius: 4px;
            border: 1px solid #bbb;
            font-size: 15px;
        }
        .login-box button {
            width: 100%;
            padding: 10px;
            background: #2980b9;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .login-box button:hover {
            background: #1c5d8c;
        }
        .error {
            color: #e74c3c;
            margin-bottom: 12px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Login Guru</h2>
        <?php if ($error) echo "<div class='error'>$error</div>"; ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>
</html>