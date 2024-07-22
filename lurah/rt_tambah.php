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
                        <h4 class="panel-title">Tambah Data RT Baru</h4>
                        <div class="heading-elements">
                            <a href="rt.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <form action="rt_act.php" method="post" id="form-tambah-rt" onsubmit="return validateForm()">
                                <table class="table">
                                    <tr>
                                        <th width="30%">NIK</th>                                        
                                        <td>
                                            <input class="form-control" type="number" name="nik" id="nik" required="required">
                                            <span id="nik_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>NAMA</th>                                        
                                        <td>
                                            <input class="form-control" type="text" name="nama" id="nama" required="required">
                                            <span id="nama_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>TEMPAT LAHIR</th>                                        
                                        <td>
                                            <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" required="required">
                                            <span id="tempat_lahir_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>TANGGAL LAHIR</th>                                        
                                        <td>
                                            <input class="form-control" type="date" name="tgl_lahir" id="tgl_lahir" required="required">
                                            <span id="tgl_lahir_error" class="text-danger"></span>
                                        </td>
                                    </tr>                                                                
                                    <tr>
                                        <th>JENIS KELAMIN</th>
                                        <td>
                                            <select name="gender" class="form-control" required="required">
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <span id="gender_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>ALAMAT</th>
                                        <td>
                                            <input class="form-control" type="text" name="alamat" id="alamat" required="required">
                                            <span id="alamat_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>AGAMA</th>
                                        <td>
                                            <select name="agama" class="form-control" required="required">
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen Katolik">Kristen Katolik</option>
                                                <option value="Kristen Protestan">Kristen Protestan</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Khonghucu">Khonghucu</option>
                                            </select>
                                            <span id="agama_error" class="text-danger"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>NO TELP</th>
                                        <td>
                                            <input class="form-control" type="text" name="telp" id="telp" required="required">
                                            <span id="telp_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th>EMAIL</th>
                                        <td>
                                            <input class="form-control" type="email" name="email" id="email" required="required">
                                            <span id="email_error" class="text-danger"></span>
                                        </td>
                                    </tr>                                
                                    <tr>
                                        <th>PASSWORD</th>
                                        <td>
                                            <input class="form-control" type="password" name="password" id="password" required="required">
                                            <span id="password_error" class="text-danger"></span>
                                        </td>
                                    </tr>    
                                    <tr>
                                        <th></th>
                                        <td><input type="submit" value="SIMPAN" class="btn btn-sm btn-primary"></td>
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

<!-- Modal Error -->
<div id="errorModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Error</h4>
            </div>
            <div class="modal-body">
                <p>Jabatan sudah terisi. Silakan pilih jabatan lain.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Include jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- JavaScript untuk menangani validasi form dan modal -->
<script>
$(document).ready(function() {
    $('#form-tambah-rt').submit(function(e) {
        e.preventDefault(); // Mencegah form submit default

        // Ambil data dari form
        const formData = $(this).serialize();

        // Validasi form
        if (validateForm()) {
            // Kirim data ke rt_act.php menggunakan AJAX
            $.ajax({
                type: 'POST',
                url: 'rt_act.php',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        // Tampilkan modal sukses
                        $('#successModal').modal('show');
                    } else if (response.status === 'role_exists') {
                        // Tampilkan modal error
                        $('#errorModal').modal('show');
                    } else {
                        // Tampilkan pesan error dalam bentuk alert
                        alert('Terjadi kesalahan: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Tampilkan pesan error dalam bentuk alert
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        }
    });
});

function validateForm() {
    let isValid = true;
    
    // Validasi NIK
    const nik = document.getElementById("nik").value;
    const nikError = document.getElementById("nik_error");
    
    if (!/^\d{16}$/.test(nik)) {
        nikError.textContent = "NIK harus berisi 16 digit angka.";
        isValid = false;
    } else {
        nikError.textContent = "";
    }

    return isValid;
}


function redirectToRT() {
    window.location.href = "rt.php";
}
</script>

<!-- Modal Success -->
<div id="successModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Informasi</h4>
            </div>
            <div class="modal-body">
                <p>Data berhasil ditambahkan</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="redirectToRT()">Tutup</button>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
