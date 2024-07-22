<?php 
  include '../koneksi.php';

  $id = $_POST['id_bansos'];
  $nama = $_POST['nama_penerima'];
  $alamat = $_POST['alamat_penerima'];
  $jenis_bantuan = $_POST['jenis_bantuan'];
  $pekerjaan = $_POST['pekerjaan_penerima'];
  $status = $_POST['status_penerima'];

  $update_query = "UPDATE bansos SET nama_penerima='$nama', alamat_penerima='$alamat', jenis_bantuan='$jenis_bantuan', pekerjaan_penerima='$pekerjaan', status_penerima='$status' WHERE id_bansos='$id'";
  mysqli_query($koneksi, $update_query);
  header("location:bansos.php?id=$id&status=updated");
?>
