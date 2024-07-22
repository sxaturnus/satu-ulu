<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Login - Kelurahan Satu Ulu</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/Lambang-plg.png" rel="icon">
  <link href="assets/auth/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/auth/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/auth/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/auth/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/auth/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/auth/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/auth/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/auth/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/auth/css/style.css" rel="stylesheet">
</head>
<body>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Welcome Back!</h5>
                    <p class="text-center small">Kelurahan Satu Ulu Kota Palembang</p>
                  </div>
                  <form action="masuk_act.php" method="post" class="row g-3 needs-validation" novalidate>
                    <?php if (isset($_GET['message'])) : ?>
                      <div class="alert alert-danger text-center" role="alert">NIK atau Password Salah!</div>
                      <?php endif ?>
                    <div class="col-12">
                      <label for="" class="form-label">NIK</label>
                      <div class="input-group has-validation">
                        <input type="text" name="nik" class="form-control" id="nik" required>
                        <div class="invalid-feedback">Masukkan username Anda.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Masukkan password Anda.</div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="text-center">
                        Belum punya akun? <a href="daftar.php">Daftar Sekarang</a>
                      </p>
                    </div>
                  </form>
                </div>
              </div>
              <div class="credits">
                Copyright <span id="tahun"></span> Kelurahan 1 Ulu
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/auth/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/auth/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/auth/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/auth/vendor/echarts/echarts.min.js"></script>
  <script src="assets/auth/vendor/quill/quill.js"></script>
  <script src="assets/auth/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/auth/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/auth/vendor/php-email-form/validate.js"></script>

  <!-- set automatic year -->
  <script>
    document.getElementById("tahun").innerHTML = new Date().getFullYear();
  </script>

  <!-- Template Main JS File -->
  <script src="assets/auth/js/main.js"></script>

</body>
</html>