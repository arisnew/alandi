<?php
	if($_GET && isset($_GET['id'])) {
		$id = $_GET['id'];
		//koneksi
		include_once 'koneksi.php';
		$query_user = "SELECT * FROM user WHERE username = '$id'";
		$user_eksekusi = mysql_query($query_user);
		$user = mysql_fetch_array($user_eksekusi);

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
	<form action="proses_update.php" method="post">
		<label>Username :</label>
		<input type="text" name="username" value="<?=$user['username'];?>" readonly="">
		<br>
		<label>Nama:</label>
		<input type="text" name="nama" value="<?=$user['name'];?>" required="">
		<br>
		<label>Email :</label>
		<input type="text" name="email" value="<?=$user['email'];?>" required="">
		<br>
		<label>Telp :</label>
		<input type="text" name="telp" value="<?=$user['phone'];?>" required="">
		<br>
		<label>Password :</label>
		<input type="password" name="pass" value="" required="">
		<br>
		<label>Level :</label>
		<select name="level">
		<?php
			if (mysql_num_rows($eksekusi) > 0) {
				while ($data = mysql_fetch_array($eksekusi)) {
					if ($user['level_id'] == $data['level_id']) {
						echo "<option value='" . $data['level_id'] ."' selected=''>". $data['level_name'] . "</option>";
					} else {
						echo "<option value='" . $data['level_id'] ."'>". $data['level_name'] . "</option>";
					}
				}
			} else echo "<option value=''>Pilih</option>";
			?>
		</select>
		<br>
		<label>Status :</label>
		<select name="status">
			<?php echo "<option value='" . $user['is_active'] . "'>" . $user['is_active'] ."</option>";?>
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
	<?php } else {
		echo "Method tidak valid!";
	}
	?>
	