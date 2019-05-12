<?php 

	$select  = mysql_query("SELECT * FROM kelas ORDER BY namaKelas ASC");
	
	$error   = isset($_GET["error"]) ? $_GET["error"] : false;
	$halaman = isset($_GET["halaman"]) ? $_GET["halaman"] : 1;
	$limit   = 50;
	$start   = ($halaman - 1) * $limit;

?>
<div class="container" id="table-modul">
	

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
		<a class="waves-effect waves-light btn yellow darken-3" href="<?php echo BASE_URL . "index.php?page=panel&modul=kelas&action=form" ?>">Tambah Daftar</a>
	</div>


	<div class="row">
		<div class="col s12 m12">
			<table class="highlight">
				<thead>
					<tr>
						<td>No.</td>
						<td>Nama Kelas</td>
						<td>Harga</td>
						<td colspan="2"></td>
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
								<td><?php echo $data["namaKelas"]; ?></td>
								<td><?php echo rupiah($data["harga"]); ?></td>
								<td>
									<a class="btn-plan" href="<?php echo BASE_URL . "index.php?page=panel&modul=kelas&action=form&idKelas=$data[idKelas]" ?>">edit</a>
								</td>
								<td>
									<a class="btn-plan text-red" href="<?php echo BASE_URL . "admin/kelas/drop.php?idKelas=$data[idKelas]" ?>">hapus</a>
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
							<a href="<?php echo BASE_URL . "index.php?page=panel&modul=kelas&action=list&halaman=$i" ?>">
								<?php echo $i; ?>
							</a>
						</li>
			<?php
					}
					else{
			?>
						<li class="yellow darken-3">
							<a href="<?php echo BASE_URL . "index.php?page=panel&modul=kelas&action=list&halaman=$i" ?>">
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