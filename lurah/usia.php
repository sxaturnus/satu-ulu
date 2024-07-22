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
                        <h4 class="panel-title">Statistik Kelompok Usia Warga</h4>
                        <div class="heading-elements">
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM usia ORDER BY rw ASC, rt ASC");
                            if (mysqli_num_rows($data) > 0) {
                                echo '<a href="usia_cetak.php" target="_blank" class="btn btn-sm btn-primary"><i class="icon-file-empty"></i> CETAK</a>';
                            } else {
                                echo '<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#noDataModal"><i class="icon-file-empty"></i> CETAK</button>';
                            }
                            ?>
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
                                        <th colspan="3" style="text-align: center;">Balita</th>
                                        <th colspan="3" style="text-align: center;">Usia Dini</th>
                                        <th colspan="3" style="text-align: center;">Remaja</th>
                                        <th colspan="3" style="text-align: center;">Dewasa</th>
                                        <th colspan="3" style="text-align: center;">Lansia</th>
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
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                                $data = mysqli_query($koneksi, "SELECT * FROM usia ORDER BY rw ASC, rt ASC");
                                $no = 1;

                                if (mysqli_num_rows($data) > 0) {
                                    while ($d = mysqli_fetch_array($data)) {
                                        $rw = $d['rw'];
                                        $rt = $d['rt'];
                                        $total_warga = $d['total_warga'];
                                        $balita_lk = $d['balita_lk']; // Data laki-laki
                                        $balita_pr = $d['balita_pr']; // Data perempuan
                                        $usia_dini_lk = $d['ud_lk'];
                                        $usia_dini_pr = $d['ud_pr'];
                                        $remaja_lk = $d['remaja_lk'];
                                        $remaja_pr = $d['remaja_pr'];
                                        $dewasa_lk = $d['dewasa_lk'];
                                        $dewasa_pr = $d['dewasa_pr'];
                                        $lansia_lk = $d['lansia_lk'];
                                        $lansia_pr = $d['lansia_pr'];

                                        // Calculate percentages
                                        $persentase_balita = ($total_warga > 0) ? (($balita_lk + $balita_pr) / $total_warga) * 100 : 0;
                                        $persentase_usia_dini = ($total_warga > 0) ? (($usia_dini_lk + $usia_dini_pr) / $total_warga) * 100 : 0;
                                        $persentase_remaja = ($total_warga > 0) ? (($remaja_lk + $remaja_pr) / $total_warga) * 100 : 0;
                                        $persentase_dewasa = ($total_warga > 0) ? (($dewasa_lk + $dewasa_pr) / $total_warga) * 100 : 0;
                                        $persentase_lansia = ($total_warga > 0) ? (($lansia_lk + $lansia_pr) / $total_warga) * 100 : 0;
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $rw; ?></td>
                                            <td><?php echo $rt; ?></td>
                                            <td><?php echo $total_warga; ?></td>
                                            <td><?php echo number_format($persentase_balita + $persentase_usia_dini + $persentase_remaja + $persentase_dewasa + $persentase_lansia, 2) . "%"; ?></td>
                                            <td><?php echo $balita_lk; ?></td>
                                            <td><?php echo $balita_pr; ?></td>
                                            <td><?php echo number_format($persentase_balita, 2) . "%"; ?></td>
                                            <td><?php echo $usia_dini_lk; ?></td>
                                            <td><?php echo $usia_dini_pr; ?></td>
                                            <td><?php echo number_format($persentase_usia_dini, 2) . "%"; ?></td>
                                            <td><?php echo $remaja_lk; ?></td>
                                            <td><?php echo $remaja_pr; ?></td>
                                            <td><?php echo number_format($persentase_remaja, 2) . "%"; ?></td>
                                            <td><?php echo $dewasa_lk; ?></td>
                                            <td><?php echo $dewasa_pr; ?></td>
                                            <td><?php echo number_format($persentase_dewasa, 2) . "%"; ?></td>
                                            <td><?php echo $lansia_lk; ?></td>
                                            <td><?php echo $lansia_pr; ?></td>
                                            <td><?php echo number_format($persentase_lansia, 2) . "%"; ?></td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="21">Tidak ada data terbaru</td>
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
            return false; // Mencegah pengalihan ke usia_tambah.php
        <?php endif; ?>
        return true; // Lanjutkan ke usia_tambah.php
    }
</script>

<?php include 'footer.php'; ?>
