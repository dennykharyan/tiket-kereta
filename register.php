<?php

	require 'config/koneksi.php';
	include 'config/helper.php';

	$username = $_POST["txtUsername"];
	$nama = $_POST["txtNama"];
	$password = md5($_POST["txtPassword"]);

	if ((empty($username)) || (empty($nama)) || (empty($password))) {
		# code...
		header("location: " . BASE_URL);
	}
	else{
		$find_username = mysql_query("SELECT * FROM user WHERE username = '$username'");

		if (mysql_num_rows($find_username) != 0) {
			# code...
			header("location: " . BASE_URL . "index.php?error=userexist");
		}
		else{
			$insert = mysql_query("INSERT INTO user VALUES(NULL, '$username', '$nama', '$password', 'pelanggan')");

			if ($insert) {
				# code...
				$id     = mysql_insert_id();
				
				$select = mysql_query("SELECT * FROM user WHERE iduser = '$id'");
				
				$log    = mysql_fetch_assoc($select);

				session_start();

				$_SESSION["session_id"]    = $log["iduser"];
				$_SESSION["session_nama"]  = $log["nama"];
				$_SESSION["session_level"] = $log["level"];

				header("location: " . BASE_URL);
			}
			else{
				header("location: " . BASE_URL . "index.php?error=registfail");
			}
		}
	}

?>