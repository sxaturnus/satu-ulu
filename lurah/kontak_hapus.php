<?php 
  include '../koneksi.php';
  $id =$_GET['id'];

  mysqli_query($koneksi, "delete from kontak_rt where id_kontak='$id'");
  header("location:kontak_rt.php");
?>