<?php 
include '../../core/conn.php';
$d = $_GET['no_pbt'];

$pilih = mysqli_query($connection, "SELECT * FROM data_pbt WHERE no_pbt='$d'");
$data = mysqli_fetch_assoc($pilih);
$dokumen = $data['dokumen'];
unlink("../../user/dokumen/".$dokumen);

mysqli_query($connection,"DELETE FROM data_pbt where no_pbt='$d'");
echo "<script>alert('Data Berhasil Dihapus!'); window.location = '../pbt.php'</script>";
?>