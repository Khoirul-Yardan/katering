<?php
include '../db.php';

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $stmt = $pdo->prepare("INSERT INTO users (nama, alamat, penerima) VALUES (?, ?, ?)");
    $stmt->execute([$data['nama'], $data['alamat'], $data['penerima']]);
    $userId = $pdo-> lastInsertId();

    $stmt = $pdo->prepare("INSERT INTO orders (user_id, paket_id) VALUES (?, ?)");
    $stmt->execute([$userId, $data['paketId']]);

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}