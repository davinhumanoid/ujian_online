<?php
session_start();
include('../config/db.php');
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'guru') {
    header("Location: ../pages/login.php");
    exit;
}
$query = mysqli_query($conn, "SELECT h.*, u.nama_lengkap, t.nama_tes FROM hasil h 
JOIN users u ON h.user_id = u.id 
JOIN tes t ON h.tes_id = t.id 
ORDER BY h.tanggal_ujian DESC");
?>
<h2>Hasil Ujian Siswa</h2>
<table border='1'>
<tr><th>No</th><th>Nama Siswa</th><th>Ujian</th><th>Nilai</th><th>Tanggal</th></tr>
<?php $no=1; while($row = mysqli_fetch_assoc($query)) { ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['nama_lengkap'] ?></td>
<td><?= $row['nama_tes'] ?></td>
<td><?= $row['nilai'] ?></td>
<td><?= $row['tanggal_ujian'] ?></td>
</tr>
<?php } ?>
</table>
