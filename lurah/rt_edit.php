<?php include 'header.php'; ?>
<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <!-- Traffic sources -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">Edit Data RT</h4>
                        <div class="heading-elements">
                            <a href="rt.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php if (isset($_GET['status'])): ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                <?php echo $_GET['status']; ?>
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <form action="rt_update.php" method="post" id="form-edit-rt">
                                <?php
                                $id = $_GET['id'];
                                $data = mysqli_query($koneksi, "select * from auth where id_auth='$id'");
                                while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <table class="table">
                                        <tr>
                                            <th width="30%">NIK</th>
                                            <td>
                                                <input class="form-control" type="hidden" name="id_auth" value="<?php echo $d['id_auth']; ?>">
                                                <input class="form-control" type="text" name="nik" value="<?php echo $d['nik']; ?>">
                                                <span class="text-danger" id="nik_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>NAMA</th>
                                            <td>
                                                <input class="form-control" type="text" name="nama" value="<?php echo $d['nama']; ?>">
                                                <span class="text-danger" id="nama_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>TEMPAT LAHIR</th>
                                            <td>
                                                <input class="form-control" type="text" name="tempat_lahir" value="<?php echo $d['tempat_lahir']; ?>">
                                                <span class="text-danger" id="tempat_lahir_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>TANGGAL LAHIR</th>
                                            <td>
                                                <input class="form-control" type="date" name="tgl_lahir" value="<?php echo $d['tgl_lahir']; ?>">
                                                <span class="text-danger" id="tgl_lahir_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>JENIS KELAMIN</th>
                                            <td>
                                                <select name="gender" class="form-control">
                                                    <option <?php if ($d['gender'] == "Laki-laki") {echo "selected='selected'";} ?> value="Laki-laki">Laki-laki</option>
                                                    <option <?php if ($d['gender'] == "Perempuan") {echo "selected='selected'";} ?> value="Perempuan">Perempuan</option>
                                                </select>
                                                <span class="text-danger" id="gender_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ALAMAT</th>
                                            <td><input class="form-control" type="text" name="alamat" value="<?php echo $d['alamat']; ?>">
                                                <span class="text-danger" id="alamat_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>AGAMA</th>
                                            <td>
                                                <input class="form-control" type="text" name="agama" value="<?php echo $d['agama']; ?>">
                                                <span class="text-danger" id="agama_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>NO TELP</th>
                                            <td><input class="form-control" type="text" name="telp" value="<?php echo $d['telp']; ?>">
                                                <span class="text-danger" id="telp_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>EMAIL</th>
                                            <td><input class="form-control" type="email" name="email" value="<?php echo $d['email']; ?>">
                                                <span class="text-danger" id="email_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>PASSWORD</th>
                                            <td>
                                                <input class="form-control" type="password" name="password">
                                                <small>Kosongkan jika tidak ingin mengubah password</small>
                                                <span class="text-danger" id="password_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th></th>
                                            <td><input type="submit" value="SIMPAN" class="btn btn-sm btn-primary"></td>
                                        </tr>
                                    </table>
                                <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script>
        document.getElementById('form-edit-rt').onsubmit = function(e) {
            let isValid = true;
            const nikField = document.getElementsByName('nik')[0];
            const namaField = document.getElementsByName('nama')[0];
            const tempatLahirField = document.getElementsByName('tempat_lahir')[0];
            const tglLahirField = document.getElementsByName('tgl_lahir')[0];
            const telpField = document.getElementsByName('telp')[0];
            const emailField = document.getElementsByName('email')[0];
            const passwordField = document.getElementsByName('password')[0];

            // Clear previous errors
            document.getElementById('nik_error').innerText = '';
            document.getElementById('nama_error').innerText = '';
            document.getElementById('tempat_lahir_error').innerText = '';
            document.getElementById('tgl_lahir_error').innerText = '';
            document.getElementById('telp_error').innerText = '';
            document.getElementById('email_error').innerText = '';
            document.getElementById('password_error').innerText = '';

            // Validate NIK
            if (nikField.value.trim() !== '' && (nikField.value.length !== 16 || isNaN(nikField.value))) {
                document.getElementById('nik_error').innerText = 'NIK harus terdiri dari 16 digit angka.';
                isValid = false;
            }

            // Validate phone number
            if (telpField.value.trim() !== '' && (telpField.value.length < 10 || isNaN(telpField.value))) {
                document.getElementById('telp_error').innerText = 'No telp harus minimal 10 digit angka.';
                isValid = false;
            }

            // Prevent form submission if not valid
            if (!isValid) {
                e.preventDefault();
            }
        };
    </script>

</div>
