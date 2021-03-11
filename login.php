<?php
if(isset($_GET['pesan'])){
  $pesan = $_GET['pesan'];
  if($pesan == 'berhasil'){
    echo '<script>alert("Data Berhasil Disimpan");</script>';
  }elseif($pesan == 'gagal'){
    echo '<script>alert("Data Gagal Disimpan");</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log in</title>
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,700" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body class="bg-gray-300">
    <div class="h-screen flex items-center justify-center">
      <div class="max-w-sm bg-white">
        <form action="core/auth.php" class="bg-white shadow-md rounded p-10" name="login" method="post" onSubmit="return validasi()">
          <div class="text-sm text-gray-500">
            Selamat Datang
          </div>
          <div class="text-4xl font-bold text-teal-900 mb-7">
            Masuk Terlebih Dahulu
          </div>
          <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="username">
          Nama Pengguna
          </label>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" name="username" id="username" type="text" autocomplete="off">
          <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="password">
          Kata Sandi
          </label>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="password" id="password" type="password">
          <input
            class="mt-5 shadow-sm appearance-none border rounded w-100 text-sm py-3 px-8 font-semibold bg-teal-600 text-white leading-normal"
            name="submit" type="submit" value="Masuk" onclick="validasi()" id="submit">
            <a href="pengajuan.php" class="mt-5 shadow-sm appearance-none border rounded w-100 text-sm py-3 px-8 font-semibold bg-teal-600 text-white leading-normal">Pengajuan</a>
          <div class="text-sm text-gray-500 mt-5 underline"> Tidak memiliki akun? Hubungi Administrator </div>
        </form>
      </div>
    </div>
    <script type="text/javascript">
      function validasi(){
        var username = document.getElementById("username").value;
		    var password = document.getElementById("password").value;
        if(username != "" && password != ""){
          return true;
        }else{
          alert('Username dan Password Harus di Isi');
          return false;
        }
      }
    </script>
  </body>
</html>
