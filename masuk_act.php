<?php
session_start();
include 'koneksi.php'; // Meng-include file koneksi.php

// Ambil data dari form login.php
$nik = $_POST['nik'];
//$password = $_POST['password']; // Tanpa md5
$password = md5($_POST['password']);

// Query untuk mencari user berdasarkan nik dan password
$query = "SELECT * FROM auth WHERE nik = '$nik' AND password = '$password'";

// Jalankan query
$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($koneksi));
}

// Hitung jumlah baris hasil query
$cek = mysqli_num_rows($result);

if ($cek > 0) {
    // Jika data ditemukan, ambil data user
    $data = mysqli_fetch_assoc($result);

    // Simpan data dalam session
    $_SESSION['id_auth'] = $data['id_auth'];
    $_SESSION['nik'] = $data['nik'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];
    $_SESSION['rw'] = $data['rw'];
    $_SESSION['rt'] = $data['rt'];

    // Redirect sesuai dengan role user
    if (strtolower($data['role']) == 'lurah') {
        header('location:lurah/');
        exit();
    } elseif (strtolower($data['role']) == 'rt') {
        header('location:rt/');
        exit();
    } elseif (strtolower($data['role']) == 'warga') {
        header('location:warga/');
        exit();
    } else {
        // Jika role tidak dikenali, arahkan ke halaman default atau berikan pesan error sesuai kebutuhan
        header("location:masuk.php?message=Role%20tidak%20dikenali!");
        exit();
    }
} else {
    // Jika data tidak ditemukan, arahkan kembali ke halaman login.php dengan pesan error
    header("location:masuk.php?message=NIK%20atau%20Password%20Salah!");
    exit();
}

?>
