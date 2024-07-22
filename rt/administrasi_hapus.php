<?php
// Pastikan session atau koneksi sudah dimulai di file koneksi.php atau sesuai kebutuhan Anda
include '../koneksi.php';

// Pastikan parameter id_formulir tersedia dan merupakan bilangan bulat
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_administrasi = $_GET['id'];

    // Query untuk menghapus formulir berdasarkan id_formulir
    $query = "DELETE FROM administrasi WHERE id_administrasi = $id_administrasi";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Redirect kembali ke halaman formulir.php dengan notifikasi success
        header("Location: administrasi.php?delete=success");
        exit();
    } else {
        // Redirect dengan pesan error jika gagal menghapus
        header("Location: administrasi.php?error=Failed to delete formulir");
        exit();
    }
} else {
    // Redirect dengan pesan error jika parameter tidak sesuai atau tidak ada
    header("Location: administrasi.php?error=Invalid id_formulir");
    exit();
}
?>
