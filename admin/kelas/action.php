<?php

	require '../../config/koneksi.php';
	include '../../config/helper.php';

	$id_kelas   = $_POST["txtIdKelas"];
	$nama_kelas = $_POST["txtNamaKelas"];
	$harga      = $_POST["txtHarga"];

	if ((empty($nama_kelas)) || (empty($harga))) {
		# code...
		header("location: " . BASE_URL . "index.php?page=panel&modul=kelas&action=form&idKelas=$id_kelas");
	}
	else{
		if ($id_kelas == "") {
			# code...
			$insert = mysql_query("INSERT INTO kelas VALUES (NULL, '$nama_kelas', '$harga')");

			if ($insert) {
				# code...
				header("location: " . BASE_URL . "index.php?page=panel&modul=kelas&action=list");
			}
			else{
				header("location: " . BASE_URL . "index.php?page=panel&modul=kelas&action=form&error=fail");
			}
		}
		elseif (isset($id_kelas)) {
			# code...
			$update = mysql_query("UPDATE kelas SET namaKelas = '$nama_kelas', harga = '$harga' WHERE idKelas = '$id_kelas'");

			if ($update) {
				# code...
				header("location: " . BASE_URL . "index.php?page=panel&modul=kelas&action=list");
			}
			else{
				header("location: " . BASE_URL . "index.php?page=panel&modul=kelas&action=form&error=fail&idKelas=$id_kelas");
			}
		}
	}

?>