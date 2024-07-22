<?php 
include '../koneksi.php';

$rw = $_POST['rw']; // Ambil RW dari form
$rt = $_POST['rt']; // Ambil RT dari form
$id_pendidikan = $_POST['id_pendidikan'];
$jumlah_warga = $_POST['jumlah_warga'];
$tdk_sekolah_lk = $_POST['tdk_sekolah_lk'];
$tdk_sekolah_pr = $_POST['tdk_sekolah_pr'];
$sd_lk = $_POST['sd_lk'];
$sd_pr = $_POST['sd_pr'];
$smp_lk = $_POST['smp_lk'];
$smp_pr = $_POST['smp_pr'];
$sma_lk = $_POST['sma_lk'];
$sma_pr = $_POST['sma_pr'];
$smk_lk = $_POST['smk_lk'];
$smk_pr = $_POST['smk_pr'];
$perguruan_tinggi_lk = $_POST['perguruan_tinggi_lk'];
$perguruan_tinggi_pr = $_POST['perguruan_tinggi_pr'];

$total_pendidikan = $tdk_sekolah_lk + $tdk_sekolah_pr + $sd_lk + $sd_pr + $smp_lk + $smp_pr + $sma_lk + $sma_pr + $smk_lk + $smk_pr + $perguruan_tinggi_lk + $perguruan_tinggi_pr;

if ($total_pendidikan > $jumlah_warga) {
    header("Location: pendidikan_tambah.php?status=error");
    exit();
}

// Query untuk mengupdate data rumah
$update_query = "UPDATE pendidikan SET jumlah_warga='$jumlah_warga', tdk_sekolah_lk='$tdk_sekolah_lk', tdk_sekolah_pr='$tdk_sekolah_pr', sd_lk='$sd_lk', sd_pr='$sd_pr', smp_lk='$smp_lk', smp_pr='$smp_pr', sma_lk='$sma_lk', sma_pr='$sma_pr', smk_lk='$smk_lk', smk_pr='$smk_pr', perguruan_tinggi_lk='$perguruan_tinggi_lk', perguruan_tinggi_pr='$perguruan_tinggi_pr' WHERE id_pendidikan='$id_pendidikan'";
$result = mysqli_query($koneksi, $update_query);

if ($result) {
    header("Location: pendidikan_edit.php?rw=$rw&rt=$rt&status=updated");
} else {
    header("Location: pendidikan_edit.php?rw=$rw&rt=$rt&status=error");
}

// Tutup koneksi
mysqli_close($koneksi);
?>
