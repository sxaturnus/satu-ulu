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
                        <h4 class="panel-title">Reset Password Warga</h4>
                        <div class="heading-elements">
                            <a href="warga.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form id="passwordForm" action="warga_update.php" method="post">
                                <table class="table">
                                    <tr>
                                        <th width="20%">Masukkan Password Baru</th>
                                        <td>
                                            <?php 
                                                if (isset($_GET['id'])){
                                                    $id_auth = $_GET['id'];
                                                }else{
                                                    echo "ID Tidak Ditemukan!";
                                                    exit;
                                                }
                                            ?>
                                            <input type="hidden" class="form-control" name="id_auth" value="<?php echo htmlspecialchars($id_auth); ?>">
                                            <input type="password" id="pass" class="form-control" name="pass">
                                            <span id="passError" class="text-danger"></span> <!-- Tempat untuk pesan kesalahan -->
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

<script>
document.getElementById('passwordForm').addEventListener('submit', function(event) {
    const pass = document.getElementById('pass').value;
    const passError = document.getElementById('passError');
    let valid = true;

    // Clear previous error message
    passError.textContent = '';

    // Check if password meets requirements
    if (pass.length < 8) {
        passError.textContent = 'Password harus minimal 8 karakter.';
        valid = false;
    } else if (!/[A-Z]/.test(pass)) {
        passError.textContent = 'Password harus mengandung huruf besar.';
        valid = false;
    } else if (!/[a-z]/.test(pass)) {
        passError.textContent = 'Password harus mengandung huruf kecil.';
        valid = false;
    } else if (!/[0-9]/.test(pass)) {
        passError.textContent = 'Password harus mengandung angka.';
        valid = false;
    }

    // Prevent form submission if invalid
    if (!valid) {
        event.preventDefault();
    }
});
</script>
