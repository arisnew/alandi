<?php
	function statusData($n = null)
	{
		$result = null;
		if ($n == 1) {
			$result = 'Aktif';
		} else {
			$result = 'Nonaktif';
		}

		return $result;
	}
?>