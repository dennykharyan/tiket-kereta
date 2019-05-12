<?php

	$id_kereta         = isset($_GET["idKA"]) ? $_GET["idKA"] : false;
	
	$error             = isset($_GET["error"]) ? $_GET["error"] : false;
	
	$select            = mysql_query("SELECT * FROM kereta JOIN kelas ON kereta.idKelas = kelas.idKelas WHERE idKA = '$id_kereta'");
	$data              = mysql_fetch_assoc($select);
	
	$nama_kereta       = $data["namaKA"];
	$tanggal_berangkat = $data["tanggalBerangkat"];
	$tanggal_tiba      = $data["tanggalTiba"];
	$jam_berangkat     = $data["jamBerangkat"];
	$jam_tiba          = $data["jamTiba"];
	$berangkat         = $data["dari"];
	$tujuan            = $data["ke"];
	$id_kelas          = $data["idKelas"];
	$nama_kelas        = $data["namaKelas"];

?>

<div id="form-area">
	<div class="row">
		<div class="col m6 offset-m3 card-panel">
			<form method="POST" action="<?php echo BASE_URL . "admin/jadwal/action.php" ?>">
				<h5 class="center grey-text text-darken-2">Jadwal Kereta</h5>


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
					<input type="hidden" name="txtIdKereta" value="<?php echo $id_kereta; ?>">
				</div>

				<div class="input-field col s12 m6 offset-m3">
					<input type="text" name="txtNamaKereta" id="txtNamaKereta" class="validate" value="<?php echo $nama_kereta; ?>" required>
					<label for="txtNamaKereta">Nama Kereta</label>
				</div>

				<div class="input-field col s12 m6">
					<input type="text" name="txtTanggalBerangkat" id="txtTanggalBerangkat" class="datepicker" value="<?php echo $tanggal_berangkat; ?>" required>
					<label for="txtTanggalBerangkat">Tanggal Keberangkatan</label>
				</div>

				<div class="input-field col s12 m6">
					<input type="text" name="txtTanggalTiba" id="txtTanggalTiba" class="datepicker" value="<?php echo $tanggal_tiba; ?>" required>
					<label for="txtTanggalTiba">Tanggal Tiba</label>
				</div>

				<div class="input-field col s12 m6">
					<input type="time" name="txtJamBerangkat" id="txtJamBerangkat" class="validate" value="<?php echo $jam_berangkat; ?>" required>
					<label for="txtJamBerangkat">Jam Keberangkatan</label>
				</div>

				<div class="input-field col s12 m6">
					<input type="time" name="txtJamTiba" id="txtJamTiba" class="validate" value="<?php echo $jam_tiba; ?>" required>
					<label for="txtJamTiba">Jam Tiba</label>
				</div>

				<div class="input-field col s12 m6">
					<input type="text" name="txtKeberangkatan" id="txtKeberangkatan" class="validate" value="<?php echo $berangkat; ?>" required>
					<label for="txtKeberangkatan">Keberangkatan</label>
				</div>

				<div class="input-field col s12 m6">
					<input type="text" name="txtTujuan" id="txtTujuan" class="validate" value="<?php echo $tujuan; ?>" required>
					<label for="txtTujuan">Tujuan</label>
				</div>

				<div class="input-field col s12 m6 offset-m3">
					<select name="txtKelas" id="txtKelas">
						<option value="NULL" disabled selected>Pilih Kelas Kereta</option>
						<?php
							$getKelas = mysql_query("SELECT * FROM kelas");

							while ($data_kelas = mysql_fetch_assoc($getKelas)) {
								# code...
								if ($data_kelas["idKelas"] == $id_kelas) {
									# code...
									echo "<option value='$data_kelas[idKelas]' selected>$data_kelas[namaKelas]</option>";
								}
								else{
									echo "<option value='$data_kelas[idKelas]'>$data_kelas[namaKelas]</option>";
						?>
									
						<?php
								}
							}
						?>
					</select>
					<label for="txtKelas">Kelas</label>
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