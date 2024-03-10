<?php
// Konfigurasi koneksi ke database
$host = 'localhost'; // Host database
$username = 'root'; // Username database
$password = ''; // Password database
$database = 'mvcmengaji'; // Nama database

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $username, $password, $database);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>