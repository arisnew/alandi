<?php
	//variable
	$host	= 'localhost';
	$user	= 'root';
	$pass	= 'Admin';
	$db_name	= 'penggajian_db';

	//koneksi
	mysql_connect($host, $user, $pass) or die (mysql_error());
	//pilih db
	mysql_select_db($db_name) or die ('Gagal pilih database');
	