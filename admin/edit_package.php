<?php
include '../includes/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $query = "INSERT INTO packages (title, description, image, price) VALUES (?, ?, 'default.jpg', ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssd", $title, $description, $price);
    $stmt->execute();
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Package</title>
</head>
<body>
    <h1>Add New Package</h1>
    <form method="POST">
        <label>Title:</label><br>
        <input type="text" name="title" required><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br>
        <label>Price:</label><br>
        <input type="number" name="price" step="0.01" required><br>
        <button type="submit">Save</button>
    </form>
</body>
</html>
