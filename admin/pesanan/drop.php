<?php

	require '../../config/koneksi.php';
	include '../../config/helper.php';

	$id_pesan = isset($_GET["id_pesan"]) ? $_GET["id_pesan"] : false;

	$drop = mysql_query("UPDATE pesan SET status = '2' WHERE idPesan = '$id_pesan'");

	if ($drop) {
		# code...
		header("location: " . BASE_URL . "index.php?page=panel&modul=pesanan&action=list");
	}
	else{
		header("location: " . BASE_URL . "index.php?page=panel&modul=pesanan&action=list&error=faildrop");
	}

?>