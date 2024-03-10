<?php
require_once '../../config/koneksi.php';

// Pastikan ID kelas dikirimkan melalui parameter GET
if (!isset($_GET['id'])) {
    echo "ID kelas tidak ditemukan.";
    exit;
}

// Mendapatkan ID kelas dari parameter GET dan melakukan sanitasi
$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// Query untuk menghapus data kelas
$query = "DELETE FROM kelasmengaji WHERE id = $id";
$delete_result = mysqli_query($koneksi, $query);

if ($delete_result) {
    echo "<script>alert('Data kelas berhasil dihapus.'); window.location.href = 'index.php';</script>";
    exit;
} else {
    echo "<script>alert('Error: Gagal menghapus data kelas.');</script>";
}
?>