<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="asset/sweetalert-master/dist/sweetalert.css">
</head>
<body>
<script type="text/javascript">
function sweet() {
		document.getElementById('sweet').innerHTML =
		swal('Data Tersimpan !','Data Berhasil Tersimpan !','success');
	}
</script>
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
	$query = "INSERT INTO user (username, name, email, phone, password, level_id, is_active)
		VALUES ('$username', '$nama', '$email', '$telp', '$pass', '$level', '$status')";
	//eksekusi query
	$eksekusi = mysqli_query($koneksi, $query);
	if ($eksekusi == TRUE) {
		echo "<script>alert('Simpan Data BERHASIL!');window.location = 'list_user.php';</script>";
	} else {
		echo "<script>alert('Simpan Data GAGAL!'); window.location = 'list_user.php';</script>";
	}
?>
</body>
</html>