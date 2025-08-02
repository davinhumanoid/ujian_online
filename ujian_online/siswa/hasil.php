<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Silakan login terlebih dahulu.');window.location='../pages/login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];
$hasil = mysqli_query($conn, "SELECT * FROM hasil ORDER BY waktu_submit DESC");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Hasil Ujian</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Hasil Ujian Kamu</h2>
    <table border="1" cellpadding="8" style="width:100%;background:#fff;">
        <tr style="background:#b6e0fe;color:#e75480;">
            <th>No</th>
            <th>Skor</th>
            <th>Waktu Submit</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($hasil)) {
            echo "<tr>
                <td>$no</td>
                <td>{$row['skor']}</td>
                <td>{$row['tanggal_ujian']}</td>
            </tr>";
            $no++;
        }
        if ($no == 1) {
            echo "<tr><td colspan='3' style='text-align:center;'>Belum ada hasil tes.</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="dashboard.php" class="button-primary">Kembali ke Dashboard</a>
</div>
</body>
</html>