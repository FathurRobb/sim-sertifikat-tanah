<?php
include '../../core/conn.php';

$desa = filter_input(INPUT_POST, 'desa', FILTER_SANITIZE_STRING);
$nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
$no_sertifikat = filter_input(INPUT_POST, 'no_sertifikat', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
$tahun = filter_input(INPUT_POST, 'tahun', FILTER_SANITIZE_STRING);

$cek_sertifikat = mysqli_query($connection, "SELECT * FROM data_sertifikat WHERE no_sertifikat='$no_sertifikat'");

if (mysqli_num_rows($cek_sertifikat)>0) {
  header('location:../input_sertifikat.php?pesan=sertifikat');
}else {
  $sql = $connection->prepare("INSERT INTO data_sertifikat (nama, desa, no_sertifikat, status, tahun) VALUES(?, ?, ?, ?, ?)");
  $sql->bind_param("sssss", $nama, $desa, $no_sertifikat, $status, $tahun);

  if ($sql->execute()) {
    header('location:../input_sertifikat.php?pesan=sukses');
  }else{
    header('location:../input_sertifikat.php?pesan=gagal');
  }
}


?>
