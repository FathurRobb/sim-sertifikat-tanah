<?php
include '../core/conn.php';




if (isset($_GET['desa'])) {
  $desa = $_GET['desa'];
  $tahun = $_GET['tahun'];
  $data = mysqli_query($connection, "SELECT * FROM data_fisik WHERE desa='$desa' AND tahun='$tahun'");
  $no = 1;

  $rand = rand();
  $xx = $rand.'_'.$desa;

  header('Content-Type: application/xls');
  header("Content-Disposition: attachment; filename=$xx.xls");
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
  </style>
   <body>
     <center>
      <table border="1">
        <thead>
          <th>No</th>
          <th>Nama</th>
          <th>Desa</th>
          <th>No Hak</th>
          <th>No Berkas</th>
        </thead>
        <tbody>
          <?php
           while ($d = mysqli_fetch_array($data)) {
           ?>
          <tr>
            <td><?=$no++;?></td>
            <td><?=$d['nama'];?></td>
            <td><?=$d['desa'];?></td>
            <td><?=$d['no_hak'];?></td>
            <td><?=$d['no_berkas'];?></td>
          </tr>
          <?php
           }
          ?>
        </tbody>
      </table>
     </center>
   </body>
 </html>
