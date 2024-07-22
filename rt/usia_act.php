<?php 
session_start();
include '../koneksi.php';

// Ambil data dari form
$total_warga = $_POST['total_warga'];
$balita_lk = $_POST['balita_lk'];
$balita_pr = $_POST['balita_pr'];
$ud_lk = $_POST['ud_lk'];
$ud_pr = $_POST['ud_pr'];
$remaja_lk = $_POST['remaja_lk'];
$remaja_pr = $_POST['remaja_pr'];
$dewasa_lk = $_POST['dewasa_lk'];
$dewasa_pr = $_POST['dewasa_pr'];
$lansia_lk = $_POST['lansia_lk'];
$lansia_pr = $_POST['lansia_pr'];

// Ambil rw dan rt dari session
$rw = $_SESSION['rw'];
$rt = $_SESSION['rt'];

if ($balita_lk + $balita_pr + $ud_lk + $ud_pr + $remaja_lk + $remaja_pr + $dewasa_lk + $dewasa_pr + $lansia_lk + $lansia_pr > $total_warga) {
    header("Location: usia_tambah.php?status=error");
    exit();
}

// Query untuk menyimpan data kepala keluarga
$query = "INSERT INTO usia (total_warga, balita_lk, balita_pr, ud_lk, ud_pr, remaja_lk, remaja_pr, dewasa_lk, dewasa_pr, lansia_lk, lansia_pr, rw, rt) VALUES ('$total_warga', '$balita_lk', '$balita_pr', '$ud_lk', '$ud_pr', '$remaja_lk', '$remaja_pr', '$dewasa_lk', '$dewasa_pr', '$lansia_lk', '$lansia_pr', '$rw', '$rt')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: usia_tambah.php?status=success");
} else {
    header("Location: usia_tambah.php?status=error");
}

// Tutup koneksi
mysqli_close($koneksi);
?>
