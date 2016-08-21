<?php
	if($_GET && isset($_GET['id'])) {
		$id = $_GET['id'];
		//koneksi
		include_once 'koneksi.php';
		$query_user = "SELECT * FROM level WHERE level_id = '$id'";
		$user_eksekusi = mysqli_query($koneksi, $query_user);
		$user = mysqli_fetch_array($user_eksekusi);

		//query
		$query = "SELECT * FROM level WHERE is_active = 'Active'";
		//eksekusi
		$eksekusi = mysqli_query($koneksi, $query);
		?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Level User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/template/bootstrap/css/bootstrap.min.css">
</head>
<body>	
<div class="container">
	<legend><h3>Form USER</h3></legend>
	<form class="form form-horizontal" role="form" action="proses_update.php" method="post">
	<div class=form-group>
		<label class="control-label col-sm-2" for="level">Level Name :</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" id="level" name="level_name" value="<?=$user['level_name'];?>" disabled="">
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-sm-2" for="des">Description :</label>
		<div class="col-sm-8">
		<input type="text" class="form-control" id="des" name="description" value="<?=$user['description'];?>" required="">
		</div>
		</div>
		<div class="form-group">
		<label class="control-label col-sm-2" for="status">Status :</label>
		<div class="col-sm-8">
		<select class="form-control" id="status" name="is_active">
			<?php echo "<option value='" . $user['is_active'] . "'>" . $user['is_active'] ."</option>";?>
			<option value="Active">Active</option>
			<option value="Nonactive">Nonactive</option>
		</select>
		</div>
		</div>
		<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
		<input type="reset" class="btn btn-danger" name="batal" value="Batal">
		</div>
		</div>
	</form>
	</div>
	<script type="text/javascript" src="asset/template/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="asset/jquery-2.2.3.min.js"></script>
</body>
</html>
	<?php } else {
		echo "Method tidak valid!";
	}
	?>
	