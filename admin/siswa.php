<div class="container mt-5">
        <?php
        include("admin.php");
        ?>
    <h1 class="text-center">Halaman Siswa</h1>
    <hr class="border-4">
    <a href="tambah.php" class="btn btn-primary border-dark">tambah siswa</a>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped" id="table-siswa">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NIS</th>
                    <th>KELAS</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $json_data = file_get_contents('../siswa.json');
                $data_siswa = json_decode($json_data, true);

                foreach ($data_siswa as $index => $siswa) {
                    echo "<tr>";
                    echo "<td>" . ($index + 1) . "</td>";
                    echo "<td>" . $siswa['nama'] . "</td>";
                    echo "<td>" . $siswa['nis'] . "</td>";
                    echo "<td>" . $siswa['kelas'] . "</td>";
                    echo "<td>";
                    echo '<a href="edit.php?id=' . ($index + 1) . '" class="btn btn-warning border-dark">EDIT</a>';
                    echo '<a href="hapus.php?id=' . ($index + 1) . '" class="btn btn-danger border-dark  ms-lg-2" onclick="return confirm(\'Apakah Anda yakin ingin menghapus siswa ini?\')">DELETE</a>';
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
