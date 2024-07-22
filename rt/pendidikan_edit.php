<?php 
ob_start();
include 'header.php'; 
include '../koneksi.php';

// Ambil RW dan RT dari URL
if (!isset($_GET['rw']) || !isset($_GET['rt'])) {
    // Redirect kembali ke rumah.php jika rw atau rt tidak diset
    header("Location: pendidikan.php?status=not_found");
    exit();
}

$rw = $_GET['rw'];
$rt = $_GET['rt'];

// Ambil data rumah berdasarkan RW dan RT
$query = "SELECT * FROM pendidikan WHERE rw='$rw' AND rt='$rt'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    // Jika data tidak ditemukan, arahkan ke halaman rumah dengan pesan error
    echo "<script>alert('Data tidak ditemukan.'); window.location.href='pendidikan.php';</script>";
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
                        <h4 class="panel-title">Edit Data Pendidikan</h4>
                        <div class="heading-elements">
                            <a href="pendidikan.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="pendidikan_update.php" method="post" id="form-edit-usia" onsubmit="return validateForm()">
                                <table class="table">
                                    <tr>
                                        <th width="30%">JUMLAH WARGA</th>
                                        <td>
                                            <input class="form-control" type="hidden" name="rw" value="<?php echo $rw; ?>">
                                            <input class="form-control" type="hidden" name="rt" value="<?php echo $rt; ?>">
                                            <input class="form-control" type="hidden" name="id_pendidikan" value="<?php echo $data['id_pendidikan']; ?>">
                                            <input class="form-control" type="number" name="jumlah_warga" id="jumlah_warga" value="<?php echo $data['jumlah_warga']; ?>" required>
                                            <span id="jumlah_warga_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Belum/Tidak Sekolah L (Laki-laki)</th>
                                        <td>
                                            <input class="form-control" type="number" name="tdk_sekolah_lk" id="tdk_sekolah_lk" value="<?php echo $data['tdk_sekolah_lk']; ?>" required>
                                            <span id="tdk_sekolah_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>Belum/Tidak Sekolah P (Perempuan)</th>
                                        <td>
                                            <input class="form-control" type="number" name="tdk_sekolah_pr" id="tdk_sekolah_pr" value="<?php echo $data['tdk_sekolah_pr']; ?>" required>
                                            <span id="tdk_sekolah_pr_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>SD L (Laki-laki)</th>
                                        <td>
                                            <input class="form-control" type="number" name="sd_lk" id="sd_lk" value="<?php echo $data['sd_lk']; ?>" required>
                                            <span id="sd_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>SD P (Perempuan)</th>
                                        <td>
                                            <input class="form-control" type="number" name="sd_pr" id="sd_pr" value="<?php echo $data['sd_pr']; ?>" required>
                                            <span id="sd_pr_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>SMP L (Laki-laki)</th>                                        
                                        <td>
                                            <input class="form-control" type="number" name="smp_lk" id="smp_lk" value="<?php echo $data['smp_lk']; ?>" required>
                                            <span id="smp_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>SMP P (Perempuan)</th>
                                        <td>
                                            <input class="form-control" type="number" name="smp_pr" id="smp_pr" value="<?php echo $data['smp_pr']; ?>" required>
                                            <span id="smp_pr_error" class="text-danger"></span>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <th>SMA L (Laki-laki)</th>
                                        <td>
                                            <input class="form-control" type="number" name="sma_lk" id="sma_lk" value="<?php echo $data['sma_lk']; ?>" required>
                                            <span id="sma_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <th>SMA P (Perempuan)</th>
                                        <td>
                                            <input class="form-control" type="number" name="sma_pr" id="sma_pr" value="<?php echo $data['sma_pr']; ?>" required>
                                            <span id="sma_pr_error" class="text-danger"></span>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <th>SMK L (Laki-laki)</th>
                                        <td>
                                            <input class="form-control" type="number" name="smk_lk" id="smk_lk" value="<?php echo $data['smk_lk']; ?>" required>
                                            <span id="smk_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <th>SMK P (Perempuan)</th>
                                        <td>
                                            <input class="form-control" type="number" name="smk_pr" id="smk_pr" value="<?php echo $data['smk_pr']; ?>" required>
                                            <span id="smk_pr_error" class="text-danger"></span>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <th>Perguruan Tinggi L (Laki-laki)</th>
                                        <td>
                                            <input class="form-control" type="number" name="perguruan_tinggi_lk" id="perguruan_tinggi_lk" value="<?php echo $data['perguruan_tinggi_lk']; ?>" required>
                                            <span id="perguruan_tinggi_lk_error" class="text-danger"></span>
                                        </td>
                                    </tr>  
                                    <tr>
                                        <th>Perguruan Tinggi P (Perempuan)</th>
                                        <td>
                                            <input class="form-control" type="number" name="perguruan_tinggi_pr" id="perguruan_tinggi_pr" value="<?php echo $data['perguruan_tinggi_pr']; ?>" required>
                                            <span id="perguruan_tinggi_pr_error" class="text-danger"></span>
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
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="redirectToPendidikan()">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showModal() {
        $('#successModal').modal('show');
    }

    function redirectToPendidikan() {
        window.location.href = "pendidikan.php";  
    }

    <?php if(isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
        showModal();
    <?php endif; ?>

    function validateForm() {
        let isValid = true;

        const jumlah_warga = parseInt(document.getElementById('jumlah_warga').value);
        const tdk_sekolah_lk = parseInt(document.getElementById('tdk_sekolah_lk').value) || 0;
        const tdk_sekolah_pr = parseInt(document.getElementById('tdk_sekolah_pr').value) || 0;
        const sd_lk = parseInt(document.getElementById('sd_lk').value) || 0;
        const sd_pr = parseInt(document.getElementById('sd_pr').value) || 0;
        const smp_lk = parseInt(document.getElementById('smp_lk').value) || 0;
        const smp_pr = parseInt(document.getElementById('smp_pr').value) || 0;
        const sma_lk = parseInt(document.getElementById('sma_lk').value) || 0;
        const sma_pr = parseInt(document.getElementById('sma_pr').value) || 0;
        const smk_lk = parseInt(document.getElementById('smk_lk').value) || 0;
        const smk_pr = parseInt(document.getElementById('smk_pr').value) || 0;
        const perguruan_tinggi_lk = parseInt(document.getElementById('perguruan_tinggi_lk').value) || 0;
        const perguruan_tinggi_pr = parseInt(document.getElementById('perguruan_tinggi_pr').value) || 0;

        const total_pendidikan = tdk_sekolah_lk + tdk_sekolah_pr + sd_lk + sd_pr + smp_lk + smp_pr + sma_lk + sma_pr + smk_lk + smk_pr + perguruan_tinggi_lk + perguruan_tinggi_pr;

        if (total_pendidikan > jumlah_warga) {
            document.getElementById('jumlah_warga_error').innerText = "Jumlah total pendidikan tidak boleh melebihi jumlah warga.";
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
