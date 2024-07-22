<?php 
session_start();
include '../koneksi.php';

// Ambil data dari form
$jumlah_warga = $_POST['jumlah_warga'];
$tdk_sekolah_lk = $_POST['tdk_sekolah_lk'];
$tdk_sekolah_pr = $_POST['tdk_sekolah_pr'];
$sd_lk = $_POST['sd_lk'];
$sd_pr = $_POST['sd_pr'];
$smp_lk = $_POST['smp_lk'];
$smp_pr = $_POST['smp_pr'];
$sma_lk = $_POST['sma_lk'];
$sma_pr = $_POST['sma_pr'];
$smk_lk = $_POST['smk_lk'];
$smk_pr = $_POST['smk_pr'];
$perguruan_tinggi_lk = $_POST['perguruan_tinggi_lk'];
$perguruan_tinggi_pr = $_POST['perguruan_tinggi_pr'];

// Ambil rw dan rt dari session
$rw = $_SESSION['rw'];
$rt = $_SESSION['rt'];

$total_pendidikan = $tdk_sekolah_lk + $tdk_sekolah_pr + $sd_lk + $sd_pr + $smp_lk + $smp_pr + $sma_lk + $sma_pr + $smk_lk + $smk_pr + $perguruan_tinggi_lk + $perguruan_tinggi_pr;

if ($total_pendidikan > $jumlah_warga) {
    header("Location: pendidikan_tambah.php?status=error");
    exit();
}

// Query untuk menyimpan data pendidikan
$query = "INSERT INTO pendidikan (jumlah_warga, tdk_sekolah_lk, tdk_sekolah_pr, sd_lk, sd_pr, smp_lk, smp_pr, sma_lk, sma_pr, smk_lk, smk_pr, perguruan_tinggi_lk, perguruan_tinggi_pr, rw, rt) VALUES ('$jumlah_warga', '$tdk_sekolah_lk', '$tdk_sekolah_pr', '$sd_lk', '$sd_pr', '$smp_lk', '$smp_pr', '$sma_lk', '$sma_pr', '$smk_lk', '$smk_pr', '$perguruan_tinggi_lk', '$perguruan_tinggi_pr', '$rw', '$rt')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: pendidikan_tambah.php?status=success");
} else {
    header("Location: pendidikan_tambah.php?status=error");
}

// Tutup koneksi
mysqli_close($koneksi);
?>
