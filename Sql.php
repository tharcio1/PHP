<?php 

	class Sql extends PDO{

		private $conn;

		public function __construct(){
			$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root", "");
		}

		public function select($consulta, $params = array()):array{
			$result = $this->query($consulta, $params);

			return $result->fetchAll(PDO::FETCH_ASSOC);
		}

		public function query($consulta, $params = array()){

			$stmt = $this->conn->prepare($consulta);

			$this->setParams($stmt,$params);

			$stmt->execute();

			return $stmt;

		}

		public function setParams($stmt, $params = array()){
			foreach ($params as $key => $value) {
				$this->setParam($stmt, $key, $value);
			}
		}

		public function setParam($stmt, $key, $value){
			$stmt->bindParam($key, $value);
		}

	}

 ?>