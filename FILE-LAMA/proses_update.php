<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="asset/sweetalert-master/dist/sweetalert.css">
</head>
<body>
<?php
	//data from form
	$username	= $_POST['username'];
	$nama	= $_POST['nama'];
	$email	= $_POST['email'];
	$telp	= $_POST['telp'];
	$pass	= $_POST['pass'];
	$status	= $_POST['status'];
	$level	= $_POST['level'];

	//koneksi
	include_once 'koneksi.php';
	//query
	$query = "UPDATE user SET name = '$nama', email = '$email', phone = '$telp', password = '$pass', level_id = '$level' , is_active = '$status' WHERE username = '$username'";
	//eksekusi query
	$eksekusi = mysqli_query($koneksi, $query);
	if ($eksekusi == TRUE) {
		echo "<script>alert('Update Data BERHASIL!');window.location = 'list_user.php';</script>";
	} else {
		echo "<script>alert('Update Data GAGAL!'); window.location = 'list_user.php';</script>";
	}
	?>
	</body>
	</html>