<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum, redirect ke halaman login
    header("Location: login.php");
    exit;
}

// Ambil nama pengguna dari sesi
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        padding: 50px;
    }

    .container {
        max-width: 600px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="display-4">Profil Pengguna</h1>
        <h2>Halo, <?php echo isset($username) ? $username : ''; ?>!</h2>
        <p class="lead">Selamat Datang di Profile Pengguna Website Pendaftaran Mengaji</p>
        <a href="../index.php" class="btn btn-primary">Kembali ke Beranda</a>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>