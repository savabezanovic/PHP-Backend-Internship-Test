<?php 

	function dataSource()

	{

		$data["user_name"] = "";

		$data["user_type_id"] = 0;

		if (count($_SESSION["search"]) === 0)
		{

			$data["user_name"] = $_GET["name"];

			$data["user_type_id"] = $_GET["user_type_id"];

		} else {

			$data["user_name"] = $_SESSION["search"]["name"];

			$data["user_type_id"] = $_SESSION["search"]["user_type_id"];

		}

		return  $data;

	}

	function testArray($array)

	{

		if(count($array) === 0)

		{
			$_SESSION["search"] = [];
			return header("Location: /");

		}

	}

	$data = dataSource();

	$app["middleware"]->redirectFromResults();

	$userTypes = $app["database"]->getAllUserTypes();

	$searchedUser = $app["database"]->findUser($data["user_name"], $data["user_type_id"]);

	$usersTypeNumbers = $app["database"]->usersTypeNumbers();

	testArray($usersTypeNumbers);

	$array = [];

	foreach($usersTypeNumbers as $usersTypeNumber)
	{

		$array[] = [

			"name" => $usersTypeNumber->{"name"},
			"type" => $usersTypeNumber->{"type_name"}
		];

	}

	//Trying to get the number of users who are using the language, field, framework etc. but I can not think of a function to do this atm. I started by creating an array that I can use for functions that the original query return from database does not allow such as forch each(), count() etc ......
 
	var_dump($array);

	testArray($userTypes);

	//var_dump($userTypes);

	testArray($searchedUser);

	//var_dump($searchedUser);

	//var_dump($count = $app["database"]->countUsersSameType());


	require ("views/results.view.php");

 ?>