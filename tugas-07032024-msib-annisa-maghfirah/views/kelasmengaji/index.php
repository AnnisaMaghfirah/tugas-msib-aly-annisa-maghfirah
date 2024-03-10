<?php
// Include koneksi ke database
require_once '../../config/koneksi.php';

// Query untuk mengambil data kelas mengaji dari tabel kelasmengaji
$query = "SELECT * FROM kelasmengaji";
$result = mysqli_query($koneksi, $query);

// Memeriksa apakah ada data kelas mengaji yang ditemukan
if (!$result || mysqli_num_rows($result) == 0) {
    echo "Tidak ada data kelas yang tersedia.";
    exit;
}

// Menginisialisasi array untuk menyimpan data kelas mengaji
$daftar_kelas = [];

// Memasukkan data kelas mengaji ke dalam array
while ($row = mysqli_fetch_assoc($result)) {
    $daftar_kelas[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kelas Mengaji</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .center-text {
        text-align: center;
    }

    .center-table {
        margin: 0 auto;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5 center-text">Daftar Kelas Mengaji</h1>
        <div class="text-center">
            <a href="tambah.php" class="btn btn-primary mt-3">Tambah Kelas Baru</a>
            <a href="../../index.php" class="btn btn-secondary mt-3">Kembali ke Halaman Home</a>
        </div>
        <table class="table table-bordered mt-3 center-table text-center">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tingkat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($daftar_kelas as $kelas): ?>
                <tr>
                    <td><?= $kelas['id'] ?></td>
                    <td><?= $kelas['nama'] ?></td>
                    <td><?= $kelas['tingkat'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $kelas['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="hapus.php?id=<?= $kelas['id'] ?>" class="btn btn-danger"
                            onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Load Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>