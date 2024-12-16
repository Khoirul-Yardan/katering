<?php
include '../db.php';

$query = $pdo->query("SELECT * FROM paket");
$pakets = $query->fetchAll(PDO::FETCH_ASSOC);

$queryUsers = $pdo->query("SELECT * FROM users");
$users = $queryUsers->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <main>
        <h2>Daftar Paket</h2>
        <table>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($pakets as $paket): ?>
                <tr>
                    <td><?php echo $paket['nama']; ?></td>
                    <td><?php echo $paket['deskripsi']; ?></td>
                    <td><?php echo $paket['harga']; ?></td>
                    <td>
                        <a href="delete_package.php?id=<?php echo $paket['id']; ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <a href="add_package.php">Tambah Paket</a>

        <h2>Aktivitas Pengguna</h2>
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