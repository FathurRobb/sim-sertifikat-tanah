<?php 
include '../../core/conn.php';
$d = $_GET['no_berkas'];
mysqli_query($connection,"DELETE FROM data_fisik where no_berkas='$d'");
echo "<script>alert('Data Berhasil Dihapus!'); window.location = '../fisik.php'</script>";
?>                                                                                                                        