<?php 

	$app["middleware"]->redirectToLogin();

	require ("views/results.view.php");

	var_dump($_SESSION);

 ?>