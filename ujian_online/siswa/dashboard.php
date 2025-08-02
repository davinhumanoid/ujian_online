<?php
include '../config/include.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Siswa</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <body>
<div class="container">
    <div style="text-align:right; margin-bottom:10px;">
        <a href="../pages/logout.php" class="button-primary" style="background:#e74c3c;color:#fff;padding:6px 14px;border-radius:4px;text-decoration:none;">Logout</a>
    </div>
<h2>Kerjakan Ujian: <?= $tes ? htmlspecialchars($tes['nama_ujian']) : 'Belum ada tes'; ?></h2>
    <!-- ...existing code... -->
<div class="container">
    <h1>Dashboard Siswa</h1>
    <p>
        Halo,
        <?php
        if (isset($_SESSION['username'])) {
            echo "<b>" . htmlspecialchars($_SESSION['username']) . "</b>! Selamat datang di sistem tes online.";
        } else {
            echo "Silakan login terlebih dahulu.";
        }
        ?>
    </p>
    <h2>Menu Siswa:</h2>
    <ul>
        <li><a href="mulai_ujian.php">Mulai Ujian</a>
</li>
        <li><a href="hasil.php">Lihat Hasil</a></li>
        <li><a href="panduan.php">Panduan Ujian</a></li>
    </ul>
</div>
</body>
</html>