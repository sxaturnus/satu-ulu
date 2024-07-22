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
                        <h4 class="panel-title">Edit Data Penerima Bansos</h4>
                        <div class="heading-elements">
                            <a href="bansos.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="bansos_update.php" method="post" id="form-edit-bansos">
                                <?php
                                $id = $_GET['id'];
                                $data = mysqli_query($koneksi,"select * from bansos where id_bansos='$id'");
                                while($d=mysqli_fetch_array($data)){
                                    ?>
                                    <table class="table">
                                        <tr>
                                            <th width="30%">NAMA</th>
                                            <td>
                                                <input class="form-control" type="hidden" name="id_bansos" value="<?php echo $d['id_bansos']; ?>">
                                                <input class="form-control" type="text" name="nama_penerima" value="<?php echo $d['nama_penerima']; ?>" required>
                                                <span class="text-danger" id="nama_penerima_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>ALAMAT</th>
                                            <td><input class="form-control" type="text" name="alamat_penerima" value="<?php echo $d['alamat_penerima']; ?>" required>
                                                <span class="text-danger" id="alamat_penerima_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>JENIS BANTUAN</th>
                                            <td>
                                                <input class="form-control" type="text" name="jenis_bantuan" value="<?php echo $d['jenis_bantuan']; ?>" required>
                                                <span class="text-danger" id="jenis_bantuan_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>PEKERJAAN</th>
                                            <td>
                                                <input class="form-control" type="text" name="pekerjaan_penerima" value="<?php echo $d['pekerjaan_penerima']; ?>" required>
                                                <span class="text-danger" id="pekerjaan_penerima_error"></span>
                                            </td>
                                        </tr>
                                        <tr>
										<th>STATUS</th>
                                            <td>
                                                <select name="status_penerima" id="status_penerima" class="form-control">
                                                    <option value="">Pilih Status</option>
                                                    <option value="Keluarga Tidak Mampu" <?php echo $d['status_penerima'] == 'Keluarga Tidak Mampu' ? 'selected' : ''; ?>>Keluarga Tidak Mampu</option>
                                                    <option value="Disabilitas" <?php echo $d['status_penerima'] == 'Disabilitas' ? 'selected' : ''; ?>>Penyandang Disabilitas</option>
                                                    <option value="Korban Bencana" <?php echo $d['status_penerima'] == 'Korban Bencana' ? 'selected' : ''; ?>>Korban Bencana</option>
                                                    <option value="Anak Yatim" <?php echo $d['status_penerima'] == 'Anak Yatim' ? 'selected' : ''; ?>>Anak Yatim</option>
                                                    <option value="Lansia" <?php echo $d['status_penerima'] == 'Lansia' ? 'selected' : ''; ?>>Lansia</option>
                                                </select>
                                                <span id="status_penerima_error" class="text-danger"></span>
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
</div>

<!-- Modal -->
<div id="successModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informasi</h4>
            </div>
            <div class="modal-body">
                <p>Data berhasil diubah</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="redirectToBansos()">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showModal() {
        $('#successModal').modal('show');
    }

    function redirectToBansos() {
        window.location.href = "bansos.php";
    }

    <?php if(isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
        showModal();
    <?php endif; ?>

    document.getElementById('form-edit-bansos').onsubmit = function() {
        let isValid = true;
        const fields = ['nama_penerima', 'alamat_penerima', 'jenis_bantuan', 'pekerjaan_penerima', 'status_penerima'];

        // Clear previous errors
        fields.forEach(field => {
            document.getElementById(field + '_error').innerText = '';
        });

        // Validate Empty Fields
        fields.forEach(field => {
            if (document.getElementsByName(field)[0].value.trim() === '') {
                document.getElementById(field + '_error').innerText = 'Harap input ' + field.replace('_', ' ') + '.';
                isValid = false;
            }
        });

        return isValid;
    };
</script>

<?php include 'footer.php'; ?>
