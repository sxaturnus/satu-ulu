<?php 

include '../koneksi.php';
$tanggal = date('Y-m-d');
$pengumuman = $_POST['isi_pengumuman'];

mysqli_query($koneksi, "insert into pengumuman values(NULL, '$tanggal', '$pengumuman')");
header("location:pengumuman.php?success=true");
exit();
?>
