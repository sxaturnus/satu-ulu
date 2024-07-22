<?php 
include '../koneksi.php';

$rw = $_POST['rw']; // Ambil RW dari form
$rt = $_POST['rt']; // Ambil RT dari form
$id_agama = $_POST['id_agama'];
$jumlah_warga = $_POST['jumlah_warga'];
$islam = $_POST['islam'];
$katolik = $_POST['katolik'];
$protestan = $_POST['protestan'];
$hindu = $_POST['hindu'];
$budha = $_POST['budha'];
$khonghucu = $_POST['khonghucu'];

// Hitung total jumlah pemeluk agama
$total_agama = $islam + $katolik + $protestan + $hindu + $budha + $khonghucu;

// Validasi jumlah pemeluk agama tidak boleh melebihi jumlah warga
if ($total_agama > $jumlah_warga) {
    header("Location: agama_tambah.php?status=error");
    exit();
}

// Query untuk mengupdate data rumah
$update_query = "UPDATE agama SET jumlah_warga='$jumlah_warga', islam='$islam', katolik='$katolik', protestan='$protestan', hindu='$hindu', budha='$budha', khonghucu='$khonghucu' WHERE id_agama='$id_agama'";
$result = mysqli_query($koneksi, $update_query);

if ($result) {
    header("Location: agama_edit.php?rw=$rw&rt=$rt&status=updated");
} else {
    header("Location: agama_edit.php?rw=$rw&rt=$rt&status=error");
}

// Tutup koneksi
mysqli_close($koneksi);
?>
