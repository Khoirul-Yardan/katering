<?php
include '../db.php';

$query = $pdo->query("SELECT * FROM paket");
$pakets = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Katering</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <header>
        <h1>Sistem Katering</h1>
        <div class="cart-icon">
            <span id="cart-count">0</span> 🛒
        </ ```php
        </div>
    </header>

    <main>
        <div class="package">
            <img src="https://example.com/ayam10.jpg" alt="Paket Ayam 10" class="package-image">
            <h2>Paket Ayam 10</h2>
            <p>Deskripsi: Ayam 10, Sayur 10, Nasi, dan lain-lain.</p>
            <button class="buy-now" onclick="buyNow(1)">Beli Langsung</button>
            <button class="add-to-cart" onclick="addToCart(1)">Masukkan ke Keranjang</button>
        </div>
        <?php foreach ($pakets as $paket): ?>
            <div class="package">
                <img src="<?php echo $paket['gambar']; ?>" alt="<?php echo $paket['nama']; ?>" class="package-image">
                <h2><?php echo $paket['nama']; ?></h2>
                <p><?php echo $paket['deskripsi']; ?></p>
                <button class="buy-now" onclick="buyNow(<?php echo $paket['id']; ?>)">Beli Langsung</button>
                <button class="add-to-cart" onclick="addToCart(<?php echo $paket['id']; ?>)">Masukkan ke Keranjang</button>
            </div>
        <?php endforeach; ?>
    </main>

    <script src="../assets/js/script.js"></script>
</body>
</html>