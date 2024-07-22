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
                        <h4 class="panel-title">Tambah Data Warga Berdasarkan Usia</h4>
                        <div class="heading-elements">
                            <a href="kelompok_usia.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="usia_act.php" method="post" id="form-tambah-usia" onsubmit="return validateForm()">
                                <table class="table">
                                    <tr>
                                        <th width="30%">JUMLAH WARGA</th>                                        
                                        <td>
                                            <input class="form-control" type="number" name="total_warga" id="total_warga" required>
                                            <span id="jumlah_warga_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>BALITA L (Laki-laki)</th>
                                        <td>
                                            <input class="form-control" type="number" name="balita_lk" id="balita_lk" required>
                                            <span id="balita_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>BALITA P (Perempuan)</th>
                                        <td>
                                            <input class="form-control" type="number" name="balita_pr" id="balita_pr" required>
                                            <span id="balita_pr_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>USIA DINI L (Laki-laki)</th>
                                        <td>
                                            <input class="form-control" type="number" name="ud_lk" id="ud_lk" required>
                                            <span id="ud_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>USIA DINI P (Perempuan)</th>
                                        <td>
                                            <input class="form-control" type="number" name="ud_pr" id="ud_pr" required>
                                            <span id="ud_pr_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>REMAJA L (Laki-laki)</th>                                        
                                        <td>
                                            <input class="form-control" type="number" name="remaja_lk" id="remaja_lk" required>
                                            <span id="remaja_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>REMAJA P (Perempuan)</th>
                                        <td>
                                            <input class="form-control" type="number" name="remaja_pr" id="remaja_pr" required>
                                            <span id="remaja_pr_error" class="text-danger"></span>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <th>DEWASA L (Laki-laki)</th>
                                        <td>
                                            <input class="form-control" type="number" name="dewasa_lk" id="dewasa_lk" required>
                                            <span id="dewasa_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <th>DEWASA P (Perempuan)</th>
                                        <td>
                                            <input class="form-control" type="number" name="dewasa_pr" id="dewasa_pr" required>
                                            <span id="dewasa_pr_error" class="text-danger"></span>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <th>LANSIA L (Laki-laki)</th>
                                        <td>
                                            <input class="form-control" type="number" name="lansia_lk" id="lansia_lk" required>
                                            <span id="lansia_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <th>LANSIA P (Perempuan)</th>
                                        <td>
                                            <input class="form-control" type="number" name="lansia_pr" id="lansia_pr" required>
                                            <span id="lansia_pr_error" class="text-danger"></span>
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
                <p>Data berhasil ditambahkan</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="redirectToUsia()">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showModal() {
        $('#successModal').modal('show');
    }

    function redirectToUsia() {
        window.location.href = "kelompok_usia.php";
    }

    <?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
        showModal();
    <?php endif; ?>

    function validateForm() {
        let isValid = true;

        // Clear previous errors
        document.getElementById('jumlah_warga_error').innerText = "";
        document.getElementById('balita_lk_error').innerText = "";
        document.getElementById('balita_pr_error').innerText = "";
        document.getElementById('ud_lk_error').innerText = "";
        document.getElementById('ud_pr_error').innerText = "";
        document.getElementById('remaja_lk_error').innerText = "";
        document.getElementById('remaja_pr_error').innerText = "";
        document.getElementById('dewasa_lk_error').innerText = "";
        document.getElementById('dewasa_pr_error').innerText = "";
        document.getElementById('lansia_lk_error').innerText = "";
        document.getElementById('lansia_pr_error').innerText = "";

        // Validate fields
        const total_warga = parseInt(document.getElementById('total_warga').value);
        const balita_lk = parseInt(document.getElementById('balita_lk').value) || 0;
        const balita_pr = parseInt(document.getElementById('balita_pr').value) || 0;
        const ud_lk = parseInt(document.getElementById('ud_lk').value) || 0;
        const ud_pr = parseInt(document.getElementById('ud_pr').value) || 0;
        const remaja_lk = parseInt(document.getElementById('remaja_lk').value) || 0;
        const remaja_pr = parseInt(document.getElementById('remaja_pr').value) || 0;
        const dewasa_lk = parseInt(document.getElementById('dewasa_lk').value) || 0;
        const dewasa_pr = parseInt(document.getElementById('dewasa_pr').value) || 0;
        const lansia_lk = parseInt(document.getElementById('lansia_lk').value) || 0;
        const lansia_pr = parseInt(document.getElementById('lansia_pr').value) || 0;

        // Check if the sum of all age groups exceeds total population
        const total_input = balita_lk + balita_pr + ud_lk + ud_pr + remaja_lk + remaja_pr + dewasa_lk + dewasa_pr + lansia_lk + lansia_pr;
        if (total_input > total_warga) {
            document.getElementById('jumlah_warga_error').innerText = "Jumlah semua kategori tidak boleh melebihi Jumlah Warga.";
            isValid = false;
        }

        return isValid;
    }
</script>

<script>
    <?php if(isset($_GET['status']) && $_GET['status'] == 'error'): ?>
        document.getElementById('jumlah_warga_error').innerText = "Terjadi kesalahan saat menyimpan data.";
    <?php endif; ?>
</script>

<?php include 'footer.php'; ?>
