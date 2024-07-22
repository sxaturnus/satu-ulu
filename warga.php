<?php
  include 'koneksi.php';

  // Query untuk mengambil data bansos dari database
  $query = "SELECT * FROM warga ORDER BY rw ASC, rt ASC";
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

  <title>Statistik Warga - Kelurahan 1 Ulu</title>
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
            <li>Statistik Warga</li>
          </ol>
        </div>
      </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section class="inner-page">
      <div class="container">
        <h3 style="text-align: center;"><strong>Statistik Warga</strong></h3>
        <h4 style="text-align: center;">Kelurahan Satu Ulu Kota Palembang</h4>
        <h4 style="text-align: center;">Provinsi Sumatera Selatan</h4>
        <br/>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped table-datatable text-center">
            <thead>
              <tr>
                <th width="1%">No</th>
                <th style="text-align: center;">RW</th>
                <th style="text-align: center;">RT</th>
                <th colspan="2" style="text-align: center;">Jumlah Warga</th>
                <th colspan="2" style="text-align: center;">Laki-laki</th>
                <th colspan="2" style="text-align: center;">Perempuan</th>
                <th colspan="2" style="text-align: center;">Warga Tetap</th>
                <th colspan="2" style="text-align: center;">Warga Tidak Tetap</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                $data = mysqli_query($koneksi, "SELECT * FROM warga ORDER BY rw ASC, rt ASC");
                $no = 1;

                if (mysqli_num_rows($data) > 0) {
                  while ($d = mysqli_fetch_array($data)) {
                    $rw = $d['rw'];
                    $rt = $d['rt'];
                    $jumlah_warga = $d['jumlah_warga'];
                    $pria = $d['pria'];
                    $wanita = $d['wanita'];
                    $warga_tetap = $d['warga_tetap'];
                    $warga_tdkTetap = $d['warga_tdkTetap'];

                    // Calculate percentages
                    $persentase_pria = ($pria / $jumlah_warga) * 100;
                    $persentase_wanita = ($wanita / $jumlah_warga) * 100;
                    $persentase_tetap = ($warga_tetap / $jumlah_warga) * 100;
                    $persentase_tdkTetap = ($warga_tdkTetap / $jumlah_warga) * 100;
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $rw; ?></td>
                <td><?php echo $rt; ?></td>
                <td><?php echo $jumlah_warga; ?></td>
                <td><?php echo number_format($persentase_pria + $persentase_wanita, 2) . "%"; ?></td>
                <td><?php echo $pria; ?></td>
                <td><?php echo number_format($persentase_pria, 2) . "%"; ?></td>
                <td><?php echo $wanita; ?></td>
                <td><?php echo number_format($persentase_wanita, 2) . "%"; ?></td>
                <td><?php echo $warga_tetap; ?></td>
                <td><?php echo number_format($persentase_tetap, 2) . "%"; ?></td>
                <td><?php echo $warga_tdkTetap; ?></td>
                <td><?php echo number_format($persentase_tdkTetap, 2) . "%"; ?></td>
              </tr>
              <?php
                }
              } else {
              ?>
              <tr>
                <td colspan="12">Tidak ada data terbaru</td>
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