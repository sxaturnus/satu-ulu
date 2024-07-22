<?php 

include '../koneksi.php';
$pass = md5($_POST['pass']);
$id = $_POST['id_auth']; // Ambil ID dari input hidden

mysqli_query($koneksi, "UPDATE auth SET password='$pass' WHERE id_auth='$id'");
header("location:index.php");
?>
