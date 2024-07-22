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
$data = mysqli_query($koneksi, "SELECT * FROM pendidikan WHERE rw='$rw' AND rt='$rt'");
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
                        <h4 class="panel-title">Statistik Pendidikan</h4>
                        <div class="heading-elements">
                            <a href="pendidikan_tambah.php" class="btn btn-sm btn-primary" onclick="return checkDataExist()"><i class="icon-plus22"></i> TAMBAH</a>
                            <a href="pendidikan_edit.php?rw=<?php echo $rw; ?>&rt=<?php echo $rt; ?>" class="btn btn-sm btn-success"><i class="icon-wrench"></i> Edit</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped text-center">
                                <thead>
                                    <tr>
                                        <th rowspan="2" width="1%">No</th>
                                        <th rowspan="2" style="text-align: center;">RW</th>
                                        <th rowspan="2" style="text-align: center;">RT</th>
                                        <th rowspan="2" colspan="2"  style="text-align: center;">Jumlah Warga</th>
                                        <th colspan="3" style="text-align: center;">Belum/Tidak Sekolah</th>
                                        <th colspan="3" style="text-align: center;">SD</th>
                                        <th colspan="3" style="text-align: center;">SMP</th>
                                        <th colspan="3" style="text-align: center;">SMA</th>
                                        <th colspan="3" style="text-align: center;">SMK</th>
                                        <th colspan="3" style="text-align: center;">Perguruan Tinggi</th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                        <th style="text-align: center;">L</th>
                                        <th style="text-align: center;">P</th>
                                        <th style="text-align: center;">%</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                                $data = mysqli_query($koneksi, "SELECT * FROM pendidikan");
                                $no = 1;

                                if (mysqli_num_rows($data) > 0) {
                                    while ($d = mysqli_fetch_array($data)) {
                                        $rw = $d['rw'];
                                        $rt = $d['rt'];
                                        $jumlah_warga = $d['jumlah_warga'];
                                        $tdk_sekolah_lk = $d['tdk_sekolah_lk']; // Data laki-laki
                                        $tdk_sekolah_pr = $d['tdk_sekolah_pr']; // Data perempuan
                                        $sd_lk = $d['sd_lk'];
                                        $sd_pr = $d['sd_pr'];
                                        $smp_lk = $d['smp_lk'];
                                        $smp_pr = $d['smp_pr'];
                                        $sma_lk = $d['sma_lk'];
                                        $sma_pr = $d['sma_pr'];
                                        $smk_lk = $d['smk_lk'];
                                        $smk_pr = $d['smk_pr'];
                                        $perguruan_tinggi_lk = $d['perguruan_tinggi_lk'];
                                        $perguruan_tinggi_pr = $d['perguruan_tinggi_pr'];

                                        // Calculate percentages
                                        $persentase_tdk_sekolah = ($jumlah_warga > 0) ? (($tdk_sekolah_lk + $tdk_sekolah_pr) / $jumlah_warga) * 100 : 0;
                                        $persentase_sd = ($jumlah_warga > 0) ? (($sd_lk + $sd_pr) / $jumlah_warga) * 100 : 0;
                                        $persentase_smp = ($jumlah_warga > 0) ? (($smp_lk + $smp_pr) / $jumlah_warga) * 100 : 0;
                                        $persentase_sma = ($jumlah_warga > 0) ? (($sma_lk + $sma_pr) / $jumlah_warga) * 100 : 0;
                                        $persentase_smk = ($jumlah_warga > 0) ? (($smk_lk + $smk_pr) / $jumlah_warga) * 100 : 0;
                                        $persentase_perguruan_tinggi = ($jumlah_warga > 0) ? (($perguruan_tinggi_lk + $perguruan_tinggi_pr) / $jumlah_warga) * 100 : 0;
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $rw; ?></td>
                                            <td><?php echo $rt; ?></td>
                                            <td><?php echo $jumlah_warga; ?></td>
                                            <td><?php echo number_format($persentase_tdk_sekolah + $persentase_sd + $persentase_smp + $persentase_sma + $persentase_smk, 2) . "%"; ?></td>
                                            <td><?php echo $tdk_sekolah_lk; ?></td>
                                            <td><?php echo $tdk_sekolah_pr; ?></td>
                                            <td><?php echo number_format($persentase_tdk_sekolah, 2) . "%"; ?></td>
                                            <td><?php echo $sd_lk; ?></td>
                                            <td><?php echo $sd_pr; ?></td>
                                            <td><?php echo number_format($persentase_sd, 2) . "%"; ?></td>
                                            <td><?php echo $smp_lk; ?></td>
                                            <td><?php echo $smp_pr; ?></td>
                                            <td><?php echo number_format($persentase_smp, 2) . "%"; ?></td>
                                            <td><?php echo $sma_lk; ?></td>
                                            <td><?php echo $sma_pr; ?></td>
                                            <td><?php echo number_format($persentase_sma, 2) . "%"; ?></td>
                                            <td><?php echo $smk_lk; ?></td>
                                            <td><?php echo $smk_pr; ?></td>
                                            <td><?php echo number_format($persentase_smk, 2) . "%"; ?></td>
                                            <td><?php echo $perguruan_tinggi_lk; ?></td>
                                            <td><?php echo $perguruan_tinggi_pr; ?></td>
                                            <td><?php echo number_format($persentase_perguruan_tinggi, 2) . "%"; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="23">Tidak ada data terbaru</td>
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
            return false; // Mencegah pengalihan ke usia_tambah.php
        <?php endif; ?>
        return true; // Lanjutkan ke usia_tambah.php
    }
</script>

<?php include 'footer.php'; ?>
