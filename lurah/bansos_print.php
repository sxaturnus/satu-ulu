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
	<h3>Data Penerima Bantuan Sosial Kelurahan 1 Ulu</h3>
</center>
<table>
	<thead>
		<tr>
			<th width="1%">NO</th>
			<th width="20%">NAMA WARGA</th>
			<th width="35%">ALAMAT</th>
			<th>JENIS BANTUAN</th>		
			<th>PEKERJAAN</th>
			<th>STATUS</th>														
		</tr>
	</thead>
	<tbody>
		<?php
		include '../koneksi.php';
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