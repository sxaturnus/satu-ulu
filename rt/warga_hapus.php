<?php 

include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($koneksi,"delete from auth where id_auth='$id'");

mysqli_query($koneksi,"delete from pengaduan where id_auth='$id'");

header("location:warga.php");
?>