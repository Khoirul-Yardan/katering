<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "catering";

// Buat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fungsi untuk mengambil paket dari database
function fetchPackages($conn) {
    $query = "SELECT * FROM packages";
    $result = $conn->query($query);

    if (!$result) {
        die("Query Error: " . $conn->error);
    }

    $packages = [];
    while ($row = $result->fetch_assoc()) {
        $packages[] = $row;
    }
    return $packages;
}
?>
