<?php

	include 'navbar.php';

	$error = isset($_GET["error"]) ? $_GET["error"] : false;

	if ($id) {
		# code...
		header("location: " . BASE_URL);
	}

?>
<div class="container">
	<div class="row" id="login-panel">
		<div class="col s12 l6 offset-l3 center-align card-panel hoverable">
			<form method="POST" action="login_action.php">
				<h4 class="center-align">Login</h4>



				<?php
					if ($error == "empty") {
						# code...
				?>
						<div class="chip red-text">
							Anda memasukan data kosong, silahkan ulangi kembali
							<i class="close material-icons">close</i>
						</div>
				<?php
					}
					elseif ($error == "notfound") {
						# code...
				?>
						<div class="chip red-text">
							Tidak dapat menemukan username anda, silahkan ulangi kembali
							<i class="close material-icons">close</i>
						</div>
				<?php
					}
				?>



				<div class="input-field col s12">
					<input type="text" name="txtUsername" id="txtUsername" class="validate">
					<label for="txtUsername">username</label>
				</div>

				<div class="input-field col s12">
					<input type="password" name="txtPassword" id="txtPassword" class="validate">
					<label for="txtPassword">password</label>
				</div>

				<div class="input-field col s12">
					<button class="blue-grey lighten-1 white-text btn waves-effect waves-light" type="submit" name="action">
						Login<i class="material-icons right">send</i>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>