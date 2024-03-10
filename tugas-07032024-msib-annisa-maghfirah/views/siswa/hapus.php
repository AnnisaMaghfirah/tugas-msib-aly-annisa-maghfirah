<?php
// Memastikan bahwa ID siswa dikirimkan melalui parameter GET
if (!isset($_GET['id'])) {
    echo "ID siswa tidak ditemukan.";
    exit;
}

// Include koneksi ke database
require_once '../../config/koneksi.php';

// Mendapatkan ID siswa dari parameter GET dan melakukan sanitasi
$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// Query untuk menghapus data siswa berdasarkan ID (dengan prepared statement)
$sql = "DELETE FROM siswa WHERE id = ?";
$stmt = mysqli_prepare($koneksi, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);

// Eksekusi prepared statement
if (mysqli_stmt_execute($stmt)) {
    // Redirect kembali ke halaman index.php setelah data berhasil dihapus
    header("Location: index.php");
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

// Tutup prepared statement dan koneksi database
mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>