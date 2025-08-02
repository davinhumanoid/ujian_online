<?php
include '../config/db.php';
$result = $conn->query("SELECT * FROM hasil");

echo "<h2>Hasil Tes</h2>";
echo "<table border='1'>
<tr><th>Nama</th><th>Nilai</th><th>Tanggal</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['nama']}</td>
        <td>{$row['nilai']}</td>
        <td>{$row['tanggal']}</td>
    </tr>";
}
echo "</table>";
?>
