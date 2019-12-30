<?php 

	class QueryBuilder

	{

		protected $pdo;

		public function __construct($pdo)

		{

			$this->pdo = $pdo;

		}

		public function loginRequest($email, $password)

		{

			try{

				$statement = $this->pdo->prepare("SELECT * FROM users WHERE users.email = '$email' AND users.password = '$password'");
			
				$statement->execute();

				return $statement->fetchAll(PDO::FETCH_OBJ);

			} catch (Exception $e) {

				die("Some thing went wrong in Query Builder!" . $e);

			}

		}

		public function registerRequest($name, $email, $password, $user_type_id)

		{	

			try {

				$statement = $this->pdo->prepare("

					INSERT INTO users (users.name, users.email, users.password, users.user_type_id) 

					VALUES ('$name', '$email', '$password', '$user_type_id')

					");

				$statement->execute();

				return header("Location: login");

			} catch (Exception $e) {

				die("Some thing went wrong in Query Builder!" . $e);

			}

		}

		public function getAllUserTypes()

		{
	
			try {

				$statement = $this->pdo->prepare("

						SELECT * FROM user_types
					
					");

				$statement->execute();

				return $statement->fetchAll(PDO::FETCH_OBJ);

			} catch (Exception $e) {

				die("Something went wrong in Query Builder!" . $e);

			}

		}

	}

 ?>