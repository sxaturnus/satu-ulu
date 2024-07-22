<?php 
  include '../koneksi.php';

  $id  = $_POST['id'];
  $status = $_POST['status'];

  mysqli_query($koneksi, "update pengaduan set status_pengaduan='$status' where id_pengaduan='$id'");
  header("location:pengaduan.php");
?>