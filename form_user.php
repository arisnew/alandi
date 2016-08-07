<?php
	//koneksi
	include_once 'koneksi.php';
	//query
	$query = "SELECT * FROM level WHERE is_active = 'Active'";
	//eksekusi
	$eksekusi = mysql_query($query);
	?>
<!DOCTYPE html>
<html>
<head>
	<title>Form User</title>
</head>
<body>	
	<h3>Form USER</h3>
	<form action="proses_simpan.php" method="post">
		<label>Username :</label>
		<input type="text" name="username" value="" required="">
		<br>
		<label>Nama:</label>
		<input type="text" name="nama" value="" required="">
		<br>
		<label>Email :</label>
		<input type="text" name="email" value="" required="">
		<br>
		<label>Telp :</label>
		<input type="text" name="telp" value="" required="">
		<br>
		<label>Password :</label>
		<input type="password" name="pass" value="" required="">
		<br>
		<label>Level :</label>
		<select name="level">
		<?php
			if (mysql_num_rows($eksekusi) > 0) {
				while ($data = mysql_fetch_array($eksekusi)) {
					echo "<option value='" . $data['level_id'] ."'>". $data['level_name'] . "</option>";
				}
			} else echo "<option value=''>Pilih</option>";
			?>
		</select>
		<br>
		<label>Status :</label>
		<select name="status">
			<option value="Active">Active</option>
			<option value="Nonactive">Nonactive</option>
		</select>
		<br>
		<br>
		<input type="submit" name="simpan" value="Simpan">
		<input type="reset" name="batal" value="Batal">
	</form>
</body>
</html>