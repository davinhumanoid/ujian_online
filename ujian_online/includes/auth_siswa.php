<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Cek jika user bukan siswa, redirect
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'siswa') {
    header('Location: ../login.php');
    exit;
}
