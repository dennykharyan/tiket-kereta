<?php

	include 'navbar.php';

	$select = mysql_query("SELECT * FROM pesan JOIN user ON pesan.iduser = user.iduser JOIN kereta ON pesan.idKA = kereta.idKA JOIN kelas ON kereta.idKelas = kelas.idKelas WHERE pesan.iduser = '$id'");

?>



<div class="row">
	<table class="centered highlight" id="table-modul">
		<thead>
			<tr>
				<th>No. Pemesanan</th>
				<th>Nama Pemesan</th>
				<th>Tanggal Pesan</th>
				<th>Nama Kereta</th>
				<th>Kelas</th>
				<th>Tanggal Berangkat</th>
				<th>Tujuan</th>
				<th>Total</th>
				<th>Status</th>
				<th></th>
			</tr>
		</thead>


		<tbody>
			<?php
				while ($data = mysql_fetch_assoc($select)) {
					# code...
			?>
					<tr>
						<td><?php echo $data["idPesan"]; ?></td>
						<td><?php echo $data["namaPemesan"]; ?></td>
						<td><?php echo $data["tanggalPesan"]; ?></td>
						<td><?php echo $data["namaKA"]; ?></td>
						<td><?php echo $data["namaKelas"]; ?></td>
						<td><?php echo $data["tanggalBerangkat"]; ?></td>
						<td><?php echo $data["ke"]; ?></td>
						<td>
							<?php
								echo rupiah(($data["dewasa"] + $data["anak"]) * $data["harga"]);
							?>
						</td>
						<td><?php echo $status_pesanan[$data["status"]]; ?></td>
						<td>
							<a class="btn btn-small red text-white waves-effect waves-lighten" href="<?php echo BASE_URL . "index.php?page=detail_pesanan&id_pesan=$data[idPesan]" ?>">detail</a>
						</td>
					</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>