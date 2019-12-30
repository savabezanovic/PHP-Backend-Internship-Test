<?php 

	$app["middleware"]->registerValidation($_POST);
	
	$userRegisterRequest = $app["database"]->registerRequest($_POST["name"], $_POST["email"], $_POST["password"], $_POST["user_type_id"]);

 ?>