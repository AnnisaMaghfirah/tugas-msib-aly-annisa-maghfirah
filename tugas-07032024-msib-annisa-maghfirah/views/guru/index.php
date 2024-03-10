<?php
// Include model Guru
require_once '../../models/guru.php';

// Buat instance objek dari model Guru
$guru_model = new Guru();

// Ambil data guru dari model
$guru = $guru_model->getAllGuru();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Guru Mengaji</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Daftar Guru Mengaji</h1>
        <div class="text-center">
            <a href="tambah.php" class="btn btn-primary mb-3">Tambah Guru Baru</a>
            <a href="../../index.php" class="btn btn-secondary mb-3">Kembali ke Halaman Home</a>
        </div>
        <table class="table table-bordered mx-auto">
            <thead class="thead-dark">
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Usia</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">No. HP</th>
                    <th class="text-center">Jadwal Mengajar</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($guru as $row): ?>
                <tr>
                    <td class="text-center"><?= $row['id'] ?></td>
                    <td class="text-center"><?= $row['nama'] ?></td>
                    <td class="text-center"><?= $row['usia'] ?></td>
                    <td class="text-center"><?= $row['alamat'] ?></td>
                    <td class="text-center"><?= $row['no_hp'] ?></td>
                    <td class="text-center"><?= $row['jadwal_mengajar'] ?></td>
                    <td class="text-center">
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