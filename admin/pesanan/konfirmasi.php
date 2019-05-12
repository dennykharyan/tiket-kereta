<?php

	require '../../config/koneksi.php';
	include '../../config/helper.php';

	$id_konfirmasi    = $_POST["txtIdKonfirmasi"];
	$id_pesan         = $_POST["txtIdPesan"];
	$no_rekening      = $_POST["txtNoRekening"];
	$nama_akun        = $_POST["txtNamaAkun"];
	$tanggal_transfer = $_POST["txtTanggalTransfer"];

	if ((empty($no_rekening)) || (empty($nama_akun)) || (empty($tanggal_transfer))) {
		# code...
		header("location: " . BASE_URL . "index.php?page=konfirmasi_pembayaran&id_pesan=$id_pesan");
	}
	else{
		if ($id_konfirmasi == "") {
			# code...
			$insert = mysql_query("INSERT INTO konfirmasi_pembayaran VALUES(NULL, '$id_pesan', '$no_rekening', '$nama_akun', '$tanggal_transfer')");

			if ($insert) {
				# code...
				header("location: " . BASE_URL . "index.php?page=history");
			}
			else{
				header("location: " . BASE_URL . "index.php?page=konfirmasi_pembayaran&id_pesan=$id_pesan");
			}
		}
		elseif (isset($id_konfirmasi)) {
			# code...
			$update = mysql_query("UPDATE konfirmasi_pembayaran SET noRekening = '$no_rekening', namaAccount = '$nama_akun', tanggalTransfer = '$tanggal_transfer' WHERE idKonfirmasi = '$id_konfirmasi' AND idPesan = '$id_pesan'");

			if ($update) {
				# code...
				header("location: " . BASE_URL . "index.php?page=history");
			}
			else{
				header("location: " . BASE_URL . "index.php?page=konfirmasi_pembayaran&id_pesan=$id_pesan");
			}
		}
	}

?>