<?php
require_once '../../controller/gurucontroller.php';

// Memastikan bahwa ID guru dikirimkan melalui parameter POST
if (!isset($_POST['id'])) {
    echo "ID guru tidak ditemukan.";
    exit;
}

// Membuat koneksi database
$db = new PDO("mysql:host=localhost;dbname=mvcmengaji", "root", "");

// Membuat objek ControllerGuru dengan koneksi database
$controller = new ControllerGuru($db);

// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$usia = $_POST['usia'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$jadwal_mengajar = $_POST['jadwal_mengajar'];

// Memperbarui informasi guru
$result = $controller->editGuru($id, $nama, $usia, $alamat, $no_hp, $jadwal_mengajar);

if ($result) {
    // Jika berhasil, redirect ke halaman index guru
    header("Location: index.php");
    exit;
} else {
    echo "Error: Gagal memperbarui data guru.";
}
?>