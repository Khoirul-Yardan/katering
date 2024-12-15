<?php
function fetchPackages($conn) {
    $query = "SELECT * FROM packages";
    return $conn->query($query);
}

function fetchOrderDetails($conn, $orderId) {
    $query = "SELECT * FROM orders WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $orderId);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}
?>
