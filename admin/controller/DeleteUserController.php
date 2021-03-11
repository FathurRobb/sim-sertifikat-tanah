<?php 
include '../../core/conn.php';
$d = $_GET['id_user'];
mysqli_query($connection,"DELETE FROM user where id_user='$d'");
mysqli_query($connection, "ALTER TABLE user DROP id_user;");
mysqli_query($connection, "ALTER TABLE user ADD  id_user INT( 20 ) NOT NULL AUTO_INCREMENT FIRST ,ADD KEY (id_user); ");
echo "<script>alert('Data Berhasil Dihapus!'); window.location = '../users.php'</script>";
?>