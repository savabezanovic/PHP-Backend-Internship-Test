<?php 

	$middleware= $app["middleware"]->homePageCheckLogin();
	$userTypes = $app["database"]->getAllUserTypes();

	require "views/index.view.php";

	var_dump($_SESSION);

 ?>