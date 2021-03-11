<?php
include '../../core/conn.php';

if(isset($_POST['submit'])){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    $password = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $jabatan = filter_input(INPUT_POST, 'jabatan', FILTER_SANITIZE_STRING);

    $sql = $connection->prepare("INSERT INTO user (username, password, email, nama_lengkap, jabatan) VALUES(?, ?, ?, ?, ?)");
    $sql->bind_param("sssss", $username, $password, $email, $nama, $jabatan);
    if ($sql->execute()) {
          mysqli_query($connection, "ALTER TABLE user DROP id_user;");
          mysqli_query($connection, "ALTER TABLE user ADD  id_user INT( 5 ) NOT NULL AUTO_INCREMENT FIRST ,ADD KEY (id_user); ");
          header('location:../users.php?pesan=input');
    }else{
      mysqli_query($connection, "ALTER TABLE user DROP id_user;");
         mysqli_query($connection, "ALTER TABLE user ADD  id_user INT( 5 ) NOT NULL AUTO_INCREMENT FIRST ,ADD KEY (id_user); ");
         header('location:../users.php?pesan=gagal');
    }
}
?>
