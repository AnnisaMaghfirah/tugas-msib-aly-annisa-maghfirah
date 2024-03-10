<?php
session_start();
require_once '../config/koneksi.php'; // Sesuaikan dengan lokasi file koneksi.php Anda

// Jika pengguna sudah login, redirect ke halaman utama
if(isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

// Inisialisasi variabel error
$error_message = "";

// Cek apakah form registrasi telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Proses registrasi
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memeriksa apakah username sudah digunakan
    $check_query = "SELECT * FROM login WHERE username = ?";
    $check_stmt = mysqli_prepare($koneksi, $check_query);
    mysqli_stmt_bind_param($check_stmt, "s", $username);
    mysqli_stmt_execute($check_stmt);
    $check_result = mysqli_stmt_get_result($check_stmt);

    if (mysqli_num_rows($check_result) > 0) {
        $error_message = "Username sudah digunakan.";
    } else {
        // Query untuk menyimpan pengguna baru ke dalam database
        $insert_query = "INSERT INTO login (username, password) VALUES (?, ?)";
        $insert_stmt = mysqli_prepare($koneksi, $insert_query);
        mysqli_stmt_bind_param($insert_stmt, "ss", $username, $hashed_password);
        
        if (mysqli_stmt_execute($insert_stmt)) {
            // Registrasi berhasil, redirect ke halaman login
            header("Location: login.php");
            exit;
        } else {
            $error_message = "Registrasi gagal. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        <h1 class="text-center">Register</h1>
        <?php
        if (!empty($error_message)) {
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
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</body>

</html>