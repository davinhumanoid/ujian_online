<?php
echo 'File sekarang di: ' . __DIR__ . '<br>';

$path = __DIR__ . '/../includes/auth_admin.php';

echo "Mencoba include: $path <br>";

if (file_exists($path)) {
    echo "File DITEMUKAN.<br>";
    include $path;
} else {
    echo "File TIDAK DITEMUKAN.<br>";
}
