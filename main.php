<?php
	
	include 'navbar.php';

	$error = isset($_GET["error"]) ? $_GET["error"] : false;

	$select = mysql_query("SELECT DISTINCT(dari) FROM kereta;");

?>


<div class="slider">
	<ul class="slides">
		<li>
			<img src="<?php echo BASE_URL . "img/viviana-rishe-755434-unsplash.jpg" ?>">
			<div class="caption left-align">
				<h3>Lorem Ipsum</h3>
				<h5 class="white-text text-darken-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h5>
			</div>
		</li>

		<li>
			<img src="<?php echo BASE_URL . "img/ka2.jpg" ?>">
			<div class="caption center-align">
				<h3>Lorem Ipsum</h3>
				<h5 class="white-text text-darken-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h5>
			</div>
		</li>

		<li>
			<img src="<?php echo BASE_URL . "img/ka3.jpg" ?>">
			<div class="caption right-align">
				<h3>Lorem Ipsum</h3>
				<h5 class="white-text text-darken-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h5>
			</div>
		</li>
	</ul>
</div>



<?php

	if ($error == "userexist") {
		# code...
?>
		<div class="row">
			<div class="chip red-text">
				Username tersebut telah digunakan, silahkan coba dengan username lain
				<i class="close material-icons">close</i>
			</div>
		</div>
<?php
	}
?>



<div class="container">
	<div class="row">
		<h5 class="center-align">Kenapa Memilih Kami?</h5>
	</div>

	<div class="row">
		<div class="col m4 s12">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="<?php echo BASE_URL . "img/bruce-mars-763705-unsplash.jpg" ?>">
				</div>

				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Lorem Ipsum<i class="material-icons right">more_vert</i></span>
				</div>

				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Lorem Ipsum<i class="material-icons right">close</i></span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</div>
		</div>

		<div class="col m4 s12">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="<?php echo BASE_URL . "img/rawpixel-255077-unsplash.jpg" ?>">
				</div>

				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Lorem Ipsum<i class="material-icons right">more_vert</i></span>
				</div>

				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Lorem Ipsum<i class="material-icons right">close</i></span>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
		</div>

		<div class="col m4 s12">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="<?php echo BASE_URL . "img/rawpixel-660716-unsplash.jpg" ?>">
				</div>

				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">Lorem Ipsum<i class="material-icons right">more_vert</i></span>
				</div>

				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Lorem Ipsum<i class="material-icons right">close</i></span>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="parallax-container">
	<div class="parallax">
		<img src="<?php echo BASE_URL . "img/osman-rana-575988-unsplash.jpg" ?>">
	</div>
</div>


<div class="container">
	<div class="row">
		<h5 class="center-align">Mulai Pilih Kota Keberangkatan Anda</h5>
	</div>

	<div class="row">


		<?php
			while ($data = mysql_fetch_assoc($select)) {
				# code...
		?>
				<div class="col m4 s12">
					<div class="card">
						<div class="card-content">
							<span class="card-title"><?php echo $data["dari"]; ?></span>
						</div>

						<div class="card-action">
							<a href="<?php echo BASE_URL . "index.php?page=pilihkota&kota=$data[dari]" ?>">cari kereta</a>
						</div>
					</div>
				</div>
		<?php
			}
		?>
		

	</div>
</div>


<div class="form-register grey darken-2 white-text">
	<div class="container">
		<div class="row">
			<h5 class="center-align grey-text text-lighten-2">Daftar Sekarang</h5>
		</div>
		
		<div id="form-area">
			<div class="row">
				<div class="col m12">
					<form method="POST" action="<?php echo BASE_URL . "register.php" ?>">
						<div class="row">
							<div class="col m6">
								<div class="input-field col m12">
									<input type="text" name="txtUsername" class="validate">
									<label for="txtUsername">Username</label>
								</div>

								<div class="input-field col m12">
									<input type="text" name="txtNama" class="validate">
									<label for="txtNama">Nama</label>
								</div>
								
								<div class="input-field col m12">
									<input type="password" name="txtPassword" class="validate">
									<label for="txtPassword">Password</label>
								</div>

								<div class="input-field col m12">
									<button class="blue-grey lighten-1 white-text btn waves-effect waves-light" type="submit">register</button>
								</div>
							</div>

							<div class="col m6">
								<img class="responsive-img" src="<?php echo BASE_URL . "img/adolfo-felix-546626-unsplash.jpg" ?>">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>