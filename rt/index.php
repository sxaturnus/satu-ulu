<?php include 'header.php'; ?>
<div class="content-wrapper">

    <div class="content">

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">

                <div class="row">

                    <div class="col-lg-12">
                        <div class="alert alert-info text-center">ANDA LOGIN SEBAGAI <b>RT</b></div>
                    </div>

                    <div class="col-lg-3">
                        <div class="panel bg-blue">
                            <div class="panel-body">
                                <?php 
                                // Mengambil nilai RT dari session
                                $rt = $_SESSION['rt'];
                                $user = mysqli_query($koneksi, "SELECT * FROM auth"); 
                                ?>
                                <h3 class="no-margin"><?php echo mysqli_num_rows($user) . " Pengguna"; ?></h3>
                                Jumlah Akun Terdaftar
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="panel bg-blue">
                            <div class="panel-body">
                                <?php 
                                // Menghitung jumlah berkas permohonan sesuai RT
                                $administrasi = mysqli_query($koneksi, "SELECT * FROM administrasi JOIN auth ON administrasi.nik = auth.nik WHERE auth.rt = '$rt'");
                                ?>
                                <h3 class="no-margin"><?php echo mysqli_num_rows($administrasi) . " Berkas"; ?></h3>
                                Jumlah Berkas Permohonan Warga
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="panel bg-blue">
                            <div class="panel-body">
                                <?php $warga = mysqli_query($koneksi, "SELECT * FROM warga"); ?>
                                <h3 class="no-margin"><?php echo mysqli_num_rows($warga) . " Orang"; ?></h3>
                                Jumlah Statistik Warga
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="panel bg-blue">
                            <div class="panel-body">									
                                <?php $pengumuman = mysqli_query($koneksi, "SELECT * FROM pengumuman"); ?>
                                <h3 class="no-margin"><?php echo mysqli_num_rows($pengumuman) . " Pengumuman Tercatat"; ?></h3>
                                Jumlah Pengumuman Tercatat								
                            </div>
                        </div>
                    </div>

                </div>

                <div class="panel panel-flat">					

                    <div class="panel-body">
                        <h4>Data Permohonan Administrasi Terbaru</h4>
                        <center>
                            <br/>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th width="1%">No</th>
                                            <th>DATA WARGA</th>		
                                            <th>KETERANGAN</th>																													
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Query untuk mengambil permohonan berdasarkan RT
                                        $query = "SELECT * FROM administrasi JOIN auth ON administrasi.nik = auth.nik WHERE auth.rt = '$rt' ORDER BY id_administrasi DESC LIMIT 5";
                                        $result = mysqli_query($koneksi, $query);

                                        // Periksa apakah ada permohonan yang tersedia
                                        if (mysqli_num_rows($result) > 0) {
                                            $no = 1;
                                            while ($d = mysqli_fetch_array($result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td>
                                                        <b>NIK : </b><?php echo $d['nik']; ?>
                                                        <br>
                                                        <b>NAMA : </b><?php echo $d['nama']; ?>
                                                        <br>
                                                        <b>ALAMAT : </b><?php echo $d['alamat']; ?>
                                                        <br>
                                                        <b>TELP : </b><?php echo $d['telp']; ?>
                                                    </td>
                                                    <td><?php echo $d['keterangan']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            ?>
                                            <tr>
                                                <td colspan="3">Tidak ada permohonan yang tersedia saat ini.</td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>	
                            <br/>
                        </center>
                    </div>

                </div>

            </div>
        </div>

        <div class="footer text-muted"></div>

    </div>

</div>

<?php include 'footer.php'; ?>
