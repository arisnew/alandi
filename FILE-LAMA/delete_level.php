<?php
	if($_GET && isset($_GET['id'])) {
		$level_id = $_GET['id'];
		//koneksi
		include "koneksi.php";
		$query = "DELETE FROM level WHERE level_id = '$level_id'";
		$exe = mysqli_query($koneksi,$query);
		if ($exe == TRUE) {
			echo "<script>alert('Data Berhasil di Hapus');window.location='list_level.php';</script>";
		} else {
			echo "<script>alert('Data Gagal di Hapus');window.location='list_level.php';</script>";
		}
	} else {
		echo "DATA TIDAK SESUAI!";
	}
	?>