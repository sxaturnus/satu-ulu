<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
	table {
		border-collapse: collapse;
		width: 100%;
	}

	table, th, td {
		border: 1px solid black;
		font-size: 11pt;
		text-align: center;
	}
</style>
<center>
	<h3>Data Pengaduan WARGA KELURAHAN SATU ULU</h3>
</center>
<table>
	<thead>
		<tr>
			<th width="1%">NO</th>
			<th>WAKTU PELAPORAN</th>		
			<th>NIK</th>		
			<th width="15%">NAMA WARGA</th>
			<th>JENIS KELAMIN</th>		
			<th>ALAMAT</th>
			<th>EMAIL</th>		
			<th>TELP</th>		
			<th>STATUS</th>																						
		</tr>
	</thead>
	<tbody>
		<?php
		include '../koneksi.php';
		$no = 1; 
		$data = mysqli_query($koneksi,"select * from pengaduan,auth where pengaduan.nik=auth.nik");		
		while($d=mysqli_fetch_array($data)){
			?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo date('H:s | d-m-Y', strtotime($d['waktu_lapor'])) ?></td>			
				<td><?php echo $d['nik'] ?></td>
				<td><?php echo $d['nama'] ?></td>
				<td><?php echo $d['gender'] ?></td>			
				<td><?php echo $d['alamat'] ?></td>
				<td><?php echo $d['email'] ?></td>			
				<td><?php echo $d['telp'] ?></td>			
				<td>
					<?php 
					if($d['status_pengaduan'] == "0"){
						echo "Sedang Diproses";
					}else{
						echo "Terselesaikan";
					}
					?>
				</td>												
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>