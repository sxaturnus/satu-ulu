<?php
include '../koneksi.php';

$id = $_POST['id_kontak'];
$nama = $_POST['nama_rt'];
$telp = $_POST['telp_rt'];

$update_query = "UPDATE kontak_rt SET nama_rt='$nama', telp_rt='$telp' WHERE id_kontak='$id'";
mysqli_query($koneksi, $update_query);

header("location:kontak_rt.php?status=updated");
?>
