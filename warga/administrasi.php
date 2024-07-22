<?php 

  include '../koneksi.php'; 
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  // Mengambil data RT dari sesi
  $rt = $_SESSION['rt'];
  $rw = $_SESSION['rw'];
  $nik = $_SESSION['nik'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Administrasi Kependudukan - Kelurahan 1 Ulu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo-fav.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-between">
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html" class="logo"><img src="../assets/img/fav-satuulu.png" alt="" class="img-fluid"></a>
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
              <li><a href="formulir.php">Formulir</a></li>
              <li><a href="administrasi.php">Administrasi Kependudukan</a></li>
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
          <li><a class="nav-link scrollto" href="bansos.php">Bansos</a></li>
          <li><a class="nav-link scrollto" href="logout.php" onclick="return confirm('Apakah Anda yakin ingin keluar?');">Keluar</a></li>
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
            <li>Administrasi Kependudukan</li>
          </ol>
        </div>
      </div>
    </section>
    <!-- End Breadcrumbs -->

    <!-- ======= Administrasi Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <ul class="nav nav-tabs row d-flex nav-fill justify-content-center">
          <li class="nav-item col-3">
            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
              <i class="ri-draft-line"></i>
              <h4 class="d-none d-lg-block">Permohonan</h4>
            </a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
              <i class="ri-file-info-line"></i>
              <h4 class="d-none d-lg-block">Permintaan Informasi</h4>
            </a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div class="order-2 order-lg-1 mt-3 mt-lg-0">
                <div class="card">
                  <div class="card-body">
                    <h3>Permohonan Berkas</h3>
                    <?php
                      if (isset($_GET['error'])) {
                          echo "<div style='width: 100%' class='alert text-center alert-danger'>
                                  " . htmlspecialchars($_GET['error']) . "
                                </div>";
                      }
                      if (isset($_GET['pesan']) && $_GET['pesan'] == 'sukses') {
                          echo "<div style='width: 100%' class='alert text-center alert-success'>
                                  Terima Kasih! Permohonan Anda telah kami terima. Informasi selanjutnya bisa Anda cek pada menu 'Cek Laporan'.
                                </div>";
                      }
                    ?>
                    <br/>
                    <form action="administrasi_act.php" method="post" enctype="multipart/form-data">
                      
                      <label class="form-label">Ketik Keterangan Permohonan*</label>
                      <textarea class="form-control" style="resize: none; height: 150px;" name="keterangan" required></textarea>
                      <br/>
                      <label class="form-label">Upload Lampiran*<br/><small>Format file yang di izinkan hanya file PDF, JPG, JPEG, dan PNG saja.</small></label>
                      <input type="file" class="form-control" name="file_path" required>
                      <input type="hidden" name="nik" value="<?php echo htmlspecialchars($nik); ?>">
                      <input type="hidden" name="rt" value="<?php echo htmlspecialchars($rt); ?>">
                      <input type="hidden" name="rw" value="<?php echo htmlspecialchars($rw); ?>">
                      <br/>
                      <div class="d-grid gap-2 col-6 mx-auto">
                        <input type="submit" value="Kirim" class="btn" style="background-color: #FF4A17; color: white; border-color: #FF4A17;">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="tab-2">
            <div class="row">
                <div class="order-2 order-lg-1 mt-3 mt-lg-0">
                    <div class="card">
                      <div class="card-body">
                        <h3>Permintaan Informasi</h3>
                        <br/>
                        <?php 
                        if(isset($_POST['nik'])){
                          $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
                          ?>
                          <div class="table-responsive">
                          <table class="table table-bordered table-hover table-striped">
                            <thead>
                              <tr>
                                <th width="1%" rowspan="2">NO</th>
                                <th rowspan="2" class="text-center">KETERANGAN</th>
                                <th colspan="2" class="text-center">STATUS PERMOHONAN</th>
                              </tr>
                              <tr>
                                <th class="text-center">TANGGAPAN</th>
                                <th class="text-center">UPDATE LAMPIRAN</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no = 1;
                              $data = mysqli_query($koneksi, "select * from administrasi, auth where administrasi.nik=auth.nik and auth.nik='$nik' order by id_administrasi desc");
                              if(mysqli_num_rows($data) > 0){
                                while($d=mysqli_fetch_array($data)){
                                  ?>
                                  <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['keterangan'] ?></td>
                                    <td class="text-center">
                                      <?php if (!empty($d['tanggapan'])) : ?>
                                        <?php echo $d['tanggapan'] ?>
                                      <?php else : ?>
                                        <span class="text-muted">Tidak ada tanggapan</span>
                                      <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                      <?php if (!empty($d['file_reply'])) : ?>
                                        <a class="btn border-primary text-primary btn-flat btn-icon btn-xs" href="administrasi_update.php?id_administrasi=<?php echo $d['id_administrasi']; ?>" target="_blank"><span>Unduh Lampiran</span></a>
                                      <?php else : ?>
                                        <button type="button" class="btn border-primary text-primary btn-flat btn-icon btn-xs" data-toggle="modal" data-target="#noFileModal"><span>Unduh Lampiran</span></button>
                                      <?php endif; ?>
                                    </td>
                                  </tr>
                                  <?php
                                }
                              }else{
                                ?>
                                <tr>
                                  <td colspan="4" class="text-center">NIK WARGA TIDAK DITEMUKAN.</td>
                                </tr>
                                <?php
                              }
                              ?>
                            </tbody>
                          </table>
                          </div>
                          <br/>
                          <div class="text-center">
                            <a href="administrasi.php?tab=2">
                              <button type="submit" class="btn btn-block" style="background-color: #FF4A17; color: white; border-color: #FF4A17;">CEK LAGI</button>
                            </a>
                          </div>
                          <br/>
                          <?php }else{ ?>
                            <form action="administrasi.php?tab=2" method="post">
                              <p class="text-center">Silahkan isi NIK Anda. Kemudian klik tombol "CEK". Maka data permohonan akan tampil lengkap dengan statusnya.</p>
                              <br/>
                              <label class="form-label">NIK</label>
                              <input type="text" name="nik" class="form-control" placeholder="Ketik NIK Anda" required>
                              <br/>
                              <br/>
                              <div class="d-grid gap-2 col-6 mx-auto">
                                <input type="submit" value="Kirim" class="btn" style="background-color: #FF4A17; color: white; border-color: #FF4A17;">
                              </div>
                            </form>
                          <?php 
                        }
                      ?>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Administrasi Section -->

    <!-- Modal Notifikasi -->
    <div class="modal fade" id="noFileModal" tabindex="-1" role="dialog" aria-labelledby="noFileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noFileModalLabel">Notifikasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tidak ada lampiran yang tersedia untuk ditampilkan atau diunduh.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

  </main>
  <br/>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; <span id="tahun"></span> Pemerintah Kelurahan 1 Ulu
      </div>
    </div>
  </footer>
  <!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Script to handle tab persistence -->
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const urlParams = new URLSearchParams(window.location.search);
        const tab = urlParams.get('tab');
        if (tab) {
            const tabElement = document.querySelector(`a[href="#tab-${tab}"]`);
            if (tabElement) {
                tabElement.click();
            }
        }
    });

    function setTabParameter() {
        const form = event.target;
        const url = new URL(form.action);
        url.searchParams.set('tab', '2');
        form.action = url.toString();
    }
</script>

  <!-- year setup js -->
  <script>
    document.getElementById("tahun").innerHTML = new Date().getFullYear();
  </script>
  <!-- end year setup js -->

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>
</html>
