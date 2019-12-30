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
				echo "Forbidden characters in password!";
				//header("Location: register");
			}

			else if (!$passwordNumbersAmount >= 3)

			{

				echo "Password has to have more then 3 numbers";

			}

			else if (!preg_match($allowedCharactersEmail, $_POST["email"]))

			{

				echo "Forbidden characters in email";
				//header("Location: register");

			}

			else if (!preg_match($allowedCharacters, $_POST["name"]))

			{

				echo "Forbidden characters in name";
				//header("Location: register");

			}

			/*else if ($_POST["password"] !== $_POST["repeatPassword"])

			{
				echo "Passwords do not match";
				//header("Location: register");

			} */

			else if ($_POST["password"] === "" || $_POST["repeatPassword"] === "")

			{

				echo "Enter password";
				//header("Location: register");

			}

			else if ($_POST["name"] === "")

			{
				echo "Enter name";
				//header("Location: register");

			}

			else if ($_POST["email"] === "")

			{

				echo "Enter email.";
				//header("Location: register");

			}

			else if (strlen($_POST["name"]) < 2 || strlen($_POST["name"]) > 30)

			{

				echo "Enter name longer then 2 and shorter then 40 characters";
				//header("Location: register");

			}

			else if (strlen($_POST["password"]) < 6 || strlen($_POST["password"]) > 15)

			{

				echo "Enter password longer then 6 and shorter then 40 characters";
				//header("Location: register");

			}

			else if (strlen($_POST["repeatPassword"]) < 6 || strlen($_POST["repeatPassword"]) > 15)

			{

				echo "Enter password longer then 6 and shorter then 40 characters";
				//header("Location: register");

			}

			else if (strlen($_POST["email"]) < 15 || strlen($_POST["email"]) > 30)

			{

				echo "Enter email longer then 15 and shorter then 30 characters";
				//header("Location: register");

			}

		}

	}

 ?>