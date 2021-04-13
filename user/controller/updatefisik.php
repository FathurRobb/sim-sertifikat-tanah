<?php
include '../../core/conn.php';

$no_berkas = $_GET['no_berkas'];

$sql = "UPDATE data_fisik SET status='Selesai' WHERE no_berkas='$no_berkas'";

if (mysqli_query($connection, $sql)) {
  header('location:../data_fisik.php?pesan=sukses');
}else{
  header('location:../data_fisik.php?pesan=gagal');
}
?>
