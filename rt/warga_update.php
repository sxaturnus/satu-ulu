<?php 
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_auth']) && isset($_POST['pass']) && !empty($_POST['pass'])) {
        $id_auth = $_POST['id_auth'];
        $pass = $_POST['pass'];

        // Validasi password di sisi server
        if (strlen($pass) < 8) {
            echo "Password harus minimal 8 karakter.";
            exit;
        }
        if (!preg_match('/[A-Z]/', $pass)) {
            echo "Password harus mengandung huruf besar.";
            exit;
        }
        if (!preg_match('/[a-z]/', $pass)) {
            echo "Password harus mengandung huruf kecil.";
            exit;
        }
        if (!preg_match('/[0-9]/', $pass)) {
            echo "Password harus mengandung angka.";
            exit;
        }

        // Gunakan password_hash untuk keamanan yang lebih baik
        $hashed_pass = password_hash($pass, PASSWORD_BCRYPT);

        $stmt = $koneksi->prepare("UPDATE auth SET password=? WHERE id_auth=?");
        $stmt->bind_param('si', $hashed_pass, $id_auth);

        if ($stmt->execute()) {
            header("Location: warga.php"); // Pastikan path ini sesuai
            exit;
        } else {
            // Tangani kesalahan jika terjadi
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Password tidak boleh kosong.";
    }
} else {
    echo "Metode tidak valid.";
}

$koneksi->close();
?>
