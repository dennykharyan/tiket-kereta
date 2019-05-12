<?php

	include 'navbar.php';
	
	if ($id == "") {
		# code...
		header("location: " . BASE_URL . "index.php?page=login");
	}

	$id_ka             = isset($_GET["id_ka"]) ? $_GET["id_ka"] : false;
	
	$select            = mysql_query("SELECT * FROM kereta JOIN kelas ON kereta.idKelas = kelas.idKelas WHERE idKA = '$id_ka'");
	$data              = mysql_fetch_assoc($select);
	
	$nama_kereta       = $data["namaKA"];
	$tanggal_berangkat = $data["tanggalBerangkat"];
	$tanggal_tiba      = $data["tanggalTiba"];
	$jam_berangkat     = $data["jamBerangkat"];
	$jam_tiba          = $data["jamTiba"];
	$keberangkatan     = $data["dari"];
	$tujuan            = $data["ke"];
	$kelas             = $data["namaKelas"];
	$harga             = $data["harga"];

?>

<div class="container">
	<div class="row">
		<h3><i class="material-icons left">event_seat</i>Pesan Kereta</h3>
	</div>
	<div class="row">
		<form method="POST" action="<?php echo BASE_URL . "/admin/pesanan/action.php" ?>">
			<div class="col m6 l6">
				<div class="col m4 l4 s4">
					<p>Nama Kereta</p>
					<p>Tanggal Berangkat</p>
					<p>Keberangkatan</p>
					<p>Tujuan</p>
					<p>Kelas</p>
					<p>Harga</p>
				</div>
				<div class="col m8 l8 s8">
					<p>: <?php echo $nama_kereta; ?></p>
					<p>: <?php echo $tanggal_berangkat . " / " . $jam_berangkat; ?></p>
					<p>: <?php echo $keberangkatan; ?></p>
					<p>: <?php echo $tujuan; ?></p>
					<p>: <?php echo $kelas; ?></p>
					<p>: <?php echo rupiah($harga); ?></p>
				</div>
			</div>

			<div class="col m6 l6">
				<input type="hidden" name="txtIdUser" value="<?php echo $id; ?>">
				<input type="hidden" name="txtIdKa" value="<?php echo $id_ka; ?>">

				<div class="input-field col m12 l12 s12">
					<input type="text" name="txtTanggalPesan" value="<?php echo date('Y-m-d'); ?>" readonly>
					<label for="txtTanggalPesan">Tanggal Pesan</label>
				</div>

				<div class="input-field col m12 l12 s12">
					<input type="text" name="txtNamaPemesan" value="<?php echo $nama; ?>">
					<label for="txtNamaPemesan">Nama Pemesan</label>
				</div>

				<div class="input-field col m12 l12 s12">
					<textarea name="txtAlamat" class="materialize-textarea"></textarea>
					<label for="txtAlamat">Alamat</label>
				</div>

				<div class="input-field col m12 l12 s12">
					<input type="text" name="txtNoTelp" value="">
					<label for="txtNoTelp">No. Telepon</label>
				</div>

				<div class="input-field col m12 l12 s12">
					<input type="number" name="txtDewasa" value="">
					<label for="txtDewasa">Kursi Dewasa</label>
				</div>

				<div class="input-field col m12 l12 s12">
					<input type="number" name="txtAnak" value="">
					<label for="txtAnak">Kursi Anak</label>
				</div>

				<div class="col m12 l12 s12">
					<button type="submit" class="btn btn-small waves-effect waves-light">
						<i class="material-icons right">send</i>Pesan Sekarang
					</button>
				</div>
			</div>
		</form>
	</div>
</div>