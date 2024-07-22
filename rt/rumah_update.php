<?php 
include '../koneksi.php';

$rw = $_POST['rw']; // Ambil RW dari form
$rt = $_POST['rt']; // Ambil RT dari form
$id_rumah = $_POST['id_rumah'];
$jumlah_rumah = $_POST['jumlah_rumah'];
$rumah_tinggal = $_POST['rumah_tinggal'];
$rumah_usaha = $_POST['rumah_usaha'];

// Validasi jumlah rumah tinggal dan rumah usaha tidak melebihi jumlah rumah
if ($rumah_tinggal + $rumah_usaha > $jumlah_rumah) {
    header("Location: rumah_edit.php?rw=$rw&rt=$rt&status=error");
    exit();
}

// Query untuk mengupdate data rumah
$update_query = "UPDATE rumah SET jumlah_rumah='$jumlah_rumah', rumah_tinggal='$rumah_tinggal', rumah_usaha='$rumah_usaha' WHERE id_rumah='$id_rumah'";
$result = mysqli_query($koneksi, $update_query);

if ($result) {
    header("Location: rumah_edit.php?rw=$rw&rt=$rt&status=updated");
} else {
    header("Location: rumah_edit.php?rw=$rw&rt=$rt&status=error");
}

// Tutup koneksi
mysqli_close($koneksi);
?>
