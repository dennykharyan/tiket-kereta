<?php

	include 'navbar.php';

	if ($level == "pelanggan") {
		# code...
		header("location: " . BASE_URL);
	}

	$modul    = isset($_GET["modul"]) ? $_GET["modul"] : false;
	$action   = isset($_GET["action"]) ? $_GET["action"] : false;
	
	$filename = "admin/$modul/$action.php";

	if (file_exists($filename)) {
		# code...
		include "$filename";
	}
	else{
		header("location: " . BASE_URL);
	}

?>