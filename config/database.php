<?php
$host = 'localhost';
$user = 'root'; // Ganti dengan username MySQL jika berbeda
$password = ''; // Ganti dengan password MySQL jika ada
$database = 'ITB';

// Koneksi ke database
$conn = new mysqli($host, $user, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
