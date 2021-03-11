<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "pendataan";

$connection = mysqli_connect($hostname, $username, $password, $database);

if(!$connection)
  {
    echo "Koneksi Gagal! : " . mysqli_connect_error();
  }
?>
