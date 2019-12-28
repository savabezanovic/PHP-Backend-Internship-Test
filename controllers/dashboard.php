<?php 

	$app["middleware"];

	$user = $app["database"]->loginRequest($_GET["email"], $_GET["password"]);

	require ("views/dashboard.view.php");

 ?>