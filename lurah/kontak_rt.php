<?php
  include '../koneksi.php';

  // Query untuk mengambil data dari tabel kontak_rt
  $query = "SELECT * FROM kontak_rt";
  $result = mysqli_query($koneksi, $query);

  if (!$result) {
      die("Query error: " . mysqli_error($koneksi));
  }
?>

<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard Admin - Kelurahan 1 Ulu Palembang</title>

	<!-- Favicons -->
  <link href="../assets/img/logo-fav.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../assets/admin/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="../assets/admin/css/core.css" rel="stylesheet" type="text/css">
	<link href="../assets/admin/css/components.css" rel="stylesheet" type="text/css">
	<link href="../assets/admin/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="../assets/admin/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="../assets/admin/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="../assets/admin/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="../assets/admin/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="../assets/admin/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<script type="text/javascript" src="../assets/admin/js/plugins/tables/datatables/datatables.min.js"></script>

	<!-- Theme JS files -->
	<script type="text/javascript" src="../assets/admin/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="../assets/admin/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="../assets/admin/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="../assets/admin/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="../assets/admin/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="../assets/admin/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="../assets/admin/js/plugins/pickers/daterangepicker.js"></script>

	<script type="text/javascript" src="../assets/admin/js/core/app.js"></script>
	<?php 
	include '../koneksi.php';
	session_start();
	if (!isset($_SESSION['id_auth'])) {
			header("location:../index.php");
			exit();
	}
	?>

	<?php include '../koneksi.php'; ?>
</head>
<body>
  <div class="bg-primary" style="padding: 20px;text-align: center;">
		<h1>
      <b>WEBSITE KELURAHAN SATU ULU</b>
      <br>
      KOTA PALEMBANG
    </h1>
	</div>

  <div class="navbar navbar-default" id="navbar-second">
		<ul class="nav navbar-nav no-border visible-xs-block">
			<li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second-toggle"><i class="icon-menu7"></i></a></li>
		</ul>

		<div class="navbar-collapse collapse" id="navbar-second-toggle">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php"><i class="icon-home4"></i> &nbsp; <span>DASHBOARD</span></a></li>                                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-cloud position-left"></i> WEBSITE <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu width-200">
                        <li><a href="pengumuman.php"><span>Pengumuman</span></a></li>  
                        <li><a href="formulir.php"><span>Formulir</span></a></li>  
                        <li><a href="kontak_rt.php"><span>Kontak RT</span></a></li>   
                        <li><a href="bansos.php"><span>Data Bansos</span></a></li>
                    </ul>
                </li>        
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-cloud position-left"></i> STATISTIK <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu width-200">
                        <li><a href="rumah.php"><span>Rumah/Bangunan</span></a></li>                    
                        <li><a href="kk.php"><span>Kepala Keluarga</span></a></li>                        
                        <li><a href="statistik_warga.php"><span>Warga</span></a></li>
                        <li><a href="usia.php"><span>Kelompok Usia</span></a></li>                    
                        <li><a href="agama.php"><span>Agama</span></a></li>                        
                        <li><a href="pendidikan.php"><span>Pendidikan</span></a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-cloud position-left"></i> MASTER DATA <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu width-200">
                        <li><a href="warga.php"><span>Data Warga</span></a></li>                    
                        <li><a href="rt.php"><span>Data RT</span></a></li>                        
                        <li><a href="pengaduan.php"><span>Pengaduan Warga</span></a></li>
                    </ul>
                </li>                
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="../assets/admin/images/demo/users/face1.jpg" alt="">
                        <span>
                            <b>[ <?php echo $_SESSION['nama']; ?> ]</b>
                        </span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="gantipassword.php"><i class="icon-user-plus"></i> Ganti Password</a></li>                        
                        <li class="divider"></li>                    
                        <li><a href="logout.php" onclick="confirmLogout(event)"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
	</div>

  <div class="page-container">
    <div class="page-content">
      <div class="content-wrapper">
        <div class="content">
          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-flat">
                <div class="panel-heading">
                  <h4 class="panel-title">Daftar Kontak Ketua RT</h4>
                  <div class="heading-elements">
                    <a href="kontak_tambah.php" class="btn btn-sm btn-primary"><i class="icon-plus22"></i> TAMBAH</a>
                  </div>
                </div>
                <div class="panel-body">
                  <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped table-datatable">
                    <thead>
                      <tr>
                        <th width="1%">NO</th>
                        <th width="15%">FOTO</th>
                        <th width="15%">NAMA</th>		
                        <th>JABATAN</th>		
                        <th>NO TELP</th>		
                        <th width="10%">OPSI</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<td>' . $no++ . '</td>';
                            echo '<td><img src="../assets/foto_kontak/' . $row['foto'] . '" alt="Foto ' . $row['nama_rt'] . '" style="display: block; margin: 0 auto; max-width: 100%; height: auto;"></td>';
                            echo '<td>' . $row['nama_rt'] . '</td>';
                            echo '<td>' . $row['jabatan_rt'] . '</td>';
                            echo '<td>' . $row['telp_rt'] . '</td>';
                            echo '<td>									
                                  <a class="btn border-teal text-teal btn-flat btn-icon btn-xs" href="kontak_edit.php?id=' . $row['id_kontak'] . '"><i class="icon-wrench3"></i></a>
                                  <a class="btn border-danger text-danger btn-flat btn-icon btn-xs" href="kontak_hapus.php?id=' . $row['id_kontak'] . '" onclick="return confirm(\'Yakin ingin menghapus kontak ini?\')"><i class="icon-trash-alt"></i></a>
                                  </td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer text-muted"></div>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>