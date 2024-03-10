<?php
require_once '../../config/koneksi.php'; // Memuat file yang berisi koneksi database
require_once '../../controller/gurucontroller.php';

// Lakukan pengecekan apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $jadwal_mengajar = $_POST['jadwal_mengajar'];

    // Tambahkan guru baru
    $controller = new ControllerGuru($db); // Mengirimkan koneksi database sebagai argumen
    $result = $controller->tambahGuru($nama, $usia, $alamat, $no_hp, $jadwal_mengajar);

    if ($result) {
        echo "<script>alert('Guru baru berhasil ditambahkan.'); window.location.href = 'index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error: Gagal menambahkan guru baru.');</script>";
    }
}

// Jika form belum disubmit, tampilkan form untuk menambah guru
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Tambah Guru Baru</h2>
        <form action="tambah.php" method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="usia">Usia:</label>
                <input type="text" class="form-control" id="usia" name="usia" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="no_hp">No HP:</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required>
            </div>
            <div class="form-group">
                <label for="jadwal_mengajar">Jadwal Mengajar:</label>
                <input type="text" class="form-control" id="jadwal_mengajar" name="jadwal_mengajar" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <!-- Load Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>