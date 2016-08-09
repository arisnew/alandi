<?php
	if($_GET && isset($_GET['id'])) {
		$id = $_GET['id'];
		//koneksi
		include_once 'koneksi.php';
		$query_user = "SELECT * FROM level WHERE level_id = '$id'";
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
		<label>Level Name :</label>
		<input type="text" name="level_name" value="<?=$user['level_name'];?>" readonly="">
		<br>
		<label>Description:</label>
		<input type="text" name="description" value="<?=$user['description'];?>" required="">
		<br>
		<label>Status :</label>
		<select name="is_active">
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
	