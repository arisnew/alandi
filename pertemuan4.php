<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			//variable
			$data1 = 1;			//int
			$data1 = 'Satu';	//string
			$x = 12;
			$y = 12;

			//echo $data1;
			/*
				comment here...
			*/

			//operator
			//+, -, /, *, %
			//<,<=,>,>=, ==, ===, !=, <>,
			// &&, ||, 

			//echo ($x + $y);
			/*
			//konstanta
			define('SYSNAME', 'Aplikasi X v.1.0 Beta');

			//echo SYSNAME;
			
			//decision
			if ($x == $y) {
				echo "<script>alert('x dan y sama!');</script>";
			} elseif ($x < $y) {
				echo "<script>alert('x lebih kecil atau sama dg y !');</script>";
			} else {
				echo "<script>alert('x dan y tidak sama!');</script>";
			}

			switch ($x) {
				case 12:
					echo 'variable $x = 12';
					break;
				
				default:
					echo 'unknow';
					break;
			}
			
			//looping
			for ($i=0; $i < 10; $i++) { 
				echo 'Nilai i = ' . $i . '<br>';
			}

			$x = 10;
			while ($x > 1) {
				echo 'Nilai x = ' . $x . '<br>';
				$x--;
			}

			do {
				echo 'Nilai x = ' . $x . '<br>';
			} while ($x > 1);
			
			//function
			function penjumlahan($nilai1 = 123, $nilai2 = 0)
			{
				return ($nilai1 + $nilai2);
			}

			function penjumlahan1($nilai1 = 0, $nilai2 = 0)
			{
				echo ($nilai1 + $nilai2);
			}

			echo penjumlahan();
			echo '<br>Eksekusi penjumlahan1 = ';
			penjumlahan1();
			*/
			//array
			$DATA1 = 123;
			$mobil = array('Avanza','Carry','Fortuner', 12, TRUE);
			$mobil[] = 'Jeep';

			//var_dump($mobil);

			//echo $mobil[5];

			$cars = array(
				'aris' => array(
					'nama' => 'Avanza',
					'transmisi' => 'Manual',
					'harga' => 1000
					),
				'budi' => array(
					'nama' => 'Zenia',
					'transmisi' => 'Automatic',
					'harga' => 1500
					)
				);

			//var_dump($cars);
			echo $cars['budi']['nama'];
			echo "<br>";
			date_default_timezone_set("Asia/Jakarta");
			
			echo date("Y-m-d H:i:s");

		?>
	</body>
</html>