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
                        <h4 class="panel-title">Edit Data Kontak Ketua RT</h4>
                        <div class="heading-elements">
                            <a href="kontak_rt.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <?php if (isset($_GET['status']) && $_GET['status'] == 'email_exists'): ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                                Email yang ingin diubah sudah ada di database. Harap gunakan email lain.
                            </div>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <form action="kontak_update.php" method="post" id="form-edit-kontak" enctype="multipart/form-data">
                                <?php
                                $id = $_GET['id'];
                                $data = mysqli_query($koneksi,"select * from kontak_rt where id_kontak='$id'");
                                while($d=mysqli_fetch_array($data)){
                                    ?>
                                    <table class="table">
                                        <tr>
                                          <th width="30%">Foto<br/><small>Yang tersimpan hanya file gambar yang berekstensi .jpg atau .png</small></th>
                                          <td>
                                              <input class="form-control" type="hidden" name="id_kontak" value="<?php echo $d['id_kontak']; ?>">
                                              <input class="form-control" type="file" name="foto" id="foto" value="<?php echo $d['foto']; ?>">
                                              <small>Kosongkan jika tidak ingin mengubah foto</small>
                                              <span id="foto_error" class="text-danger"></span>
                                          </td>
                                        </tr>
                                        <tr>
                                            <th>NAMA KETUA RT</th>
                                            <td><input class="form-control" type="text" name="nama_rt" value="<?php echo $d['nama_rt']; ?>" required>
                                                <span class="text-danger" id="alamat_staff_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>NO TELP</th>
                                            <td><input class="form-control" type="text" name="telp_rt" value="<?php echo $d['telp_rt']; ?>" required>
                                                <span class="text-danger" id="telp_staff_error"></span>
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
        document.getElementById('form-edit-kontak').onsubmit = function() {
    let isValid = true;
    const nameField = document.getElementsByName('nama_rt')[0];
    const telpField = document.getElementsByName('telp_rt')[0];

    // Clear previous errors
    document.getElementById('alamat_staff_error').innerText = '';
    document.getElementById('telp_staff_error').innerText = '';

    // Validate nama
    if (nameField.value.trim() === '') {
        document.getElementById('alamat_staff_error').innerText = 'Harap input nama ketua RT.';
        isValid = false;
    }

    // Validate no telp
    if (telpField.value.length < 10 || isNaN(telpField.value)) {
        document.getElementById('telp_staff_error').innerText = 'No telp harus minimal 10 digit angka.';
        isValid = false;
    }

    return isValid;
};

    </script>

</div>
