<?php

	include 'navbar.php';

	$get_kota = mysql_query("SELECT DISTINCT(dari) FROM kereta;");
	
	$halaman  = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
	$limit    = 50;
	$start    = ($halaman - 1) * $limit;

?>



<div class="row">
	<div class="col s12 m4 l4 pull-l2 pull-m2">
		<div class="collection with-header">
			<h6 class="collection-header">Kota Keberangkatan</h6>

		

			<?php
				while ($data_kota = mysql_fetch_assoc($get_kota)) {
					# code...
			?>
					<a class="collection-item" href="<?php echo BASE_URL . "index.php?page=pilihkota&kota=$data_kota[dari]" ?>">
						<?php echo $data_kota["dari"]; ?>
					</a>
			<?php
				}
			?>



		</div>
	</div>


	<div class="col s12 m8 l8 pull-l1 pull-m1">
		


		<?php
			$kota                = isset($_GET["kota"]) ? $_GET["kota"] : false;
			
			$tanggal_sekarang    = date('Y-m-d');
			$select_kota_by_name = mysql_query("SELECT * FROM kereta JOIN kelas ON kereta.idKelas=kelas.idKelas WHERE dari='$kota' AND tanggalBerangkat>='$tanggal_sekarang'");
		?>



		<div class="row">
			<table class="centered highlight" id="table-modul">
				<thead>
					<tr>
						<th>Nama Kereta</th>
						<th>Waktu Berangkat</th>
						<th>Keberangkatan</th>
						<th>Tujuan</th>
						<th>Kelas</th>
						<th>Harga</th>
						<th></th>
					</tr>
				</thead>

				<tbody>


					<?php
						while ($data_kereta = mysql_fetch_assoc($select_kota_by_name)) {
							# code...
					?>
							<tr>
								<td><?php echo $data_kereta["namaKA"]; ?></td>
								<td><?php echo $data_kereta["tanggalBerangkat"] . " - " . $data_kereta["jamBerangkat"]; ?></td>
								<td><?php echo $data_kereta["dari"]; ?></td>
								<td><?php echo $data_kereta["ke"]; ?></td>
								<td><?php echo $data_kereta["namaKelas"]; ?></td>
								<td><?php echo rupiah($data_kereta["harga"]); ?></td>
								<td>
									<a class="btn btn-small red white-text" href="<?php echo BASE_URL . "index.php?page=detail_kereta&id_ka=$data_kereta[idKA]" ?>">detail
									</a>
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
					$page_count = mysql_num_rows($select_kota_by_name);
					$page_sum   = ceil($page_count/$limit);

					for ($i=1; $i <= $page_sum ; $i++) { 
						# code...
						if ($halaman == $i) {
							# code...
				?>
							<li class="active yellow darken-3">
								<a href="<?php echo BASE_URL . "index.php?page=pilihkota&kota=$data_kota[dari]&halaman=$i" ?>">
									<?php echo $i; ?>
								</a>
							</li>
				<?php
						}
						else{
				?>
							<li class="yellow darken-3">
								<a href="<?php echo BASE_URL . "index.php?page=pilihkota&kota=$data_kota[dari]&halaman=$i" ?>">
									<?php echo $i; ?>
								</a>
							</li>
				<?php
						}
					}
				?>
			</ul>
		</div>		
	</div>
</div>
