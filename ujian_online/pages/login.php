<?php
session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Multi user: admin, guru, siswa
    $users = [
        'admin' => ['password' => 'admin123', 'role' => 'admin'],
        'guru'  => ['password' => 'guru123',  'role' => 'guru'],
        'davin' => ['password' => 'davin123', 'role' => 'siswa']
    ];

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['user_id'] = 1;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $users[$username]['role'];

        // Redirect sesuai role
        if ($_SESSION['role'] == 'admin') {
            echo "<script>window.location='../admin/dashboard.php';</script>";
        } elseif ($_SESSION['role'] == 'guru') {
            echo "<script>window.location='../guru/dashboard.php';</script>";
        } else {
            echo "<script>window.location='../siswa/dashboard.php';</script>";
        }
        exit;
    } else {
        echo "<script>alert('Login gagal! Periksa username atau password.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Ujian Online</title>
    <link rel="stylesheet" href="../assets/css/login.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-container">
    <h2>Login Multi User</h2>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required autofocus>
        <input type="password" name="password" placeholder="Password" required>
        <button class="button-primary" type="submit" name="login">Login</button>
    </form>
    <br>
    <a href="registrasi.php" class="button-primary">Registrasi Siswa</a>
</div>
</body>
</html>