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

			}

			catch (Exception $e) {

				die("Some thing went wrong in Query Builder!");

			}

		}

		public function registerRequest($name, $email, $password, $userType)

		{

			$field = NULL;

			$language = NULL;

			$framework = NULL;

			$frameworkVersion = NULL;
	

			if ($userType === "frontend" || $userType === "javascript" || $userType === "vuejs" || $userType === "angularjs")

			{	

				$this->field = 1;

			} 

			if ($userType === "javascript" || $userType === "vuejs" || $userType === "angularjs")

			{
				//$field = 1;
				$this->language = 1;

			}

			if ($userType === "vuejs" || $userType === "angular")

			{

				//$field = 1;
				$this->language = 1;

			}

			if ($userType === "vuejs")

			{

				//$field = 1;
				//language = 1;
				$this->framework = 1;

			}

			if ($userType === "angular" || $userType === "angularjs")

			{

				//$field = 1;
				//$language = 1;
				$this->framework = 3;

			}

			if ($userType === "angularjs")

			{

				//$field = 1;
				//$language = 1;
				//$framework = 3;
				$this->frameworkVersion = 1;

			}

			if ($userType === "backend" || $userType === "php" || $userType === "laravel")

			{

				$this->field = 2;

			}

			if ($userType === "php" || $userType === "laravel")

			{

				//$field = 2;
				$this->language = 2;

			}

			if ($userType === "laravel")

			{

				//$this->field = 2;
				//$this->language = 2;
				$this->framework = 2;

			}

			try {

				$statement = $this->pdo->prepare("

				INSERT INTO users (users.name, users.email, users.password, users.user_field_id, users.user_language_id, users.user_framework_id, users.user_framework_version_id) 
				
				VALUES ('$name', '$email', '$password', '{$this->field}', '{$this->language}', '{$this->framework}', '{$this->frameworkVersion}')

				");

				$statement->execute();

			}	

			catch (Exception $e) {

				die("Some thing went wrong in Query Builder!" . $e);

			}

		}

		public function selectUserTypes()

		{

			try{

				$statement = $this->pdo->prepare("

				SELECT * FROM fields LEFT JOIN languages ON fields.id = languages.field_id

				-- LEFT JOIN frameworks ON languages.id = frameworks.language_id 

				-- LEFT JOIN framework_versions ON frameworks.id = framework_versions.framework_id 

				UNION ALL 

				SELECT * FROM fields RIGHT JOIN languages ON fields.id = languages.field_id

				-- RIGHT JOIN frameworks ON languages.id = frameworks.language_id 

				-- RIGHT JOIN framework_versions ON frameworks.id = framework_versions.framework_id
				
				");

				$statement->execute();

				return $statement->fetchAll(PDO::FETCH_OBJ);

			}	

			catch (Exception $e) {

				die("Some thing went wrong in Query Builder!");

			}

			

		} 

		/*public function insert($table, $parameters)

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

		}*/

	}

 ?>