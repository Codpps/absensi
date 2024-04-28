<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Edit Data Siswa</h1>
    <?php
    $id = $_GET['id'];

    $json_data = file_get_contents('../siswa.json');
    $data_siswa = json_decode($json_data, true);
    $siswa = $data_siswa[$id - 1];
    ?>
    <form action="update_siswa.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $siswa['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="text" class="form-control" id="nis" name="nis" value="<?php echo $siswa['nis']; ?>" required>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $siswa['kelas']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
</body>
</html>
