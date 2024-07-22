<?php
include 'koneksi.php';

// Mengambil data dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$tempat_lahir = $_POST['tempat_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$gender = $_POST['gender'];
$alamat = $_POST['alamat'];
$rw = $_POST['rw'];
$rt = $_POST['rt'];
$agama = $_POST['agama'];
$telp = $_POST['telp'];
$email = $_POST['email'];
$password = $_POST['password'];

// Validasi input
$errors = [];

// Validasi NIK (cek apakah sudah ada)
$cek_nik = mysqli_query($koneksi, "SELECT * FROM auth WHERE nik='$nik'");
if(mysqli_num_rows($cek_nik) > 0){
  $errors['nik'] = "NIK sudah terdaftar.";
}

// Validasi telepon (minimal 10 digit angka)
if (!preg_match("/^\d{10,}$/", $telp)) {
  $errors['telp'] = "Telepon harus terdiri dari minimal 10 digit angka.";
}

// Validasi password (minimal 8 karakter, terdiri dari angka, huruf besar, dan huruf kecil)
if (!preg_match("/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z]).{8,}$/", $password)) {
  $errors['password'] = "Password minimal 8 karakter dengan kombinasi angka, huruf besar, dan huruf kecil.";
}

// Memeriksa apakah ada error validasi
if (!empty($errors)) {
  // Redirect ke halaman daftar.php dengan pesan error
  header("location:daftar.php?" . http_build_query($errors));
  exit();
}

// Insert data ke database jika tidak ada error
$insert = mysqli_query($koneksi, "INSERT INTO auth (nik, nama, tempat_lahir, tgl_lahir, gender, alamat, rw, rt, agama, telp, email, password, role) 
                                  VALUES ('$nik', '$nama', '$tempat_lahir', '$tgl_lahir', '$gender', '$alamat', '$rw', '$rt', '$agama', '$telp', '$email', md5('$password'), 'Warga')");
if ($insert) {
  header("location:masuk.php");
} else {
  header("location:daftar.php?message=Registrasi%Gagal!");
}
?>
