<?php 

	$router->get("", "controllers/index.php");

	$router->get("login", "controllers/login.php");

	$router->get("register", "controllers/register.php");

	$router->get("results", "controllers/results.php");

	$router->get("dashboard", "controllers/dashboard.php");

	$router->get("logout", "controllers/logout.php");

 ?>