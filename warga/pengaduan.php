<?php
    include '../koneksi.php';
    $nik = $_POST['nik'];
    $isi_pengaduan = $_POST['isi_pengaduan'];

    $cek = mysqli_query($koneksi, "select * from auth where nik='$nik'");
    if (mysqli_num_rows($cek) > 0) {
        $cd = mysqli_fetch_array($cek);
        $nik = $cd['nik'];

        date_default_timezone_set("Asia/Bangkok");
        $waktu = date('Y-m-d H:i:s');

        $result = mysqli_query($koneksi, "insert into pengaduan values(NULL,'$nik','$isi_pengaduan','$waktu','0')");

        if ($result) {
            echo "<script>window.location.href='index.php?pesan=sukses';</script>";
        } else {
            echo "<script>window.location.href='index.php?pesan=failed';</script>";
        }
    } else {
        echo "<script>window.location.href='index.php?pesan=failed';</script>";
    }
?>
