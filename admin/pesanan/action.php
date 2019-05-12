<?php

	require '../../config/koneksi.php';
	include '../../config/helper.php';

	$id            = $_POST["txtIdUser"];
	$id_pesan      = $_POST["txtIdPesan"];
	$nama_pemesan  = $_POST["txtNamaPemesan"];
	$alamat        = $_POST["txtAlamat"];
	$no_telepon    = $_POST["txtNoTelp"];
	$tanggal_pesan = $_POST["txtTanggalPesan"];
	$kursi_dewasa  = $_POST["txtDewasa"];
	$kursi_anak    = $_POST["txtAnak"];
	$id_kereta     = $_POST["txtIdKa"];


	if ((empty($alamat)) || (empty($no_telepon)) || (empty($id_kereta))) {
		# code...
		header("location: " . BASE_URL . "index.php?page=detail_kereta&id_ka=$id_kereta&error=empty");
	}
	else{
		if ($id_pesan == "") {
			# code...
			$insert = mysql_query("INSERT INTO pesan VALUES(NULL, '$id', '$nama_pemesan', '$alamat', '$no_telepon', '$tanggal_pesan', '$kursi_dewasa', '$kursi_anak', '$id_kereta', '0')");

			if ($insert) {
				# code...
				$id_pesan = mysql_insert_id();
				header("location: " . BASE_URL . "index.php?page=panel&modul=pesanan&action=detail_pesanan&id_pesan=$id_pesan");
			}
			else{
				header("location: " . BASE_URL . "index.php?page=detail_kereta&id_ka=$id_kereta&error=fail");
			}
		}
		elseif (isset($id_pesan)) {
			# code...
			$update = mysql_query("UPDATE pesan SET namaPemesan = '$nama_pemesan', alamat = '$alamat', noTelp = '$no_telepon', dewasa = '$kursi_dewasa', anak = '$kursi_anak' WHERE idPesan = '$id_pesan' AND iduser = '$id'");

			if ($update) {
				# code...
				header("location: " . BASE_URL . "index.php?page=detail_pesanan&id_pesan=$id_pesan");
			}
			else{
				header("location: " . BASE_URL . "index.php?page=detail_kereta&id_ka=$id_kereta&error=fail");
			}
		}
	}


?>