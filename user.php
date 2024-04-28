<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Card</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="user.jpeg" class="img-fluid rounded-start" alt="User Image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <?php
                                // Membaca data riwayat absensi dari file JSON
                                $json_data = file_get_contents('absensi.json');
                                $history = json_decode($json_data, true);
                                $nama_pengguna = isset($_GET['nama']) ? $_GET['nama'] : '';

                                // Inisialisasi variabel jumlah izin, kehadiran, dan sakit
                                $izin = 0;
                                $hadir = 0;
                                $sakit = 0;

                                // Menghitung jumlah izin, kehadiran, dan sakit untuk pengguna yang sesuai
                                foreach ($history as $absensi) {
                                    if ($absensi['nama'] === $nama_pengguna) {
                                        switch ($absensi['status_kehadiran']) {
                                            case 'Izin':
                                                $izin++;
                                                break;
                                            case 'Hadir':
                                                $hadir++;
                                                break;
                                            case 'Sakit':
                                                $sakit++;
                                                break;
                                            default:
                                                break;
                                        }
                                    }
                                }
                                ?>
                                <!-- Menampilkan data pengguna -->
                                <p class="card-title">Nama: <?= $nama_pengguna ?></p>
                                <p class="card-text">Kelas: <?= $absensi['kelas'] ?></p>
                                <p class="card-text">Izin: <?= $izin ?></p>
                                <p class="card-text">Hadir: <?= $hadir ?></p>
                                <p class="card-text">Sakit: <?= $sakit ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="index.php" class="btn btn-primary rounded-2 mt-4">kembali</a>
            </div>
            
        </div>

    </div>
    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
