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
                        <h4 class="panel-title">Tambah Kontak Baru</h4>
                        <div class="heading-elements">
                            <a href="kontak_rt.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="kontak_act.php" method="post" id="form-tambah-kontak" onsubmit="return validateForm()" enctype="multipart/form-data">
                                <table class="table">
                                    <tr>
                                        <th width="30%">Foto<br/><small>Yang tersimpan hanya file gambar yang berekstensi .jpg atau .png</small></th>
                                        <td>
                                            <input class="form-control" type="file" name="foto" id="foto" required="required">
                                            <span id="foto_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>NAMA KETUA RT</th>
                                        <td>
                                            <input class="form-control" type="text" name="nama_rt" id="nama_rt" required="required">
                                            <span id="nama_rt_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>JABATAN</th>
                                        <td>
                                            <select name="jabatan_rt" class="form-control" required="required">
                                                <?php
                                                // loop dari 1-34 untuk menampilkan jabatan ketua RT
                                                for ($i = 1; $i <= 34; $i++) {
                                                    echo '<option value="Ketua RT ' . $i . '">Ketua RT ' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                            <span id="jabatan_rt_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>NO TELP</th>
                                        <td>
                                            <input class="form-control" type="text" name="telp_rt" id="telp_rt" required="required">
                                            <span id="telp_rt_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td><input type="submit" value="SIMPAN" class="btn btn-sm btn-primary"></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
