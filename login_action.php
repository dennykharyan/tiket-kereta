<?php

	require 'config/koneksi.php';
	include 'config/helper.php';

	$user = $_POST["txtUsername"];
	$pass = md5($_POST['txtPassword']);

	if ((empty($user)) || (empty($pass))) {
		# code...
		header("location: " . BASE_URL . "index.php?page=login&error=empty");
	}
	else{
		$select = mysql_query("SELECT * FROM user WHERE username = '$user' AND pass = '$pass';");

		if (mysql_num_rows($select) == 0) {
			# code...
			header("location: " . BASE_URL . "index.php?page=login&error=notfound");
		}
		else{
			$log = mysql_fetch_assoc($select);

			session_start();

			$_SESSION["session_id"]    = $log["iduser"];
			$_SESSION["session_nama"]  = $log["nama"];
			$_SESSION["session_level"] = $log["level"];

			header("location: " . BASE_URL);
		}
	}

?>