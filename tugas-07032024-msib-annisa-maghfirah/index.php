<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum, tampilkan pesan dan tombol login
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Selamat Datang</title>
        <!-- Load Bootstrap CSS -->
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
        <style>
            .center-content {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
        </style>
    </head>
    <body>
        <div class='container center-content'>
            <div class='jumbotron'>
                <h1 class='display-4 text-center'>Selamat Datang di Website Pendaftaran Mengaji</h1>
                <p class='lead text-center'>Akses ditolak. Silahkan <a href='controller/login.php'>login</a> terlebih dahulu.</p>
            </div>
        </div>
    </body>
    </html>";
    exit; // Hentikan eksekusi lebih lanjut
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .center-text {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5 center-text">Selamat Datang di Website Pendaftaran Mengaji</h1>
        <ul class="list-group mt-3">
            <li class="list-group-item"><a href="views/guru/index.php">Guru</a></li>
            <li class="list-group-item"><a href="views/siswa/index.php">Siswa</a></li>
            <li class="list-group-item"><a href="views/kelasmengaji/index.php">Kelas Mengaji</a></li>
            <li class="list-group-item"><a href="controller/akun.php">Akun</a></li>
            <li class="list-group-item"><a href="controller/logout.php"
                    onclick="return confirm('Apakah Anda yakin ingin logout?')">Logout</a></li>
        </ul>
    </div>

    <!-- Footer -->
    <footer class="footer mt-auto py-3 bg-light">
        <div class="container text-center">
            <span class="text-muted">Hak Cipta &copy; Annisa Maghfirah - Website Pendaftaran Mengaji 2024</span>
        </div>
    </footer>

    <!-- Load Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>