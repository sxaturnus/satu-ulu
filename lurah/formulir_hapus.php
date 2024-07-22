<?php
// Pastikan session atau koneksi sudah dimulai di file koneksi.php atau sesuai kebutuhan Anda
include '../koneksi.php';

// Pastikan parameter id_formulir tersedia dan merupakan bilangan bulat
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_formulir = $_GET['id'];

    // Query untuk menghapus formulir berdasarkan id_formulir
    $query = "DELETE FROM formulir WHERE id_formulir = $id_formulir";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        // Redirect kembali ke halaman formulir.php dengan notifikasi success
        header("Location: formulir.php?delete=success");
        exit();
    } else {
        // Redirect dengan pesan error jika gagal menghapus
        header("Location: formulir.php?error=Failed to delete formulir");
        exit();
    }
} else {
    // Redirect dengan pesan error jika parameter tidak sesuai atau tidak ada
    header("Location: formulir.php?error=Invalid id_formulir");
    exit();
}
?>
