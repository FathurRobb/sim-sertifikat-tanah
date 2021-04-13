<?php
include '../../core/conn.php';

$no_berkas = filter_input(INPUT_POST, 'no_berkas', FILTER_SANITIZE_STRING);
$desa = filter_input(INPUT_POST, 'desa', FILTER_SANITIZE_STRING);
$nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
$no_hak = filter_input(INPUT_POST, 'no_hak', FILTER_SANITIZE_STRING);
$no_sertifikat = filter_input(INPUT_POST, 'no_sertifikat', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$tahun = filter_input(INPUT_POST, 'tahun', FILTER_SANITIZE_STRING);

$sql = "UPDATE data_fisik SET no_berkas='$no_berkas', desa='$desa', nama='$nama', no_hak='$no_hak', no_sertifikat='$no_sertifikat', status='$status', tahun='$tahun' WHERE no_berkas='$no_berkas'";
if (mysqli_query($connection, $sql)) {
    header('location:../data_fisik.php?pesan=sukses');
  }else{
    header('location:../data_fisik.php?pesan=gagal');
  }

?>
	