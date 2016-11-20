<?php
if($_GET && isset($_GET['id'])) {
	$id = $_GET['id'];
		//koneksi
	include_once 'koneksi.php';
	$query_user = "DELETE FROM user WHERE username = '$id'";
	$user_eksekusi = mysqli_query($koneksi,$query_user);
	if ($user_eksekusi == TRUE)  {
		echo '<script> alert("Data Berhasil di Hapus"); window.location="list_user.php";</script>';
	} else {
		echo '<script> alert("Data Gagal di Hapus"); window.location="list_user.php";</script>';
	}
} else {
	echo "DATA TIDAK SESUAI!";
} ?>