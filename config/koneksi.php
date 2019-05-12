<?php

	$host    = "localhost";
	$user    = "root";
	$pass    = "";
	$name    = "tiketka";
	
	$koneksi = mysql_connect($host, $user, $pass) or die("Gagal Terhubung ke Database");
	
	$select  = mysql_select_db($name) or die("Tidak Dapat Masuk ke Database");

?>