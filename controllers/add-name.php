<?php  

	$app["database"]->insert("users", [

		"name" => $_POST["name"];

	]);

	var_dump($_REQUEST);

	//header("Location: /");

?>