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
	<h3>Data Warga Kelurahan Satu Ulu</h3>
</center>
<table>
	<thead>
		<tr>
			<th width="1%">NO</th>
			<th width="15%">NIK</th>
      <th width="15%">NAMA</th>
      <th>TEMPAT/TGL LAHIR</th>
      <th>JENIS KELAMIN</th>      
      <th>ALAMAT</th>    
      <th>AGAMA</th>    
      <th>TELP</th>
      <th>EMAIL</th>														
		</tr>
	</thead>
	<tbody>
		<?php
		include '../koneksi.php';
		$no = 1; 
		$data = mysqli_query($koneksi,"SELECT * FROM auth WHERE role='Warga'");		
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