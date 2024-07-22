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
						<h4 class="panel-title">Update Data Pengaduan</h4>
						<div class="heading-elements">
							<a href="pengaduan.php" class="btn btn-sm btn-primary"><i class="icon-arrow-left12"></i> KEMBALI</a>
						</div>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<form action="pengaduan_update.php" method="post">

								<?php 
								$id = $_GET['id'];
								$data = mysqli_query($koneksi,"select * from pengaduan,auth where pengaduan.nik=auth.nik and pengaduan.id_pengaduan='$id'");
								while($d=mysqli_fetch_array($data)){
									?>
									<table class="table">
										<tr>
											<th>WAKTU PENGADUAN</th>
											<td><?php echo date('H:s | d-m-Y', strtotime($d['waktu_lapor'])) ?></td>
										</tr>
										<tr>
											<th width="20%">NAMA</th>										
											<td><?php echo $d['nama']; ?></td>
										</tr>																	
										<tr>
											<th>JENIS KELAMIN</th>
											<td><?php echo $d['gender']; ?></td>											
										</tr>	
										<tr>
											<th>ALAMAT</th>
											<td><?php echo $d['alamat']; ?></td>
										</tr>	
										<tr>
											<th>NO TELP</th>
											<td><?php echo $d['telp']; ?></td>
										</tr>	
                    <tr>
                      <th>EMAIL : </th>
                      <td><?php echo $d['email'] ?></td>
                    </tr>
										<tr>
											<th>ISI PENGADUAN</th>
											<th><?php echo $d['isi_pengaduan']; ?></th>
										</tr>
										<tr>
											<th>STATUS PENGADUAN</th>
											<th>
												<input type="hidden" name="id" value="<?php echo $d['id_pengaduan']; ?>">
												<select class="form-control" name="status">													
													<option <?php if($d['status_pengaduan'] == "0"){echo "selected='selected'";} ?> value="0">Sedang Diproses</option>
													<option <?php if($d['status_pengaduan'] == "1"){echo "selected='selected'";} ?> value="1">Terselesaikan</option>
												</select>												
											</th>
										</tr>
										<tr>
											<th></th>
											<td><input type="submit" value="SIMPAN" class="btn btn-sm btn-primary"></td>
										</tr>		
									</table>
									<?php } ?>

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