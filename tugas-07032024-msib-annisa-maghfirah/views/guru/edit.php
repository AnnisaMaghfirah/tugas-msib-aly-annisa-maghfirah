<?php
require_once '../../controller/gurucontroller.php';

// Memastikan bahwa ID guru dikirimkan melalui parameter GET
if (!isset($_GET['id'])) {
    echo "ID guru tidak ditemukan.";
    exit;
}

// Lakukan pengecekan apakah form belum disubmit
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    // Membuat koneksi database
    $db = new PDO("mysql:host=localhost;dbname=mvcmengaji", "root", "");

    // Membuat objek ControllerGuru dengan koneksi database
    $controller = new ControllerGuru($db);

    // Mengambil data guru berdasarkan ID
    $guru = $controller->getGuruById($_GET['id']);

    // Memeriksa apakah data guru ditemukan
    if (!$guru) {
        echo "Data guru tidak ditemukan.";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Edit Guru</h2>
        <form action="aksi_edit.php" method="post">
            <!-- Perubahan pada action -->
            <!-- Hapus action agar form submit ke halaman yang sama -->
            <input type="hidden" name="id" value="<?= $guru['id'] ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $guru['nama'] ?>">
            </div>
            <div class="form-group">
                <label for="usia">Usia:</label>
                <input type="text" class="form-control" id="usia" name="usia" value="<?= $guru['usia'] ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $guru['alamat'] ?>">
            </div>
            <div class="form-group">
                <label for="no_hp">No HP:</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $guru['no_hp'] ?>">
            </div>
            <div class="form-group">
                <label for="jadwal_mengajar">Jadwal Mengajar:</label>
                <input type="text" class="form-control" id="jadwal_mengajar" name="jadwal_mengajar"
                    value="<?= $guru['jadwal_mengajar'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <!-- Load Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php } ?>