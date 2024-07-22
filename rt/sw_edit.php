<?php 
ob_start();
include 'header.php'; 
include '../koneksi.php';

// Ambil RW dan RT dari URL
if (!isset($_GET['rw']) || !isset($_GET['rt'])) {
    // Redirect kembali ke rumah.php jika rw atau rt tidak diset
    header("Location: statistik_warga.php?status=not_found");
    exit();
}

$rw = $_GET['rw'];
$rt = $_GET['rt'];

// Ambil data rumah berdasarkan RW dan RT
$query = "SELECT * FROM warga WHERE rw='$rw' AND rt='$rt'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    // Jika data tidak ditemukan, arahkan ke halaman rumah dengan pesan error
    echo "<script>alert('Data tidak ditemukan.'); window.location.href='statistik_warga.php';</script>";
    exit();
}
?>

<!-- Konten utama -->
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">Edit Data Warga</h4>
                        <div class="heading-elements">
                            <a href="statistik_warga.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="sw_update.php" method="post" id="form-edit-warga" onsubmit="return validateForm()">
                                <table class="table">
                                    <tr>
                                        <th width="30%">JUMLAH WARGA</th>
                                        <td>
                                            <input class="form-control" type="hidden" name="rw" value="<?php echo $rw; ?>">
                                            <input class="form-control" type="hidden" name="rt" value="<?php echo $rt; ?>">
                                            <input class="form-control" type="hidden" name="id_warga" value="<?php echo $data['id_warga']; ?>">
                                            <input class="form-control" type="number" name="jumlah_warga" id="jumlah_warga" value="<?php echo $data['jumlah_warga']; ?>" required>
                                            <span id="jumlah_warga_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>LAKI-LAKI</th>
                                        <td>
                                            <input class="form-control" type="number" name="pria" id="pria" value="<?php echo $data['pria']; ?>" required>
                                            <span id="pria_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>PEREMPUAN</th>
                                        <td>
                                            <input class="form-control" type="number" name="wanita" id="wanita" value="<?php echo $data['wanita']; ?>" required>
                                            <span id="wanita_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">WARGA TETAP</th>                                        
                                        <td>
                                            <input class="form-control" type="number" name="warga_tetap" id="warga_tetap" value="<?php echo $data['warga_tetap']; ?>" required>
                                            <span id="tetap_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>WARGA TIDAK TETAP</th>
                                        <td>
                                            <input class="form-control" type="number" name="warga_tdkTetap" id="warga_tdkTetap" value="<?php echo $data['warga_tdkTetap']; ?>" required>
                                            <span id="tdkTetap_error" class="text-danger"></span>
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
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informasi</h4>
            </div>
            <div class="modal-body">
                <p>Data berhasil diperbarui</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="redirectToWarga()">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showModal() {
        $('#successModal').modal('show');
    }

    function redirectToWarga() {
        window.location.href = "statistik_warga.php";  
    }

    <?php if(isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
        showModal();
    <?php endif; ?>

    function validateForm() {
        let isValid = true;

        // Clear previous errors
        document.getElementById('jumlah_warga_error').innerText = "";
        document.getElementById('pria_error').innerText = "";
        document.getElementById('wanita_error').innerText = "";
        document.getElementById('tetap_error').innerText = "";
        document.getElementById('tdkTetap_error').innerText = "";

        // Validate fields
        const jumlah_warga = parseInt(document.getElementById('jumlah_warga').value);
        const pria = parseInt(document.getElementById('pria').value) || 0;
        const wanita = parseInt(document.getElementById('wanita').value) || 0;
        const warga_tetap = parseInt(document.getElementById('warga_tetap').value) || 0;
        const warga_tdkTetap = parseInt(document.getElementById('warga_tdkTetap').value) || 0;

        if (isNaN(jumlah_warga) || jumlah_warga <= 0) {
            document.getElementById('jumlah_error').innerText = "Jumlah Warga harus lebih dari 0.";
            isValid = false;
        }

        if (pria + wanita > jumlah_warga) {
            document.getElementById('jumlah_warga_error').innerText = "Jumlah Laki-laki dan Perempuan tidak boleh melebihi Jumlah Warga.";
            isValid = false;
        }

        if (warga_tetap > jumlah_warga) {
            document.getElementById('tetap_error').innerText = "Jumlah Warga Tetap tidak boleh melebihi Jumlah Warga.";
            isValid = false;
        }

        if (warga_tdkTetap > jumlah_warga) {
            document.getElementById('tdkTetap_error').innerText = "Jumlah Warga Tidak Tetap tidak boleh melebihi Jumlah Warga.";
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
