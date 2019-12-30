<?php 
	
	$app["middleware"]->redirectFromResults();

	$userTypes = $app["database"]->getAllUserTypes();

	var_dump($_GET);
	echo "THIS IS THE SESSION: <br>";
	var_dump($_SESSION);

	require ("views/results.view.php");

 ?>