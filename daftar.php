<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register - Kelurahan Satu Ulu Kota Palembang</title>
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

  <style>
    .error-message {
      color: red;
      font-size: 0.875rem;
      margin-top: 0.25rem;
    }
  </style>

  <script>
    function validateForm() {
      const nik = document.forms["registerForm"]["nik"].value.trim();
      const telp = document.forms["registerForm"]["telp"].value.trim();
      const password = document.forms["registerForm"]["password"].value.trim();
      const rw = document.forms["registerForm"]["rw"].value.trim();
      const rt = document.forms["registerForm"]["rt"].value.trim();

      const nikInput = document.querySelector('input[name="nik"]');
      const telpInput = document.querySelector('input[name="telp"]');
      const passwordInput = document.querySelector('input[name="password"]');
      const rwInput = document.querySelector('input[name="rw"]');
      const rtInput = document.querySelector('input[name="rt"]');

      const errorMessageNik = document.querySelector('.error-message-nik');
      const errorMessageTelp = document.querySelector('.error-message-telp');
      const errorMessagePassword = document.querySelector('.error-message-password');
      const errorMessageRw = document.querySelector('.error-message-rw');
      const errorMessageRt = document.querySelector('.error-message-rt');

      let valid = true;

      // Validasi NIK
      if (nik === '') {
        errorMessageNik.textContent = "Masukkan NIK Anda.";
        nikInput.classList.add('is-invalid');
        valid = false;
      } else if (nik.length !== 16 || !/^\d{16}$/.test(nik)) {
        errorMessageNik.textContent = "NIK harus berupa 16 digit angka.";
        nikInput.classList.add('is-invalid');
        valid = false;
      } else {
        errorMessageNik.textContent = "";
        nikInput.classList.remove('is-invalid');
      }

      // Validasi Nomor Telepon
      if (telp === '') {
        errorMessageTelp.textContent = "Harap isi nomor telepon Anda.";
        telpInput.classList.add('is-invalid');
        valid = false;
      } else if (telp.length < 10 || !/^\d{10,}$/.test(telp)) {
        errorMessageTelp.textContent = "Harap isi minimal 10 digit angka.";
        telpInput.classList.add('is-invalid');
        valid = false;
      } else {
        errorMessageTelp.textContent = "";
        telpInput.classList.remove('is-invalid');
      }

      // Validasi Password
      if (password === '') {
        errorMessagePassword.textContent = "Masukkan password Anda.";
        passwordInput.classList.add('is-invalid');
        valid = false;
      } else if (!/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/.test(password)) {
        errorMessagePassword.textContent = "Password harus terdiri dari 8 karakter dengan kombinasi huruf besar, huruf kecil, dan angka.";
        passwordInput.classList.add('is-invalid');
        valid = false;
      } else {
        errorMessagePassword.textContent = "";
        passwordInput.classList.remove('is-invalid');
      }

      // Validasi RW
      if (rw === '') {
        errorMessageRw.textContent = "Masukkan RW Anda.";
        rwInput.classList.add('is-invalid');
        valid = false;
      } else if (!/^\d+$/.test(rw)) {
        errorMessageRw.textContent = "RW harus berupa angka.";
        rwInput.classList.add('is-invalid');
        valid = false;
      } else {
        errorMessageRw.textContent = "";
        rwInput.classList.remove('is-invalid');
      }

      // Validasi RT
      if (rt === '') {
        errorMessageRt.textContent = "Masukkan RT Anda.";
        rtInput.classList.add('is-invalid');
        valid = false;
      } else if (!/^\d+$/.test(rt)) {
        errorMessageRt.textContent = "RT harus berupa angka.";
        rtInput.classList.add('is-invalid');
        valid = false;
      } else {
        errorMessageRt.textContent = "";
        rtInput.classList.remove('is-invalid');
      }

      return valid;
    }
  </script>
</head>
<body>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Registrasi Akun Warga</h5>
                    <p class="text-center small">Kelurahan Satu Ulu Kota Palembang</p>
                  </div>
                  <form name="registerForm" action="daftar_act.php" method="post" class="row g-3 needs-validation" onsubmit="return validateForm()">
                  <?php if (isset($_GET['message'])) : ?>
                      <div class="alert alert-danger text-center" role="alert">Registrasi Gagal!</div>
                      <?php endif ?>
                    <div class="col-md-6">
                      <label for="yourNik" class="form-label">Nomor Induk Kependudukan</label>
                      <div class="input-group has-validation">
                        <input type="number" name="nik" class="form-control" placeholder="Tulis NIK sesuai KTP" required pattern="\d{16}" maxlength="16">
                        <div class="invalid-feedback error-message-nik"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="yourNama" class="form-label">Nama Lengkap</label>
                      <div class="input-group has-validation">
                        <input type="text" name="nama" class="form-control" placeholder="Tulis Nama sesuai KTP" required>
                        <div class="invalid-feedback">Masukkan Nama Anda.</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="kelahiran" class="form-label">Tempat Lahir</label>
                      <div class="input-group has-validation">
                        <input type="text" name="tempat_lahir" class="form-control" placeholder="Tulis Tempat Kelahiran Anda" required>
                        <div class="invalid-feedback error-message-nik"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                      <div class="input-group has-validation">
                        <input type="date" name="tgl_lahir" class="form-control" placeholder="" required>
                        <div class="invalid-feedback">Masukkan Nama Anda.</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="yourGender" class="form-label">Jenis Kelamin</label>
                      <select name="gender" class="form-select" required>
                        <option value="Laki-laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <div class="invalid-feedback">Harap input jenis kelamin Anda.</div>
                    </div>
                    <div class="col-md-6">
                      <label for="yourAlamat" class="form-label">Alamat</label>
                      <div class="input-group has-validation">
                        <input type="text" name="alamat" class="form-control" placeholder="Tulis Alamat sesuai KTP" required>
                        <div class="invalid-feedback">Masukkan Alamat Anda.</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="yourAlamat" class="form-label">RW</label>
                      <div class="input-group has-validation">
                        <input type="number" name="rw" class="form-control" placeholder="Tulis Alamat RW sesuai KTP" required>
                        <div class="invalid-feedback error-message-rw">Masukkan Alamat RW Anda.</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="yourAlamat" class="form-label">RT</label>
                      <div class="input-group has-validation">
                        <input type="number" name="rt" class="form-control" placeholder="Tulis Alamat RT sesuai KTP" required>
                        <div class="invalid-feedback error-message-rt">Masukkan Alamat RT Anda.</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="agama" class="form-label">Agama</label>
                      <select name="agama" class="form-select" required>
                        <option value="Islam">Islam</option>
                        <option value="Kristen Katolik">Kristen Katolik</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Khonghucu">Khonghucu</option>
                      </select>
                      <div class="invalid-feedback">Harap input Agama Anda.</div>
                    </div>
                    <div class="col-md-6">
                      <label for="yourTelp" class="form-label">No Telp</label>
                      <div class="input-group has-validation">
                        <input type="number" name="telp" class="form-control" placeholder="Tulis Nomor Telepon Aktif" required>
                        <div class="invalid-feedback error-message-telp"></div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="yourEmail" class="form-label">Alamat Email</label>
                      <div class="input-group has-validation">
                        <input type="email" name="email" class="form-control" placeholder="Tulis Email Anda" required>
                        <div class="invalid-feedback">Masukkan Email Anda.</div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" placeholder="" required>
                      <div class="invalid-feedback error-message-password"></div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Register</button>
                    </div>
                    <div class="col-12">
                      <p class="text-center">
                        Sudah punya akun? <a href="masuk.php">Kembali</a>
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

  <script>
    document.getElementById("tahun").innerHTML = new Date().getFullYear();
  </script>

  <!-- Template Main JS File -->
  <script src="assets/auth/js/main.js"></script>

</body>
</html>
