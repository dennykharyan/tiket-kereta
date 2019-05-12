<?php

	include 'navbar.php';

	$id_pesan = isset($_GET["id_pesan"]) ? $_GET["id_pesan"] : false;

	$select = mysql_query("SELECT * FROM pesan JOIN kereta ON pesan.idKA = kereta.idKA JOIN kelas ON kereta.idKelas = kelas.idKelas WHERE idPesan = '$id_pesan' AND status = '0'");

	$data = mysql_fetch_assoc($select);

	$nama_pemesan = $data["namaPemesan"];
	$alamat = $data["alamat"];
	$no_telepon = $data["noTelp"];
	$tanggal_pesan = $data["tanggalPesan"];
	$kursi_dewasa = $data["dewasa"];
	$kursi_anak = $data["anak"];
	$id_kereta = $data["idKA"];
	$nama_kereta = $data["namaKA"];
	$tanggal_berangkat = $data["tanggalBerangkat"];
	$tanggal_tiba = $data["tanggalTiba"];
	$jam_berangkat = $data["jamBerangkat"];
	$jam_tiba = $data["jamTiba"];
	$keberangkatan = $data["dari"];
	$tujuan = $data["ke"];
	$kelas = $data["namaKelas"];
	$harga = $data["harga"];

	$total = ($kursi_dewasa + $kursi_anak) * $harga;

?>



<div class="container">
	<div class="row">
		<div class="col l12">
			<h5><i class=""></i>Konfirmasi Pemesanan</h5>
		</div>
	</div>


	<div class="row">
		<form method="POST" action="<?php echo BASE_URL . "admin/pesanan/konfirmasi.php" ?>">
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
				<div class="col m4 l4 s4">
					<p>Nama Pemesan</p>
					<p>Alamat</p>
					<p>No. Telepon</p>
					<p>Tanggal Pesan</p>
					<br>
					<p>Kursi Dewasa</p>
					<p>Kursi Anak</p>
					<p>Total</p>
				</div>
				<div class="col m8 l8 s8">
					<p>: <?php echo $nama_pemesan; ?></p>
					<p>: <?php echo $alamat; ?></p>
					<p>: <?php echo $no_telepon; ?></p>
					<p>: <?php echo $tanggal_pesan; ?></p>
					<br>
					<p>: <?php echo $kursi_dewasa; ?></p>
					<p>: <?php echo $kursi_anak; ?></p>
					<p><b>: <?php echo rupiah($total); ?></b></p>
				</div>
			</div>
			<div class="col m6 l6 offset-m3 offset-l3">
				<input type="hidden" name="txtIdKonfirmasi">
				<input type="hidden" name="txtIdPesan" value="<?php echo $id_pesan; ?>">

				<div class="input-field">
					<input type="text" name="txtNoRekening" class="validate">
					<label for="txtNoRekening">No. Rekening</label>
				</div>

				<div class="input-field">
					<input type="text" name="txtNamaAkun" class="validate">
					<label for="txtNamaAkun">Nama AKun</label>
				</div>

				<div class="input-field">
					<input type="text" name="txtTanggalTransfer" class="datepicker">
					<label for="txtTanggalTransfer">Tanggal Transfer</label>
				</div>

				<div class="input-field">
					<button type="submit" class="btn">Konfirmasi</button>
				</div>
			</div>
		</form>
	</div>
</div>