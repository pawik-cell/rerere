<?php
include 'koneksi.php'; // Menggunakan file koneksi.php

// Mengatur zona waktu ke Indonesia (Waktu Indonesia Barat)
date_default_timezone_set('Asia/Jakarta'); // Ganti dengan 'Asia/Makassar' atau 'Asia/Jayapura' sesuai kebutuhan

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $NPM = $_POST['NPM'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $waktuKehadiran = date('Y-m-d H:i:s'); // Waktu kehadiran saat ini

    // Menyimpan data ke database
    $sql = "INSERT INTO absen (NPM, Nama, Jurusan, Waktu_Kehadiran) VALUES ('$NPM', '$nama', '$jurusan', '$waktuKehadiran')";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan!";
        header("Location: index.php"); // Redirect ke halaman utama setelah berhasil
        exit; // Menghentikan script agar redirect berfungsi dengan baik
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ABSENSI MAHASISWA INFORMATIKA 3.1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://i.ytimg.com/vi/1uCocVkVcRo/maxresdefault.jpg'); /* Ganti dengan URL gambar Anda */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        h1 {
            color: #8B0000;
            margin: 0 0 20px 0;
            font-size: 24px;
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: border 0.3s;
        }

        input[type="text"]:focus {
            border: 1px solid #007BFF;
            outline: none;
        }

        button, .back-button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        button:hover, .back-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>ABSENSI MAHASISWA INFORMATIKA 3.1</h1>
        <form method="POST" action="tambah_data.php">
            <label for="NPM">NPM:</label>
            <input type="text" id="NPM" name="NPM" required>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>

            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" required>

            <button type="submit">Simpan</button>
        </form>
        
        <!-- Tombol Kembali ke Halaman Utama -->
        <a href="index.php" class="back-button">Kembali ke Halaman Utama</a>
    </div>
</body>
</html>
