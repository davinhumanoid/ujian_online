<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "ujian_online";

$conn = new mysqli('localhost', 'root', '', 'ujian_onlinezz');
// pastikan ini adalah database tempat kolom `nama_ujian` sudah ada


if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}