<?php include 'header.php'; ?>

<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content">

        <!-- Main charts -->
        <div class="row">

            <div class="col-lg-6 col-lg-offset-3">
                <!-- Traffic sources -->
                <div class="panel panel-flat">
                    <div class="panel-heading">                        
                        <h4 class="panel-title">Tulis Pengumuman Baru</h4>
                        <div class="heading-elements">
                            <a href="pengumuman.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="pengumuman_act.php" method="post">
                                <table class="table">
                                    <tr>
                                        <th width="20%">Isi Pengumuman</th>
                                        <td>
                                            <textarea style="width: 100%; height: 200px; box-sizing: border-box; resize: vertical;" name="isi_pengumuman"></textarea>
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <th></th>
                                        <td><input type="submit" value="SIMPAN" class="btn btn-primary btn-sm"></td>
                                    </tr>        
                                </table>
                            </form>
                        </div>                    
                    </div>                    
                </div>    
            </div>
        </div>        

        <div class="footer text-muted">
            <!-- &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a> -->
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Modal untuk menampilkan pesan sukses -->
<div id="successModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Sukses</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Pengumuman berhasil dibuat.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan jQuery dan Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    // Cek apakah ada parameter 'success' di URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        // Tampilkan modal
        $('#successModal').modal('show');

        // Redirect ke pengumuman.php setelah modal ditutup
        $('#successModal').on('hidden.bs.modal', function () {
            window.location.href = 'pengumuman.php';
        });
    }
});
</script>
