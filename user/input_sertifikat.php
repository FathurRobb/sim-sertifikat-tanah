<?php
session_start();
include '../core/conn.php';
if ($_SESSION['jabatan']=="") {
	header('location:../login.php?pesan=gagal');
}elseif ($_SESSION['jabatan']!="Yuridis"){
	header('location:../core/403.php');
}
if(isset($_GET['pesan'])){
  $pesan = $_GET['pesan'];
  if($pesan == 'sukses'){
    echo '<script>alert("Data Berhasil Disimpan");</script>';
  }elseif($pesan == 'gagal'){
    echo '<script>alert("Data Gagal Disimpan");</script>';
  }elseif ($pesan == 'sertifikat') {
	echo '<script>alert("No Sertifikat Telah Terdaftar");</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Pengumpulan Data Sertifikat - Kabupaten Bandung</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.php"><b>PENGUMPULAN DATA SERTIFIKAT </b><br> <center> KABUPATEN BANDUNG </center></a>
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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-user"> </i><span><?=$_SESSION['username'];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
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
						<li><a href="informasi_berkas.php" class=""><i class="lnr lnr-database"></i> <span>Informasi Berkas</span></a></li>
						<li>
							<a href="#subFisik" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Berkas Fisik</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subFisik" class="collapse">
								<ul class="nav">
									<li><a href="data_fisik.php" class="">Lihat Data Fisik</a></li>
									<li><a href="input_fisik.php" class="">Input Data Fisik</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subSerti" data-toggle="collapse" class="active"><i class="lnr lnr-book"></i> <span>Data Sertifikat</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subSerti" class="collapse in">
								<ul class="nav">
									<li><a href="data_sertifikat.php" class="">Lihat Data Sertifikat</a></li>
									<li><a href="input_sertifikat.php" class="active">Input Data Sertifikat</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subPBT" data-toggle="collapse" class="collapsed"><i class="lnr lnr-map"></i> <span>Data PBT</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPBT" class="collapse ">
								<ul class="nav">
									<li><a href="data_pbt.php" class="">Lihat Data PBT</a></li>
									<li><a href="upload_pbt.php" class="">Upload Data PBT</a></li>
								</ul>
							</div>
						</li>
						<li><a href="cetak.php" class=""><i class="lnr lnr-printer"></i> <span>Cetak Nomor Pembagian</span></a></li>
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
							<h3 class="panel-title">Input Data Sertifikat</h3>
							<div class="right">
								<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
								<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
							</div>
						</div>
						<div class="panel-body">
							<form class="" action="controller/inputserti.php" method="POST">
							<div class="form-group row">
								<label for="nama" class="col-sm-2 col-form-label">Nama</label>
									<div class="col-sm-10">
										<input autocomplete="off" type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
									</div>
							</div>
        				<div class="form-group row">
            			<label for="desa" class="col-sm-2 col-form-label">Desa</label>
            				<div class="col-sm-10">
                			<input autocomplete="off" type="text" class="form-control" id="desa" name="desa" placeholder="Desa" required>
            				</div>
        				</div>
								<div class="form-group row">
            			<label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
            				<div class="col-sm-10">
											<select class="form-control" name="tahun">
												<option value="2020">2019</option>
												<option value="2019">2020</option>
												<option value="2019">2021</option>
												<option value="2019">2022</option>
												<option value="2019">2023</option>
												<option value="2019">2024</option>
												<option value="2019">2025</option>
											</select>
            				</div>
        				</div>
								<div class="form-group row">
            			<label for="no_sertifikat" class="col-sm-2 col-form-label">Nomor Sertifikat</label>
            				<div class="col-sm-10">
                			<input autocomplete="off" type="text" class="form-control" id="no_sertifikat" name="no_sertifikat" placeholder="Nomor Sertifikat" required>
            				</div>
        				</div>
								<div class="form-group row">
            			<label for="status" class="col-sm-2 col-form-label">Status</label>
            				<div class="col-sm-10">
											<select class="form-control" name="status">
												<option value="Selesai">Selesai</option>
												<option value="Belum">Belum</option>
											</select>
            				</div>
        				</div>

								<div class="form-group row col-sm-10">
            				<div class="col-sm-10">
											<input type="submit" name="submit" class="btn btn-primary mt-sm-4" value="Simpan Data">
            				</div>
        				</div>
							</form>
						</div>
					</div>

				</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
	<!-- END WRAPPER -->
	</div>
	<div class="clearfix"></div>
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
</body>

</html>
