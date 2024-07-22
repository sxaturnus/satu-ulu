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
						<h4 class="panel-title">Dashboard Pengumuman</h4>
						<div class="heading-elements">
							<a href="pengumuman_create.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TULIS PENGUMUMAN</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered table-hover table-striped">
								<thead>
									<tr>
										<th width="1%">NO</th>
                    <th width="15%">TANGGAL</th>
										<th width="15%">PENGUMUMAN</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1; 
									$data = mysqli_query($koneksi,"select * from pengumuman");		
									while($d=mysqli_fetch_array($data)){
										?>
										<tr>
											<td><?php echo $no++; ?></td>
                      <td><?php echo $d['pengumuman_tanggal'] ?></td>
											<td><?php echo $d['isi_pengumuman'] ?></td>	
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