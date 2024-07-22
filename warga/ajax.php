<?php 
	include '../koneksi.php';
	$data = $_POST['data'];

	if($data!=""){	
		$cek = mysqli_query($koneksi,"select * from auth where nik='$data'");
		if(mysqli_num_rows($cek) > 0){
			while($d = mysqli_fetch_array($cek)){
				?>
				<table class="table table-bordered">
					<tr>
						<th width="30%">Nama Warga</th>
						<th width="1px">:</th>
						<td><?php echo $d['nama'] ?></td>
					</tr>
					<tr>
						<th width="30%">Jenis Kelamin</th>
						<th width="1px">:</th>
						<td><?php echo $d['gender'] ?></td>
					</tr>
					<tr>
						<th width="30%">Alamat</th>
						<th width="1px">:</th>
						<td><?php echo $d['alamat'] ?></td>
					</tr>
          <tr>
						<th width="30%">EMAIL</th>
						<th width="1px">:</th>
						<td><?php echo $d['email'] ?></td>
					</tr>
					<tr>
						<th width="30%">HP</th>
						<th width="1px">:</th>
						<td><?php echo $d['telp'] ?></td>
					</tr>
				</table>
				<?php
			}
		}else{
			echo "0";
		}
	}
?>
