<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include '../config/include.php'; // Koneksi database

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mulai Ujian</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #ffd6f6, #d6f0ff);
            color: #333;
            padding: 40px;
            text-align: center;
        }

        h2 {
            color: #e91e63;
        }

        .card {
            background-color: #fff;
            border-radius: 16px;
            padding: 30px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .btn {
            display: inline-block;
            margin: 15px 10px 0;
            padding: 10px 20px;
            background-color: #2196f3;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: #0d8ddb;
        }

        .btn-secondary {
            background-color: #e91e63;
        }

        .btn-secondary:hover {
            background-color: #d71552;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Selamat Mengerjakan Ujian!</h2>
        <p>Pastikan kamu fokus dan menjawab dengan jujur ya 😊</p>
        
        <a href="soal.php" class="btn">Mulai Mengerjakan</a>
        <a href="dashboard.php" class="btn btn-secondary">Kembali ke Dashboard</a>
    </div>
</body>
</html>
