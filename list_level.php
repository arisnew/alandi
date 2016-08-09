<!DOCTYPE html>
<html>
<head>
	<title>Data LEVEL USER</title>
</head>
<body>
	<h3>Data LEVEL USER</h3>
	<table border="1" width="80%" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Level Name</th>
			<th>Description</th>
			<th>Status</th>
			<th>Pilihan</th>
		</tr>
		<?php
		//koneksi
		include_once 'koneksi.php';
		//$query = "SELECT user.*,level.level_name FROM user, level WHERE user.level_id = level.level_id";
		$query = "SELECT * FROM level";
		//eksekusi query
		$eksekusi = mysql_query($query);
		if (mysql_num_rows($eksekusi) > 0) {
			$no = 1;
			while ($data = mysql_fetch_array($eksekusi)) {
				?>
				<tr>
					<td style="text-align:center;"><?=$no?></td>
					<td style="text-align:center;"><?=$data['level_name']?></td>
					<td><?=$data['description']?></td>
					<td style="text-align:center;"><?=$data['is_active']?></td>
					<td style="text-align:center;">
						<a href="edit_level.php?id=<?=$data['level_id']?>">Edit</a>
						<a href="delete_level.php?id=<?=$data['level_id']?>">Delete</a>
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
</body>
</html>