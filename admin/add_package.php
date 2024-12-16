<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar']; // Anda bisa menggunakan upload file untuk gambar

    $stmt = $pdo->prepare("INSERT INTO paket (nama, deskripsi, harga, gambar) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nama, $deskripsi, $harga, $gambar]);

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Paket</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Tambah Paket</h1>
    </header>

    <main>
        <form method="POST">
            <label for="nama">Nama Paket:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required></textarea>

            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" required>

            <label for="gambar">URL Gambar:</label>
            <input type="text" id="gambar" name="gambar" required>

            <button type="submit">Tambah Paket</button>
        </form>
    </main>
</body>
</html>