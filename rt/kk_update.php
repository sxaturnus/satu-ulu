<?php 
include '../koneksi.php';

$rw = $_POST['rw']; // Ambil RW dari form
$rt = $_POST['rt']; // Ambil RT dari form
$id_kk = $_POST['id_kk'];
$jumlah_kk = $_POST['jumlah_kk'];
$kk_lk = $_POST['kk_lk'];
$kk_pr = $_POST['kk_pr'];
$kk_mampu = $_POST['kk_mampu'];
$kk_tdkMampu = $_POST['kk_tdkMampu'];
$kk_luar = $_POST['kk_luar'];

// Validasi jumlah kk_lk dan kk_pr tidak melebihi jumlah_kk
if ($kk_lk + $kk_pr > $jumlah_kk) {
  header("Location: kk_tambah.php?status=error");
  exit();
}

// Validasi masing-masing kk_mampu, kk_tdkMampu, dan kk_luar tidak melebihi jumlah_kk
if ($kk_mampu > $jumlah_kk || $kk_tdkMampu > $jumlah_kk || $kk_luar > $jumlah_kk) {
  header("Location: kk_tambah.php?status=error");
  exit();
}

// Query untuk mengupdate data rumah
$update_query = "UPDATE kk SET jumlah_kk='$jumlah_kk', kk_lk='$kk_lk', kk_pr='$kk_pr', kk_mampu='$kk_mampu', kk_tdkMampu='$kk_tdkMampu', kk_luar='$kk_luar' WHERE id_kk='$id_kk'";
$result = mysqli_query($koneksi, $update_query);

if ($result) {
    header("Location: kk_edit.php?rw=$rw&rt=$rt&status=updated");
} else {
    header("Location: kk_edit.php?rw=$rw&rt=$rt&status=error");
}

// Tutup koneksi
mysqli_close($koneksi);
?>
