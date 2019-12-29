<?php 

	class Middleware 

	{

		public function __construct()

		{

			return session_start();

		}

		/* public function routAuthorisation()

		{

			if ($_SESSION["user-key"] == "") {
				
				header("Location: login");

			}

		} */

		public 	function homePageCheckLogin()

		{

			if (!$_SESSION["user-key"] == "")

			{

				echo "Hello " . $_SESSION["name"];

			} else {

				$_SESSION["user-key"] = "";

			}

		}

		public function routAuth()

		{

			if ($_SESSION["user-key"] == "")

			{

				header("Location: login");

			}

		}

		public function redirect()

		{

			if (!$_SESSION["user-key"] == "" && $_SESSION["redirected"] == "results")

			{

				header("Location: results");

			} else if (!$_SESSION["user-key"] == ""){

				header("Location: dashboard");

			} else {

				header("Location: login");

			}

		}

		public function redirectFromResultsToLogin()

		{

			if ($_SESSION["user-key"] == "")

			{

				$_SESSION["search"] = $_GET;

				$_SESSION["redirected"] = "results";

				header("Location: /login");

			} else if (empty($_GET) && empty($_SESSION["search"]))

			{

				header("Location: /");

			} else {

				echo "Welcome to the results screen!";

			}


		}

		public function loginAuthorisation($databaseEmail, $databasePassword, $loginEmail, $loginPassword)

		{

			$status = "refused";

			if ($databaseEmail === $loginEmail && $databasePassword === $loginPassword && strlen($loginEmail) > 0) 

			{

				$status = "logedin";

				return $status;

			}

		}

		public function randomString()

   		{

 		$n = 20; 
		$result = bin2hex(random_bytes($n)); 
		return $result; 

   		}

		public function setUserData($userData)

		{

			if ($userData[0]->{"status"} == "logedin")

			{

				$_SESSION["name"] = $userData[0]->{"name"};

				$_SESSION["email"] = $userData[0]->{"email"};

				//$_SESION["userType"] = $userData[0]->{""}

				$_SESSION["user-key"] = $this->randomString();

			} else {

				$_SESSION["user-key"] = "";

			}

		}

		public function logOut()

		{

			$_SESSION = [

				"user-key" => "",
				"redirected" => "",
				"search" => []

			];

			header("Location: /");

		}

		

	}

 ?>