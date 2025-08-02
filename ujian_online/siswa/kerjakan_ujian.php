<?php
session_start();
include '../config/db.php';
include '../includes/auth_siswa.php';
include '../includes/navbar.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Silakan login terlebih dahulu.');window.location='../pages/login.php';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];
$cek = mysqli_query($conn, "SELECT * FROM hasil WHERE user_id = $user_id");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Kamu sudah mengerjakan tes.');window.location='dashboard.php';</script>";
    exit;
}

$tes = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tes ORDER BY id DESC LIMIT 1"));
if (!$tes) {
    echo "<p>Belum ada tes yang tersedia.</p>";
    exit;
}

$jumlah = isset($tes['jumlah_soal']) ? (int)$tes['jumlah_soal'] : 0;
if ($jumlah < 1) {
    echo "<p>Jumlah soal belum diatur.</p>";
    exit;
}
$soal = mysqli_query($conn, "SELECT * FROM soal ORDER BY RAND() LIMIT $jumlah");

if (isset($_POST['submit'])) {
    $jawaban = $_POST['jawaban'];
    $benar = 0;

    foreach ($jawaban as $id_soal => $jawab) {
        $cek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT jawaban_benar FROM soal WHERE id=$id_soal"));
        if ($cek && $cek['jawaban_benar'] == $jawab) $benar++;
    }

    $skor = round(($benar / $jumlah) * 100);
    $waktu = date('Y-m-d H:i:s');
    $jawaban_json = json_encode($jawaban);

    mysqli_query($conn, "INSERT INTO hasil (user_id, jawaban, skor, waktu_submit) 
                         VALUES ($user_id, '$jawaban_json', $skor, '$waktu')");

    echo "<script>alert('Ujian selesai. Skor kamu: $skor');window.location='dashboard.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Kerjakan Ujian</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .container {
            max-width: 800px;
            margin: 30px auto;
            background: #fff0f5;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        .card {
            background: #ffe6f0;
            padding: 20px;
            margin-bottom: 20px;
            border-left: 5px solid #ff69b4;
            border-radius: 8px;
        }
        .button-primary {
            background-color: #ff66b2;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .button-primary:hover {
            background-color: #ff3385;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Kerjakan Ujian: <?= htmlspecialchars($tes['nama_ujian']); ?></h2>
    <form method="POST" id="form-ujian">
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($soal)) {
            echo "<div class='card'>
                <p><b>$no. ".htmlspecialchars($data['pertanyaan'])."</b></p>
                <label><input type='radio' name='jawaban[{$data['id']}]' value='A' required> A. ".htmlspecialchars($data['opsi_a'])."</label><br>
                <label><input type='radio' name='jawaban[{$data['id']}]' value='B'> B. ".htmlspecialchars($data['opsi_b'])."</label><br>
                <label><input type='radio' name='jawaban[{$data['id']}]' value='C'> C. ".htmlspecialchars($data['opsi_c'])."</label><br>
                <label><input type='radio' name='jawaban[{$data['id']}]' value='D'> D. ".htmlspecialchars($data['opsi_d'])."</label><br>
            </div>";
            $no++;
        }
        ?>
        <br>
        <button class="button-primary" type="submit" name="submit">Selesai & Kirim</button>
    </form>
</div>

<!-- Timer -->
<script>
let waktu = 30 * 60; // 30 menit
const tampilTimer = document.createElement('div');
tampilTimer.style = "position:fixed;top:10px;right:10px;background:#fdd;padding:10px;border:1px solid red;font-weight:bold;";
document.body.appendChild(tampilTimer);

function updateTimer() {
    let m = Math.floor(waktu / 60);
    let s = waktu % 60;
    tampilTimer.innerHTML = "⏳ Sisa Waktu: " + m + "m " + s + "s";
    if (waktu <= 0) {
        alert("Waktu habis! Jawaban dikirim otomatis.");
        document.getElementById("form-ujian").submit();
    }
    waktu--;
}
setInterval(updateTimer, 1000);
</script>

</body>
</html>
