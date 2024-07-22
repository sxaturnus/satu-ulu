<?php 
  include '../koneksi.php';
  $id =$_GET['id'];

  mysqli_query($koneksi, "delete from pengumuman where pengumuman_id='$id'");
  header("location:pengumuman.php");
?>