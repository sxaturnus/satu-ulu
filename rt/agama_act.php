<?php 
session_start();
include '../koneksi.php';

// Ambil data dari form
$jumlah_warga = $_POST['jumlah_warga'];
$islam = $_POST['islam'];
$katolik = $_POST['katolik'];
$protestan = $_POST['protestan'];
$hindu = $_POST['hindu'];
$budha = $_POST['budha'];
$khonghucu = $_POST['khonghucu'];

// Ambil rw dan rt dari session
$rw = $_SESSION['rw'];
$rt = $_SESSION['rt'];

// Hitung total jumlah pemeluk agama
$total_agama = $islam + $katolik + $protestan + $hindu + $budha + $khonghucu;

// Validasi jumlah pemeluk agama tidak boleh melebihi jumlah warga
if ($total_agama > $jumlah_warga) {
    header("Location: agama_tambah.php?status=error");
    exit();
}

// Query untuk menyimpan data statistik agama
$query = "INSERT INTO agama (jumlah_warga, islam, katolik, protestan, hindu, budha, khonghucu, rw, rt) VALUES ('$jumlah_warga', '$islam', '$katolik', '$protestan', '$hindu', '$budha', '$khonghucu', '$rw', '$rt')";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: agama_tambah.php?status=success");
} else {
    header("Location: agama_tambah.php?status=error");
}

// Tutup koneksi
mysqli_close($koneksi);
?>
