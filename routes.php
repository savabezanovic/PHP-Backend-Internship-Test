<?php 

	$router->get("", "controllers/index.php");

	$router->get("login", "controllers/login.php");

	$router->get("register", "controllers/register.php");

	$router->get("results", "controllers/results.php");

	$router->get("dashboard", "controllers/dashboard.php");





	$router->get("users", "controllers/users.php");

	$router->get("test", "controllers/test.php");

	/*$router->get("names", "controllers/add-name.php");

	$router->post("names", "controllers/add-name.php");*/

 ?>