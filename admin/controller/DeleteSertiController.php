<?php 
include '../../core/conn.php';
$d = $_GET['no_sertifikat'];
mysqli_query($connection,"DELETE FROM data_sertifikat where no_sertifikat='$d'");
echo "<script>alert('Data Berhasil Dihapus!'); window.location = '../sertifikat.php'</script>";
?>