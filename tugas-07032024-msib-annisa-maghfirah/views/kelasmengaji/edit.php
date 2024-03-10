<?php
require_once '../../config/koneksi.php';

// Pastikan ID kelas dikirimkan melalui parameter GET
if (!isset($_GET['id'])) {
    echo "ID kelas tidak ditemukan.";
    exit;
}

// Mendapatkan ID kelas dari parameter GET dan melakukan sanitasi
$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// Query untuk mengambil data kelas berdasarkan ID
$query = "SELECT * FROM kelasmengaji WHERE id = $id";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah data kelas ditemukan
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Data kelas tidak ditemukan.";
    exit;
}

$kelas = mysqli_fetch_assoc($result);

// Lakukan pengecekan apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $tingkat = $_POST['tingkat'];

    // Query untuk update data kelas
    $query = "UPDATE kelasmengaji SET nama = '$nama', tingkat = '$tingkat' WHERE id = $id";
    $update_result = mysqli_query($koneksi, $query);

    if ($update_result) {
        echo "<script>alert('Data kelas berhasil diperbarui.'); window.location.href = 'index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error: Gagal memperbarui data kelas.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas Mengaji</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5">Edit Kelas Mengaji</h2>
        <form action="edit.php?id=<?= $id ?>" method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $kelas['nama'] ?>">
            </div>
            <div class="form-group">
                <label for="tingkat">Tingkat:</label>
                <input type="text" class="form-control" id="tingkat" name="tingkat" value="<?= $kelas['tingkat'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>