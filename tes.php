<?php
include 'includes/db_connect.php';

if ($conn) {
    echo "Koneksi berhasil!<br>";
} else {
    echo "Koneksi gagal!<br>";
}

// Tes fungsi fetchPackages
if (function_exists('fetchPackages')) {
    echo "Fungsi fetchPackages ditemukan!<br>";
    $packages = fetchPackages($conn);
    print_r($packages);
} else {
    echo "Fungsi fetchPackages tidak ditemukan.<br>";
}
?>
