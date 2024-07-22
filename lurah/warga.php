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
                        <h4 class="panel-title">Data Warga</h4>
                        <div class="heading-elements">
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM auth WHERE role='Warga'");
                            if (mysqli_num_rows($data) > 0) {
                                echo '<a href="warga_print.php" target="_blank" class="btn btn-sm btn-primary"><i class="icon-file-empty"></i> CETAK</a>';
                            } else {
                                echo '<button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#noDataModal"><i class="icon-file-empty"></i> CETAK</button>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped table-datatable">
                                <thead>
                                    <tr>
                                        <th width="1%">NO</th>
                                        <th width="15%">NIK</th>
                                        <th width="15%">NAMA</th>
                                        <th>TEMPAT/TGL LAHIR</th>
                                        <th>JENIS KELAMIN</th>      
                                        <th>ALAMAT</th>    
                                        <th>AGAMA</th>    
                                        <th>TELP</th>
                                        <th>EMAIL</th>                                                                                
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1; 
                                if (mysqli_num_rows($data) > 0) {
                                    while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['nik'] ?></td>
                                            <td><?php echo $d['nama'] ?></td>
                                            <td><?php echo $d['tempat_lahir'] . ', ' . $d['tgl_lahir'] ?></td>
                                            <td><?php echo $d['gender'] ?></td>
                                            <td><?php echo $d['alamat'] ?></td>    
                                            <td><?php echo $d['agama'] ?></td>         
                                            <td><?php echo $d['telp'] ?></td>
                                            <td><?php echo $d['email'] ?></td>                                                                                    
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="10" class="text-center">Tidak ada data warga yang tersedia.</td>
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
                <p>Maaf tidak ada data warga untuk dicetak!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
