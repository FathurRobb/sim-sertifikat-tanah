<?php
include '../../core/conn.php';

$desa = filter_input(INPUT_POST, 'desa', FILTER_SANITIZE_STRING);
$nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
$no_sertifikat = filter_input(INPUT_POST, 'no_sertifikat', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$tahun = filter_input(INPUT_POST, 'tahun', FILTER_SANITIZE_STRING);

$sql = "UPDATE data_sertifikat SET no_sertifikat='$no_sertifikat', desa='$desa', tahun='$tahun', nama='$nama', status='$status' WHERE no_sertifikat='$no_sertifikat'";
if (mysqli_query($connection, $sql)) {
    header('location:../data_sertifikat.php?pesan=sukses');
  }else{
    header('location:../data_sertifikat.php?pesan=gagal');
  }

?>
