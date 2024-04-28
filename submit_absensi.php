<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $absen_data = array(
        'nama' => $_POST['name'],
        'kelas' => $_POST['class'],
        'tanggal' => $_POST['date'],
        'jam' => $_POST['time'], 
        'status_kehadiran' => $_POST['status_kehadiran'],
        'alasan_kehadiran' => $_POST['alasan_kehadiran']
    );
    $json_data = file_get_contents('absensi.json');
    $existing_data = json_decode($json_data, true);
    $existing_data[] = $absen_data;
    $json_string = json_encode($existing_data, JSON_PRETTY_PRINT);
    file_put_contents('absensi.json', $json_string);
    header('Location: index.php');
    exit();
} else {
    header('Location: index.php');
    exit();
}
?>
