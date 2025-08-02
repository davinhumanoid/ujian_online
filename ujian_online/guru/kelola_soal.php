<?php
session_start();
include('../config/db.php');
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'guru') {
    header("Location: ../pages/login.php");
    exit;
}
$id_guru = $_SESSION['id'];
$result = mysqli_query($conn, "SELECT * FROM soal WHERE dibuat_oleh = '$id_guru'");
?>
<h2>Soal yang Anda Buat</h2>
<table border='1'>
<tr><th>No</th><th>Pertanyaan</th><th>A</th><th>B</th><th>C</th><th>D</th><th>Jawaban</th></tr>
<?php $no=1; while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['pertanyaan'] ?></td>
<td><?= $row['pilihan_a'] ?></td>
<td><?= $row['pilihan_b'] ?></td>
<td><?= $row['pilihan_c'] ?></td>
<td><?= $row['pilihan_d'] ?></td>
<td><?= $row['jawaban_benar'] ?></td>
</tr>
<?php } ?>
</table>
