<?php
// Pastikan id administrasi yang diinginkan dikirimkan melalui parameter GET
if (isset($_GET['id_administrasi'])) {
    // Include koneksi ke database
    include '../koneksi.php'; // Sesuaikan path koneksi.php sesuai dengan struktur folder

    // Ambil id administrasi dari parameter GET
    $id = $_GET['id_administrasi'];

    // Query untuk mengambil informasi file_reply dari database berdasarkan id_administrasi
    $query = "SELECT file_reply FROM administrasi WHERE id_administrasi = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $file_reply = $row['file_reply'];

        // Path lengkap menuju file yang akan diunggah
        $full_file_path = '../assets/uploads/administrasi_warga/' . $file_reply;

        // Tentukan tipe konten berdasarkan ekstensi file
        $file_extension = strtolower(pathinfo($full_file_path, PATHINFO_EXTENSION));
        switch ($file_extension) {
            case 'pdf':
                header('Content-Type: application/pdf');
                break;
            case 'jpg':
            case 'jpeg':
                header('Content-Type: image/jpeg');
                break;
            case 'png':
                header('Content-Type: image/png');
                break;
            default:
                // Jika ekstensi file tidak didukung, keluar dengan pesan
                echo "File yang diminta bukan file PDF, JPG, JPEG, atau PNG.";
                exit;
        }

        // Set header lainnya
        header('Content-Disposition: inline; filename="' . basename($full_file_path) . '"');
        header('Content-Length: ' . filesize($full_file_path));

        // Bersihkan buffer output sebelum mentransfer file
        ob_clean();
        flush();

        // Transfer file ke browser
        readfile($full_file_path);
        exit;
    } else {
        // Jika id tidak valid atau tidak ada data yang sesuai
        echo "Data tidak ditemukan.";
    }
} else {
    // Jika id tidak diberikan
    echo "ID Administrasi tidak diberikan.";
}
?>
