<div class="navbar-fixed">
	<nav class="grey lighten-1">
		<div class="container">
			<div class="nav-wrapper">
				<a href="<?php echo BASE_URL ?>" class="brand-logo">
					<img src="<?php echo BASE_URL . "img/logo-KA.jpg" ?>" class="responsive-img" id="img-logo">
				</a>

				<a href="#" data-target="mobile-sidenav" class="sidenav-trigger">
					<i class="material-icons">menu</i>
				</a>

				<ul class="right hide-on-med-and-down">
					<?php
						if ($level == "") {
							# code...
					?>
							<li>
								<a href="<?php echo BASE_URL . "index.php?page=login" ?>">Login</a>
							</li>
					<?php
						}
						elseif ($level == "admin") {
							# code...
					?>
							<li>
								<a href="<?php echo BASE_URL . "index.php?page=panel&modul=kelas&action=list" ?>">Daftar Kelas KA</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL . "index.php?page=panel&modul=jadwal&action=list" ?>">Daftar Jadwal KA</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL . "index.php?page=panel&modul=pesanan&action=list" ?>">Daftar Pesanan Tiket</a>
							</li>

							<li>
								<a href="<?php echo BASE_URL . "index.php?page=info" ?>">Info</a>
							</li>

							<li>
								<a href="<?php echo BASE_URL . "index.php?page=visimisi" ?>">Visi & Misi</a>
							</li>

							<li>
								<a href="<?php echo BASE_URL . "logout.php" ?>">Logout</a>
							</li>
					<?php
						}
						elseif ($level == "pelanggan") {
							# code...
					?>
							<li>
								<a href="<?php echo BASE_URL . "index.php?page=history" ?>">Daftar Pemesanan Tiket</a>
							</li>
							<li>
								<a href="<?php echo BASE_URL . "logout.php" ?>">Logout</a>
							</li>
					<?php
						}
					?>
				</ul>
			</div>
		</div>
	</nav>
</div>



<ul class="sidenav" id="mobile-sidenav">
	<?php
		if ($level == "") {
			# code...
	?>
			<li>
				<a href="<?php echo BASE_URL . "index.php?page=login" ?>">Login</a>
			</li>
	<?php
		}
		elseif ($level == "admin") {
			# code...
	?>
			<li>
				<a href="<?php echo BASE_URL . "index.php?page=panel&modul=kelas&action=list" ?>">Daftar Kelas KA</a>
			</li>

			<li>
				<a href="<?php echo BASE_URL . "index.php?page=panel&modul=jadwal&action=list" ?>">Daftar Jadwal KA</a>
			</li>

			<li>
				<a href="<?php echo BASE_URL . "index.php?page=panel&modul=pesanan&action=list" ?>">Daftar Pesanan Tiket</a>
			</li>

			<li>
				<a href="<?php echo BASE_URL . "logout.php" ?>">Logout</a>
			</li>
	<?php
		}
		elseif ($level == "pelanggan") {
			# code...
	?>
			<li>
				<a href="<?php echo BASE_URL . "index.php?page=history" ?>">Daftar Pemesanan Tiket</a>
			</li>
			
			<li>
				<a href="<?php echo BASE_URL . "logout.php" ?>">Logout</a>
			</li>
	<?php
		}
	?>
</ul>