<?php

	session_start();
	
	require "config/koneksi.php";
	include "config/helper.php";

	unset($_SESSION["session_id"]);
	unset($_SESSION["session_nama"]);
	unset($_SESSION["session_level"]);

	header("location: " . BASE_URL);

?>