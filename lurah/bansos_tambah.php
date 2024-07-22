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
						<h4 class="panel-title">Tambah Penerima Bansos</h4>
						<div class="heading-elements">
							<a href="bansos.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="bansos_act.php" method="post" id="form-tambah-bansos" onsubmit="return validateForm()">
								<table class="table">
									<tr>
										<th width="30%">NAMA PENERIMA</th>										
										<td>
											<input class="form-control" type="text" name="nama_penerima" id="nama_penerima">
											<span id="nama_penerima_error" class="text-danger"></span>
										</td>
									</tr>	
									<tr>
										<th>ALAMAT</th>
										<td>
											<input class="form-control" type="text" name="alamat_penerima" id="alamat_penerima">
											<span id="alamat_penerima_error" class="text-danger"></span>
										</td>
									</tr>	
									<tr>
										<th>JENIS BANTUAN</th>
										<td>
											<input class="form-control" type="text" name="jenis_bantuan" id="jenis_bantuan">
											<span id="jenis_bantuan_error" class="text-danger"></span>
										</td>
									</tr>
									<tr>
										<th>PEKERJAAN</th>
										<td>
											<input class="form-control" type="text" name="pekerjaan_penerima" id="pekerjaan_penerima">
											<span id="pekerjaan_penerima_error" class="text-danger"></span>
										</td>
									</tr>	
									<tr>
										<th>STATUS</th>
										<td>
											<select name="status_penerima" id="status_penerima" class="form-control">
												<option value="">Pilih Status</option>
												<option value="Keluarga Tidak Mampu">Keluarga Tidak Mampu</option>
												<option value="Disabilitas">Penyandang Disabilitas</option>
												<option value="Korban Bencana">Korban Bencana</option>
												<option value="Anak Yatim">Anak Yatim</option>
												<option value="Lansia">Lansia</option>
											</select>
											<span id="status_penerima_error" class="text-danger"></span>
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
				<button type="button" class="btn btn-default" data-dismiss="modal" onclick="redirectToPetugas()">Tutup</button>
			</div>
		</div>
	</div>
</div>

<script>
	function showModal() {
		$('#successModal').modal('show');
	}

	function redirectToPetugas() {
		window.location.href = "bansos.php";
	}

	<?php if(isset($_GET['status']) && $_GET['status'] == 'success'): ?>
		showModal();
	<?php endif; ?>

	function validateForm() {
		let isValid = true;

		// Clear previous errors
		document.getElementById('nama_penerima_error').innerText = "";
		document.getElementById('alamat_penerima_error').innerText = "";
		document.getElementById('jenis_bantuan_error').innerText = "";
		document.getElementById('pekerjaan_penerima_error').innerText = "";
		document.getElementById('status_penerima_error').innerText = "";

		// Validate Empty Fields
		const fields = ['nama_penerima', 'alamat_penerima', 'jenis_bantuan', 'pekerjaan_penerima', 'status_penerima'];
		fields.forEach(field => {
			if (document.getElementById(field).value.trim() === "") {
				document.getElementById(field + '_error').innerText = "Harap input " + field.replace('_', ' ') + ".";
				isValid = false;
			}
		});

		return isValid;
	}
</script>

<script>
	<?php if(isset($_GET['status']) && $_GET['status'] == 'nama_exists'): ?>
		document.getElementById('nama_penerima_error').innerText = "Nama penerima sudah ada. Harap gunakan nama lain.";
	<?php endif; ?>
</script>

<?php include 'footer.php'; ?>
