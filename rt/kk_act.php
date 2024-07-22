<?php 
session_start();
include '../koneksi.php';

// Ambil data dari form
$jumlah_kk = $_POST['jumlah_kk'];
$kk_lk = $_POST['kk_lk'];
$kk_pr = $_POST['kk_pr'];
$kk_mampu = $_POST['kk_mampu'];
$kk_tdkMampu = $_POST['kk_tdkMampu'];
$kk_luar = $_POST['kk_luar'];

// Ambil rw dan rt dari session
$rw = $_SESSION['rw'];
$rt = $_SESSION['rt'];

// Validasi jumlah kk_lk dan kk_pr tidak melebihi jumlah_kk
if ($kk_lk + $kk_pr > $jumlah_kk) {
    header("Location: kk_tambah.php?status=error");
    exit();
}

// Validasi masing-masing kk_mampu, kk_tdkMampu, dan kk_luar tidak melebihi jumlah_kk
if ($kk_mampu > $jumlah_kk || $kk_tdkMampu > $jumlah_kk || $kk_luar > $jumlah_kk) {
    header("Location: kk_tambah.php?status=error");
    exit();
}

// Query untuk menyimpan data kepala keluarga
$query = "INSERT INTO kk (jumlah_kk, kk_lk, kk_pr, kk_mampu, kk_tdkMampu, kk_luar, rw, rt) VALUES ('$jumlah_kk', '$kk_lk', '$kk_pr', '$kk_mampu', '$kk_tdkMampu', '$kk_luar', '$rw', '$rt')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: kk_tambah.php?status=success");
} else {
    header("Location: kk_tambah.php?status=error");
}

// Tutup koneksi
mysqli_close($koneksi);
?>
