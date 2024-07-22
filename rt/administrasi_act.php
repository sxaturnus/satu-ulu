<?php
include '../koneksi.php';

// Mendapatkan data dari formulir
$tanggapan = mysqli_real_escape_string($koneksi, $_POST['tanggapan']);
$id_administrasi = $_POST['id_administrasi']; // Ambil id_administrasi dari form

// Mendapatkan data file
$file = $_FILES['file_reply'];
$file_name = $file['name'];
$file_tmp = $file['tmp_name'];
$file_size = $file['size'];
$file_error = $file['error'];

// Ekstensi file yang diizinkan
$allowed_extensions = array('pdf', 'png', 'jpg', 'jpeg');
$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

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

// Query untuk memeriksa apakah sudah ada data dengan id_administrasi yang sama
$query_check = "SELECT * FROM administrasi WHERE id_administrasi = '$id_administrasi'";
$result_check = mysqli_query($koneksi, $query_check);

if (mysqli_num_rows($result_check) > 0) {
    // Jika sudah ada, lakukan UPDATE
    // Tanggapan sudah ada, update saja file_reply jika ada file yang diupload
    if (!empty($file_name)) {
        if (in_array($file_ext, $allowed_extensions)) {
            if ($file_error === UPLOAD_ERR_OK) {
                if ($file_size <= 5000000) { // Maksimal 5MB
                    // Nama unik untuk file
                    $file_new_name = uniqid('', true) . '.' . $file_ext;
                    $file_destination = __DIR__ . '/../assets/uploads/administrasi_warga/' . $file_new_name;

                    // Debugging tambahan
                    if (!is_dir(__DIR__ . '/../assets/uploads/administrasi_warga')) {
                        header("Location: administrasi_edit.php?id=$id_administrasi&error=Direktori uploads tidak ada.");
                        exit();
                    }
                    if (!is_writable(__DIR__ . '/../assets/uploads/administrasi_warga')) {
                        header("Location: administrasi_edit.php?id=$id_administrasi&error=Direktori uploads tidak dapat ditulis.");
                        exit();
                    }

                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        // Update data dengan file baru
                        $update_query = "UPDATE administrasi SET tanggapan = '$tanggapan', file_reply = '$file_new_name' WHERE id_administrasi = '$id_administrasi'";
                        if (mysqli_query($koneksi, $update_query)) {
                            header("Location: administrasi.php?upload=success");
                            exit();
                        } else {
                            header("Location: administrasi_edit.php?id=$id_administrasi&error=Gagal mengupdate data ke database.");
                            exit();
                        }
                    } else {
                        header("Location: administrasi_edit.php?id=$id_administrasi&error=Terjadi kesalahan saat mengunggah file ke direktori tujuan.");
                        exit();
                    }
                } else {
                    header("Location: administrasi_edit.php?id=$id_administrasi&error=Ukuran file terlalu besar. Maksimal 5MB.");
                    exit();
                }
            } else {
                $error_message = getFileUploadError($file_error);
                header("Location: administrasi_edit.php?id=$id_administrasi&error=$error_message");
                exit();
            }
        } else {
            header("Location: administrasi_edit.php?id=$id_administrasi&error=Ekstensi file tidak diizinkan. Hanya file PDF, PNG, JPG, dan JPEG yang diizinkan.");
            exit();
        }
    } else {
        // Hanya update tanggapan jika tidak ada file yang diupload
        $update_query = "UPDATE administrasi SET tanggapan = '$tanggapan' WHERE id_administrasi = '$id_administrasi'";
        if (mysqli_query($koneksi, $update_query)) {
            header("Location: administrasi.php?upload=success");
            exit();
        } else {
            header("Location: administrasi_edit.php?id=$id_administrasi&error=Gagal mengupdate data ke database.");
            exit();
        }
    }
} else {
    // Jika belum ada, lakukan INSERT
    if (in_array($file_ext, $allowed_extensions)) {
        if ($file_error === UPLOAD_ERR_OK) {
            if ($file_size <= 5000000) { // Maksimal 5MB
                // Nama unik untuk file
                $file_new_name = uniqid('', true) . '.' . $file_ext;
                $file_destination = __DIR__ . '/../assets/uploads/administrasi_warga/' . $file_new_name;

                // Debugging tambahan
                if (!is_dir(__DIR__ . '/../assets/uploads/administrasi_warga')) {
                    header("Location: administrasi_edit.php?id=$id_administrasi&error=Direktori uploads tidak ada.");
                    exit();
                }
                if (!is_writable(__DIR__ . '/../assets/uploads/administrasi_warga')) {
                    header("Location: administrasi_edit.php?id=$id_administrasi&error=Direktori uploads tidak dapat ditulis.");
                    exit();
                }

                if (move_uploaded_file($file_tmp, $file_destination)) {
                    // Insert data baru
                    $insert_query = "INSERT INTO administrasi (id_administrasi, tanggapan, file_reply) VALUES ('$id_administrasi', '$tanggapan', '$file_new_name')";
                    if (mysqli_query($koneksi, $insert_query)) {
                        header("Location: administrasi.php?upload=success");
                        exit();
                    } else {
                        header("Location: administrasi_edit.php?id=$id_administrasi&error=Gagal menyimpan data ke database.");
                        exit();
                    }
                } else {
                    header("Location: administrasi_edit.php?id=$id_administrasi&error=Terjadi kesalahan saat mengunggah file ke direktori tujuan.");
                    exit();
                }
            } else {
                header("Location: administrasi_edit.php?id=$id_administrasi&error=Ukuran file terlalu besar. Maksimal 5MB.");
                exit();
            }
        } else {
            $error_message = getFileUploadError($file_error);
            header("Location: administrasi_edit.php?id=$id_administrasi&error=$error_message");
            exit();
        }
    } else {
        header("Location: administrasi_edit.php?id=$id_administrasi&error=Ekstensi file tidak diizinkan. Hanya file PDF, PNG, JPG, dan JPEG yang diizinkan.");
        exit();
    }
}
?>
