<?php
include '../../core/conn.php';

$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_STRING);
$nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
$desa = filter_input(INPUT_POST, 'desa', FILTER_SANITIZE_STRING);
$kecamatan = filter_input(INPUT_POST, 'kecamatan', FILTER_SANITIZE_STRING);

if(isset($_POST['submit']))
{
	$extension=array('jpeg','jpg','png','gif');
	foreach ($_FILES['image']['tmp_name'] as $key => $value) {
		$filename=$_FILES['image']['name'][$key];
		$filename_tmp=$_FILES['image']['tmp_name'][$key];
		echo '<br>';
		$ext=pathinfo($filename,PATHINFO_EXTENSION);

		$finalimg='';
		if(in_array($ext,$extension))
		{
			if(!file_exists('../persyaratan/'.$filename))
			{
			move_uploaded_file($filename_tmp, '../persyaratan/'.$filename);
			$finalimg=$filename;
			}else
			{
				 $filename=str_replace('.','-',basename($filename,$ext));
				 $newfilename=$filename.time().".".$ext;
				 move_uploaded_file($filename_tmp, '../persyaratan/'.$newfilename);
				 $finalimg=$newfilename;
			}
			$creattime=date('Y-m-d h:i:s');
			//insert
			$insertqry="INSERT INTO pengajuan (token, nama, desa, kecamatan, ktp, berita_acara, risalah, sktbma, s_permohonan, s_pernyataan, s_riwayat_tanah) VALUES('$token', '$nama', '$desa', '$kecamatan', '$filename[0]', '$filename[1]', '$filename[2]', '$filename[3]', '$filename[4]', '$filename[5]', '$filename[6]')";
			mysqli_query($connection,$insertqry);

			header('location:../../login.php?pesan=berhasil');
		}else
		{
			header('location:../../login.php?pesan=gagal');
		}
	}
}

?>