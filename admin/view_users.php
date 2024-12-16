<?php
include '../db.php';

$queryUsers = $pdo->query("SELECT * FROM users");
$users = $queryUsers->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aktivitas Pengguna</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Aktivitas Pengguna</h1>
    </header>

    <main>
        <table>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Penerima</th>
                <th>Tanggal</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['nama']; ?></td>
                    <td><?php echo $user['alamat']; ?></td>
                    <td><?php echo $user['penerima']; ?></td>
                    <td><?php echo $user['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
</body>
</html>