<?php 

	$userLoginRequest = $app["database"]->loginRequest($_GET["email"], $_GET["password"]);

	$userLoginRequest[0]->{"status"} = $app["middleware"]->loginAuthorisation($userLoginRequest[0]->{"email"}, $userLoginRequest[0]->{"password"}, $_GET["email"], $_GET["password"]);

	$app["middleware"]->setUserData($userLoginRequest);

	$app["middleware"]->redirect();

	/* $app["middleware"]->routAuthorisation(); */

 ?>