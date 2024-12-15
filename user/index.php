<?php
include '../includes/db_connect.php';

$packages = fetchPackages($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katering - Paket</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
</head>
<body>

<header>
    <div class="container header-icons">
        <h1>Katering Harian</h1>
        <div class="chart-icon" onclick="viewChart()">
    <img src="../images/cart-icon.png" alt="Cart Icon">
    <span class="chart-badge" id="chartCount">0</span>
    </div>

    </div>
</header>

<div class="container">
    <div class="grid">
        <?php foreach ($packages as $package): ?>
            <div class="card">
                <img src="../images/<?php echo htmlspecialchars($package['image']); ?>" alt="Image">
                <div class="card-body">
                    <h3><?php echo htmlspecialchars($package['title']); ?></h3>
                    <p><?php echo htmlspecialchars($package['description']); ?></p>
                    <p class="price">Rp<?php echo number_format($package['price'], 0, ',', '.'); ?></p>
                    <button onclick="orderPackage('<?php echo $package['id']; ?>')">Pesan Sekarang</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer>
    <p>
        © 2024 Katering Harian. 
        <button onclick="goToAdmin()">Akses Admin</button>
    </p>
</footer>

<script src="../vendor/sweetalert/sweetalert2.all.min.js"></script>
<script src="../js/script.js"></script>

</body>
</html>
