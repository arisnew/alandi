<!DOCTYPE html>
<html>
<head>
	<title>Data LEVEL USER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="asset/template/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="asset/style.css">
</head>
<body>

	<div class="wrapper">


		<div id="nav01"></div>

		<!-- Content START -->
		<div id="slideshow" class="carousel slide" data-ride="carousel">
			<!-- Indicators, Ini adalah Tombol BULET BULET dibawah. item ini dapat dihapus jika tidak diperlukan -->
			<ol class="carousel-indicators">
				<li data-target="#slideshow" data-slide-to="0" class="active"></li>
				<li data-target="#slideshow" data-slide-to="1"></li>
				<li data-target="#slideshow" data-slide-to="2"></li>
			</ol>

			<!-- Wrapper for slides, Ini adalah Tempat Gambar-->
			<div class="carousel-inner">
				<div class="item active">
					<img src="1.jpg" alt="slideshow"> <!—Gambar -->
					<div class="carousel-caption"> <!—Penjelasan -->

					</div>
				</div>
				<div class="item">
					<img class="" src="1.jpg" alt="slideshow"> <!—Gambar -->
					<div class="carousel-caption">  <!—Penjelasan -->
						
					</div>
				</div>
				<div class="item">
					<img src="1.jpg" alt="slideshow"> <!—Gambar -->
					<div class="carousel-caption"> <!—Penjelasan -->
						
					</div>
				</div>


			</div>

			<!-- Controls, Ini adalah Panah Kanan dan Kiri. item ini dapat dihapus jika tidak diperlukan-->
			<a class="left carousel-control" href="#slideshow" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#slideshow" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
		<!-- Content END -->

		<div class="container">
			<legend><h3>Data LEVEL USER</h3></legend>
			<a href="form_level.php" class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Tambah User Level</a>
			<br>
			<br>
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
					include 'koneksi.php';
		//$query = "SELECT user.*,level.level_name FROM user, level WHERE user.level_id = level.level_id";
					$query = "SELECT * FROM level";
		//eksekusi query
					$eksekusi = mysqli_query($koneksi,$query);
					if (mysqli_num_rows($eksekusi) > 0) {
						$no=1;
						///while ($data = mysqli_fetch_array($eksekusi)) {
						foreach ($eksekusi as $data) {
							?>
							<tr>
								<td style="text-align:center;"><?=$no?></td>
								<td style="text-align:center;"><?=$data['level_name']?></td>
								<td><?=$data['description']?></td>
								<td style="text-align:center;"><?=$data['is_active']?></td>
								<td style="text-align:center;">
									<a class="btn btn-primary" href="edit_level.php?id=<?=$data['level_id']?>">Edit</a>
									<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')" href="delete_level.php?id=<?=$data['level_id']?>">Delete</a>
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
			<br><br>
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<td>No.</td>
							<td>Username</td>
							<td>Name</td>
							<td>Email</td>
							<td>Phone</td>
						</tr>
					</thead>
					<?php 
					include "koneksi.php";
					$query2 = "SELECT * FROM user";
					$eksekusi2 = mysqli_query($koneksi,$query2);
					if (mysqli_num_rows($eksekusi2) > 0) {
						$no2 = 1;
						while ($data2 = mysqli_fetch_array($eksekusi2)) {
							?>
							<tr>
							<td> <? =$no2 ?> </td>
							<td> <? =$data2['username'] ?> </td>
							<td> <? =$data2['name'] ?> </td>
							<td> <? =$data2['email'] ?> </td>
							<td> <? =$data2['phone'] ?> </td>
							</tr>
							<?php
							$no2++;
						}
					} else {
						echo "<tr><td> colspan='5'>Data Tidak Ditemukan...</td></tr>";
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