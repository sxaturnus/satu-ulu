<?php 
include 'header.php'; 

// Mulai sesi jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$rw = $_SESSION['rw'];
$rt = $_SESSION['rt'];

// Cek jika data rumah sudah ada
$koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
$data = mysqli_query($koneksi, "SELECT * FROM rumah WHERE rw='$rw' AND rt='$rt'");
$data_exist = mysqli_num_rows($data) > 0;

// Close the database connection
mysqli_close($koneksi);
?>
<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Traffic sources -->
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">Statistik Rumah & Bangunan</h4>
                        <div class="heading-elements">
                            <a href="rumah_tambah.php" class="btn btn-sm btn-primary" onclick="return checkDataExist()"><i class="icon-plus22"></i> TAMBAH</a>
                            <a href="rumah_edit.php?rw=<?php echo $rw; ?>&rt=<?php echo $rt; ?>" class="btn btn-sm btn-success"><i class="icon-wrench"></i> Edit</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped table-datatable text-center">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th style="text-align: center;">RW</th>
                                        <th style="text-align: center;">RT</th>
                                        <th colspan="2" style="text-align: center;">Jumlah Rumah</th>
                                        <th colspan="2" style="text-align: center;">Rumah Sebagai Tempat Tinggal</th>
                                        <th colspan="2" style="text-align: center;">Rumah Sebagai Tempat Usaha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                                $data = mysqli_query($koneksi, "SELECT * FROM rumah");
                                $no = 1;

                                if (mysqli_num_rows($data) > 0) {
                                    while ($d = mysqli_fetch_array($data)) {
                                        $rw = $d['rw'];
                                        $rt = $d['rt'];
                                        $jumlah_rumah = $d['jumlah_rumah'];
                                        $rumah_tinggal = $d['rumah_tinggal'];
                                        $rumah_usaha = $d['rumah_usaha'];

                                        // Calculate percentages
                                        $persentase_tinggal = ($rumah_tinggal / $jumlah_rumah) * 100;
                                        $persentase_usaha = ($rumah_usaha / $jumlah_rumah) * 100;
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $rw; ?></td>
                                            <td><?php echo $rt; ?></td>
                                            <td><?php echo $jumlah_rumah; ?></td>
                                            <td><?php echo number_format($persentase_tinggal + $persentase_usaha, 2) . "%"; ?></td>
                                            <td><?php echo $rumah_tinggal; ?></td>
                                            <td><?php echo number_format($persentase_tinggal, 2) . "%"; ?></td>
                                            <td><?php echo $rumah_usaha; ?></td>
                                            <td><?php echo number_format($persentase_usaha, 2) . "%"; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="8">Tidak ada data terbaru</td>
                                    </tr>
                                    <?php
                                }
                                mysqli_close($koneksi);
                                ?>
                                </tbody>
                            </table>
                        </div>					
                    </div>					
                </div>	
            </div>
        </div>		
    
        <div class="footer text-muted">
        </div>

    </div>
</div>

<!-- Modal -->
<div id="dataExistModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informasi</h4>
            </div>
            <div class="modal-body">
                <p>Data sudah ada. Jika ingin mengubah data, silakan klik tombol Edit.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function checkDataExist() {
        <?php if ($data_exist): ?>
            $('#dataExistModal').modal('show');
            return false; // Mencegah pengalihan ke rumah_tambah.php
        <?php endif; ?>
        return true; // Lanjutkan ke rumah_tambah.php
    }
</script>

<?php include 'footer.php'; ?>
