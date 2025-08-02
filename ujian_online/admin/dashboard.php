<?php
$target_dir = __DIR__ . '/../includes/';
session_start();

$path_auth = __DIR__ . '/../includes/auth_admin.php';
$path_nav = __DIR__ . '/../includes/navbar.php';


include $path_auth;
include $path_nav;
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../assets/css/style.css"> <!-- Global CSS -->
    <link rel="stylesheet" href="style.css"> <!-- CSS khusus halaman admin -->
</head>
<body>

<!-- Navbar sudah muncul dari navbar.php -->

<!-- Tombol Logout manual tambahan (opsional, bisa dihapus karena sudah ada di navbar) -->
<div style="text-align:right; margin: 10px;">
    <a href="../pages/logout.php" style="background: #e74c3c; color: #fff; padding: 7px 18px; border-radius: 4px; text-decoration: none;">Logout</a>
</div>

<!-- Konten Dashboard -->
<div class="container">
    <h2>Dashboard Admin</h2>
    <p>Selamat datang, <b><?= htmlspecialchars($_SESSION['username']); ?></b>!</p>

    <div class="card">
        <h3>Menu Admin:</h3>
        <ul>
            <li><a href="kelola_soal.php">Kelola Soal</a></li>
            <li><a href="kelola_tes.php">Pengaturan Tes</a></li>
            <li><a href="kelola_user.php">Daftar User</a></li>
            <li><a href="hasil.php">Lihat Hasil Ujian</a></li>
        </ul>
    </div>
</div>

</body>
</html>
