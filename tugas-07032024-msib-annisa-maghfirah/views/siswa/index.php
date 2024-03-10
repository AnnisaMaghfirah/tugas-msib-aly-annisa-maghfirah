<?php
// Include model Siswa
require_once '../../models/siswa.php';

// Buat instance objek dari model Siswa
$siswa_model = new Siswa();

// Ambil data siswa dari model
$siswa = $siswa_model->getAllSiswa();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa yang Ingin Mendaftar Mengaji</title>
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
        <h1 class="mt-5 center-text">Daftar Siswa yang Ingin Mendaftar Mengaji</h1>
        <div class="text-center">
            <a href="formpendaftaran.php" class="btn btn-primary mt-3">Tambah Siswa Baru</a>
            <a href="../../index.php" class="btn btn-secondary mt-3">Kembali ke Halaman Home</a>
        </div>
        <table class="table table-bordered mt-3 center-table text-center">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($siswa as $row): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['umur'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['no_hp'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary">Edit</a>
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger"
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