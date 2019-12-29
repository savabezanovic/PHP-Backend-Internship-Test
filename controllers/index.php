<?php 

	$middleware= $app["middleware"]->homePageCheckLogin();
	/* $userTypes = $app["database"]->selectUserTypes(); */

	require "views/index.view.php";

	var_dump($_SESSION);

 ?>