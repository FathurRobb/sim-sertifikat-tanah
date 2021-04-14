<?php
include '../core/conn.php';
session_start();
if ($_SESSION['jabatan']=="") {
	header('location:../login.php?pesan=gagal');
}
	$nama_lengkap = $_SESSION['nama_lengkap'];
	$data = mysqli_query($connection, "SELECT * FROM data_fisik WHERE nama = '$nama_lengkap'");
	$jumlahdata = mysqli_num_rows($data);

if(isset($_GET['submit'])){
	$no_berkas = $_GET['no_berkas'];
	$query = mysqli_query($connection, "SELECT * FROM data_fisik WHERE no_berkas LIKE '%".$no_berkas."%'");
	$hasil = mysqli_fetch_array($query);
	$nama = $hasil['nama'];
	$desa = $hasil['desa'];
	$status = $hasil['status'];
	$no_hak = $hasil['no_hak'];
	$no_sertifikat = $hasil['no_sertifikat'];
}else{
	$nama = "";
	$desa = "";
	$status = "";
	$no_hak = "";
	$no_sertifikat = "";
}	
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Pengajuan Data Sertifikat - Kabupaten Bandung</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../user/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../user/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../user/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="../user/assets/vendor/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../user/assets/vendor/datatables/dataTables.bootstrap4.min.css">

	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../user/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="../user/assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
</head>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.php" class="logo"><b>PENGAJUAN DATA SERTIFIKAT </b><br> <center> KABUPATEN BANDUNG </center></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Bantuan</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="http://tiny.cc/PanduanWebs">Panduan Penggunaan Website</a></li>
								<li><a href="mailto:dev@sakaraguna.id">Laporkan Masalah</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-user"> </i><span>Hi, <?=$_SESSION['username'];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="../core/logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.php" class=""><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
						<li><a href="informasi_berkas.php" class="active"><i class="lnr lnr-database"></i> <span>Informasi Berkas</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Cari Data</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
							</div>
						</div>
						<div class="panel-body">
							<form class="" action="informasi_berkas.php" method="GET">
								<div class="form-group row">
            			<label for="no_berkas" class="col-sm-2 col-form-label">Nomor Berkas</label>
            				<div class="col-sm-10">
                			<select class="form-control" id="no_berkas" name="no_berkas">
                				<option disabled selected>Nomor Berkas</option>
                				<?php
                									$sql = mysqli_query($connection,"SELECT * FROM data_fisik WHERE nama = '$nama_lengkap'"); 	 
													while ($row=mysqli_fetch_array($sql)) {
														echo '<option value="'.$row['no_berkas'].'">'.$row['no_berkas'].' - '.$row['desa'].'</option>';
													}
													
                				?>
                			</select>
            				</div>
        				</div>
								<div class="form-group row col-sm-10">
            				<div class="col-sm-10">
											<input type="submit" name="submit" class="btn btn-primary mt-sm-4" value="Cari Data">
            				</div>
        				</div>
							</form>
						</div>
					</div>

					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Hasil Pencarian</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
							</div>
						</div>
						<div class="panel-body">
							<div class="form-group row col-sm-10">
									<div class="col-sm-10">
											<p>Nama : <b><?=$nama;?></b></p>
											<p>Desa : <b><?=$desa;?></b></p>
											<p>Status : <b><?=$status;?></b></p>
											<p>Nomor Hak Milik : <b><?=$no_hak;?></b></p>
											<p>Nomor Sertifikat : <b><?=$no_sertifikat?></b></p>
							</div>
						</div>
					</div>
</div>
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Seluruh Informasi Berkas</h3>
							<p class="panel-subtitle">Jumlah Seluruh Data : <?=$jumlahdata;?></p>
							<div class="panel-body">
								<table class="table table-bordered">
									<thead>
										<tr class="">
											<th>Nama</th>
											<th>Desa</th>
											<th>Status</th>
											<th>No Sertifikat</th>
											<th>No Hak Milik</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<?php
											while ($d = mysqli_fetch_array($data)) {
											?>
											<td><?=$d['nama'];?></td>
											<td><?=$d['desa'];?></td>
											<td><?=$d['status'];?></td>
											<td><?=$d['no_sertifikat'];?></td>
											<td><?=$d['no_hak'];?></td>
										</tr>
									<?php 	} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
		
	<!-- END WRAPPER -->
</div>
		
    <!--/container-->
	
	<!-- Area Chart Example
        -->
	<!-- END WRAPPER -->

	<!-- Javascript -->
	<script src="../user/assets/vendor/jquery/jquery.min.js"></script>
	<script src="../user/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../user/assets/vendor/datatables/jquery.dataTables.js"></script>
	<script src="../user/assets/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="../user/assets/vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="../user/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="../user/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../user/assets/scripts/klorofil-common.js"></script>
	<script>
		$(document).ready(function() {
			$('#dataTables').DataTable({
				"oLanguage": {
			        "sEmptyTable": "Belum Ada Data yang Di Inputkan"
			    }
			});
		} );
	</script>

</body>

</html>
