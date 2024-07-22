<?php include 'header.php'; ?>
<div class="content-wrapper">

    <div class="content">

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">

                <div class="row">

                    <div class="col-lg-12">
                        <div class="alert alert-info text-center">ANDA LOGIN SEBAGAI <b>LURAH</b></div>
                    </div>

                    <div class="col-lg-3">
                        <div class="panel bg-blue">
                            <div class="panel-body">
                                <?php $user = mysqli_query($koneksi, "select * from auth"); ?>
                                <h3 class="no-margin"><?php echo mysqli_num_rows($user) . " Pengguna"; ?></h3>
                                Jumlah Akun Terdaftar
                            </div>
                            <div class="container-fluid">
                                <div id="members-online"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="panel bg-blue">
                            <div class="panel-body">
                                <?php $berkas = mysqli_query($koneksi, "select * from formulir"); ?>
                                <h3 class="no-margin"><?php echo mysqli_num_rows($berkas) . " Berkas"; ?></h3>
                                Jumlah Berkas Kependudukan
                            </div>
                            <div class="container-fluid">
                                <div id="members-online"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="panel bg-blue">
                            <div class="panel-body">
                                <?php $pengaduan = mysqli_query($koneksi, "select * from pengaduan"); ?>
                                <h3 class="no-margin"><?php echo mysqli_num_rows($pengaduan) . " Pengaduan"; ?></h3>
                                Jumlah Pengaduan Warga
                            </div>
                            <div id="server-load"></div>
                        </div>

                    </div>

                    <div class="col-lg-3">
                        <div class="panel bg-blue">
                            <div class="panel-body">
                                <?php $bansos = mysqli_query($koneksi, "select * from bansos"); ?>
                                <h3 class="no-margin"><?php echo mysqli_num_rows($bansos) . " Bansos"; ?></h3>
                                Jumlah Penerima Bansos
                            </div>
                            <div id="today-revenue"></div>
                        </div>
                    </div>

                </div>

                <div class="panel panel-flat">

                    <div class="panel-body">
                        <h4>Laporan Terbaru Dari Warga</h4>
                        <center>
                            <br/>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th width="1%">NO</th>
                                            <th>WAKTU PELAPORAN</th>
                                            <th>NIK WARGA</th>
                                            <th width="15%">NAMA WARGA</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>ALAMAT</th>
                                            <th>NO TELP</th>
                                            <th>EMAIL</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = mysqli_query($koneksi, "select * from pengaduan,auth where pengaduan.nik=auth.nik order by pengaduan.waktu_lapor desc limit 5");
                                        if (mysqli_num_rows($data) > 0) {
                                            while ($d = mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $no++; ?></td>
                                                    <td><?php echo date('H:s | d-m-Y', strtotime($d['waktu_lapor'])) ?></td>
                                                    <td><?php echo $d['nik'] ?></td>
                                                    <td><?php echo $d['nama'] ?></td>
                                                    <td><?php echo $d['gender'] ?></td>
                                                    <td><?php echo $d['alamat'] ?></td>
                                                    <td><?php echo $d['telp'] ?></td>
                                                    <td><?php echo $d['email'] ?></td>
                                                    <td>
                                                        <center>
                                                            <?php
                                                            if ($d['status_pengaduan'] == "0") {
                                                                echo "<span class='badge badge-danger'>Sedang Diproses</span>";
                                                            } else {
                                                                echo "<span class='badge badge-success'>Terselesaikan</span>";
                                                            }
                                                            ?>
                                                        </center>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "<tr><td colspan='9' class='text-center'>Tidak ada laporan terbaru</td></tr>";
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

        <div class="footer text-muted">

        </div>

    </div>

</div>

<?php include 'footer.php'; ?>
