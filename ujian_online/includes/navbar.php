<?php if (!isset($_SESSION)) session_start(); ?>
<style>
.navbar {
    background-color: #ff66b2;
    color: white;
    padding: 1em;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.navbar a {
    color: white;
    margin-left: 15px;
    text-decoration: none;
    font-weight: bold;
}
.navbar a:hover {
    text-decoration: underline;
}
</style>

<div class="navbar">
    <div><strong>Ujian Online</strong></div>
    <div>
        <?php if (isset($_SESSION['username'])): ?>
            <span>Halo, <?= $_SESSION['username']; ?> (<?= $_SESSION['role']; ?>)</span>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="../admin/dashboard.php">Dashboard</a>
                <a href="../admin/kelola_soal.php">Kelola Soal</a>
                <a href="../admin/kelola_tes.php">Kelola Tes</a>
                <a href="../admin/kelola_user.php">Daftar User</a>
                <a href="../admin/hasil.php">Hasil</a>
            <?php endif; ?>
            <a href="../pages/logout.php">Logout</a>
        <?php else: ?>
            <a href="../login.php">Login</a>
        <?php endif; ?>
    </div>
</div>
