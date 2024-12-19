<?php
// Konfigurasi koneksi ke database
$servername = "localhost";  // Nama host, biasanya "localhost" jika di XAMPP
$username = "root";         // Username default XAMPP MySQL
$password = "";             // Password MySQL (kosong jika default di XAMPP)
$dbname = "absen";        // Nama database yang ingin dihubungkan

// Membuat koneksi ke MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
