<?php 
include '../koneksi.php';

$rw = $_POST['rw']; // Ambil RW dari form
$rt = $_POST['rt']; // Ambil RT dari form
$id_warga = $_POST['id_warga'];
$jumlah_warga = $_POST['jumlah_warga'];
$pria = $_POST['pria'];
$wanita = $_POST['wanita'];
$warga_tetap = $_POST['warga_tetap'];
$warga_tdkTetap = $_POST['warga_tdkTetap'];

if ($pria + $wanita > $jumlah_warga) {
  header("Location: sw_tambah.php?status=error");
  exit();
}

if ($warga_tetap > $jumlah_warga || $warga_tdkTetap > $jumlah_warga) {
  header("Location: sw_tambah.php?status=error");
  exit();
}

// Query untuk mengupdate data rumah
$update_query = "UPDATE warga SET jumlah_warga='$jumlah_warga', pria='$pria', wanita='$wanita', warga_tetap='$warga_tetap', warga_tdkTetap='$warga_tdkTetap' WHERE id_warga='$id_warga'";
$result = mysqli_query($koneksi, $update_query);

if ($result) {
    header("Location: sw_edit.php?rw=$rw&rt=$rt&status=updated");
} else {
    header("Location: sw_edit.php?rw=$rw&rt=$rt&status=error");
}

// Tutup koneksi
mysqli_close($koneksi);
?>
