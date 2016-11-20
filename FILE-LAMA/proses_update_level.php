<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	//data from form
	$level_name		= $_POST['level_name'];
	$description	= $_POST['description'];
	$is_active		= $_POST['is_active'];

	//koneksi
	include_once 'koneksi.php';
	//query
	$query = "UPDATE level SET level_name = '$level_name', description = '$description', is_active = '$is_active' WHERE level_name = '$level_name'";
	//eksekusi query
	$eksekusi = mysqli_query($koneksi, $query);
	if ($eksekusi == TRUE) {
		echo "<script>alert('Update Data BERHASIL!')</script>;<script>window.location = 'list_level.php';</script>";
	} else {
		echo "<script>alert('Update Data GAGAL!'); window.location = 'list_level.php';</script>";
	}
	?>
	</body>
	</html>