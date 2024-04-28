<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-3">
<div class="mt-3">
    <h2>Tambah Siswa Baru</h2>
    <form action="insert_siswa.php" method="post">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="text" class="form-control" id="nis" name="nis" required>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" class="form-control" id="kelas" name="kelas" required>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Tambahkan</button>
    </form>
</div>
</div>

</body>
</html>