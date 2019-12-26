<?php 

	$users = $app["database"]->selectAll($_GET["name"]);

	require "views/users.view.php";
	
 ?>