<?php
// Sertakan file koneksi ke database
include '../koneksi.php';

// Pastikan request adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Melakukan escape terhadap input pengguna untuk keamanan
    $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $tempat_lahir = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
    $tgl_lahir = mysqli_real_escape_string($koneksi, $_POST['tgl_lahir']);
    $gender = mysqli_real_escape_string($koneksi, $_POST['gender']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $agama = mysqli_real_escape_string($koneksi, $_POST['agama']);
    $telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = md5(mysqli_real_escape_string($koneksi, $_POST['password'])); // Enkripsi password dengan md5

    $role = 'rt'; // Set role secara otomatis menjadi 'rt'

    // Mencoba menjalankan query untuk menyimpan data ke database
    $sql = "INSERT INTO auth (nik, nama, tempat_lahir, tgl_lahir, gender, alamat, agama, telp, email, password, role) 
            VALUES ('$nik', '$nama', '$tempat_lahir', '$tgl_lahir', '$gender', '$alamat', '$agama', '$telp', '$email', '$password', '$role')";
    
    if (mysqli_query($koneksi, $sql)) {
        echo json_encode(array('status' => 'success'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => mysqli_error($koneksi)));
    }

    // Menutup koneksi database
    mysqli_close($koneksi);
}
?>
