<?php
session_start();
require_once '../config/koneksi.php'; // Sesuaikan dengan lokasi file koneksi.php Anda

// Jika pengguna sudah login, redirect ke halaman utama
if(isset($_SESSION['username'])) {
    header("Location: ../index.php");
    exit;
}

// Cek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk mengambil informasi user dari database
    $query = "SELECT * FROM login WHERE username = ?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    // Periksa apakah username ditemukan
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        // Periksa apakah password cocok
        if (password_verify($password, $user['password'])) {
            // Simpan username di session
            $_SESSION['username'] = $username;
            // Redirect ke halaman utama setelah login berhasil
            header("Location: ../index.php");
            exit;
        } else {
            // Jika password tidak cocok, tampilkan pesan error
            $error_message = "Password salah.";
        }
    } else {
        // Jika username tidak ditemukan, tampilkan pesan error
        $error_message = "Username tidak ditemukan.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    .container {
        max-width: 400px;
        margin: 0 auto;
        margin-top: 50px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Login</h1>
        <?php
        if(isset($error_message)) {
            echo '<p style="color: red;" class="text-center">' . $error_message . '</p>';
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <p class="mt-3">Belum punya akun? <a href="register.php">Daftar disini</a>.</p>
        </form>
    </div>
</body>

</html>