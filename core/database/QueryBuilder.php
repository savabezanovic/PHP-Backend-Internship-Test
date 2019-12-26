<?php 

	class QueryBuilder

	{

		protected $pdo;

		public function __construct($pdo)

		{

			$this->pdo = $pdo;

		}

		public function selectAll($table)

		{

			$statment = $this->pdo->prepare("SELECT * FROM {$table}");
			$statment->execute();

			return $statment->fetchAll(PDO::FETCH_OBJ);

		}

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