<?php 
ob_start();
include 'header.php'; 
include '../koneksi.php';

// Ambil RW dan RT dari URL
if (!isset($_GET['rw']) || !isset($_GET['rt'])) {
    // Redirect kembali ke rumah.php jika rw atau rt tidak diset
    header("Location: agama.php?status=not_found");
    exit();
}

$rw = $_GET['rw'];
$rt = $_GET['rt'];

// Ambil data rumah berdasarkan RW dan RT
$query = "SELECT * FROM agama WHERE rw='$rw' AND rt='$rt'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    // Jika data tidak ditemukan, arahkan ke halaman rumah dengan pesan error
    echo "<script>alert('Data tidak ditemukan.'); window.location.href='agama.php';</script>";
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
                        <h4 class="panel-title">Edit Data Statistik Agama & Pemeluk Kepercayaan</h4>
                        <div class="heading-elements">
                            <a href="agama.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="agama_update.php" method="post" id="form-edit-agama" onsubmit="return validateForm()">
                                <table class="table">
                                    <tr>
                                        <th width="30%">JUMLAH WARGA</th>
                                        <td>
                                            <input class="form-control" type="hidden" name="rw" value="<?php echo $rw; ?>">
                                            <input class="form-control" type="hidden" name="rt" value="<?php echo $rt; ?>">
                                            <input class="form-control" type="hidden" name="id_agama" value="<?php echo $data['id_agama']; ?>">
                                            <input class="form-control" type="number" name="jumlah_warga" id="jumlah_warga" value="<?php echo $data['jumlah_warga']; ?>" required>
                                            <span id="jumlah_warga_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>AGAMA ISLAM</th>
                                        <td>
                                            <input class="form-control" type="number" name="islam" id="islam" value="<?php echo $data['islam']; ?>" required>
                                            <span id="islam_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>KRISTEN KATOLIK</th>
                                        <td>
                                            <input class="form-control" type="number" name="katolik" id="katolik" value="<?php echo $data['katolik']; ?>" required>
                                            <span id="katolik_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="30%">KRISTEN PROTESTAN</th>                                        
                                        <td>
                                            <input class="form-control" type="number" name="protestan" id="protestan" value="<?php echo $data['protestan']; ?>" required>
                                            <span id="protestan_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>AGAMA HINDU</th>
                                        <td>
                                            <input class="form-control" type="number" name="hindu" id="hindu" value="<?php echo $data['hindu']; ?>" required>
                                            <span id="hindu_error" class="text-danger"></span>
                                        </td>
                                    </tr> 
                                    <tr>
                                        <th width="30%">KRISTEN BUDHA</th>                                        
                                        <td>
                                            <input class="form-control" type="number" name="budha" id="budha" value="<?php echo $data['budha']; ?>" required>
                                            <span id="budha_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>AGAMA KHONGHUCU</th>
                                        <td>
                                            <input class="form-control" type="number" name="khonghucu" id="khonghucu" value="<?php echo $data['khonghucu']; ?>" required>
                                            <span id="khonghucu_error" class="text-danger"></span>
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
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="redirectToAgama()">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showModal() {
        $('#successModal').modal('show');
    }

    function redirectToAgama() {
        window.location.href = "agama.php";  
    }

    <?php if(isset($_GET['status']) && $_GET['status'] == 'updated'): ?>
        showModal();
    <?php endif; ?>

    function validateForm() {
        let isValid = true;

        // Clear previous errors
        document.getElementById('jumlah_warga_error').innerText = "";
        document.getElementById('islam_error').innerText = "";
        document.getElementById('katolik_error').innerText = "";
        document.getElementById('protestan_error').innerText = "";
        document.getElementById('hindu_error').innerText = "";
        document.getElementById('budha_error').innerText = "";
        document.getElementById('khonghucu_error').innerText = "";

        // Validate fields
        const jumlah_warga = parseInt(document.getElementById('jumlah_warga').value);
        const islam = parseInt(document.getElementById('islam').value) || 0;
        const katolik = parseInt(document.getElementById('katolik').value) || 0;
        const protestan = parseInt(document.getElementById('protestan').value) || 0;
        const hindu = parseInt(document.getElementById('hindu').value) || 0;
        const budha = parseInt(document.getElementById('budha').value) || 0;
        const khonghucu = parseInt(document.getElementById('khonghucu').value) || 0;

        if (isNaN(jumlah_warga) || jumlah_warga <= 0) {
            document.getElementById('jumlah_error').innerText = "Jumlah Warga harus lebih dari 0.";
            isValid = false;
        }

        const totalAgama = islam + katolik + protestan + hindu + budha + khonghucu;

        if (totalAgama > jumlah_warga) {
            document.getElementById('jumlah_warga_error').innerText = "Jumlah total pemeluk agama tidak boleh melebihi Jumlah Warga.";
            isValid = false;
        }

        if (islam > jumlah_warga) {
            document.getElementById('islam_error').innerText = "Jumlah Data Statistik Agama Islam tidak boleh melebihi Jumlah Warga.";
            isValid = false;
        }

        if (katolik > jumlah_warga) {
            document.getElementById('katolik_error').innerText = "Jumlah Data Statistik Agama Kristen Katolik tidak boleh melebihi Jumlah Warga.";
            isValid = false;
        }

        if (protestan > jumlah_warga) {
            document.getElementById('protestan_error').innerText = "Jumlah Data Statistik Agama Kristen Protestan tidak boleh melebihi Jumlah Warga.";
            isValid = false;
        }

        if (hindu > jumlah_warga) {
            document.getElementById('hindu_error').innerText = "Jumlah Data Statistik Agama Hindu tidak boleh melebihi Jumlah Warga.";
            isValid = false;
        }

        if (budha > jumlah_warga) {
            document.getElementById('budha_error').innerText = "Jumlah Data Statistik Agama Budha tidak boleh melebihi Jumlah Warga.";
            isValid = false;
        }

        if (khonghucu > jumlah_warga) {
            document.getElementById('khonghucu_error').innerText = "Jumlah Data Statistik Agama Khonghucu tidak boleh melebihi Jumlah Warga.";
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
