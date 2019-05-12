<?php 

	$select  = mysql_query("SELECT * FROM kereta JOIN kelas ON kereta.idKelas = kelas.idKelas ORDER BY tanggalBerangkat DESC");
	
	$error   = isset($_GET["error"]) ? $_GET["error"] : false;
	$halaman = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
	$limit   = 50;
	$start   = ($halaman - 1) * $limit;

?>
<div id="table-modul">
	

	<?php
		if ($error == "true") {
			# code...
	?>
			<div class="row center-align">
				<div class="chip red-text">
					Gagal menghapus data, silahkan ulangi lagi
					<i class="close material-icons">close</i>
				</div>
			</div>
	<?php
		}
	?>


	<div class="row">
		<a class="waves-effect waves-light btn yellow darken-3" href="<?php echo BASE_URL . "index.php?page=panel&modul=jadwal&action=form" ?>">Tambah Jadwal</a>
	</div>


	<div class="row">
		<div class="col s12 m12">
			<table class="highlight responsive-table centered">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama Kereta</th>
						<th>Kota Keberangkatan</th>
						<th>Tanggal Keberangkatan</th>
						<th>Jam Keberangkatan</th>
						<th>Kota Tujuan</th>
						<th>Tanggal Tiba</th>
						<th>Jam Tiba</th>
						<th>Kelas</th>
						<th colspan="2"></th>
					</tr>
				</thead>

				<tbody>
					<?php
						$no = 1;

						while ($data = mysql_fetch_assoc($select)) {
							# code...
					?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data["namaKA"]; ?></td>
								<td><?php echo $data["dari"]; ?></td>
								<td><?php echo $data["tanggalBerangkat"]; ?></td>
								<td><?php echo $data["jamBerangkat"]; ?></td>
								<td><?php echo $data["ke"]; ?></td>
								<td><?php echo $data["tanggalTiba"]; ?></td>
								<td><?php echo $data["jamTiba"]; ?></td>
								<td><?php echo $data["namaKelas"]; ?></td>
								<td>
									<a class="btn-plan" href="<?php echo BASE_URL . "index.php?page=panel&modul=jadwal&action=form&idKA=$data[idKA]" ?>">edit</a>
								</td>
								<td>
									<a class="btn-plan text-red" href="<?php echo BASE_URL . "admin/jadwal/drop.php?idKA=$data[idKA]" ?>">hapus</a>
								</td>
							</tr>
					<?php
							$no++;
						}
					?>
				</tbody>
			</table>
		</div>
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
							<a href="<?php echo BASE_URL . "index.php?page=panel&modul=jadwal&action=list&halaman=$i" ?>">
								<?php echo $i; ?>
							</a>
						</li>
			<?php
					}
					else{
			?>
						<li class="yellow darken-3">
							<a href="<?php echo BASE_URL . "index.php?page=panel&modul=jadwal&action=list&halaman=$i" ?>">
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