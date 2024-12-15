<?php
include '../includes/db_connect.php';
session_start();

$query = "SELECT orders.*, packages.title FROM orders 
          JOIN packages ON orders.package_id = packages.id";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>Order Status</title>
</head>
<body>
    <h1>Order Status</h1>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Package</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($order = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $order['id'] ?></td>
                    <td><?= $order['title'] ?></td>
                    <td><?= $order['quantity'] ?></td>
                    <td><?= $order['total_price'] ?></td>
                    <td><?= $order['status'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
