<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include __DIR__ . '/db.php';

// Ambil data tes terakhir
$tes = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tes ORDER BY id DESC LIMIT 1"));