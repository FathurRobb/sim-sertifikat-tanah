<?php
include '../core/conn.php';
session_start();
if ($_SESSION['jabatan']=="") {
	header('location:../login.php?pesan=gagal');
}
	$nama_lengkap = $_SESSION['nama_lengkap'];
	$id_user = $_SESSION['id_user'];
	$data = mysqli_query($connection, "SELECT * FROM permohonan WHERE id_user = $id_user");
	
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
						<li><a href="index.php" class="active"><i class="lnr lnr-home"></i> <span>Beranda</span></a></li>
						<li><a href="informasi_berkas.php" class=""><i class="lnr lnr-database"></i> <span>Informasi Berkas</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading text-center">
							<h3 class="panel-title"><b>Dokumen Persyaratan</b></h3><br>
				              <table class="table table-bordered" width="100%" cellspacing="0" id="mydata">
				                <thead style="background: #f3f5f8">
				                    <tr>
				                        <th style="text-align:center;width:40px;"><b>No</th>
				                        <th style="text-align:center;"><b>Dokumen</th>
				                        <th style="text-align:center;"><b>Aksi</th>
				                    </tr>
				                </thead>
				                <tbody>
				                  	<tr>
				                        <td style="text-align:center;vertical-align:middle">1</td>
				                        <td style="vertical-align:middle;">Berita Acara</td>
				                        <td style="text-align:center;">
				                            <a class="btn btn-xs btn-success" href="../assets/persyaratan/Berita Acara.doc"><span class="fa fa-download fa-lg"></span></a>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td style="text-align:center;vertical-align:middle">2</td>
				                        <td style="vertical-align:middle;">Risalah 2018</td>
				                        <td style="text-align:center;">
				                            <a class="btn btn-xs btn-success" href="../assets/persyaratan/Risalah 201B.doc"><span class="fa fa-download fa-lg"></span></a>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td style="text-align:center;vertical-align:middle">3</td>
				                        <td style="vertical-align:middle;">SKTBMA</td>
				                        <td style="text-align:center;">
				                            <a class="btn btn-xs btn-success" href="../assets/persyaratan/SKTBMA.doc"><span class="fa fa-download fa-lg"></span></a>
				                        </td>
				                    </tr>
				                  	<tr>
				                        <td style="text-align:center;vertical-align:middle">4</td>
				                        <td style="vertical-align:middle;">Surat Permohonan</td>
				                        <td style="text-align:center;">
				                            <a class="btn btn-xs btn-success" href="../assets/persyaratan/Surat Permohonan.doc"><span class="fa fa-download fa-lg"></span></a>
				                        </td>
				                    </tr>
				                    <tr>
				                        <td style="text-align:center;vertical-align:middle">5</td>
				                        <td style="vertical-align:middle;">Surat Pernyataan</td>
				                        <td style="text-align:center;">
				                            <a class="btn btn-xs btn-success" href="../assets/persyaratan/Surat Pernyataan.doc"><span class="fa fa-download fa-lg"></span></a>
				                        </td>
				                    </tr>
				                  	<tr>
				                        <td style="text-align:center;vertical-align:middle">6</td>
				                        <td style="vertical-align:middle;">Surat Riwayat Tanah</td>
				                        <td style="text-align:center;">
				                            <a class="btn btn-xs btn-success" href="../assets/persyaratan/Surat Riwayat Tanah.doc"><span class="fa fa-download fa-lg"></span></a>
				                        </td>
				                    </tr>
				                </tbody>
				              </table>
						<a href="#" class="btn btn-primary btn-lg" data-target="#ModalAdd" data-toggle="modal"><b>Buat Permohonan</b></a>
						</div>
				</div>
			</div>
			<div class="container">
				<div class="panel panel-primary">
					<div class="panel-heading text-center"><h3><b>Data Pengajuan</b></h3></div>
					<div class="panel-body">
						<table class="table table-bordered" id="dataTables" cellspacing="0" width="100%">
							<thead style="background: #f3f5f8">
								<tr style="text-align:center;">
									<th style="text-align:center;width:40px;">No</th>
									<th style="text-align: center;">ID</th>
									<th style="text-align: center;">Kecamatan</th>
									<th style="text-align: center;">Desa</th>
									<th style="text-align: center;">Alamat</th>
									<th style="text-align: center;">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php
								  $no = 0;
					              while($d = mysqli_fetch_array($data)){
					              	$no++;
					            ?>
					            <tr>
					            	<td style="text-align: center;"><?php echo $no; ?></td>
					            	<td style="text-align: center;"><?=$d['id_permohonan'];?></td>
					            	<td style="text-align: center;"><?=$d['kecamatan'];?></td>
					            	<td style="text-align: center;"><?=$d['desa'];?></td>
					            	<td style="text-align: center;"><?=$d['alamat'];?></td>
					            	<td style="text-align: center;"><?=$d['status'];?></td>
					            </tr>
					        <?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
	</div>
	<!--Modal Tambah-->
	<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
					<h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
				</div>

				<div class="modal-body">
					<form action="proses_save.php" name="modal-popup" enctype="multipart/form-data" method="POST">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap;?>" readonly/>
						</div>
						<div class="form-group">
							<label>Kecamatan</label>
							<input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required/>
						</div>
						<div class="form-group">
							<label>Desa</label>
							<input type="text" name="desa" class="form-control" placeholder="Desa" required/>
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea type="text" name="alamat" class="form-control" placeholder="Alamat" required></textarea>
						</div>
						<div class="form-group">
							<label>Berita Acara</label>
							<input class="form-control" type="file" name="berita_acara" required/>
						</div>
						<div class="form-group">
							<label>Risalah</label>
							<input class="form-control" type="file" name="risalah" required/>
						</div>
						<div class="form-group">
							<label>SKTBMA</label>
							<input class="form-control" type="file" name="sktbma" required/>
						</div>
						<div class="form-group">
							<label>Surat Permohonan</label>
							<input class="form-control" type="file" name="s_permohonan" required/>
						</div>
						<div class="form-group">
							<label>Surat Pernyataan</label>
							<input class="form-control" type="file" name="s_pernyataan" required/>
						</div>
						<div class="Surat Riwayat Tanah">
							<label>Surat Riwayat Tanah</label>
							<input class="form-control" type="file" name="s_riwayat_tanah" required="" />
						</div>

						<div class="modal-footer">
							<button class="btn btn-success" type="submit">Tambah</button>
							<button type="reset" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Batal</button>
						</div>
					</form>
				</div>
			</div>
		</div>
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
