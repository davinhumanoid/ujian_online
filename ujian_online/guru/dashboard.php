<link rel="stylesheet" type="text/css" href="style.css">
<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'guru') {
    header("Location: ../pages/login.php");
    exit;
}
echo "<h2>Selamat datang Guru, " . $_SESSION['username'] . "</h2>";
?>
<a href='../pages/logout.php'>Logout</a>
