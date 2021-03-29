<?php
include '../core/conn.php';
session_start();
if ($_SESSION['jabatan']=="") {
	header('location:../login.php?pesan=gagal');
}
	$data = mysqli_query($connection, "SELECT p.id_permohonan, p.id_user, p.desa, p.kecamatan, p.alamat, p.status, p.notif, p.date_created, pf.berita_acara, pf.risalah, pf.sktbma, pf.s_permohonan, pf.s_pernyataan, pf.s_riwayat_tanah FROM permohonan AS p INNER JOIN pemohon_file AS pf ON p.id_permohonan = pf.id_permohonan");
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
	<link rel="stylesheet" href="../user/assets/vendor/datatables/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../user/assets/vendor/datatables/dataTables.bootstrap4.min.css">
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
				<a href="index.php" class="logo"><b>PENGUMPULAN DATA SERTIFIKAT </b><br> <center> KABUPATEN BANDUNG </center></a>
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
						<li><a href="index.php" class="active"><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
						<li><a href="informasi_berkas.php" class=""><i class="lnr lnr-database"></i> <span>Informasi Berkas</span></a></li>
						<li>
							<a href="#subFisik" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Berkas Fisik</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subFisik" class="collapse ">
								<ul class="nav">
									<li><a href="data_fisik.php" class="">Lihat Data Fisik</a></li>
									<li><a href="input_fisik.php" class="">Input Data Fisik</a></li>
								</ul>
							</div>
						</li>
						<li>
							<a href="#subSerti" data-toggle="collapse" class="collapsed"><i class="lnr lnr-book"></i> <span>Data Sertifikat</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subSerti" class="collapse ">
								<ul class="nav">
									<li><a href="data_sertifikat.php" class="">Lihat Data Sertifikat</a></li>
									<li><a href="input_sertifikat.php" class="">Input Data Sertifikat</a></li>
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
					<div class="panel panel-headline">
						<div class="panel-heading text-center">
							<h3 class="panel-title">Selamat Datang di Website Pengumpulan Data Sertifikat</h3>
							<p class="panel-subtitle">Kabupaten Bandung</p>
						</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<div class="container">
				<div class="panel panel-primary">
					<div class="panel-heading text-center"><h3><b>Data Permohonan</b></h3></div>
					<div class="panel-body">
						<table class="table table-bordered" id="dataTables" cellspacing="0" width="100%">
							<thead style="background: #f3f5f8">
								<tr style="text-align:center;">
									<th style="text-align:center;width:10px;">No</th>
									<th style="text-align: center;">ID</th>
									<th style="text-align: center;">Nama Pemohon</th>
									<th style="text-align: center;">Kecamatan</th>
									<th style="text-align: center;">Desa</th>
									<th style="text-align: center;">Alamat</th>
									<th style="text-align: center;">Status</th>
									<th style="text-align: center;">Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								  $no = 0;
					              while($d = mysqli_fetch_array($data)){
					              	$no++;
					            ?>
					              <?php  
					              	$id_user = $d['id_user'];
					              	$nama = mysqli_query($connection, "SELECT nama_lengkap FROM user WHERE id_user=$id_user");
					              	while ($row = $nama->fetch_assoc()) {
					              ?>
					            <tr>
					            	<td style="text-align: center;"><?php echo $no; ?></td>
					            	<td style="text-align: center;"><?=$d['id_permohonan'];?></td>
					            	<td style="text-align: center;"><?=$row['nama_lengkap'];?></td>
					            	<td style="text-align: center;"><?=$d['kecamatan'];?></td>
					            	<td style="text-align: center;"><?=$d['desa'];?></td>
					            	<td style="text-align: center;"><?=$d['alamat'];?></td>
					            	<td style="text-align: center;"><?=$d['status'];?></td>
					            	<td style="text-align: center;"><a href="#" type="button" class="btn btn-xs btn-success" title="detail" data-toggle="modal" data-target="#ModalDetail<?=$d['id_permohonan'];?>"><i class="fa fa-edit fa-fw fa-2x"></i></a></td>
					            </tr>
					            <!--MODAL Detail-->
							    <div class="modal fade" id="ModalDetail<?=$d['id_permohonan'];?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" ari-hidden="true">
							        <div class="modal-dialog">
							            <div class="modal-content">
							                <div class="modal-header">
							                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
							                    <h3 class="modal-title" id="myModalLabel">Detail Permohonan</h3>
							                </div>
              								&nbsp&nbsp&nbsp<small> Tanggal Pembuatan Permohonan <?php setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English'); echo strftime('%d %B %Y, %H:%M',strtotime($d['date_created'])); echo " WIB";?></small>
							                <form class="form-horizontal">
							                    <div class="modal-body">
							                        <div class="form-group form-inline">
							                            <label class="col-xs-3">Nama Pemohon</label>
							                                <input type="text" name="nama_lengkap" value="<?=$row['nama_lengkap'];?>" class="form-control" size="50" readonly/>
							                        </div>
							                        <div class="form-group form-inline">
							                            <label class="col-xs-3">Kecamatan</label>
							                                <input type="text" name="kecamatan" value="<?=$d['kecamatan'];?>" class="form-control" size="50" readonly/>
							                        </div>
							                        <div class="form-group form-inline">
							                            <label class="col-xs-3">Desa</label>
							                                <input type="text" name="desa" value="<?=$d['desa'];?>" class="form-control" size="50" readonly/>
							                        </div>
							                        <div class="form-group form-inline">
							                            <label class="col-xs-3">Alamat</label>
							                                <textarea type="text" name="alamat" class="form-control" cols="48"readonly><?=$d['alamat'];?></textarea>
							                        </div>
							                        <div class="form-group form-inline">
							                            <label class="col-xs-3">Status</label>
							                                <input type="text" name="status" value="<?=$d['status'];?>" class="form-control" size="50" disabled/>
							                        </div>
							                        <div class="form-group">
                										<a style="width: 100%" class="btn btn-xs btn-success" id="berita_acara" name="berita_acara" href="../pemohon/upload_file/<?=$d['id_permohonan'];?>/<?=$d['berita_acara'];?>"><i class="fa fa-download"> Download File Berita Acara </i></a>
							                        </div>
							                        <div class="form-group">
                										<a style="width: 100%" class="btn btn-xs btn-success" id="risalah" name="risalah" href="../pemohon/upload_file/<?=$d['id_permohonan'];?>/<?=$d['risalah'];?>"><i class="fa fa-download"> Download File Risalah </i></a>
							                        </div>
							                        <div class="form-group">
                										<a style="width: 100%" class="btn btn-xs btn-success" id="sktbma" name="sktbma" href="../pemohon/upload_file/<?=$d['id_permohonan'];?>/<?=$d['sktbma'];?>"><i class="fa fa-download"> Download File SKTBMA </i></a>
							                        </div>
							                        <div class="form-group">
                										<a style="width: 100%" class="btn btn-xs btn-success" id="s_permohonan" name="s_permohonan" href="../pemohon/upload_file/<?=$d['id_permohonan'];?>/<?=$d['s_permohonan'];?>"><i class="fa fa-download"> Download File Surat Permohonan </i></a>
							                        </div>
							                        <div class="form-group">
                										<a style="width: 100%" class="btn btn-xs btn-success" id="s_pernyataan" name="s_pernyataan" href="../pemohon/upload_file/<?=$d['id_permohonan'];?>/<?=$d['s_pernyataan'];?>"><i class="fa fa-download"> Download File Surat Pernyataan </i></a>
							                        </div>
							                        <div class="form-group">
                										<a style="width: 100%" class="btn btn-xs btn-success" id="s_riwayat_tanah" name="s_riwayat_tanah" href="../pemohon/upload_file/<?=$d['id_permohonan'];?>/<?=$d['s_riwayat_tanah'];?>"><i class="fa fa-download"> Download File Surat Riwayat Tanah </i></a>
							                        </div>
							                    </div>
							                    

							                    <div class="modal-footer">
							                        <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">OK</button>
							                    </div>
							                </form>
							            </div>
							        </div>
							    </div>

						    <!--END MODAL DETAIL-->

					        <?php } ?>
					        <?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		<!-- END MAIN -->
		
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script src="../user/assets/vendor/datatables/jquery.dataTables.js"></script>
	<script src="../user/assets/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="../user/assets/vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="../user/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#dataTables').DataTable();
		} );
	</script>
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
