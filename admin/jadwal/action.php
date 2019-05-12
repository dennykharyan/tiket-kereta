<?php

	require '../../config/koneksi.php';
	include '../../config/helper.php';

	$id_kereta = $_POST["txtIdKereta"];
	$nama_kereta = $_POST["txtNamaKereta"];
	$tanggal_berangkat = $_POST["txtTanggalBerangkat"];
	$tanggal_tiba = $_POST["txtTanggalTiba"];
	$jam_berangkat = $_POST["txtJamBerangkat"];
	$jam_tiba = $_POST["txtJamTiba"];
	$keberangkatan = $_POST["txtKeberangkatan"];
	$tujuan = $_POST["txtTujuan"];
	$id_kelas = $_POST["txtKelas"];

	if ((empty($nama_kereta)) || (empty($tanggal_berangkat)) || (empty($tanggal_tiba)) || (empty($jam_berangkat)) || (empty($jam_tiba)) || (empty($keberangkatan)) || (empty($tujuan)) || (empty($id_kelas))) {
		# code...
		header("location: " . BASE_URL . "index.php?page=panel&modul=jadwal&action=form&error=empty");
	}
	else{
		if ($id_kereta == "") {
			# code...
			$insert = mysql_query("INSERT INTO kereta VALUES (NULL, '$nama_kereta', '$tanggal_berangkat', '$tanggal_tiba', '$jam_berangkat', '$jam_tiba', '$keberangkatan', '$tujuan', '$id_kelas')");

			if ($insert) {
				# code...
				header("location: " . BASE_URL . "index.php?page=panel&modul=jadwal&action=list");
			}
			else{
				header("location: " . BASE_URL . "index.php?page=panel&modul=jadwal&action=form&action=fail");
			}
		}
		elseif (isset($id_kereta)) {
			# code...
			$update = mysql_query("UPDATE kereta SET namaKA = '$nama_kereta', tanggalBerangkat = '$tanggal_berangkat', tanggalTiba = '$tanggal_tiba', jamBerangkat = '$jam_berangkat', jamTiba = '$jam_tiba', dari = '$keberangkatan', ke = '$tujuan', idKelas = '$id_kelas' WHERE idKA = '$id_kereta'");

			if ($update) {
				# code...
				header("location: " . BASE_URL . "index.php?page=panel&modul=jadwal&action=list");
			}
			else{
				header("location: " . BASE_URL . "index.php?page=panel&modul=jadwal&action=form&action=fail&idKA=$id_kereta");
			}
		}
	}

?>