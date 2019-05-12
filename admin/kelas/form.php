<?php

	$id_kelas   = isset($_GET["idKelas"]) ? $_GET["idKelas"] : false;
	
	$error      = isset($_GET["error"]) ? $_GET["error"] : false;
	
	$select     = mysql_query("SELECT * FROM kelas WHERE idKelas = '$id_kelas'");
	$data       = mysql_fetch_assoc($select);
	
	$nama_kelas = $data["namaKelas"];
	$harga      = $data["harga"];

?>

<div id="form-area">
	<div class="row">
		<div class="col m4 offset-m4 card-panel">
			<form method="POST" action="<?php echo BASE_URL . "admin/kelas/action.php" ?>">
				<h5 class="center grey-text text-darken-2">Kelas KA</h5>


				<?php
					if ($error == "fail") {
						# code...
				?>
						<div class="chip red-text">
							Gagal menyimpan data, silahkan ulangi kembali
							<i class="close material-icons">close</i>
						</div>
				<?php
					}
				?>


				<div class="input-field col s12">
					<input type="hidden" name="txtIdKelas" value="<?php echo $id_kelas; ?>">
				</div>

				<div class="input-field col s12">
					<input type="text" name="txtNamaKelas" id="txtNamaKelas" class="validate" value="<?php echo $nama_kelas; ?>" required>
					<label for="txtNamaKelas">Nama Kelas</label>
				</div>

				<div class="input-field col s12">
					<input type="text" name="txtHarga" id="txtHarga" class="validate" value="<?php echo $harga; ?>" required>
					<label for="txtHarga">Harga</label>
				</div>

				<div class="input-field col s12 center">
					<button class="btn waves-effect waves-light yellow darken-2" type="submit" name="action">
						Simpan<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>