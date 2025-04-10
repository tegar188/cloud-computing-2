<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password dengan bcrypt
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Simpan ke database
    $stmt = $koneksi->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        // Menampilkan alert menggunakan JavaScript
        echo "<script>
                alert('Registrasi berhasil!');
                window.location.href = 'index.php'; // Redirect ke halaman register
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $stmt->error . "');
              </script>";
    }

    $stmt->close();
}
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<form method="post" class="container">
    <h2>Register</h2>

    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Masukkan username" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukkan password" required>
    </div>

    <button type="submit">Daftar</button>
    <div style="margin-top: 10px;"></div> <!-- Menambahkan jarak -->
    <button type="button" onclick="window.location.href='user.php'" class="btn-user">Ke Halaman User</button>
</form>

</body>
</html>
