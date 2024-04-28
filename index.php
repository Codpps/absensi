<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Absensi Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <a href="admin/login.php" id="admin-link">Admin Panel</a>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card p-3">
          <div class="card-header text-center">
            <img src="SMKN17.png" width="130" alt="smkn 17" class="img-fluid">
            <h2 class="mb-4">Absen SMK 17</h2>                    
          </div>
          <form method="POST" action="submit_absensi.php">
            <div class="form-group">
              <label for="name">Nama</label>
              <select class="form-control" id="name" name="name">
                <?php
                  $json_data = file_get_contents('siswa.json');
                  $siswa = json_decode($json_data, true);
                  foreach ($siswa as $data) {
                    echo '<option value="' . $data['nama'] . '">' . $data['nama'] . '</option>';
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="class">Kelas</label>
              <select class="form-control" id="class" name="class">
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
            </div>
            <div class="form-group">
              <label for="date">Tanggal</label>
              <input type="date" class="form-control" id="date" name="date">
            </div>
            <input type="hidden" id="time" name="time" value="<?php echo date('H:i:s'); ?>">
            <div class="form-group radio-group">
              <label class="radio-label">Status Kehadiran:</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_kehadiran" id="izin" value="Izin">
                <label class="form-check-label" for="izin">Izin</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_kehadiran" id="hadir" value="Hadir">
                <label class="form-check-label" for="hadir">Hadir</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status_kehadiran" id="sakit" value="Sakit">
                <label class="form-check-label" for="sakit">Sakit</label>
              </div>
            </div>
            <div class="form-group" id="reason-container">
              <label for="reason">Alasan Kehadiran</label>
              <textarea class="form-control" id="reason" name="alasan_kehadiran" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block mb-3" onclick="submitForm(event);">Submit</button>
            <button type="button" class="btn btn-success btn-block" onclick="cancelAction();">Lihat</button>
          </form>
        </div>  
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  <script>
    function submitForm(event) {
      event.preventDefault();
      Swal.fire({
        icon: 'success',
        title: 'Terima Kasih Telah Absen',
        text: 'Selamat Bersekolah',
        showCancelButton: true,
        confirmButtonText: 'OK',
      }).then((result) => {
        if (result.isConfirmed) {
          document.querySelector('form').submit();
        }
      });
    }

    function cancelAction() {
      var namaPengguna = document.getElementById('name').value;
      window.location.href = 'user.php?nama=' + encodeURIComponent(namaPengguna);
    }
  </script>

</body>
</html>
 