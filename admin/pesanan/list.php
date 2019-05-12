<?php 

	$select  = mysql_query("SELECT * FROM pesan JOIN user ON pesan.iduser = user.iduser JOIN kereta ON pesan.idKA = kereta.idKA JOIN kelas ON kereta.idKelas = kelas.idKelas ORDER BY pesan.tanggalPesan DESC");
	
	$error   = isset($_GET["error"]) ? $_GET["error"] : false;
	$halaman = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
	$limit   = 50;
	$start   = ($halaman - 1) * $limit;

?>



<div class="row">
	


	<?php
		if ($error == "faildrop") {
			# code...
	?>
			<div class="row center-align">
				<div class="chip red-text">
					Gagal membatalkan pesanan, silahkan ulangi lagi
					<i class="close material-icons">close</i>
				</div>
			</div>
	<?php
		}
		elseif ($error == "konfirmasi") {
			# code...
	?>
			<div class="row center-align">
				<div class="chip red-text">
					Gagal konfirmasi pesanan, silahkan ulangi lagi
					<i class="close material-icons">close</i>
				</div>
			</div>
	<?php
		}
	?>
	


	<table class="centered highlight" id="table-modul">
		<thead>
			<tr>
				<th>No. Order</th>
				<th>Nama Pemesan</th>
				<th>Tanggal Pesan</th>
				<th>Kereta</th>
				<th>Kelas</th>
				<th>Berangkat</th>
				<th>Tujuan</th>
				<th>Total</th>
				<th>Status</th>
				<th colspan="4"></th>
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
							<a href="<?php echo BASE_URL . "index.php?page=panel&modul=pesanan&action=detail&id_pesan=$data[idPesan]" ?>">detail</a>
						</td>
						<td>
							<a href="<?php echo BASE_URL . "admin/pesanan/update_status.php?id_pesan=$data[idPesan]" ?>">konfirmasi</a>
						</td>
						<td>
							<a href="<?php echo BASE_URL . "admin/pesanan/drop.php?id_pesan=$data[idPesan]" ?>">batalkan</a>
						</td>
					</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>


<div class="row">
	<ul class="pagination center-align">
		<?php
			$page_count = mysql_num_rows($select);
			$page_sum   = ceil($page_count/$limit);

			for ($i=1; $i <= $page_sum ; $i++) { 
				# code...
				if ($halaman == $i) {
					# code...
		?>
					<li class="active yellow darken-3">
						<a href="<?php echo BASE_URL . "index.php?page=panel&modul=pesanan&action=list&halaman=$i" ?>">
							<?php echo $i; ?>
						</a>
					</li>
		<?php
				}
				else{
		?>
					<li class="yellow darken-3">
						<a href="<?php echo BASE_URL . "index.php?page=panel&modul=pesanan&action=list&halaman=$i" ?>">
							<?php echo $i; ?>
						</a>
					</li>
		<?php
				}
			}
		?>
	</ul>
</div>