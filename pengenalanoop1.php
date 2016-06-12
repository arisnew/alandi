<?php
	class Mobil
	{
		public $warna = 'Merah';
		private $pintu = 4;
		private $speed = 0;
		
		function __construct()
		{
			//konstruktor
			echo 'Object mobil baru dibuat....<br>';
		}

		public function stater()
		{
			echo 'Mobil mulai start...<br>';
		}

		public function gass($n = 0)
		{
			if($n > 0) {
				$this->speed = $n;
			}
		}

		public function get_speed()
		{
			return $this->speed . 'KM/Jam';
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Pengenalan OOP</title>
	</head>
	<body>
	<?php
	//object
	$avanza = new Mobil();
	echo '<br>Warna mobil = ' . $avanza->warna;
	//chane propert..
	$avanza->warna = 'Biru';
	echo '<br>Ubah warna mobil...<br>';
	echo '<br>Warna mobil = ' . $avanza->warna;
	echo "<br>";
	echo $avanza->stater();
	//cek kecepatan
	echo '<br>Kecepatan mobil saat ini = ' . $avanza->get_speed();
	echo '<br>gasss..<br>';
	$avanza->gass(20);
	//cek kecepatan
	echo '<br>Kecepatan mobil saat ini = ' . $avanza->get_speed();
	//cek langsung kecepatan...
	echo $avanza->speed;
	/*
	//create object ...
	$jeep = new Mobil();
	echo '<br>Warna mobil jeep = ' . $jeep->warna;
	*/
	?>
	<!--
	//mobil
		//properti
		-> waran : merah
		-> transmisi : manual
		-> roda : 4;

		//method
		-> akselerasi => maju mundur
		-> rem => mengurangi kecepatan

	//object
	mobil avanza > mobi
	-->
	</body>
</html>