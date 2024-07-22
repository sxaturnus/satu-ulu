<?php include 'header.php'; ?>
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
                        <h4 class="panel-title">Statistik Kepala Keluarga</h4>
                        <div class="heading-elements">
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM kk ORDER BY rw ASC, rt ASC");
                            if (mysqli_num_rows($data) > 0) {
                                echo '<a href="kk_cetak.php" target="_blank" class="btn btn-sm btn-primary"><i class="icon-file-empty"></i> CETAK</a>';
                            } else {
                                echo '<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#noDataModal"><i class="icon-file-empty"></i> CETAK</button>';
                            }
                            ?>
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
                                        <th colspan="2" style="text-align: center;">Jumlah KK</th>
                                        <th colspan="2" style="text-align: center;">KK Laki-laki</th>
                                        <th colspan="2" style="text-align: center;">KK Perempuan</th>
                                        <th colspan="2" style="text-align: center;">KK Ekonomi Mampu</th>
                                        <th colspan="2" style="text-align: center;">KK Ekonomi Tidak Mampu</th>
                                        <th colspan="2" style="text-align: center;">KK Alamat Luar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                                $data = mysqli_query($koneksi, "SELECT * FROM kk");
                                $no = 1;

                                if (mysqli_num_rows($data) > 0) {
                                    while ($d = mysqli_fetch_array($data)) {
                                        $rw = $d['rw'];
                                        $rt = $d['rt'];
                                        $jumlah_kk = $d['jumlah_kk'];
                                        $kk_lk = $d['kk_lk'];
                                        $kk_pr = $d['kk_pr'];
                                        $kk_mampu = $d['kk_mampu'];
                                        $kk_tdkMampu = $d['kk_tdkMampu'];
                                        $kk_luar = $d['kk_luar'];

                                        // Calculate percentages
                                        $persentase_lk = ($kk_lk / $jumlah_kk) * 100;
                                        $persentase_pr = ($kk_pr / $jumlah_kk) * 100;
                                        $persentase_mampu = ($kk_mampu / $jumlah_kk) * 100;
                                        $persentase_tdkMampu = ($kk_tdkMampu / $jumlah_kk) * 100;
                                        $persentase_kkLuar = ($kk_luar / $jumlah_kk) * 100;
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $rw; ?></td>
                                            <td><?php echo $rt; ?></td>
                                            <td><?php echo $jumlah_kk; ?></td>
                                            <td><?php echo number_format($persentase_lk + $persentase_pr, 2) . "%"; ?></td>
                                            <td><?php echo $kk_lk; ?></td>
                                            <td><?php echo number_format($persentase_lk, 2) . "%"; ?></td>
                                            <td><?php echo $kk_pr; ?></td>
                                            <td><?php echo number_format($persentase_pr, 2) . "%"; ?></td>
                                            <td><?php echo $kk_mampu; ?></td>
                                            <td><?php echo number_format($persentase_mampu, 2) . "%"; ?></td>
                                            <td><?php echo $kk_tdkMampu; ?></td>
                                            <td><?php echo number_format($persentase_tdkMampu, 2) . "%"; ?></td>
                                            <td><?php echo $kk_luar; ?></td>
                                            <td><?php echo number_format($persentase_kkLuar, 2) . "%"; ?></td>
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

<div id="noDataModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informasi</h4>
            </div>
            <div class="modal-body">
                <p>Maaf tidak ada data statistik untuk dicetak!</p>
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
            return false; // Mencegah pengalihan ke kk_tambah.php
        <?php endif; ?>
        return true; // Lanjutkan ke kk_tambah.php
    }
</script>

<?php include 'footer.php'; ?>
