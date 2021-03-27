<?php  
	session_start();
	require_once("core/conn.php");
	if(isset($_POST['register'])){
        // filter data yang diinputkan
    $nama_lengkap = filter_input(INPUT_POST, 'nama_lengkap', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $jabatan = "Pemohon";
    $cek_username="SELECT username FROM user WHERE username='$username'";
    $cek=mysqli_num_rows(mysqli_query($connection,$cek_username));
    // Kalau username sudah ada yang pakai
    if ($cek > 0){
      echo '<script>alert("Username sudah ada , silahkan nasukan username yang lain");history.go(-1);</script>';
    }else{
      $sql = $connection->prepare("INSERT INTO user (username, password, email, nama_lengkap, jabatan) VALUES(?, ?, ?, ?, ?)");
      $sql->bind_param("sssss", $username, $password, $email, $nama_lengkap, $jabatan);
      if ($sql->execute()) {
          mysqli_query($connection, "ALTER TABLE user DROP id_user;");
          mysqli_query($connection, "ALTER TABLE user ADD  id_user INT( 5 ) NOT NULL AUTO_INCREMENT FIRST ,ADD KEY (id_user); ");
          header("Location: login.php");
      }else{
        mysqli_query($connection, "ALTER TABLE user DROP id_user;");
           mysqli_query($connection, "ALTER TABLE user ADD  id_user INT( 5 ) NOT NULL AUTO_INCREMENT FIRST ,ADD KEY (id_user); ");
           echo '<script>alert("Registrasi Gagal");history.go(-1);</script>';
      }
    }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body class="bg-gray-300">
    <div class="h-screen flex items-center justify-center">
      <div class="max-w-sm bg-white">
        <form action="" class="bg-white shadow-md rounded p-10" id="register" name="register" method="post">
          <div class="text-4xl font-bold text-teal-900 mb-7">
            Buat Akun Pemohon
          </div>
          <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="nama_lengkap">
          Nama Lengkap
          </label>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" name="nama_lengkap" id="nama_lengkap" type="text" autocomplete="off" oninvalid="this.setCustomValidity('Nama Tidak boleh Kosong')" required/>
          <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="email">
          Email
          </label>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" name="email" id="email" type="text" autocomplete="off" onkeydown="validation()" oninvalid="this.setCustomValidity('Email Tidak boleh Kosong')"required/>
          <span id="text"></span>
          <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="username">
          Nama Pengguna
          </label>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" name="username" id="username" type="text" autocomplete="off" maxlength="20" oninvalid="this.setCustomValidity('Username Tidak boleh Kosong')" required/>
          <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="password">
          Kata Sandi
          </label>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="password" id="password" type="password" oninvalid="this.setCustomValidity('Password Tidak boleh Kosong')" required/>
          <input
            class="mt-5 shadow-sm appearance-none border rounded w-100 text-sm py-3 px-8 font-semibold bg-teal-600 text-white leading-normal"
            name="register" type="submit" value="Buat Akun" id="register">
        </form>
      </div>
    </div>
        <script type="text/javascript">
        function validation()
        {
            var form = document.getElementById("register");
            var email = document.getElementById("email").value;
            var text = document.getElementById("text");
            var pattern = /^[^ ]+@[^ ]+.[a-z]{2,3}$/;
            
            if (email.match(pattern))
            {
                form.classList.add("valid");
                form.classList.remove("invalid");
                text.innerHTML = "Alamat Email Anda Sah.";
                text.style.color = "#319795";
            }
            else
            {
                form.classList.remove("valid");
                form.classList.add("invalid");
                text.innerHTML = "Masukan Alamat Email yang Sah.";
                text.style.color = "#ff0000";
            }
        }
    </script>
  </body>
</html>