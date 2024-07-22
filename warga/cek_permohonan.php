<?php
include '../koneksi.php'; // Pastikan file ini sudah di-include

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
    header("Location: administrasi.php?nik=$nik&tab=2");
    exit();
} else {
    // Jika NIK tidak ditemukan, kembalikan ke halaman administrasi dengan pesan kesalahan
    header("Location: administrasi.php?tab=2&error=NIK tidak ditemukan");
    exit();
}
?>
