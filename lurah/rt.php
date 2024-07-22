<?php include 'header.php'; ?>
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
						<h4 class="panel-title">Data RT</h4>
						<div class="heading-elements">
							<a href="rt_cetak.php" target="_blank" class="btn btn-sm btn-primary"><i class="icon-file-empty"></i> CETAK</a>
							<a href="rt_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH</a>
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
							$data = mysqli_query($koneksi,"SELECT * FROM auth WHERE role='RT'");		
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
										<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="rt_edit.php?id=<?php echo $d['id_auth'];?>"><i class="icon-wrench3"></i></a>
										<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="rt_hapus.php?id=<?php echo $d['id_auth'];?>"><i class="icon-trash-alt" onclick="return confirm('Yakin ingin menghapus data ini?')"></i></a>
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