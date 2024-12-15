<?php
include '../includes/db_connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $user_address = $_POST['user_address'];

    foreach ($_SESSION['cart'] as $item) {
        $package_id = $item['package_id'];
        $quantity = $item['quantity'];
        $total_price = $quantity * $item['price'];

        $query = "INSERT INTO orders (user_name, user_address, package_id, quantity, total_price) 
                  VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssiid", $user_name, $user_address, $package_id, $quantity, $total_price);
        $stmt->execute();
    }

    unset($_SESSION['cart']);
    header("Location: order_status.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="user_name" required>
        <label>Address:</label>
        <textarea name="user_address" required></textarea>
        <button type="submit">Place Order</button>
    </form>
    <h2>Your Cart:</h2>
    <ul>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <li><?= $item['title'] ?> x <?= $item['quantity'] ?> = <?= $item['quantity'] * $item['price'] ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
