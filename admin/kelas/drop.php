<?php

	require '../../config/koneksi.php';
	include '../../config/helper.php';

	$id_kelas = isset($_GET["idKelas"]) ? $_GET["idKelas"] : false;

	$drop = mysql_query("DELETE FROM kelas WHERE idKelas = '$id_kelas'");

	if ($drop) {
		# code...
		header("location: " . BASE_URL . "index.php?page=panel&modul=kelas&action=list");
	}
	else{
		header("location: " . BASE_URL . "index.php?page=panel&modul=kelas&action=list&error=fail");
	}

?>