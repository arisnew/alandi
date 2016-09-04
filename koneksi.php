<?php
	//variable
	$host		= 'localhost';
	$user		= 'root';
	$pass		= 'Admin';
	$db_name	= 'penggajian_db';

	//koneksi
	$koneksi = mysqli_connect($host, $user, $pass,$db_name);
	//pilih db
	//mysql_select_db($db_name) or die ('Gagal pilih database');
	//cek koneksi
	if (mysqli_connect_errno()) {
		echo "Gagal Konek".mysql_connect_error();
	}
	?>