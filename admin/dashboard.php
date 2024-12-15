<?php include '../includes/db_connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <style>
        /* Reset dasar */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

/* Styling body */
body {
    background-color: #f4f4f9;
    color: #333;
    line-height: 1.6;
}

/* Header */
header {
    background: #ff6f61;
    color: white;
    padding: 1rem 2rem;
    text-align: center;
}

header h1 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

header p {
    font-size: 1rem;
}

/* Container utama */
.container {
    width: 90%;
    max-width: 1200px;
    margin: 2rem auto;
}

/* Grid untuk paket katering */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
}

/* Kartu paket */
.card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.2s, box-shadow 0.2s;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
}

.card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.card-body {
    padding: 1rem;
    text-align: center;
}

.card-body h3 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    color: #ff6f61;
}

.card-body p {
    font-size: 0.9rem;
    margin-bottom: 1rem;
    color: #666;
}

.card-body .price {
    font-size: 1.2rem;
    color: #333;
    margin-bottom: 1rem;
}

.card-body button {
    padding: 0.6rem 1rem;
    font-size: 1rem;
    color: white;
    background: #ff6f61;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.2s;
}

.card-body button:hover {
    background: #ff4b3e;
}

/* Footer */
footer {
    background: #333;
    color: white;
    text-align: center;
    padding: 1rem 0;
    margin-top: 2rem;
}

footer p {
    font-size: 0.8rem;
}

/* Responsivitas */
@media (max-width: 600px) {
    header h1 {
        font-size: 1.5rem;
    }

    header p {
        font-size: 0.9rem;
    }
}

    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="edit_package.php">Edit Packages</a> | 
    <a href="view_orders.php">View Orders</a>
</body>
</html>
