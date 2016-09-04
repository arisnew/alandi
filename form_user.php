<?php
	//koneksi
include_once 'koneksi.php';
	//query
$query = "SELECT * FROM level WHERE is_active = 'Active'";
	//eksekusi
$eksekusi = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/template/bootstrap/css/bootstrap.min.css">
</head>
<body>	
	<div class="container">
		<h3>Form USER</h3>
		<hr>
		<form class="form form-horizontal" role="form" action="proses_simpan.php" method="post">
		<div class="form-group">
				<label class="control-label col-sm-2" for="user">Username :</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="user" name="username" value="" required="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="nama">Nama:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="nama" name="nama" value="" required="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email :</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="email" name="email" value="" required="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="telp">Telp :</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="telp" name="telp" value="" required="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="pwd">Password :</label>
				<div class="col-sm-8">
					<input type="password" class="form-control" id="pwd" name="pass" value="" required="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="level">Level :</label>
				<div class="col-sm-8">
					<select class="form-control" id="level" name="level">
						<?php
						if (mysqli_num_rows($eksekusi) > 0) {
							while ($data = mysqli_fetch_array($eksekusi)) {
								echo "<option value='" . $data['level_id'] ."'>". $data['level_name'] . "</option>";
							}
						} else echo "<option value=''>Pilih</option>";
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="status">Status :</label>
				<div class="col-sm-8">
					<select class="form-control" id="status" name="status">
						<option value="Active">Active</option>
						<option value="Nonactive">Nonactive</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
					<input type="reset" class="btn" name="batal" value="reset">
					<a href="list_user.php" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</form>
			<script type="text/javascript" src="asset/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="asset/template/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="asset/template/menu.js"></script>
	</body>
	</html>