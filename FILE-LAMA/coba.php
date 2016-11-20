<!DOCTYPE html>
<html>
<head>
	<title>Coba</title>
	<style>
	body {
		margin: 0 auto;
		font-family: "Trebuchet MS";
	}			

	.wrapper {
		padding: 5px 20px;
	}

				table {
					margin-left: auto;
					margin-right: auto;
				}

		table, tr, td,th {
				border: 1px solid #333;
				padding: 5px;
				margin-top: 20px;
		}

		h1{
			margin-bottom: 0;
			margin-top: 50px;
		}

		footer {
			position: fixed;
			bottom: 0;
			text-align: center;
			width: 100%;
			background-color: #333;
			color: #ddd;
			padding: 5px;
			margin:0;
		}

		ul li {
			float: left;
			list-style-type: none;
		}

		ul li a {
			display: block;
			padding: 5px 10px;
			text-decoration: none;
			color: #333;
		}
	</style>
</head>
<body>
<ul>
	<li><a href="#">Home</a></li>
	<li><a href="#">Master Data</a></li>
	<li><a href="#">Data Transaksi</a></li>
</ul>
<div class="wrapper">
<h1>Tabel User</h1>
<hr>
<table>
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama User</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>
	</thead>
		<?php
		include "koneksi.php";
		$query		= "SELECT * FROM user";
		$eksekusi	= mysqli_query($koneksi,$query);
		if (mysqli_num_rows($eksekusi) > 0) {
			$no = 1;
			foreach ($eksekusi as $data ) {
				?>
				<tr>
					<td><?=$no?></td>
					<td><?=$data['username']?></td>
					<td><?=$data['name']?></td>
					<td><?=$data['email']?></td>
					<td><?=$data['phone']?></td>
					<td><button>Edit</button><button>Hapus</button></td>
				</tr>
				<?php
				$no++;
			}
		} else {
			echo "<tr><td colspan='5'>Data Tidak Ditemukan...</td></tr>";
		} ?>
</table>
</div>
<footer>&copy; Copyright 2016 | BMT</footer>
</body>
</html>