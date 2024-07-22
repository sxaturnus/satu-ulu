<?php 
include '../koneksi.php';

$id = $_POST['id_auth'];
$nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
$nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
$tempat_lahir = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
$tgl_lahir = mysqli_real_escape_string($koneksi, $_POST['tgl_lahir']);
$gender = mysqli_real_escape_string($koneksi, $_POST['gender']);
$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
$agama = mysqli_real_escape_string($koneksi, $_POST['agama']);
$telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
$email = mysqli_real_escape_string($koneksi, $_POST['email']);
$password = isset($_POST['password']) ? md5($_POST['password']) : '';

// Validate NIK uniqueness
$nik_check_query = "SELECT * FROM auth WHERE nik='$nik' AND id_auth != '$id'";
$result = mysqli_query($koneksi, $nik_check_query);

if (mysqli_num_rows($result) > 0) {
    header("location:rt_edit.php?id=$id&status=NIK yang ingin diubah sudah ada di database. Harap gunakan NIK lain.");
    exit();
}

if (!empty($password)) {
    $update_query = "UPDATE auth SET 
        nik='$nik', 
        nama='$nama', 
        tempat_lahir='$tempat_lahir', 
        tgl_lahir='$tgl_lahir', 
        gender='$gender', 
        alamat='$alamat', 
        agama='$agama', 
        telp='$telp', 
        email='$email', 
        password='$password' 
        WHERE id_auth='$id'";
} else {
    $update_query = "UPDATE auth SET 
        nik='$nik', 
        nama='$nama', 
        tempat_lahir='$tempat_lahir', 
        tgl_lahir='$tgl_lahir', 
        gender='$gender', 
        alamat='$alamat', 
        agama='$agama', 
        telp='$telp', 
        email='$email' 
        WHERE id_auth='$id'";
}

if (mysqli_query($koneksi, $update_query)) {
    header("location:rt.php?status=updated");
} else {
    $error = "Error updating record: " . mysqli_error($koneksi);
    header("location:rt_edit.php?id=$id&status=$error");
}
?>
