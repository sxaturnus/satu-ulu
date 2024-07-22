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
                        <h4 class="panel-title">Upload Formulir</h4>
                        <div class="heading-elements">
                            <a href="formulir.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="formulir_act.php" method="post" enctype="multipart/form-data">
                                <table class="table">
                                    <tr>
                                        <th width="20%">Keterangan</th>
                                        <td>
                                            <input type="text" class="form-control" name="keterangan" required="required">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Formulir<br/><small>Yang tersimpan hanya file yang berekstensi .pdf</small></th>
                                        <td><input type="file" name="file" required="required"></td>
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

<!-- Modal Notifikasi -->
<?php if(isset($_GET['error']) || isset($_GET['upload'])): ?>
<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificationModalLabel">Notifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php 
                if(isset($_GET['error'])) {
                    echo htmlspecialchars($_GET['error']);
                } elseif(isset($_GET['upload'])) {
                    echo "File berhasil diunggah.";
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<script>
$(document).ready(function(){
    <?php if(isset($_GET['error']) || isset($_GET['upload'])): ?>
        $('#notificationModal').modal('show');
    <?php endif; ?>
});
</script>
