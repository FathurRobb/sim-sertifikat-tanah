<?php
include '../../core/conn.php';

$no_pbt = filter_input(INPUT_POST, 'no_pbt', FILTER_SANITIZE_STRING);
$nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
$desa = filter_input(INPUT_POST, 'desa', FILTER_SANITIZE_STRING);
$tahun = filter_input(INPUT_POST, 'tahun', FILTER_SANITIZE_STRING);

$rand = rand();
$ekstensi = array('pdf','jpg','jpeg','png');
$getfilename = $_FILES['dokumen']['name'];
$filename =  str_replace(' ', '_', $getfilename);

$ukuran = $_FILES['dokumen']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext, $ekstensi)) {
  header('location:../upload_pbt?pesan=gagal_ekstensi');
}else{
  if ($ukuran < 1044070) {
    $xx = $rand.'_'.$filename;
    move_uploaded_file($_FILES['dokumen']['tmp_name'], '../dokumen/'.$rand.'_'.$filename);
    $query = "INSERT INTO data_pbt (no_pbt, desa, nama, tahun, dokumen) VALUES('$no_pbt','$desa','$nama','$tahun','$xx')";
    if (mysqli_query($connection, $query)) {
      header('location:../upload_pbt.php?pesan=sukses_upload');
    }else{
      header('location:../upload_pbt.php?pesan=gagal_upload');
    }
  }else{
    header('location:../upload_pbt.php?pesan=gagal_ukuran');
  }
}
?>
