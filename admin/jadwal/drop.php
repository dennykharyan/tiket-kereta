<?php

	require '../../config/koneksi.php';
	include '../../config/helper.php';

	$id_kereta = isset($_GET["idKA"]) ? $_GET["idKA"] : false;

	$drop = mysql_query("DELETE FROM kereta WHERE idKA = '$id_kereta'");

	if ($drop) {
		# code...
		header("location: " . BASE_URL . "index.php?page=panel&modul=jadwal&action=list");
	}
	else{
		header("location: " . BASE_URL . "index.php?page=panel&modul=jadwal&action=list&error=true");
	}

?>