<?php

	session_start();

	require 'config/koneksi.php';
	include 'config/helper.php';

	$page  = isset($_GET["page"]) ? $_GET["page"] : false;
	
	$id    = isset($_SESSION["session_id"]) ? $_SESSION["session_id"] : false;
	$nama  = isset($_SESSION["session_nama"]) ? $_SESSION["session_nama"] : false;
	$level = isset($_SESSION["session_level"]) ? $_SESSION["session_level"] : false;


?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!--Let browser know website is optimized for mobile-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<title>Pemesanan Tiket Kereta Api Online</title>

	<!--Import Google Icon Font-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import materialize.css-->
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_URL . "css/materialize.min.css" ?>"  media="screen,projection"/>
	
	<link type="text/css" rel="stylesheet" href="<?php echo BASE_URL . "css/style.css" ?>"/>

	<!--<link id="bs-css" href="css/charisma-app.css" rel="stylesheet">-->
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
		<script src="../bower_components/respond/dest/respond.min.js"></script>
	<![endif]-->

</head>
<body>



	<!--JavaScript at end of body for optimized loading-->
	<script type="text/javascript" src="<?php echo BASE_URL . "js/materialize.min.js" ?>"></script>
	


<?php

	$file = "$page.php";
	if (file_exists($file)) {
		# code...
		include $file;
	}
	else{
		include 'main.php';
	}
?>



	<script type="text/javascript">
		const sideNav     = document.querySelectorAll(".sidenav");
		M.Sidenav.init(sideNav);
		
		
		const dropdownBtn = document.querySelectorAll(".dropdown-trigger");
		M.Dropdown.init(dropdownBtn);
		
		const selectOpt   = document.querySelectorAll("select");
		M.FormSelect.init(selectOpt);
		
		const datePicker  = document.querySelectorAll(".datepicker");
		M.Datepicker.init(datePicker,{
			format: 'yyyy-mm-dd',
			autoClose: true});

		const slideShow = document.querySelectorAll(".slider");
		M.Slider.init(slideShow);

		const parallax = document.querySelectorAll(".parallax");
		M.Parallax.init(parallax);

		const tabs = document.querySelectorAll(".tabs");
		M.Tabs.init(tabs);
	</script>


	
</body>
</html>