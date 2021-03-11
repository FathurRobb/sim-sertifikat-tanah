<?php
session_start();
include 'conn.php';

$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));


$login = mysqli_query($connection,"SELECT * FROM user WHERE username='$username' and password='$password'");
$getUser = mysqli_num_rows($login);


$login = mysqli_query($connection,"SELECT * FROM user WHERE username='$username' and password='$password'");
$cek = mysqli_num_rows($login);


if($cek > 0){
	$data = mysqli_fetch_assoc($login);
	if($data['jabatan']=="Admin"){
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "Admin";
		header("location:../admin/index.php");
	}elseif ($data['jabatan']=="Yuridis") {
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "Yuridis";
		header("location:../user/index.php");
	}elseif ($data['jabatan']=="Fisik") {
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "Fisik";
		header("location:../user/index.php");
	}
}else{
	header("location:../login.php?pesan=gagal");
}

?>
