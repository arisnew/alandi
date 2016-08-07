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
	$eksekusi = mysql_query($query);
	if ($eksekusi == TRUE) {
		echo "<script>alert('Simpan Data Berhasil!'); window.location = 'form_user.php';</script>";
	} else {
		echo "<script>alert('Simpan Data GAGAL!'); window.location = 'form_user.php';</script>";
	}