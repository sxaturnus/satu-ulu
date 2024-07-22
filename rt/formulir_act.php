<?php
include '../koneksi.php';

// Mendapatkan data dari formulir
$keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

// Mendapatkan data file
$file = $_FILES['file'];
$file_name = $file['name'];
$file_tmp = $file['tmp_name'];
$file_size = $file['size'];
$file_error = $file['error'];

// Ekstensi file yang diizinkan
$allowed_extensions = array('pdf');
$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

// Fungsi untuk memberikan pesan error lebih jelas
function getFileUploadError($error_code) {
    $upload_errors = [
        UPLOAD_ERR_OK => "Tidak ada error, file berhasil diunggah.",
        UPLOAD_ERR_INI_SIZE => "File yang diunggah melebihi direktif upload_max_filesize di php.ini.",
        UPLOAD_ERR_FORM_SIZE => "File yang diunggah melebihi batas MAX_FILE_SIZE yang ditentukan dalam form HTML.",
        UPLOAD_ERR_PARTIAL => "File hanya terunggah sebagian.",
        UPLOAD_ERR_NO_FILE => "Tidak ada file yang diunggah.",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder.",
        UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk.",
        UPLOAD_ERR_EXTENSION => "File upload stopped by extension."
    ];
    return $upload_errors[$error_code] ?? "Unknown upload error.";
}

if (in_array($file_ext, $allowed_extensions)) {
    if ($file_error === UPLOAD_ERR_OK) {
        if ($file_size <= 5000000) { // Maksimal 5MB
            // Nama unik untuk file
            $file_new_name = uniqid('', true) . '.' . $file_ext;
            $file_destination = __DIR__ . '/../assets/uploads/' . $file_new_name;

            // Debugging tambahan
            if (!is_dir(__DIR__ . '/../assets/uploads')) {
                header("Location: formulir.php?error=Direktori uploads tidak ada.");
                exit();
            }
            if (!is_writable(__DIR__ . '/../assets/uploads')) {
                header("Location: formulir.php?error=Direktori uploads tidak dapat ditulis.");
                exit();
            }

            if (move_uploaded_file($file_tmp, $file_destination)) {
                // Menyimpan data ke database
                $query = "INSERT INTO formulir (keterangan, file_path) VALUES ('$keterangan', '$file_new_name')";
                if (mysqli_query($koneksi, $query)) {
                    header("Location: formulir.php?upload=success");
                } else {
                    header("Location: formulir.php?error=Gagal menyimpan data ke database.");
                }
            } else {
                header("Location: formulir.php?error=Terjadi kesalahan saat mengunggah file ke direktori tujuan.");
            }
        } else {
            header("Location: formulir.php?error=Ukuran file terlalu besar. Maksimal 5MB.");
        }
    } else {
        $error_message = getFileUploadError($file_error);
        header("Location: formulir.php?error=$error_message");
    }
} else {
    header("Location: formulir.php?error=Ekstensi file tidak diizinkan. Hanya file PDF yang diizinkan.");
}
?>
