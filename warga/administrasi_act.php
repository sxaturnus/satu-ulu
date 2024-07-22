<?php
session_start(); // Pastikan session sudah dimulai
include '../koneksi.php';

// Mendapatkan data dari formulir
$keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);

// Pastikan Anda mendapatkan NIK, RT, dan RW dari sesi
if (!isset($_SESSION['nik'], $_SESSION['rt'], $_SESSION['rw'])) {
    header("Location: administrasi.php?error=Session expired. Please login again.");
    exit();
}

$nik = $_SESSION['nik'];
$rt = $_SESSION['rt'];
$rw = $_SESSION['rw'];

// Mendapatkan data file
$file = $_FILES['file_path'];
$file_name = $file['name'];
$file_tmp = $file['tmp_name'];
$file_size = $file['size'];
$file_error = $file['error'];

$allowed_extensions = array('pdf', 'png', 'jpg', 'jpeg');
$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

function getFileUploadError($error_code) {
    $upload_errors = [
        UPLOAD_ERR_OK => "Tidak ada error, file berhasil diunggah.",
        UPLOAD_ERR_INI_SIZE => "File yang diunggah melebihi batas ukuran di php.ini.",
        UPLOAD_ERR_FORM_SIZE => "File yang diunggah melebihi batas MAX_FILE_SIZE.",
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
            $file_destination = __DIR__ . '/../assets/uploads/administrasi_warga/' . $file_new_name;

            if (!is_dir(__DIR__ . '/../assets/uploads/administrasi_warga')) {
                header("Location: administrasi.php?error=Direktori uploads tidak ada.");
                exit();
            }
            if (!is_writable(__DIR__ . '/../assets/uploads/administrasi_warga')) {
                header("Location: administrasi.php?error=Direktori uploads tidak dapat ditulis.");
                exit();
            }

            if (move_uploaded_file($file_tmp, $file_destination)) {
                // Menyimpan data ke database
                $query = "INSERT INTO administrasi (rw, rt, nik, keterangan, file_path) VALUES ('$rw', '$rt', '$nik', '$keterangan', '$file_new_name')";
                if (mysqli_query($koneksi, $query)) {
                    header("Location: administrasi.php?pesan=sukses");
                } else {
                    header("Location: administrasi.php?error=Gagal menyimpan data ke database. " . mysqli_error($koneksi));
                }
            } else {
                header("Location: administrasi.php?error=Terjadi kesalahan saat mengunggah file.");
            }
        } else {
            header("Location: administrasi.php?error=Ukuran file terlalu besar. Maksimal 5MB.");
        }
    } else {
        $error_message = getFileUploadError($file_error);
        header("Location: administrasi.php?error=$error_message");
    }
} else {
    header("Location: administrasi.php?error=Ekstensi file tidak diizinkan.");
}
?>
