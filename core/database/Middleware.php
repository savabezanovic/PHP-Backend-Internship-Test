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

		public function redirectFromResults()

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

		public function registerValidation()

		{

			$allowedCharacters = "/^[A-Za-z' 0-9]/";
			//$allowedCharacters = "/^[A-Za-z\\- \'0-9]+$/";

			$allowedCharactersEmail = "/^[A-Za-z'@.0-9]/";

			$numbersInPassword = "/[0-9]/";

			preg_match($numbersInPassword, $_POST["password"], $array);

			$passwordNumbersAmount = count($array) + 1;

			if (!preg_match($allowedCharacters, $_POST["password"]) && !preg_match($allowedCharacters, $_POST["repeatPassword"])) 

			{

				header("Location: register");
				echo "Forbidden characters in password!";
				
			}

			else if (!$passwordNumbersAmount >= 3)

			{

				header("Location: register");
				echo "Password has to have more then 3 numbers";

			}

			else if (!preg_match($allowedCharactersEmail, $_POST["email"]))

			{

				header("Location: register");
				echo "Forbidden characters in email";

			}

			else if (!preg_match($allowedCharacters, $_POST["name"]))

			{

				header("Location: register");
				echo "Forbidden characters in name";

			}

			else if ($_POST["password"] !== $_POST["repeatPassword"])

			{

				header("Location: register");
				echo "Passwords do not match";

			}

			else if (strlen($_POST["name"]) < 2 || strlen($_POST["name"]) > 30)

			{

				header("Location: register");
				echo "Enter name longer then 2 and shorter then 40 characters";

			}

			else if (strlen($_POST["password"]) < 6 || strlen($_POST["password"]) > 15)

			{

				header("Location: register");
				echo "Enter password longer then 6 and shorter then 40 characters";

			}

			else if (strlen($_POST["repeatPassword"]) < 6 || strlen($_POST["repeatPassword"]) > 15)

			{

				header("Location: register");
				echo "Enter password longer then 6 and shorter then 40 characters";

			}

			else if (strlen($_POST["email"]) < 15 || strlen($_POST["email"]) > 30)

			{

				header("Location: register");
				echo "Enter email longer then 15 and shorter then 30 characters";

			}

		}

	}

 ?>