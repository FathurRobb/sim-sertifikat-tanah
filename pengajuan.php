<?php
if(isset($_GET['pesan'])){
  $pesan = $_GET['pesan'];
  if($pesan == 'sukses'){
    echo '<script>alert("Data Berhasil Disimpan");</script>';
  }elseif($pesan == 'gagal'){
    echo '<script>alert("Data Gagal Disimpan");</script>';
  }elseif ($pesan == 'berkas') {
	echo '<script>alert("No Berkas Sudah Terdaftar");</script>';
  }elseif ($pesan == 'hak') {
	echo '<script>alert("No Hak Sudah Terdaftar");</script>';
  }elseif ($pesan == 'sertifikat') {
	echo '<script>alert("No Sertifikat Sudah Terdaftar");</script>';
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
    <div class="flex items-center justify-center">
      <div class="max-w-sm bg-white">
        <form action="user/controller/pengajuan.php" enctype="multipart/form-data" class="bg-white shadow-md rounded p-10" name="login" method="post" onSubmit="return validasi()">
          <div class="text-4xl font-bold text-teal-900 mb-7">
            Form Pengajuan
          </div>
          <div class="text-sm text-gray-500 mt-5 underline"> Silahkan Catat Kode Token Untuk Melihat Progres </div>
          <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="token">
          Token
          </label>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="token" id="token" type="text" value="<?= substr(md5(time()), 0, 6);?>">
          <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="nama">
          Nama Lengkap
          </label>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight" name="nama" id="nama" type="text" autocomplete="off">
          <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="desa">
          Desa
          </label>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="desa" id="desa" type="text">
            <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="kecamatan">
          Kecamatan
          </label>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="kecamatan" id="kecamatan" type="text">
            <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="ktp">
          KTP
          </label>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="image[]" id="ktp" type="file" multiple />
            <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="berita_acara">
          Berita Acara
          </label>
          <a href="assets/persyaratan/Berita Acara.doc">Download file disini</a>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="image[]" id="berita_acara" type="file" multiple />
            <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="risalah">
          Risalah 201B
          </label>
          <a href="assets/persyaratan/Risalah 201B.doc">Download file disini</a>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="image[]" id="risalah" type="file" multiple />
            <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="sktbma">
          SKTBMA
          </label>
          <a href="assets/persyaratan/SKTBMA.doc">Download file disini</a>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="image[]" id="sktbma" type="file" multiple />
            <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="s_permohonan">
          Surat Permohonan
          </label>
          <a href="assets/persyaratan/Surat Permohonan.doc">Download file disini</a>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="image[]" id="s_permohonan" type="file" multiple />
            <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="s_pernyataan">
          Surat Pernyataan
          </label>
          <a href="assets/persyaratan/Surat Pernyataan.doc">Download file disini</a>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="image[]" id="s_pernyataan" type="file" multiple />
            <label class="block text-gray-500 text-sm font-semibold mt-3 mb-2" for="s_riwayat_tanah">
          Surat Riwayat Tanah
          </label>
          <a href="assets/persyaratan/Surat Riwayat Tanah.doc">Download file disini</a>
          <input
            class="focus:outline-none focus:border-teal-300 shadow-sm appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight"
            name="image[]" id="s_riwayat_tanah" type="file" multiple />
          <input
            class="mt-5 shadow-sm appearance-none border rounded w-100 text-sm py-3 px-8 font-semibold bg-teal-600 text-white leading-normal"
            name="submit" type="submit" value="Kirim" onclick="validasi()" id="submit">
        </form>
      </div>
    </div>
    <script type="text/javascript">
      window.alert("Untuk File Berita Acara, Risalah, 201B, SKTBMA, Surat Permohonan, Surat Pernyataan dan Surat Riwayat Tanah Dapat di Download Disini.");
    </script>
    <script type="text/javascript">
      function validasi(){
        var nama = document.getElementById("nama").value;
		var desa = document.getElementById("desa").value;
        var kecamatan = document.getElementById("kecamatan").value;
		var ktp = document.getElementById("ktp").value;
        if(nama != "" && desa != "" && kecamatan != "" && ktp != ""){
          return true;
        }else{
          alert('Silahkan Isi Seluruh Data Untuk Pengajuan');
          return false;
        }
      }
    </script>
  </body>
</html>