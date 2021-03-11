<?php
include '../../core/conn.php';

$no_sertifikat = $_GET['no_sertifikat'];

$sql = "UPDATE data_sertifikat SET status='Selesai' WHERE no_sertifikat='$no_sertifikat'";

if (mysqli_query($connection, $sql)) {
  header('location:../data_sertifikat.php?pesan=sukses');
}else{
  header('location:../data_sertifikat.php?pesan=gagal');
}
?>
