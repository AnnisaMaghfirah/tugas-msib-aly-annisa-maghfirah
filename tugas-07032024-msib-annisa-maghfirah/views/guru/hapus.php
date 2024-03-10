<?php
require_once '../../controller/gurucontroller.php';
require_once '../../config/koneksi.php'; // Sertakan file konfigurasi database

// Membuat koneksi database
$db = new PDO("mysql:host=localhost;dbname=mvcmengaji", "root", "");

// Membuat objek ControllerGuru dengan koneksi database
$controller = new ControllerGuru($db);

// Memastikan bahwa ID guru dikirimkan melalui parameter GET
if (!isset($_GET['id'])) {
    echo "ID guru tidak ditemukan.";
    exit;
}

// Menghapus guru berdasarkan ID
$result = $controller->hapusGuru($_GET['id']);

if ($result) {
    echo "<script>alert('Data guru berhasil dihapus.'); window.location.href = 'index.php';</script>";
} else {
    echo "<script>alert('Error: Gagal menghapus data guru.'); window.location.href = 'index.php';</script>";
}
?>