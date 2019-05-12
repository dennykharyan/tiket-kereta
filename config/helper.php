<?php

	define('BASE_URL', 'http://localhost/tiket_kereta/');

	function rupiah($x)
	{
		# code...
		$y = "Rp. " . number_format($x);
		return $y;
	}

	$status_pesanan[0] = "Konfirmasi";
	$status_pesanan[1] = "Lunas";
	$status_pesanan[2] = "Batal";

?>