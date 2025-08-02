<?php
include '../config/db.php';

// Cek role user, misal dari session
session_start();
$role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

// Tentukan link back sesuai role
if ($role == 'admin' || $role == 'guru') {
    $back_link = '../admin/dashboard.php';
} else {
    $back_link = '../siswa/dashboard.php';
}
?>
<head>
    <!-- ...existing style... -->
</head>

<div style="margin-bottom:16px;">
    <a href="<?= $back_link ?>" style="background:#2ecc71;color:#fff;padding:7px 18px;border-radius:4px;text-decoration:none;display:inline-block;">&larr; Kembali ke Dashboard</a>
</div>


<head>
    <!-- Tambahkan di dalam <head> -->
<style>
    form {
        margin-bottom: 24px;
        background: #f8f8f8;
        padding: 18px 24px;
        border-radius: 8px;
        box-shadow: 0 2px 8px #eee;
        max-width: 500px;
    }
    textarea, input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 12px;
        border-radius: 4px;
        border: 1px solid #ccc;
        font-size: 15px;
    }
    button[type="submit"] {
        background: #3498db;
        color: #fff;
        border: none;
        padding: 8px 20px;
        border-radius: 4px;
        font-size: 15px;
        cursor: pointer;
        transition: background 0.2s;
    }
    button[type="submit"]:hover {
        background: #217dbb;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        max-width: 800px;
        margin-top: 16px;
        background: #fff;
    }
    th, td {
        border: 1px solid #ccc;
        padding: 10px 12px;
        text-align: left;
    }
    th {
        background: #3498db;
        color: #fff;
    }
    tr:nth-child(even) {
        background: #f2f2f2;
    }
</style>
</head>


<h2>Kelola Soal</h2>
<form method="post">
    <textarea name="soal" placeholder="Tulis soal..." required></textarea><br>
    <input type="text" name="jawaban" placeholder="Jawaban benar" required><br>
    <button type="submit">Simpan Soal</button>
</form>
<h2>Daftar Soal</h2>
<table border="1" cellpadding="6">
    <tr>
        <th>No</th>
        <th>Soal</th>
        <th>Jawaban</th>
    </tr>
    <?php
    $no = 1;
    $result = mysqli_query($conn, "SELECT * FROM soal ORDER BY id DESC");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$no}</td>
            <td>" . htmlspecialchars($row['soal']) . "</td>
            <td>" . htmlspecialchars($row['jawaban']) . "</td>
        </tr>";
        $no++;
    }
    ?>