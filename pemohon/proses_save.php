<?php
include '../core/conn.php';
session_start();  
	$id_user = $_SESSION['id_user'];
	// mengambil data barang dengan kode paling besar
	$query = mysqli_query($connection, "SELECT max(id_permohonan) as kodeTerbesar FROM permohonan");
	$dataID = mysqli_fetch_array($query);
	$id_permohonan = $dataID['kodeTerbesar'];
 
	// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
	// dan diubah ke integer dengan (int)
	$urutan = (int) substr($id_permohonan, 3, 3);
 
	// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
	$urutan++;
 
	// membentuk kode barang baru
	// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
	// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
	// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
	$huruf = "KP";
	$id_permohonan = $huruf . sprintf("%04s", $urutan);

		$doc1 = $_FILES['berita_acara']['name'];
		$doc2 = $_FILES['risalah']['name'];
		$doc3 = $_FILES['sktbma']['name'];
		$doc4 = $_FILES['s_permohonan']['name'];
		$doc5 = $_FILES['s_pernyataan']['name'];
		$doc6 = $_FILES['s_riwayat_tanah']['name'];
		$kecamatan = filter_input(INPUT_POST, 'kecamatan', FILTER_SANITIZE_STRING);
		$desa = filter_input(INPUT_POST, 'desa', FILTER_SANITIZE_STRING);
		$alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
		$status = "Belum Di Setujui";
		$berita_acara = $id_permohonan.'_'.$doc1;
		$risalah = $id_permohonan.'_'.$doc2;
		$sktbma = $id_permohonan.'_'.$doc3;
		$s_permohonan = $id_permohonan.'_'.$doc4;
		$s_pernyataan = $id_permohonan.'_'.$doc5;
		$s_riwayat_tanah = $id_permohonan.'_'.$doc6;
		mkdir("upload_file/". $id_permohonan ."/");
		// Move the uploaded file
		move_uploaded_file($_FILES["berita_acara"]["tmp_name"], "upload_file/". $id_permohonan ."/".$id_permohonan.'_'.$doc1);
		move_uploaded_file($_FILES["risalah"]["tmp_name"], "upload_file/". $id_permohonan ."/".$id_permohonan.'_'.$doc2);
		move_uploaded_file($_FILES["sktbma"]["tmp_name"], "upload_file/". $id_permohonan ."/".$id_permohonan.'_'.$doc3);
		move_uploaded_file($_FILES["s_permohonan"]["tmp_name"], "upload_file/". $id_permohonan ."/".$id_permohonan.'_'.$doc4);
		move_uploaded_file($_FILES["s_pernyataan"]["tmp_name"], "upload_file/". $id_permohonan ."/".$id_permohonan.'_'.$doc5);
		move_uploaded_file($_FILES["s_riwayat_tanah"]["tmp_name"], "upload_file/". $id_permohonan ."/".$id_permohonan.'_'.$doc6);
		 $query1 = "INSERT INTO permohonan (id_permohonan, id_user, kecamatan, desa, alamat, status, notif, notif_fisik, notif_yuridis) VALUES('$id_permohonan','$id_user','$kecamatan','$desa','$alamat','$status','unread','unread','unread')";
		 $q1 = mysqli_query($connection, $query1);
		 $query2 .= "INSERT INTO pemohon_file (id_permohonan,berita_acara,risalah,sktbma,s_permohonan,s_pernyataan,s_riwayat_tanah) VALUES('$id_permohonan','$berita_acara','$risalah','$sktbma','$s_permohonan','$s_pernyataan','$s_riwayat_tanah')"; 
		 $q2 = mysqli_query($connection, $query2);
		 header('location:index.php');

		 
?>