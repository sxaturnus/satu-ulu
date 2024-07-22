<?php  include 'header.php'; ?>
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
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM rumah ORDER BY rw ASC, rt ASC");
                            if (mysqli_num_rows($data) > 0) {
                                echo '<a href="rumah_cetak.php" target="_blank" class="btn btn-sm btn-primary"><i class="icon-file-empty"></i> CETAK</a>';
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
                                        <th colspan="2" style="text-align: center;">Jumlah Rumah</th>
                                        <th colspan="2" style="text-align: center;">Rumah Sebagai Tempat Tinggal</th>
                                        <th colspan="2" style="text-align: center;">Rumah Sebagai Tempat Usaha</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $koneksi = mysqli_connect("localhost", "root", "", "satu_ulu");
                                $data = mysqli_query($koneksi, "SELECT * FROM rumah ORDER BY rw ASC, rt ASC");
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

<?php include 'footer.php'; ?>
