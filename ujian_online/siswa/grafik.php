<?php
session_start();
include '../config/db.php';
$id_user = $_SESSION['id'];

$query = mysqli_query($conn, "SELECT * FROM hasil WHERE user_id = '$id_user' ORDER BY tanggal_ujian");
$data = [];
$tanggal = [];
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = $row['nilai'];
    $tanggal[] = date("d/m", strtotime($row['tanggal_ujian']));
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Grafik Nilai</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<canvas id="grafikNilai" width="400" height="200"></canvas>
<script>
const ctx = document.getElementById('grafikNilai').getContext('2d');
const chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($tanggal); ?>,
        datasets: [{
            label: 'Nilai',
            data: <?php echo json_encode($data); ?>,
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            tension: 0.1
        }]
    },
    options: {
        responsive: true
    }
});
</script>
</body>
</html>
