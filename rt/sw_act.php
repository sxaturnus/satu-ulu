<?php 
session_start();
include '../koneksi.php';

// Ambil data dari form
$jumlah_warga = $_POST['jumlah_warga'];
$pria = $_POST['pria'];
$wanita = $_POST['wanita'];
$warga_tetap = $_POST['warga_tetap'];
$warga_tdkTetap = $_POST['warga_tdkTetap'];

// Ambil rw dan rt dari session
$rw = $_SESSION['rw'];
$rt = $_SESSION['rt'];

if ($pria + $wanita > $jumlah_warga) {
    header("Location: sw_tambah.php?status=error");
    exit();
}

if ($warga_tetap > $jumlah_warga || $warga_tdkTetap > $jumlah_warga) {
    header("Location: sw_tambah.php?status=error");
    exit();
}

// Query untuk menyimpan data kepala keluarga
$query = "INSERT INTO warga (jumlah_warga, pria, wanita, warga_tetap, warga_tdkTetap, rw, rt) VALUES ('$jumlah_warga', '$pria', '$wanita', '$warga_tetap', '$warga_tdkTetap', '$rw', '$rt')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: sw_tambah.php?status=success");
} else {
    header("Location: sw_tambah.php?status=error");
}

// Tutup koneksi
mysqli_close($koneksi);
?>
