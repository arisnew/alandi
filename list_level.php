<!DOCTYPE html>
<html>
<head>
	<title>Data LEVEL USER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/template/bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<legend><h3>Data LEVEL USER</h3></legend>
		<div class="table-responsive">
			<table class="table table-hover table-striped table-bordered">
				<thead>
					<tr>
						<th>No</th>
						<th>Level Name</th>
						<th>Description</th>
						<th>Status</th>
						<th>Pilihan</th>
					</tr>
				</thead>	
				<?php
		//koneksi
				include_once 'koneksi.php';
		//$query = "SELECT user.*,level.level_name FROM user, level WHERE user.level_id = level.level_id";
				$query = "SELECT * FROM level";
		//eksekusi query
				$eksekusi = mysqli_query($koneksi,$query);
				if (mysqli_num_rows($eksekusi) > 0) {
					$no = 1;
					while ($data = mysqli_fetch_array($eksekusi)) {
						?>
						<tr>
							<td style="text-align:center;"><?=$no?></td>
							<td style="text-align:center;"><?=$data['level_name']?></td>
							<td><?=$data['description']?></td>
							<td style="text-align:center;"><?=$data['is_active']?></td>
							<td style="text-align:center;">
							<a class="btn btn-primary" href="edit_level.php?id=<?=$data['level_id']?>">Edit</a>
							<a class="btn btn-danger" href="delete_level.php?id=<?=$data['level_id']?>">Delete</a>
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
	<script type="text/javascript" src="asset/template/bootstrap/bootstrap.min.js"></script>
	<script type="text/javascript" src="asset/jquery-2.2.3.min.js"></script>
</body>
</html>