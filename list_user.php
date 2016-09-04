<!DOCTYPE html>
<html>
<head>
	<title>Data USER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/template/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="asset/style.css">
</head>
<body>
	<div class="wrapper">
		<div id="nav01"></div>
		<div class="container">
			<legend><h3>Data USER</h3></legend>
			<a href="form_user.php" class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Tambah User</a>
			<br><br>
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Username</th>
							<th>Nama</th>
							<th>Level</th>
							<th>Pilihan</th>
						</tr>
					</thead>
					<?php
		//koneksi
					include_once 'koneksi.php';
		//$query = "SELECT user.*,level.level_name FROM user, level WHERE user.level_id = level.level_id";
					$query = "SELECT * FROM v_user";
		//eksekusi query
					$eksekusi = mysqli_query($koneksi, $query);
					if (mysqli_num_rows($eksekusi) > 0) {
						$no = 1;
						while ($data = mysqli_fetch_array($eksekusi)) {
							?>
							<tr>
								<td style="text-align:center;"><?=$no?></td>
								<td style="text-align:center;"><?=$data['username']?></td>
								<td><?=$data['name']?></td>
								<td style="text-align:center;"><?=$data['level_name']?></td>
								<td style="text-align:center;">
									<a class="btn btn-primary" href="edit_user.php?id=<?=$data['username']?>">Edit</a>
									<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="delete_user.php?id=<?=$data['username']?>">Delete</a>
								</td>
							</tr>
							<?php
							$no++;
						}
					} else {
						echo "<tr><td colspan = '5'>Tidak ada data.</td></tr>";
					}
					?>
				</table>
			</div>
		</div>
		<div class="push"></div>
	</div>
	<div id="footer"></div>
	<script type="text/javascript" src="asset/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="asset/template/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="asset/template/menu.js"></script>
</body>
</html>