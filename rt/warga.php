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

		<!-- Main charts -->
		<div class="row">
			<div class="col-lg-12">
				<!-- Traffic sources -->
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h4 class="panel-title">Data warga</h4>
						<div class="heading-elements">
							<a href="warga_print.php" target="_blank" class="btn btn-sm btn-primary"><i class="icon-file-empty"></i> CETAK</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped table-datatable">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th width="10%">NIK</th>
									<th width="15%">NAMA</th>
									<th width="15%">TEMPAT/TGL LAHIR</th>
									<th>JENIS KELAMIN</th>		
									<th width="10%">ALAMAT</th>	
									<th>AGAMA</th>	
									<th>TELP</th>		
									<th>EMAIL</th>	
									<th width="10%">OPSI</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$no = 1; 
							$data = mysqli_query($koneksi,"SELECT * FROM auth WHERE role='Warga' AND rt='$rt'");		
							while($d=mysqli_fetch_array($data)){
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $d['nik'] ?></td>
									<td><?php echo $d['nama'] ?></td>		
									<td><?php echo $d['tempat_lahir'] . ', ' . $d['tgl_lahir'] ?></td>
									<td><?php echo $d['gender'] ?></td>			
									<td><?php echo $d['alamat'] ?></td>	
									<td><?php echo $d['agama'] ?></td>			
									<td><?php echo $d['telp'] ?></td>			
									<td><?php echo $d['email'] ?></td>													
									<td>									
										<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="warga_edit.php?id=<?php echo $d['id_auth'];?>"><i class="icon-wrench3"></i></a>
										<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="warga_hapus.php?id=<?php echo $d['id_auth'];?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="icon-trash-alt"></i></a>
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
	
		<div class="footer text-muted">
			
		</div>

	</div>
</div>

<?php include 'footer.php'; ?>