<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];

    $siswa_baru = array(
        'nama' => $nama,
        'nis' => $nis,
        'kelas' => $kelas
    );

    $json_data = file_get_contents('../siswa.json');
    $data_siswa = json_decode($json_data, true);

    $data_siswa[] = $siswa_baru;
    $json_data = json_encode($data_siswa, JSON_PRETTY_PRINT);
    file_put_contents('../siswa.json', $json_data);

    header('Location: siswa.php');
    exit;
} else {
    http_response_code(405);
    echo json_encode(array('error' => 'Method Not Allowed'));
}
?>
