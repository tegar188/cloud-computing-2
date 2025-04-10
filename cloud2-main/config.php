<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "web";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
