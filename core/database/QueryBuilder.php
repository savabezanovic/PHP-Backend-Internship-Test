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

			$statement = $this->pdo->prepare("SELECT * FROM users WHERE users.email = '$email' AND users.password = '$password'");
			
			$statement->execute();

			return $statement->fetchAll(PDO::FETCH_OBJ);

		}

		/* public function selectUserTypes()

		{

			$statement = $this->pdo->prepare("

				SELECT * FROM fields LEFT JOIN languages ON fields.id = languages.field_id

				LEFT JOIN frameworks ON languages.id = frameworks.language_id 

				LEFT JOIN framework_versions ON frameworks.id = framework_versions.framework_id 

				UNION ALL 

				SELECT * FROM fields RIGHT JOIN languages ON fields.id = languages.field_id

				RIGHT JOIN frameworks ON languages.id = frameworks.language_id 

				RIGHT JOIN framework_versions ON frameworks.id = framework_versions.framework_id
				
				");

			$statement->execute();

			return $statement->fetchAll(PDO::FETCH_OBJ);

		} */

		public function insert($table, $parameters)

		{

			$sql = sprintf(

				"insert into %s (%s) values (%s)",
				$table,

				implode(",", array_keys($parameters)),

				":" . implode(", :", array_keys($parameters))

			);

			try {

				$statement = $this->pdo->prepare($sql);

				$statement->execute($parameters);

			} catch (Exception $e) {

				die("Some thing went wrong in Query Builder!");

			}

		}

	}

 ?>