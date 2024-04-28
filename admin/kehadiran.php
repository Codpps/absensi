<div class="container mt-5">
    <?php
    include("admin.php");
    ?>
    <h1 class="text-center">Halaman Kehadiran</h1>
    <hr>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped" id="table-siswa">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>KELAS</th>
                    <th>TANGGAL</th>
                    <th>JAM</th>
                    <th>KETERANGAN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $json_data = file_get_contents('../absensi.json');
                $data_siswa = json_decode($json_data, true);

                foreach ($data_siswa as $index => $siswa) {
                    echo "<tr>";
                    echo "<td>" . ($index + 1) . "</td>";
                    echo "<td>" . $siswa['nama'] . "</td>";
                    echo "<td>" . $siswa['kelas'] . "</td>";
                    echo "<td>" . $siswa['tanggal'] . "</td>";
                    echo "<td>" . $siswa['jam'] . "</td>";
                    echo "<td>";
                    // Check if status_kehadiran is "izin"
                    if ($siswa['status_kehadiran'] === "Izin") {
                        echo "<a class='btn btn-danger border-dark'>Izin</a>";
                    } elseif ($siswa["status_kehadiran"] === "Hadir") {
                        echo "<a class='btn btn-success border-dark'>Hadir</a>";
                    } else {
                        echo "<a class='btn btn-warning border-dark'>Sakit</a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
