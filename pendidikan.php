<?php
  include 'koneksi.php';

  // Query untuk mengambil data bansos dari database
  $query = "SELECT * FROM pendidikan ORDER BY rw ASC, rt ASC";
  $result = mysqli_query($koneksi, $query);

  if (!$result) {
      die("Query error: " . mysqli_error($koneksi));
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Statistik Pendidikan - Kelurahan 1 Ulu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo-fav.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    body {
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    main {
      flex: 1;
    }
    
    .map-container {
      position: relative;
      width: 100%;
      overflow: hidden;
      padding-top: 56.25%; /* 16:9 Aspect Ratio */
    }

    .map-container iframe {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border: 0;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo"><img src="assets/img/fav-satuulu.png" alt="" class="img-fluid"></a>
      <!-- <h1 class="logo"><a href="index.html">Kelurahan 1 Ulu</a></h1> -->
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Beranda</a></li>
          <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="visimisi.php">Visi Misi</a></li>
              <li><a href="struktur-organisasi.php">Struktur Organisasi</a></li>
              <li><a href="kontak-rt.php">Kontak RT</a></li>
              <li><a href="wilayah.php">Peta & wilayah</a></li>
              <li><a href="lambang.php">Lambang Daerah</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Layanan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="ktp.php">Kartu Tanda Penduduk</a></li>
              <li><a href="kk.php">Kartu Keluarga</a></li>
              <li><a href="kia.php">Kartu Identitas Anak</a></li>
              <li class="dropdown"><a href="#"><span>Akta</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="akta-lahir.php">Akta Kelahiran</a></li>
                  <li><a href="akta-kematian.php">Akta Kematian</a></li>
                  <li><a href="akta-kawin.php">Akta Perkawinan</a></li>
                  <li><a href="akta-cerai.php">Akta Perceraian</a></li>
                </ul>
              </li>
              <li><a href="perizinan.php">Perizinan</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#"><span>Kependudukan</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="rumah.php"><span>Statistik Rumah/Bangunan</span></a></li>
              <li><a href="statistik_kk.php"><span>Statistik Kepala Keluarga</span></a></li>
              <li><a href="warga.php"><span>Statistik Warga</span></a></li>
              <li><a href="usia.php"><span>Statistik Kelompok Usia</span></a></li>
              <li><a href="agama.php"><span>Statistik Agama</span></a></li>
              <li><a href="pendidikan.php"><span>Statistik Pendidikan</span></a></li>
            </ul>
          </li>
          <!-- <li><a class="nav-link scrollto" href="login.php">Login</a></li> -->
          <!-- login tanpa opsi status -->
          <li><a class="nav-link scrollto" href="masuk.php">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>
  <!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-end align-items-center">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Statistik Pendidikan</li>
          </ol>
        </div>
      </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section class="inner-page">
      <div class="container">
        <h3 style="text-align: center;"><strong>Statistik Pendidikan Warga</strong></h3>
        <h4 style="text-align: center;">Kelurahan Satu Ulu Kota Palembang</h4>
        <h4 style="text-align: center;">Provinsi Sumatera Selatan</h4>
        <br/>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped text-center">
            <thead>
              <tr>
                <th rowspan="2" style="text-align: center; vertical-align: middle;" width="1%">No</th>
                <th rowspan="2" style="text-align: center; vertical-align: middle;">RW</th>
                <th rowspan="2" style="text-align: center; vertical-align: middle;">RT</th>
                <th rowspan="2" colspan="2" style="text-align: center; vertical-align: middle;">Jumlah Warga</th>
                <th colspan="3" style="text-align: center;">Belum/Tidak Sekolah</th>
                <th colspan="3" style="text-align: center;">SD</th>
                <th colspan="3" style="text-align: center;">SMP</th>
                <th colspan="3" style="text-align: center;">SMA</th>
                <th colspan="3" style="text-align: center;">SMK</th>
                <th colspan="3" style="text-align: center;">Perguruan Tinggi</th>
              </tr>
              <tr>
                <th style="text-align: center;">L</th>
                <th style="text-align: center;">P</th>
                <th style="text-align: center;">%</th>
                <th style="text-align: center;">L</th>
                <th style="text-align: center;">P</th>
                <th style="text-align: center;">%</th>
                <th style="text-align: center;">L</th>
                <th style="text-align: center;">P</th>
                <th style="text-align: center;">%</th>
                <th style="text-align: center;">L</th>
                <th style="text-align: center;">P</th>
                <th style="text-align: center;">%</th>
                <th style="text-align: center;">L</th>
                <th style="text-align: center;">P</th>
                <th style="text-align: center;">%</th>
                <th style="text-align: center;">L</th>
                <th style="text-align: center;">P</th>
                <th style="text-align: center;">%</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                $data = mysqli_query($koneksi, "SELECT * FROM pendidikan ORDER BY rw ASC, rt ASC");
                $no = 1;

                if (mysqli_num_rows($data) > 0) {
                  while ($d = mysqli_fetch_array($data)) {
                    $rw = $d['rw'];
                    $rt = $d['rt'];
                    $jumlah_warga = $d['jumlah_warga'];
                    $tdk_sekolah_lk = $d['tdk_sekolah_lk']; // Data laki-laki
                    $tdk_sekolah_pr = $d['tdk_sekolah_pr']; // Data perempuan
                    $sd_lk = $d['sd_lk'];
                    $sd_pr = $d['sd_pr'];
                    $smp_lk = $d['smp_lk'];
                    $smp_pr = $d['smp_pr'];
                    $sma_lk = $d['sma_lk'];
                    $sma_pr = $d['sma_pr'];
                    $smk_lk = $d['smk_lk'];
                    $smk_pr = $d['smk_pr'];
                    $perguruan_tinggi_lk = $d['perguruan_tinggi_lk'];
                    $perguruan_tinggi_pr = $d['perguruan_tinggi_pr'];

                    // Calculate percentages
                    $persentase_tdk_sekolah = ($jumlah_warga > 0) ? (($tdk_sekolah_lk + $tdk_sekolah_pr) / $jumlah_warga) * 100 : 0;
                    $persentase_sd = ($jumlah_warga > 0) ? (($sd_lk + $sd_pr) / $jumlah_warga) * 100 : 0;
                    $persentase_smp = ($jumlah_warga > 0) ? (($smp_lk + $smp_pr) / $jumlah_warga) * 100 : 0;
                    $persentase_sma = ($jumlah_warga > 0) ? (($sma_lk + $sma_pr) / $jumlah_warga) * 100 : 0;
                    $persentase_smk = ($jumlah_warga > 0) ? (($smk_lk + $smk_pr) / $jumlah_warga) * 100 : 0;
                    $persentase_perguruan_tinggi = ($jumlah_warga > 0) ? (($perguruan_tinggi_lk + $perguruan_tinggi_pr) / $jumlah_warga) * 100 : 0;
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $rw; ?></td>
                <td><?php echo $rt; ?></td>
                <td><?php echo $jumlah_warga; ?></td>
                <td><?php echo number_format($persentase_tdk_sekolah + $persentase_sd + $persentase_smp + $persentase_sma + $persentase_smk, 2) . "%"; ?></td>
                <td><?php echo $tdk_sekolah_lk; ?></td>
                <td><?php echo $tdk_sekolah_pr; ?></td>
                <td><?php echo number_format($persentase_tdk_sekolah, 2) . "%"; ?></td>
                <td><?php echo $sd_lk; ?></td>
                <td><?php echo $sd_pr; ?></td>
                <td><?php echo number_format($persentase_sd, 2) . "%"; ?></td>
                <td><?php echo $smp_lk; ?></td>
                <td><?php echo $smp_pr; ?></td>
                <td><?php echo number_format($persentase_smp, 2) . "%"; ?></td>
                <td><?php echo $sma_lk; ?></td>
                <td><?php echo $sma_pr; ?></td>
                <td><?php echo number_format($persentase_sma, 2) . "%"; ?></td>
                <td><?php echo $smk_lk; ?></td>
                <td><?php echo $smk_pr; ?></td>
                <td><?php echo number_format($persentase_smk, 2) . "%"; ?></td>
                <td><?php echo $perguruan_tinggi_lk; ?></td>
                <td><?php echo $perguruan_tinggi_pr; ?></td>
                <td><?php echo number_format($persentase_perguruan_tinggi, 2) . "%"; ?></td>
              </tr>
              <?php
                }
              } else {
              ?>
              <tr>
                <td colspan="23">Tidak ada data terbaru</td>
              </tr>
              <?php
                }
                mysqli_close($koneksi);
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <!-- End Services Section -->

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
      <div class="container">
        <div class="copyright">
          &copy; Copyright <span id="tahun"></span>. Pemerintah Kelurahan 1 Ulu
        </div>
      </div>
    </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- year setup js -->
  <script>
    document.getElementById("tahun").innerHTML = new Date().getFullYear();
  </script>
  <!-- end year setup js -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>