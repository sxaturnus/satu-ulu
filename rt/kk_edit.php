<?php 
ob_start();
include 'header.php'; 
include '../koneksi.php';

// Ambil RW dan RT dari URL
if (!isset($_GET['rw']) || !isset($_GET['rt'])) {
    // Redirect kembali ke rumah.php jika rw atau rt tidak diset
    header("Location: kk.php?status=not_found");
    exit();
}

$rw = $_GET['rw'];
$rt = $_GET['rt'];

// Ambil data rumah berdasarkan RW dan RT
$query = "SELECT * FROM kk WHERE rw='$rw' AND rt='$rt'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    // Jika data tidak ditemukan, arahkan ke halaman rumah dengan pesan error
    echo "<script>alert('Data tidak ditemukan.'); window.location.href='kk.php';</script>";
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
                        <h4 class="panel-title">Edit Data Kepala Keluarga</h4>
                        <div class="heading-elements">
                            <a href="kk.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="kk_update.php" method="post" id="form-edit-kk" onsubmit="return validateForm()">
                                <table class="table">
                                    <tr>
                                        <th width="30%">JUMLAH KK</th>
                                        <td>
                                            <input class="form-control" type="hidden" name="rw" value="<?php echo $rw; ?>">
                                            <input class="form-control" type="hidden" name="rt" value="<?php echo $rt; ?>">
                                            <input class="form-control" type="hidden" name="id_kk" value="<?php echo $data['id_kk']; ?>">
                                            <input class="form-control" type="number" name="jumlah_kk" id="jumlah_kk" value="<?php echo $data['jumlah_kk']; ?>" required>
                                            <span id="jumlah_kk_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>KK LAKI-LAKI</th>
                                        <td>
                                            <input class="form-control" type="number" name="kk_lk" id="kk_lk" value="<?php echo $data['kk_lk']; ?>" required>
                                            <span id="kk_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>KK PEREMPUAN</th>
                                        <td>
                                            <input class="form-control" type="number" name="kk_pr" id="kk_pr"  value="<?php echo $data['kk_pr']; ?>" required>
                                            <span id="kk_pr_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">KK EKONOMI MAMPU</th>                                        
                                        <td>
                                            <input class="form-control" type="number" name="kk_mampu" id="kk_mampu" value="<?php echo $data['kk_mampu']; ?>" required>
                                            <span id="kk_mampu_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>KK EKONOMI TIDAK MAMPU</th>
                                        <td>
                                            <input class="form-control" type="number" name="kk_tdkMampu" id="kk_tdkMampu" value="<?php echo $data['kk_tdkMampu']; ?>" required>
                                            <span id="kk_tdkMampu_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>KK ALAMAT LUAR</th>
                                        <td>
                                            <input class="form-control" type="number" name="kk_luar" id="kk_luar" value="<?php echo $data['kk_luar']; ?>" required>
                                            <span id="kk_luar_error" class="text-danger"></span>
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
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="redirectToKK()">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showModal() {
        $('#successModal').modal('show');
    }

    function redirectToKK() {
        window.location.href = "kk.php";  // Redirect ke halaman rumah.php
    }

    <?php if(isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
        showModal();
    <?php endif; ?>

    function validateForm() {
        let isValid = true;

        // Clear previous errors
        document.getElementById('jumlah_kk_error').innerText = "";
        document.getElementById('kk_lk_error').innerText = "";
        document.getElementById('kk_pr_error').innerText = "";
        document.getElementById('kk_mampu_error').innerText = "";
        document.getElementById('kk_tdkMampu_error').innerText = "";
        document.getElementById('kk_luar_error').innerText = "";

        // Validate fields
        const jumlah_kk = parseInt(document.getElementById('jumlah_kk').value);
        const kk_lk = parseInt(document.getElementById('kk_lk').value) || 0;
        const kk_pr = parseInt(document.getElementById('kk_pr').value) || 0;
        const kk_mampu = parseInt(document.getElementById('kk_mampu').value) || 0;
        const kk_tdkMampu = parseInt(document.getElementById('kk_tdkMampu').value) || 0;
        const kk_luar = parseInt(document.getElementById('kk_luar').value) || 0;

        if (isNaN(jumlah_kk) || jumlah_kk <= 0) {
            document.getElementById('jumlah_kk_error').innerText = "Jumlah KK harus lebih dari 0.";
            isValid = false;
        }

        if (kk_lk + kk_pr > jumlah_kk) {
            document.getElementById('jumlah_kk_error').innerText = "Jumlah KK Laki-laki dan KK Perempuan tidak boleh melebihi Jumlah KK.";
            isValid = false;
        }

        if (kk_mampu > jumlah_kk) {
            document.getElementById('kk_mampu_error').innerText = "Jumlah KK Ekonomi Mampu tidak boleh melebihi Jumlah KK.";
            isValid = false;
        }

        if (kk_tdkMampu > jumlah_kk) {
            document.getElementById('kk_tdkMampu_error').innerText = "Jumlah KK Ekonomi Tidak Mampu tidak boleh melebihi Jumlah KK.";
            isValid = false;
        }

        if (kk_luar > jumlah_kk) {
            document.getElementById('kk_luar_error').innerText = "Jumlah KK Alamat Luar tidak boleh melebihi Jumlah KK.";
            isValid = false;
        }

        return isValid;
    }
</script>

<script>
    <?php if(isset($_GET['status']) && $_GET['status'] == 'error'): ?>
        document.getElementById('jumlah_kk_error').innerText = "Terjadi kesalahan saat menyimpan data.";
    <?php endif; ?>
</script>

<?php include 'footer.php'; ?>
