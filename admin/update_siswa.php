<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $kelas = $_POST['kelas'];

    $json_data = file_get_contents('../siswa.json');
    $data_siswa = json_decode($json_data, true);

    $data_siswa[$id - 1]['nama'] = $nama;
    $data_siswa[$id - 1]['nis'] = $nis;
    $data_siswa[$id - 1]['kelas'] = $kelas;

    $json_data = json_encode($data_siswa, JSON_PRETTY_PRINT);

    file_put_contents('../siswa.json', $json_data);

    header('Location: siswa.php');
    exit;
} else {

    http_response_code(405);
    echo json_encode(array('error' => 'Method Not Allowed'));
}
?>
