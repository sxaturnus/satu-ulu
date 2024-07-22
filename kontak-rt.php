<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kontak RT - Kelurahan 1 Ulu</title>
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

  <!-- Custom CSS -->
  <style>
    .team .member .pic img {
      width: 468px;
      height: 468px;
      object-fit: cover;
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
            <li>Kontak RT</li>
          </ol>
        </div>
      </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kelurahan Satu Ulu</h2>
          <p>Daftar Kontak Ketua RT</p>
        </div>

        <div class="row">
          <?php 
            include 'koneksi.php';

            // Query untuk mengambil data dari tabel kontak_rt
            $query = "SELECT * FROM kontak_rt";
            $result = mysqli_query($koneksi, $query);

            // Periksa apakah query berhasil dieksekusi
            if (mysqli_num_rows($result) > 0) {
                // Loop untuk menampilkan setiap baris data sebagai anggota tim
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="pic"><img src="assets/foto_kontak/<?php echo $row['foto']; ?>" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4><?php echo $row['nama_rt']; ?></h4>
                <span>Ketua RT <?php echo $row['jabatan_rt']; ?></span>
                <div class="social">
                <a href="https://api.whatsapp.com/send?phone=<?php echo $row['telp_rt']; ?>" target="_blank"><i class="bi bi-whatsapp"></i> Hubungi</a>
                </div>
              </div>
            </div>
          </div>
          <?php
              }
          } else {
              echo "Data kontak RT tidak ditemukan.";
          }
          ?>

        </div>

      </div>
    </section>
    <!-- ======= End Team Section ======= -->

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
