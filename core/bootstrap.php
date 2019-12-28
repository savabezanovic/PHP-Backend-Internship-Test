<?php 

	$app = [];

	$app["config"] = require "config.php";

	require "core/Router.php";

	require "core/Request.php";

	require "core/database/Connection.php";

	require "core/database/QueryBuilder.php";

	require "core/database/Middleware.php";

	$app["database"] = new QueryBuilder(
		Connection::make($app["config"]["database"])
	);

	$app["middleware"] = new Middleware;

 ?>