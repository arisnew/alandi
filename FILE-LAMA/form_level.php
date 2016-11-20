<!DOCTYPE html>
<html>
<head>
	<title>Form Level User</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/template/bootstrap/css/bootstrap.min.css">
</head>
<body>	
	<div id="nav01"></div>
	<div class="container">
		<h3>Form LEVEL USER</h3>
		<br>
		<form class="form-horizontal" role="form" action="proses_simpan_level.php" method="post">
			<div class="form-group">
				<label class="control-label col-sm-2" for="level">Level Name :</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="level" name="level_name" placeholder="Masukkan Nama Level" required="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="des">Description :</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="des" name="description" placeholder="Masukkan Deskripsi User" required="">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-2" for="status">Status :</label>
				<div class="col-sm-8">
					<select class="form-control" id="status" name="is_active">
						<option value="Active">Active</option>
						<option value="Nonactive">Nonactive</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
					<input type="reset" class="btn" name="reset" value="Reset">
					<a href="list_level.php" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>

</div>
<script type="text/javascript" src="asset/template/bootstrap/bootstrap.min.js"></script>
<script type="text/javascript" src="asset/jquery-2.2.3.min.js"></script>
</body>
</html>