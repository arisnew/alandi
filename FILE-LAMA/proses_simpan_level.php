<?php
	//data from form
	$level_name		= $_POST['level_name'];
	$description	= $_POST['description'];
	$is_active		= $_POST['is_active'];

	//koneksi
	include_once 'koneksi.php';

	//query
	$query = "INSERT INTO level (level_name, description, is_active)
		VALUES ('$level_name', '$description', '$is_active')";
	//eksekusi query
	$eksekusi = mysqli_query($koneksi, $query);
	if ($eksekusi == TRUE) {
		echo "<script>alert('Simpan Data Berhasil!'); window.location = 'list_level.php';</script>";
	} else {
		echo "<script>alert('Simpan Data GAGAL!'); window.location = 'list_level.php';</script>";
	}