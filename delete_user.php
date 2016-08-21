<?php
	if($_GET && isset($_GET['id'])) {
		$id = $_GET['id'];
		//koneksi
		include_once 'koneksi.php';
		$query_user = "DELETE FROM user WHERE username = '$id'";
		$user_eksekusi = mysql_query($query_user);
		if ($user_eksekusi == TRUE)  {
			echo '<script> alert("Delete Berhasil."); window.location="list_user.php";</script>';
		} else {
			echo '<script> alert("Delete GAGAL!"); window.location="list_user.php";</script>';
		}
	}
	?>