<?php  
	include '../core/conn.php';
	session_start();

	if($_SESSION['jabatan']==""){
	  header('location:../login.php?pesan=gagal');
	}elseif ($_SESSION['jabatan']!="Admin") {
	  header('location:../core/403.php');
	}
  $ambilNotif = mysqli_query($connection,"SELECT * FROM permohonan WHERE notif = 'unread' ORDER BY id_permohonan ASC");
  $jumlahNotif = mysqli_num_rows($ambilNotif);
	$data = mysqli_query($connection, "SELECT * FROM permohonan");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengumpulan Data Sertifikat - Kabupaten Bandung</title>
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js" integrity="sha256-XF29CBwU1MWLaGEnsELogU6Y6rcc5nCkhhx89nFMIDQ=" crossorigin="anonymous"></script>
    <script src="../user/assets/vendor/chart/Chart.js"></script>
    <style type="text/css">
    .badge {
      top: -10px;
      right: -10px;
      padding: 5px 10px;
      border-radius: 50%;
      background-color: red;
      color: white;
    }
    li.dropdown {
      display: inline-block;
    }
   
    .dropdown:hover .isi-dropdown {
      display: block;
    }
   
    .isi-dropdown a:hover {
      color: #fff !important;
    }
   
    .isi-dropdown {
      position: absolute;
      display: none;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
      background-color: #f9f9f9;
    }
   
    .isi-dropdown a {
      color: #3c3c3c !important;
    }
   
    .isi-dropdown a:hover {
      color: #232323 !important;
      background: #f3f3f3 !important;
    }
    </style>
  </head>


  <body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!--Start Navigation-->
    <nav id="header" class="bg-white fixed w-full z-10 top-0 shadow">
      <div class="w-full container mx-auto flex flex-wrap items-center mt-0 pt-3 pb-3 md:pb-0">
        <div class="w-1/2 pl-2 md:pl-0">
          <a class="text-gray-900 text-base xl:text-xl no-underline hover:no-underline font-bold" href="#">
          <i class="fas fa-book text-orange-600 pr-3"></i> Pengumpulan Data Sertifikat - Kabupaten Bandung
          </a>
        </div>
        <div class="w-1/2 pr-0">
          <div class="flex relative inline-block float-right">
            <div class="relative text-sm">
              <button id="userButton" class="flex items-center focus:outline-none mr-3">
                Hi, <?php echo $_SESSION['username'];?> </span>
                <svg class="pl-2 h-2" version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
                  <g>
                    <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z" />
                  </g>
                </svg>
              </button>
              <div id="userMenu" class="bg-white rounded shadow-md mt-2 absolute mt-12 top-0 right-0 min-w-full overflow-auto z-30 invisible">
                <ul class="list-reset">
                  <li><a href="../core/logout.php" class="px-4 py-2 block text-gray-900 hover:bg-gray-400 no-underline hover:no-underline">Logout</a></li>
                </ul>
              </div>
            </div>
            <div class="block lg:hidden pr-4">
              <button id="nav-toggle" class="flex items-center px-3 py-2 border rounded text-gray-500 border-gray-600 hover:text-gray-900 hover:border-teal-500 appearance-none focus:outline-none">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <title>Menu</title>
                  <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                </svg>
              </button>
            </div>
          </div>
        </div>
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden lg:block mt-2 lg:mt-0 bg-white z-20" id="nav-content">
          <ul class="list-reset lg:flex flex-1 items-center px-4 md:px-0">
            <li class="mr-6 my-2 md:my-0">
              <a href="index.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-orange-600">
              <i class="fas fa-home fa-fw mr-3 text-gray-500"></i><span class="pb-1 md:pb-0 text-sm">Beranda</span>
              </a>
            </li>
            <li class="mr-6 my-2 md:my-0">
              <a href="fisik.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-pink-500">
              <i class="fas fa-book fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Data Fisik</span>
              </a>
            </li>
            <li class="mr-6 my-2 md:my-0">
              <a href="sertifikat.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-purple-500">
              <i class="fa fa-sticky-note fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Data Sertifikat</span>
              </a>
            </li>
            <li class="mr-6 my-2 md:my-0">
              <a href="pbt.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-green-500">
              <i class="fas fa-table fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Data PBT</span>
              </a>
            </li>
            <li class="mr-6 my-2 md:my-0">
              <a href="users.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-red-500">
              <i class="fa fa-user fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Data Pengguna</span>
              </a>
            </li>
            <li class="mr-6 my-2 md:my-0">
              <a href="permohonan.php" class="block py-1 md:py-3 pl-1 align-middle text-blue-500 no-underline hover:text-gray-900 border-b-2 border-white border-blue-500">
              <i class="fa fa-file-word fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Data Pemohon</span>
              </a>
            </li>
            <li class="mr-6 my-2 md:my-0">
              <a href="target.php" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white hover:border-yellow-500">
              <i class="fa fa-check fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Target</span>
              </a>
            </li>
            <li class="dropdown mr-6 my-2 md:my-0">
              <a href="#" class="block py-1 md:py-3 pl-1 align-middle text-gray-500 no-underline hover:text-gray-900 border-b-2 border-white">
              <i class="fa fa-bell fa-fw mr-3"></i><span class="pb-1 md:pb-0 text-sm">Notifikasi <span class="badge"><?php echo $jumlahNotif;?></span></span>
              </a>
                  <ul class="isi-dropdown">
                    <?php  
                      if (count(array($ambilNotif))>0) {
                        foreach (($ambilNotif) as $i) {
                        $id_user = $i['id_user'];
                        $nama = mysqli_query($connection, "SELECT nama_lengkap FROM user WHERE id_user=$id_user");
                        while ($row = $nama->fetch_assoc()) { 
                    ?>
                    <li><a href="edit_permohonan.php?id_permohonan=<?=$i['id_permohonan'];?>">
                      <small><i><?php setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English'); echo strftime('%d %B %Y, %H:%M',strtotime($i['date_created'])); echo " WIB";?></i></small><br/>
                      <b><?=$row['nama_lengkap'];?></b> Membuat Permohonan Baru</a></li><hr>
                  <?php } ?>
                    <?php
                      }  
                     }else{
                         echo "<li><a>Tidak ada data baru.</a></li>";
                     }
                     ?>
                  </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	<!--Container-->
    <div class="container w-full mx-auto pt-20">
      <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal ">
        <div class="w-full p-3">
          <div class="bg-white border rounded shadow-sm p-3">
            <div class="border-b p-3">
              <h5 class="font-bold uppercase text-gray-600">Data Permohonan</h5>
            </div>
            <table class="table-auto w-full">
              <thead>
                <tr class="bg-blue-300">
                  <th class="px-4 py-2">No</th>
                  <th class="px-4 py-2">ID</th>
                  <th class="px-4 py-2">Nama</th>
                  <th class="px-4 py-2">Kecamatan</th>
                  <th class="px-4 py-2">Desa</th>
                  <th class="px-4 py-2">Alamat</th>
                  <th class="px-4 py-2">Status</th>
                  <th class="px-4 py-2">Aksi</th>
                </tr>
              </thead>
              <tbody>

              <?php
              	$no = 0;
                while($d = mysqli_fetch_array($data)){
                	$no++;
              ?>
              <?php  
              	$id_user = $d['id_user'];
              	$nama = mysqli_query($connection, "SELECT nama_lengkap FROM user WHERE id_user=$id_user");
              	while ($row = $nama->fetch_assoc()) {
              ?>
                <tr class="text-center">
                  <td class="border px-4 py-2"><?php echo $no;?></td>
                  <td class="border px-4 py-2"><?=$d['id_permohonan'];?></td>
                  <td class="border px-4 py-2"><?=$row['nama_lengkap'];?></td>
                  <td class="border px-4 py-2"><?=$d['kecamatan'];?></td>
                  <td class="border px-4 py-2"><?=$d['desa'];?></td>
                  <td class="border px-4 py-2"><?=$d['alamat'];?></td>
                  <td class="border px-4 py-2"><?=$d['status'];?></td>
                  <td class="border px-4 py-2">
                    <a href="edit_permohonan.php?id_permohonan=<?=$d['id_permohonan'];?>"><button title="Detail" class="bg-green-400 px-2 py-1 text-sm rounded-md text-green-700"> <i class="fa fa-edit fa-fw"></i> </button></a>
                  </td>
                </tr>
            <?php } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!--End Hasil Pencarian-->

        <!--Modal-->



          <div class="w-full p-3">
            <div class="bg-white border rounded shadow">
              <div class="border-b p-3">
                <h5 class="font-bold uppercase text-gray-600">Informasi</h5>
              </div>
              <div class="p-5">
                <table class="w-full p-5 text-gray-700">
                  <thead>
                    <tr>
                      <th class="text-left text-blue-900">Tentang Website</th>
                      <th class="text-left text-blue-900">Laporan Masalah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Sistem Informasi Pengumpulan Data Sertifikat</td>
                      <td>dev@sakaraguna.id</td>
                    </tr>
                    <tr>
                      <td>Kabupaten Bandung</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        </div>
    <!--/container-->
    <script>
      /*Toggle dropdown list*/
      /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

      var userMenuDiv = document.getElementById("userMenu");
      var userMenu = document.getElementById("userButton");

      var navMenuDiv = document.getElementById("nav-content");
      var navMenu = document.getElementById("nav-toggle");

      document.onclick = check;

      function check(e) {
          var target = (e && e.target) || (event && event.srcElement);

          //User Menu
          if (!checkParent(target, userMenuDiv)) {
              // click NOT on the menu
              if (checkParent(target, userMenu)) {
                  // click on the link
                  if (userMenuDiv.classList.contains("invisible")) {
                      userMenuDiv.classList.remove("invisible");
                  } else { userMenuDiv.classList.add("invisible"); }
              } else {
                  // click both outside link and outside menu, hide menu
                  userMenuDiv.classList.add("invisible");
              }
          }

          //Nav Menu
          if (!checkParent(target, navMenuDiv)) {
              // click NOT on the menu
              if (checkParent(target, navMenu)) {
                  // click on the link
                  if (navMenuDiv.classList.contains("hidden")) {
                      navMenuDiv.classList.remove("hidden");
                  } else { navMenuDiv.classList.add("hidden"); }
              } else {
                  // click both outside link and outside menu, hide menu
                  navMenuDiv.classList.add("hidden");
              }
          }

      }

      function checkParent(t, elm) {
          while (t.parentNode) {
              if (t == elm) { return true; }
              t = t.parentNode;
          }
          return false;
      }
    </script>
  </body>
</html>
