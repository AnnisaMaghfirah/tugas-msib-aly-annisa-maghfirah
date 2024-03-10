<?php
// Include koneksi ke database
require_once '../../config/koneksi.php';

// Pastikan ID siswa dikirimkan melalui parameter GET
if (!isset($_GET['id'])) {
    echo "ID siswa tidak ditemukan.";
    exit;
}

// Mendapatkan ID siswa dari parameter GET dan melakukan sanitasi
$id = mysqli_real_escape_string($koneksi, $_GET['id']);

// Query untuk mengambil data siswa berdasarkan ID
$sql = "SELECT * FROM siswa WHERE id = $id";
$result = mysqli_query($koneksi, $sql);

// Memeriksa apakah data siswa ditemukan
if (mysqli_num_rows($result) > 0) {
    $siswa = mysqli_fetch_assoc($result);
} else {
    echo "Data siswa tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Siswa</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Edit Siswa</h2>
        <form action="aksi_edit.php" method="post">
            <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $siswa['nama'] ?>">
            </div>
            <div class="form-group">
                <label for="umur">Umur:</label>
                <input type="text" class="form-control" id="umur" name="umur" value="<?= $siswa['umur'] ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $siswa['alamat'] ?>">
            </div>
            <div class="form-group">
                <label for="no_hp">No HP:</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $siswa['no_hp'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <!-- Load Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>