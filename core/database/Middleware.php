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

				echo "Hello " . $_SESSION["user-key"];

			} else {

				$_SESSION["user-key"] = "";

			}

		}

		public function redirectToLogin()

		{

			if ($_SESSION["user-key"] == "")

			{

			$_SESSION["redirected"] = "results";

			$_SESSION["data"] = $_GET;

			header("Location: /login");

			}

		}

		public function logOut()

		{

			$_SESSION = [

				"user-key" => "",
				"redirected" => "",
				"data" => []

			];

			header("Location: /");

		}

		

	}

 ?>