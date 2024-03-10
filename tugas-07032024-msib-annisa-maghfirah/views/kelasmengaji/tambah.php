<?php
require_once '../../config/koneksi.php';

// Lakukan pengecekan apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $tingkat = $_POST['tingkat'];

    // Query untuk menambahkan data kelas baru
    $query = "INSERT INTO kelasmengaji (nama, tingkat) VALUES ('$nama', '$tingkat')";
    $insert_result = mysqli_query($koneksi, $query);

    if ($insert_result) {
        echo "<script>alert('Data kelas baru berhasil ditambahkan.'); window.location.href = 'index.php';</script>";
        exit;
    } else {
        echo "<script>alert('Error: Gagal menambahkan data kelas baru.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kelas Mengaji</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2 class="text-center mt-5">Tambah Kelas Baru</h2>
        <form action="tambah.php" method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="tingkat">Tingkat:</label>
                <input type="text" class="form-control" id="tingkat" name="tingkat" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>