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
						<h4 class="panel-title">Tambah Data Rumah & Bangunan</h4>
						<div class="heading-elements">
							<a href="rumah.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="rumah_act.php" method="post" id="form-tambah-rumah" onsubmit="return validateForm()">
								<table class="table">
									<tr>
										<th width="30%">JUMLAH BANGUNAN</th>										
										<td>
											<input class="form-control" type="number" name="jumlah_rumah" id="jumlah_rumah">
											<span id="jumlah_rumah_error" class="text-danger"></span>
										</td>
									</tr>	
									<tr>
										<th>RUMAH TINGGAL</th>
										<td>
											<input class="form-control" type="number" name="rumah_tinggal" id="rumah_tinggal">
											<span id="rumah_tinggal_error" class="text-danger"></span>
										</td>
									</tr>	
									<tr>
										<th>RUMAH USAHA</th>
										<td>
											<input class="form-control" type="number" name="rumah_usaha" id="rumah_usaha">
											<span id="rumah_usaha_error" class="text-danger"></span>
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

<!-- Modal -->
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
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="redirectToRumah()">Tutup</button>
			</div>
		</div>
	</div>
</div>

<script>
	function showModal() {
		$('#successModal').modal('show');
	}

	function redirectToRumah() {
		window.location.href = "rumah.php";
	}

	<?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
		showModal();
	<?php endif; ?>

	function validateForm() {
		let isValid = true;

		// Clear previous errors
		document.getElementById('jumlah_rumah_error').innerText = "";
		document.getElementById('rumah_tinggal_error').innerText = "";
		document.getElementById('rumah_usaha_error').innerText = "";

		// Validate fields
		const jumlah_rumah = parseInt(document.getElementById('jumlah_rumah').value);
		const rumah_tinggal = parseInt(document.getElementById('rumah_tinggal').value);
		const rumah_usaha = parseInt(document.getElementById('rumah_usaha').value);

		if (isNaN(jumlah_rumah) || jumlah_rumah <= 0) {
			document.getElementById('jumlah_rumah_error').innerText = "Jumlah rumah harus lebih dari 0.";
			isValid = false;
		}
		if (isNaN(rumah_tinggal) || rumah_tinggal < 0) {
			document.getElementById('rumah_tinggal_error').innerText = "Jumlah rumah tinggal tidak valid.";
			isValid = false;
		}
		if (isNaN(rumah_usaha) || rumah_usaha < 0) {
			document.getElementById('rumah_usaha_error').innerText = "Jumlah rumah usaha tidak valid.";
			isValid = false;
		}
		if (rumah_tinggal + rumah_usaha > jumlah_rumah) {
			document.getElementById('jumlah_rumah_error').innerText = "Jumlah rumah tinggal dan rumah usaha tidak boleh melebihi jumlah rumah.";
			isValid = false;
		}

		return isValid;
	}
</script>

<script>
	<?php if(isset($_GET['status']) && $_GET['status'] == 'error'): ?>
		document.getElementById('jumlah_rumah_error').innerText = "Terjadi kesalahan saat menyimpan data.";
	<?php endif; ?>
</script>

<?php include 'footer.php'; ?>
