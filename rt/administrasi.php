<?php 
include 'header.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Memeriksa apakah data RT ada dalam sesi
if (!isset($_SESSION['rt'])) {
    echo "Kesalahan: Data RT tidak ditemukan dalam sesi.";
    exit();
}

// Mengambil data RT dari sesi
$rt = $_SESSION['rt'];
?>

<!-- Main content -->
<div class="content-wrapper">
    <!-- Content area -->
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-flat">
                    <div class="panel-heading">
                        <h4 class="panel-title">Data Permohonan Administrasi Warga</h4>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped table-datatable">
                                <thead>
                                    <tr>
                                        <th width="1%" rowspan="2">NO</th>
                                        <th rowspan="2" class="text-center">DATA WARGA</th>
                                        <th rowspan="2" class="text-center">KETERANGAN</th>
                                        <th rowspan="2" class="text-center">LAMPIRAN</th>
                                        <th colspan="2" class="text-center">STATUS PERMOHONAN</th>
                                        <th width="10%" rowspan="2" class="text-center">OPSI</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">TANGGAPAN</th>
                                        <th class="text-center">UPDATE LAMPIRAN</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1; 
                                $data = mysqli_query($koneksi, "SELECT * FROM administrasi JOIN auth ON administrasi.nik = auth.nik WHERE auth.rt = '$rt'");       
                                
                                // Debug: Periksa kueri
                                if (!$data) {
                                    die('Query Error: ' . mysqli_error($koneksi));
                                }

                                while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td>
                                            <b>NIK : </b><?php echo $d['nik'] ?>
                                            <br>
                                            <b>NAMA : </b><?php echo $d['nama'] ?>
                                            <br>
                                            <b>ALAMAT : </b><?php echo $d['alamat'] ?>
                                            <br>
                                            <b>TELP : </b><?php echo $d['telp'] ?>
                                        </td>
                                        <td><?php echo $d['keterangan'] ?></td>
                                        <td class="text-center">
                                            <?php if (!empty($d['file_path'])) : ?>
                                                <a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="lampiran_unduh.php?id_administrasi=<?php echo $d['id_administrasi']; ?>" target="_blank"><span>Unduh Lampiran</span></a>
                                            <?php else : ?>
                                                <button type="button" class="btn border-teal text-teal btn-flat btn-icon btn-xs" data-toggle="modal" data-target="#noFileModal"><span>Unduh Lampiran</span></button>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if (!empty($d['tanggapan'])) : ?>
                                                <?php echo $d['tanggapan'] ?>
                                            <?php else : ?>
                                                <span class="text-muted">Belum ada tanggapan</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if (!empty($d['file_reply'])) : ?>
                                                <a class="btn border-primary text-primary btn-flat btn-icon btn-xs" href="lampiran_preview.php?id_administrasi=<?php echo $d['id_administrasi']; ?>" target="_blank"><span>Lihat Lampiran</span></a>
                                            <?php else : ?>
                                                <button type="button" class="btn border-primary text-primary btn-flat btn-icon btn-xs" data-toggle="modal" data-target="#noFileModal"><span>Lihat Lampiran</span></button>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">                                      
                                            <a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="administrasi_edit.php?id=<?php echo $d['id_administrasi'];?>"><i class="icon-wrench3"></i></a>
                                            <a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="administrasi_hapus.php?id=<?php echo $d['id_administrasi']; ?>" onclick="return confirm('Anda yakin ingin menghapus data ini?');"><i class="icon-trash-alt"></i></a>
                                        </td>
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

        <div class="footer text-muted"></div>
    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Modal Notifikasi -->
<div class="modal fade" id="noFileModal" tabindex="-1" role="dialog" aria-labelledby="noFileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="noFileModalLabel">Notifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tidak ada lampiran yang tersedia untuk ditampilkan atau diunduh.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
