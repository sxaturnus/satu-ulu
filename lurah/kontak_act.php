<?php
include '../koneksi.php';

// Proses unggah file gambar
$nama_file = $_FILES['foto']['name'];
$ukuran_file = $_FILES['foto']['size'];
$tmp_file = $_FILES['foto']['tmp_name'];
$ekstensi_diperbolehkan = array('png', 'jpg');

$x = explode('.', $nama_file);
$ekstensi = strtolower(end($x));

// Validasi ekstensi file
if (in_array($ekstensi, $ekstensi_diperbolehkan) === false) {
    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    exit();
}

// Validasi ukuran file (dalam bytes)
$ukuran_max = 1044070; // 1 MB (1044070 bytes)
if ($ukuran_file > $ukuran_max) {
    echo 'UKURAN FILE TERLALU BESAR';
    exit();
}

// Direktori penyimpanan file
$direktori = '/../assets/foto_kontak/';

// Pindahkan file ke direktori yang ditentukan
if (move_uploaded_file($tmp_file, __DIR__ . $direktori . $nama_file)) {
    // Simpan nama file ke dalam database
    $nama_rt = $_POST['nama_rt'];
    $jabatan_rt = $_POST['jabatan_rt'];
    $telp_rt = $_POST['telp_rt'];

    $query = "INSERT INTO kontak_rt (foto, nama_rt, jabatan_rt, telp_rt) VALUES ('$nama_file', '$nama_rt', '$jabatan_rt', '$telp_rt')";
    if (mysqli_query($koneksi, $query)) {
        // Redirect ke halaman kontak_rt.php jika berhasil
        header("location:kontak_rt.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "GAGAL UPLOAD FILE";
}
?>
