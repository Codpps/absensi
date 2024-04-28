<?php
// Inisialisasi variabel username dan password
$username = "";
$password = "";

// Periksa apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah field username dan password diisi
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        // Ambil nilai username dan password dari form
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Periksa apakah username dan password sesuai dengan yang diharapkan
        if ($username === "admin" && $password === "admin123") {
            // Jika sesuai, redirect ke halaman selanjutnya atau lakukan tindakan lain
            header("Location: siswa.php");
            exit(); // Penting untuk menghentikan eksekusi skrip setelah melakukan redirect
        } else {
            // Jika tidak sesuai, tampilkan pesan error
            $error_message = "Username or password is incorrect!";
        }
    } else {
        // Jika field username atau password kosong, tampilkan pesan error
        $error_message = "Please enter username and password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if(isset($error_message)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php endif; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
