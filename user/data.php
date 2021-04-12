<?php  
	include '../core/conn.php';

	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		if ($id==0) {
			echo "<option>Pilih Desa</option>";
		}else{
			$sql = mysqli_query($connection,"SELECT * FROM permohonan WHERE id_user = '$id'");
			while($row = mysqli_fetch_array($sql)){
				echo '<option value="'.$row['desa'].'">'.$row['desa'].'</option>';
			}
		}
	}

?>