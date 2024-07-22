<?php 
	include '../koneksi.php';

	$nama = $_POST['nama_penerima'];
	$alamat = $_POST['alamat_penerima'];
	$jenis_bantuan = $_POST['jenis_bantuan'];
	$pekerjaan = $_POST['pekerjaan_penerima'];
	$status = $_POST['status_penerima'];

	// Check if nama already exists
	$result = mysqli_query($koneksi, "SELECT * FROM bansos WHERE nama_penerima='$nama'");
	if (mysqli_num_rows($result) > 0) {
		header("location:bansos_tambah.php?status=nama_exists");
		exit();
	}

	mysqli_query($koneksi, "INSERT INTO bansos VALUES(NULL, '$nama', '$alamat', '$jenis_bantuan', '$pekerjaan', '$status')");
	header("location:bansos_tambah.php?status=success");
?>
