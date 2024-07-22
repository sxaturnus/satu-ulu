<?php 
session_start();
include '../koneksi.php';

// Ambil data dari form
$jumlah_rumah = $_POST['jumlah_rumah'];
$rumah_tinggal = $_POST['rumah_tinggal'];
$rumah_usaha = $_POST['rumah_usaha'];

// Ambil rw dan rt dari session
$rw = $_SESSION['rw'];
$rt = $_SESSION['rt'];

// Validasi jumlah rumah tinggal dan rumah usaha tidak melebihi jumlah rumah
if ($rumah_tinggal + $rumah_usaha > $jumlah_rumah) {
    header("Location: rumah_tambah.php?status=error");
    exit();
}

// Query untuk menyimpan data rumah
$query = "INSERT INTO rumah (jumlah_rumah, rumah_tinggal, rumah_usaha, rw, rt) VALUES ('$jumlah_rumah', '$rumah_tinggal', '$rumah_usaha', '$rw', '$rt')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: rumah_tambah.php?status=success");
} else {
    header("Location: rumah_tambah.php?status=error");
}

// Tutup koneksi
mysqli_close($koneksi);
?>
