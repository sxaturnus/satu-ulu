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
						<h4 class="panel-title">Data Formulir</h4>
						<div class="heading-elements">
							<a href="formulir_upload.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH FORMULIR</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped">
								<thead>
									<tr>
										<th width="1%">NO</th>
                    <th width="15%">KETERANGAN</th>
										<th width="15%">FILE</th>
										<th width="2%">OPSI</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($koneksi,"select * from formulir");		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
                      <td><?php echo $d['keterangan'] ?></td>
											<td><?php echo $d['file_path'] ?></td>		
											<td>
												<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="formulir_hapus.php?id=<?php echo $d['id_formulir'];?>"  onclick="return confirm('Apakah Anda yakin ingin menghapus formulir ini?');"><i class="icon-trash-alt"></i></a>
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