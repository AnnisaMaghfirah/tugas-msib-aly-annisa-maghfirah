<?php
// Include koneksi ke database
require_once '../../config/koneksi.php';

// Pastikan semua data yang diperlukan telah dikirimkan
if (isset($_POST['id'], $_POST['nama'], $_POST['umur'], $_POST['alamat'], $_POST['no_hp'])) {
    // Mendapatkan data dari formulir
    $id = mysqli_real_escape_string($koneksi, $_POST['id']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $umur = mysqli_real_escape_string($koneksi, $_POST['umur']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

    // Query untuk mengupdate data siswa
    $sql = "UPDATE siswa SET nama='$nama', umur='$umur', alamat='$alamat', no_hp='$no_hp' WHERE id='$id'";
    
    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        echo "Data siswa berhasil diperbarui.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
} else {
    echo "Semua data harus diisi.";
}

// Mengarahkan kembali ke halaman index setelah selesai
header("Location: index.php");
exit;
?>