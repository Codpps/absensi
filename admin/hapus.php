<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $json_data = file_get_contents('../siswa.json');
    $data_siswa = json_decode($json_data, true);

    unset($data_siswa[$id - 1]);

    $json_data = json_encode(array_values($data_siswa), JSON_PRETTY_PRINT);

    file_put_contents('../siswa.json', $json_data);

    header('Location: siswa.php');
    exit;
}
?>
