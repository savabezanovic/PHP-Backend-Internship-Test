<?php 

	$app["middleware"]->redirectFromResultsToLogin();

	require ("views/results.view.php");

	var_dump($_GET);

	var_dump($_SESSION);

 ?>