<?php
include 'header.php';
include '../koneksi.php';

// Ambil id_administrasi dari parameter GET
$id_administrasi = $_GET['id'];

// Query untuk mengambil data administrasi berdasarkan id_administrasi
$query = "SELECT * FROM administrasi WHERE id_administrasi = '$id_administrasi'";
$result = mysqli_query($koneksi, $query);

// Pastikan ada hasil dari query
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
?>
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="panel panel-flat">
                    <div class="panel-heading">                        
                        <h4 class="panel-title">Proses Data Permohonan Administrasi Warga</h4>
                        <div class="heading-elements">
                            <a href="administrasi.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="administrasi_act.php" method="post" enctype="multipart/form-data">
                                <table class="table">
                                    <tr>
                                        <th width="20%">Tanggapan</th>
                                        <td>
                                            <textarea class="form-control" style="resize: none; height: 150px;" name="tanggapan" required><?php echo $data['tanggapan']; ?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Update Lampiran<br/><small>Yang tersimpan hanya file yang berekstensi .pdf, .jpg, .jpeg, .png</small></th>
                                        <td><input type="file" name="file_reply"></td>
                                    </tr>
                                    <!-- Hidden input untuk menyimpan id_administrasi -->
                                    <input type="hidden" name="id_administrasi" value="<?php echo $id_administrasi; ?>">
                                    <tr>
                                        <th></th>
                                        <td><input type="submit" value="SIMPAN" class="btn btn-primary btn-sm"></td>
                                    </tr>        
                                </table>
                            </form>
                        </div>                    
                    </div>                    
                </div>    
            </div>
        </div>        

        <div class="footer text-muted">
            <!-- &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a> -->
        </div>

    </div>
</div>

<?php
} else {
    // Jika tidak ada data dengan id_administrasi yang diberikan
    echo "Data tidak ditemukan.";
}

include 'footer.php';
?>
