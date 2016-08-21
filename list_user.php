<!DOCTYPE html>
<html>
<head>
	<title>Data USER</title>
</head>
<body>
	<h3>Data USER</h3>
	<a href="form_user.php">Add User</a>
	<table border="1" width="80%" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Nama</th>
			<th>Level</th>
			<th>Pilihan</th>
		</tr>
		<?php
		//koneksi
		include_once 'koneksi.php';
		//$query = "SELECT user.*,level.level_name FROM user, level WHERE user.level_id = level.level_id";
		$query = "SELECT * FROM v_user";
		//eksekusi query
		$eksekusi = mysql_query($query);
		if (mysql_num_rows($eksekusi) > 0) {
			$no = 1;
			while ($data = mysql_fetch_array($eksekusi)) {
				?>
				<tr>
					<td style="text-align:center;"><?=$no?></td>
					<td style="text-align:center;"><?=$data['username']?></td>
					<td><?=$data['name']?></td>
					<td style="text-align:center;"><?=$data['level_name']?></td>
					<td style="text-align:center;">
						<a href="edit_user.php?id=<?=$data['username']?>">Edit</a>
						<a href="delete_user.php?id=<?=$data['username']?>" onclick="return confirm('Yakin akan hapus data?!')">Delete</a>
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