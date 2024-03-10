<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mengaji Siswa Baru</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Form Pendaftaran Mengaji Siswa Baru</h1>

        <form action="process_tambah.php" method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label><br>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="form-group">
                <label for="umur">Umur:</label><br>
                <input type="number" class="form-control" id="umur" name="umur" required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label><br>
                <textarea class="form-control" id="alamat" name="alamat" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="no_hp">No. HP:</label><br>
                <input type="tel" class="form-control" id="no_hp" name="no_hp" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <!-- Load Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>