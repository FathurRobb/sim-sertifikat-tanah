<?php
include '../../core/conn.php';

$no_berkas = filter_input(INPUT_POST, 'no_berkas', FILTER_SANITIZE_STRING);
$desa = filter_input(INPUT_POST, 'desa', FILTER_SANITIZE_STRING);
$nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
$no_hak = filter_input(INPUT_POST, 'no_hak', FILTER_SANITIZE_STRING);
$no_sertifikat = filter_input(INPUT_POST, 'no_sertifikat', FILTER_SANITIZE_STRING);
$tahun = filter_input(INPUT_POST, 'tahun', FILTER_SANITIZE_STRING);
$status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);

$cek_berkas = mysqli_query($connection, "SELECT * FROM data_fisik WHERE no_berkas='$no_berkas'");

if (mysqli_num_rows($cek_berkas)>0) {
  header('location:../input_fisik.php?pesan=berkas');
}else {
  $cek_hak = mysqli_query($connection, "SELECT * FROM data_fisik WHERE no_hak='$no_hak'");
  if (mysqli_num_rows($cek_hak)>0) {
    header('location:../input_fisik.php?pesan=hak');
  }else {
    $cek_sertifikat = mysqli_query($connection, "SELECT * FROM data_fisik WHERE no_sertifikat='$no_sertifikat'");
    if (mysqli_num_rows($cek_sertifikat)>0) {
      header('location:../input_fisik.php?pesan=sertifikat');
    }else {
      $sql = $connection->prepare("INSERT INTO data_fisik (no_berkas, desa, nama, no_hak, no_sertifikat, status, tahun) VALUES(?, ?, ?, ?, ?, ?, ?)");
      $sql->bind_param("sssssss", $no_berkas, $desa, $nama, $no_hak, $no_sertifikat, $status, $tahun);

      if ($sql->execute()) {
        header('location:../input_fisik.php?pesan=sukses');
      }else{
        header('location:../input_fisik.php?pesan=gagal');
      }

    }
  }
}
//
// if (mysqli_query($connection, $sql)) {
//   header('location:../input_fisik.php?pesan=sukses');
// }else{
//   header('location:../input_fisik.php?pesan=gagal');
// }
?>
