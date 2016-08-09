<!DOCTYPE html>
<html>
<head>
	<title>Form Level User</title>
</head>
<body>	
	<h3>Form LEVEL USER</h3>
	<form action="proses_simpan_level.php" method="post">
		<label>Level Name :</label>
		<input type="text" name="level_name" value="" required="">
		<br>
		<label>Description:</label>
		<input type="text" name="description" value="" required="">
		<br>
		<label>Status :</label>
		<select name="is_active">
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