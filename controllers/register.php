<?php 

	$userTypes = $app["database"]->getAllUserTypes();
	
	require ("views/register.view.php");

 ?>