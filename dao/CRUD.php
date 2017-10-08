<?php 

	include("ConnectionBD.php");

	class CRUD{

	private $database;

	public function __construct(){
		$this->database = new ConnectionBD();
	} 

 	//Protegendo contra SQL Injection
 	public function escape($date){

 		$link = $database->getConnection();

 		if (!is_array($date)){
 			$date = mysqli_real_escape_string($link, $date);
 		}else{
 			$array = $date;

 			foreach ($array as $key => $value) {
 				$key = mysqli_real_escape_string($link, $key);
 				$value = mysqli_real_escape_string($link, $value);

 				$date[$key] = $value;
 			}
 		}

 		$database->closeConnection($link);
 		return $date;
 	}

 	//Executando as querys do MySQL
 	public function execute($query){

 		$link = $this->database->getConnection();

 		$result = @mysqli_query($link, $query) or die(@mysqli_error());
 		
 		$this->database->closeConnection($link);
 		return $result;
 	}

	}
 ?>