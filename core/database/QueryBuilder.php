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

						SELECT * FROM user_types ORDER BY user_types.id ASC
					
					");

				$statement->execute();

				return $statement->fetchAll(PDO::FETCH_OBJ);

			} catch (Exception $e) {

				die("Something went wrong in Query Builder!" . $e);

			}

		}

		public function findUser($user_name, $user_type_id)

		{	

			try{

				$statement = $this->pdo->prepare("

				SELECT users.name, user_types.type_name FROM users LEFT JOIN user_types ON users.user_type_id = user_types.id WHERE users.name = '$user_name' AND users.user_type_id = '$user_type_id' ORDER BY users.id

				");

				$statement->execute();

				return $statement->fetchAll(PDO::FETCH_OBJ);


			} catch (Exception $e) {

				die("Something went wrong in Query Builder" . $e);

			}

		}

		public function usersTypeNumbers()

		{
	
			try {

				$statement = $this->pdo->prepare("

						SELECT users.name, user_types.type_name 

						FROM user_types 

						INNER JOIN users ON users.user_type_id = user_types.id 

						WHERE users.user_type_id = user_types.id
					
					");

				$statement->execute();

				return $statement->fetchAll(PDO::FETCH_OBJ);

			} catch (Exception $e) {

				die("Something went wrong in Query Builder!" . $e);

			}

		}


	}

 ?>