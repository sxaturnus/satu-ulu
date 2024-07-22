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
						<h4 class="panel-title">Data Penerima Bantuan Sosial</h4>
						<div class="heading-elements">
							<a href="bansos_print.php" target="_blank" class="btn btn-sm btn-primary"><i class="icon-file-empty"></i> CETAK</a>
              <a href="bansos_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped table-datatable">
							<thead>
								<tr>
									<th width="1%">NO</th>
									<th width="15%">NAMA WARGA</th>
									<th width="15%">ALAMAT</th>
                  <th>JENIS BANTUAN</th>
									<th>PEKERJAAN</th>		
									<th>STATUS</th>
                  <th>OPSI</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$no = 1; 
							$data = mysqli_query($koneksi,"select * from bansos");		
							while($d=mysqli_fetch_array($data)){
								?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $d['nama_penerima'] ?></td>
									<td><?php echo $d['alamat_penerima'] ?></td>
                  <td><?php echo $d['jenis_bantuan'] ?></td>
									<td><?php echo $d['pekerjaan_penerima'] ?></td>			
									<td><?php echo $d['status_penerima'] ?></td>													
									<td>									
										<a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="bansos_edit.php?id=<?php echo $d['id_bansos'];?>"><i class="icon-wrench3"></i></a>
										<a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="bansos_hapus.php?id=<?php echo $d['id_bansos'];?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');"><i class="icon-trash-alt"></i></a>
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