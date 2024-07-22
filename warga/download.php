<?php
// Pastikan id formulir yang diinginkan dikirimkan melalui parameter GET
if (isset($_GET['id_formulir'])) {
    // Include koneksi ke database
    include '../koneksi.php'; // Sesuaikan path koneksi.php sesuai dengan struktur folder

    // Ambil id formulir dari parameter GET
    $id = $_GET['id_formulir'];

    // Query untuk mengambil informasi file dan keterangan dari database berdasarkan id
    $query = "SELECT file_path, keterangan FROM formulir WHERE id_formulir = $id";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $file_path = $row['file_path'];
        $keterangan = $row['keterangan'];

        // Cek apakah file path yang diambil adalah file PDF
        if (pathinfo($file_path, PATHINFO_EXTENSION) == 'pdf') {
            // Cek apakah file tersebut ada di folder uploads
            $full_file_path = '../assets/uploads/' . $file_path;
            if (file_exists($full_file_path)) {
                // Tampilkan file PDF di tab baru
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename="' . basename($full_file_path) . '"');
                header('Content-Length: ' . filesize($full_file_path));

                // Bersihkan buffer output sebelum mentransfer file
                ob_clean();
                flush();

                // Transfer file ke browser
                readfile($full_file_path);
                // Tampilkan tautan unduh di bawah pratinjau
                echo '<br><a href="download.php?id_formulir=' . $id . '" class="btn btn-primary">Unduh File</a>';
                exit;
            } else {
                // Jika file tidak ditemukan di server
                error_log("File tidak ditemukan: " . $full_file_path);
                echo "File tidak ditemukan di server. Silakan hubungi administrator.";
            }
        } else {
            // Jika bukan file PDF, redirect atau tampilkan pesan error
            echo "File yang diminta bukan file PDF.";
        }
    } else {
        // Jika id tidak valid atau tidak ada data yang sesuai
        echo "Formulir tidak ditemukan.";
    }
} else {
    // Jika id tidak diberikan
    echo "ID formulir tidak diberikan.";
}
?>
