<?php

	$id_pesan = isset($_GET["id_pesan"]) ? $_GET["id_pesan"] : false;

	$select  = mysql_query("SELECT * FROM pesan JOIN user ON pesan.iduser = user.iduser JOIN kereta ON pesan.idKA = kereta.idKA JOIN kelas ON kereta.idKelas = kelas.idKelas WHERE pesan.idPesan = '$id_pesan'");

	$data = mysql_fetch_assoc($select);

?>


<div class="container">
	<div class="row">
		<div class="col l6">
			<button class="btn btn-small">Cetak</button>
		</div>
	</div>


	<div class="row">
		<h5 class="center">Detail Pemesanan</h5>
	</div>


	<div class="row">
		<div class="col m6 l6">
			<div class="col m5 l5 s5">
				<p>No. Pemesanan</p>
				<p>Tanggal Pemesanan</p>
				<p>Keberangkatan</p>
			</div>

			<div class="col m7 l7 s7">
				<p>: <?php echo $data["idPesan"]; ?></p>
				<p>: <?php echo $data["tanggalPesan"]; ?></p>
				<p>: <?php echo $data["dari"] . ", " . $data["tanggalBerangkat"] . " - " . $data["jamBerangkat"]; ?></p>
			</div>

			<div class="col m12 l12">
				<hr>
				<p><?php echo $data["namaPemesan"]; ?></p>
				<p><?php echo $data["alamat"]; ?></p>
				<p><?php echo $data["noTelp"]; ?></p>
			</div>
		</div>


		<div class="col m6 l6">
			<?php
				$get_konfirmasi = mysql_query("SELECT * FROM konfirmasi_pembayaran WHERE idPesan = '$data[idPesan]'");

				if (mysql_num_rows($get_konfirmasi) != 0) {
					# code...
					$data_konfirmasi = mysql_fetch_assoc($get_konfirmasi);
			?>
					<div class="col m5 l5 s5">
						<p>No. Konfirmasi</p>
						<p>No. Rekening</p>
						<p>Nama Akun</p>
						<p>Tanggal Transfer</p>
					</div>

					<div class="col m7 l7 s7">
						<p>: <?php echo $data_konfirmasi["idKonfirmasi"]; ?></p>
						<p>: <?php echo $data_konfirmasi["noRekening"]; ?></p>
						<p>: <?php echo $data_konfirmasi["namaAccount"]; ?></p>
						<p>: <?php echo $data_konfirmasi["tanggalTransfer"]; ?></p>
					</div>
			<?php
				}
			?>
		</div>


		<div class="col m12 l12">
			<table class="centered responsive-table" id="table-modul">
				<thead>
					<tr>
						<th>No. Kereta</th>
						<th>Nama Kereta</th>
						<th>Tujuan</th>
						<th>Kelas</th>
						<th>Dewasa</th>
						<th>Anak</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
				</thead>

				<tbody>
					<tr>
						<td><?php echo $data["idKA"]; ?></td>
						<td><?php echo $data["namaKA"]; ?></td>
						<td><?php echo $data["ke"]; ?></td>
						<td><?php echo $data["namaKelas"]; ?></td>
						<td><?php echo $data["dewasa"]; ?></td>
						<td><?php echo $data["anak"]; ?></td>
						<td>
							<?php
								echo rupiah(($data["dewasa"] + $data["anak"]) * $data["harga"]);
							?>
						</td>
						<td><b><?php echo $status_pesanan[$data["status"]]; ?></b></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>


	<div class="row">
		<?php
			if ($data_konfirmasi["idKonfirmasi"] == 0) {
				# code...
		?>
				<p><i>Silahkan melakukan pembayaran melalui transfer ke rekening BRI dengan no. rekening <?php echo date('Ymdhim'); ?> dan melakukan konfirmasi pembayaran <a href="<?php echo BASE_URL . "index.php?page=konfirmasi_pembayaran&id_pesan=$id_pesan" ?>">disini</a>.</i></p>
		<?php
			}
		?>
	</div>
</div>