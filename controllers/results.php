<?php 
	
	$app["middleware"]->redirectFromResults();

	$userTypes = $app["database"]->selectUserTypes();

	require ("views/results.view.php");

 ?>