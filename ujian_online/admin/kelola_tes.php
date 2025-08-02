<?php
include '../config/db.php';

include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama_ujian'], $_POST['durasi'], $_POST['tanggal'])) {
    $nama_ujian = $_POST['nama_ujian'];
    $durasi = $_POST['durasi'];
    $tanggal = $_POST['tanggal'];
    $jumlah_soal = 0;
    $status = 1;

    $stmt = $conn->prepare("INSERT INTO tes (nama_ujian, waktu, jumlah_soal, status) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siii", $nama_ujian, $durasi, $jumlah_soal, $status);
    $stmt->execute();

    $berhasil = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kelola Tes</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8b6d2 0%, #b6e0fe 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 40px auto;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 32px 24px;
        }
        h2 {
            color: #e75480;
            text-align: center;
            margin-bottom: 24px;
        }
        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border-radius: 8px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button, .btn-back {
            background: linear-gradient(90deg, #e75480 0%, #1976d2 100%);
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: block;
            text-align: center;
            margin-top: 10px;
        }
        button:hover, .btn-back:hover {
            background: linear-gradient(90deg, #1976d2 0%, #e75480 100%);
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Pengaturan Tes Ujian</h2>

    <?php if (isset($berhasil)): ?>
        <div class="alert-success">Tes berhasil disimpan.</div>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="nama_ujian" placeholder="Nama Tes" required>
        <input type="number" name="durasi" placeholder="Durasi (menit)" required>
        <input type="date" name="tanggal" required>
        <button type="submit">Simpan</button>
    </form>

    <a href="dashboard.php" class="btn-back">← Kembali ke Dashboard</a>
</div>
</body>
</html>
