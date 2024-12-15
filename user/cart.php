<?php
include '../includes/db_connect.php';

if (isset($_GET['package_id'])) {
    $package_id = $_GET['package_id'];

    // Fetch package details
    $query = "SELECT * FROM packages WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $package_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $package = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $package_id = $_POST['package_id'];
    $quantity = $_POST['quantity'];

    // Store cart details in session
    session_start();
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = [
        'package_id' => $package_id,
        'quantity' => $quantity,
        'price' => $package['price'],
        'title' => $package['title']
    ];

    header("Location: checkout.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>Cart</title>
</head>
<body>
    <h1>Cart</h1>
    <form method="POST">
        <input type="hidden" name="package_id" value="<?= $package['id'] ?>">
        <h2><?= $package['title'] ?></h2>
        <p><?= $package['description'] ?></p>
        <p>Price: <?= $package['price'] ?></p>
        <label>Quantity:</label>
        <input type="number" name="quantity" value="1" min="1" required>
        <button type="submit">Add to Cart</button>
    </form>
</body>
</html>
