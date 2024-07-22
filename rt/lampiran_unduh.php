<?php
// Pastikan id administrasi yang diinginkan dikirimkan melalui parameter GET
if (isset($_GET['id_administrasi'])) {
    // Include koneksi ke database
    include '../koneksi.php'; // Sesuaikan path koneksi.php sesuai dengan struktur folder

    // Ambil id administrasi dari parameter GET
    $id = $_GET['id_administrasi'];

    // Query untuk mengambil informasi file dan keterangan dari database berdasarkan id
    $query = "SELECT file_path, keterangan FROM administrasi WHERE id_administrasi = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $file_path = $row['file_path'];
        $keterangan = $row['keterangan'];

        // Cek apakah file path yang diambil ada
        $full_file_path = '../assets/uploads/administrasi_warga/' . $file_path;
        if (file_exists($full_file_path)) {
            // Mendapatkan ekstensi file
            $file_extension = strtolower(pathinfo($full_file_path, PATHINFO_EXTENSION));

            // Memastikan ekstensi file adalah yang diizinkan
            if (in_array($file_extension, ['pdf'])) {
                // Jika file PDF, buka di tab baru
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename="' . basename($full_file_path) . '"');
            } else {
                // Jika bukan file PDF, langsung unduh
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename="' . basename($full_file_path) . '"');
            }

            // Set ukuran file untuk header
            header('Content-Length: ' . filesize($full_file_path));

            // Bersihkan output buffer sebelum mentransfer file
            ob_clean();
            flush();

            // Transfer file ke browser
            readfile($full_file_path);
            exit;
        } else {
            // Jika file tidak ditemukan di server
            error_log("File tidak ditemukan: " . $full_file_path);
            echo "File tidak ditemukan di server. Silakan hubungi administrator.";
        }
    } else {
        // Jika id tidak valid atau tidak ada data yang sesuai
        echo "Data tidak ditemukan.";
    }
} else {
    // Jika id tidak diberikan
    echo "ID Administrasi tidak diberikan.";
}
?>
