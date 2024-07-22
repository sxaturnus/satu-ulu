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
                        <h4 class="panel-title">Statistik Warga</h4>
                        <div class="heading-elements">
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM warga ORDER BY rw ASC, rt ASC");
                            if (mysqli_num_rows($data) > 0) {
                                echo '<a href="statistikWarga_cetak.php" target="_blank" class="btn btn-sm btn-primary"><i class="icon-file-empty"></i> CETAK</a>';
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
                                        <th colspan="2" style="text-align: center;">Jumlah Warga</th>
                                        <th colspan="2" style="text-align: center;">Laki-laki</th>
                                        <th colspan="2" style="text-align: center;">Perempuan</th>
                                        <th colspan="2" style="text-align: center;">Warga Tetap</th>
                                        <th colspan="2" style="text-align: center;">Warga Tidak Tetap</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                                $data = mysqli_query($koneksi, "SELECT * FROM warga ORDER BY rw ASC, rt ASC");
                                $no = 1;

                                if (mysqli_num_rows($data) > 0) {
                                    while ($d = mysqli_fetch_array($data)) {
                                        $rw = $d['rw'];
                                        $rt = $d['rt'];
                                        $jumlah_warga = $d['jumlah_warga'];
                                        $pria = $d['pria'];
                                        $wanita = $d['wanita'];
                                        $warga_tetap = $d['warga_tetap'];
                                        $warga_tdkTetap = $d['warga_tdkTetap'];

                                        // Calculate percentages
                                        $persentase_pria = ($pria / $jumlah_warga) * 100;
                                        $persentase_wanita = ($wanita / $jumlah_warga) * 100;
                                        $persentase_tetap = ($warga_tetap / $jumlah_warga) * 100;
                                        $persentase_tdkTetap = ($warga_tdkTetap / $jumlah_warga) * 100;
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $rw; ?></td>
                                            <td><?php echo $rt; ?></td>
                                            <td><?php echo $jumlah_warga; ?></td>
                                            <td><?php echo number_format($persentase_pria + $persentase_wanita, 2) . "%"; ?></td>
                                            <td><?php echo $pria; ?></td>
                                            <td><?php echo number_format($persentase_pria, 2) . "%"; ?></td>
                                            <td><?php echo $wanita; ?></td>
                                            <td><?php echo number_format($persentase_wanita, 2) . "%"; ?></td>
                                            <td><?php echo $warga_tetap; ?></td>
                                            <td><?php echo number_format($persentase_tetap, 2) . "%"; ?></td>
                                            <td><?php echo $warga_tdkTetap; ?></td>
                                            <td><?php echo number_format($persentase_tdkTetap, 2) . "%"; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="12">Tidak ada data terbaru</td>
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
            return false; // Mencegah pengalihan ke sw_tambah.php
        <?php endif; ?>
        return true; // Lanjutkan ke sw_tambah.php
    }
</script>

<?php include 'footer.php'; ?>
