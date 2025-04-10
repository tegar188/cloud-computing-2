<?php
include 'config.php';

// Ambil data dari database
$result = $koneksi->query("SELECT * FROM user");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengguna</title>
    <link rel="stylesheet" href="tablestyle.css">
</head>
<body>

<div class="container">
    <h2>Daftar Pengguna</h2>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Password (Hashed)</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <br>
    <a href="index.php">Kembali ke Halaman Utama</a>
</div>

</body>
</html>
