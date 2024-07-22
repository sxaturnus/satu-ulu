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
                        <h4 class="panel-title">Ganti Password</h4>
                        <div class="heading-elements">
                            <a href="index.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form id="passwordForm" action="gantipassword_act.php" method="post">
                                <input type="hidden" name="id_auth" value="<?php echo $_SESSION['id_auth']; ?>">
                                <table class="table">
                                    <tr>
                                        <th width="40%">Masukkan Password Baru</th>
                                        <td>
                                            <input type="password" id="pass" class="form-control" name="pass">
                                            <span id="passError" class="text-danger"></span>
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

    // Check if password is empty
    if (pass === '') {
        passError.textContent = 'Harap input password baru.';
        valid = false;
    } else {
        // Check password length
        if (pass.length < 8) {
            passError.textContent = 'Password harus minimal 8 karakter.';
            valid = false;
        }
        // Check for uppercase letter
        if (!/[A-Z]/.test(pass)) {
            passError.textContent = 'Password harus mengandung huruf besar.';
            valid = false;
        }
        // Check for lowercase letter
        if (!/[a-z]/.test(pass)) {
            passError.textContent = 'Password harus mengandung huruf kecil.';
            valid = false;
        }
        // Check for number
        if (!/[0-9]/.test(pass)) {
            passError.textContent = 'Password harus mengandung angka.';
            valid = false;
        }
    }

    // Prevent form submission if invalid
    if (!valid) {
        event.preventDefault();
    }
});
</script>
