<?php 

	class Middleware 

	{

		public function __construct()

		{

			return session_start();

		}

		public 	function homePageCheckLogin()

		{

			if (!$_SESSION["user-key"] == "")

			{

				echo "Hello " . $_SESSION["name"];

			} else {

				$_SESSION["user-key"] = "";

			}

		}

		public function redirect()

		{

			if (!$_SESSION["user-key"] == "" && $_SESSION["redirected"] == "results")

			{

				header("Location: results");

			} else if ($_SESSION["user-key"] == ""){

				header("Location: login");

			}

		}

		public function redirectFromResultsToLogin()

		{

			if ($_SESSION["user-key"] == "")

			{

			$_SESSION["redirected"] = "results";

			$_SESSION["search"] = $_GET;

			header("Location: /login");

			}

		}

		public function loginAuthorisation($databaseEmail, $databasePassword, $loginEmail, $loginPassword)

		{

			if ($databaseEmail == $loginEmail && $databasePassword == $loginPassword) 

			{
			
				return "logedin";

			} else {

				return "refused";

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