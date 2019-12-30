<?php 

	var_dump($_POST);

	$app["middleware"]->registerValidation($_POST);
	$userRegisterRequest = $app["database"]->registerRequest($_POST["name"], $_POST["email"], $_POST["password"], $_POST["userType"]);

	var_dump($userRegisterRequest);

	// $app["database"]->insert("users", [

	// 	"name" => $_POST["name"];

	// ]);


 ?>