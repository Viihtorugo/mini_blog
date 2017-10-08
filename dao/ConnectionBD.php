<?php 
 class ConnectionBD{

 	private $localhost;
 	private $username;
 	private $password;
 	private $database;

	//Atribuir valores ao parametros da conexão
 	function __construct(){
 		$this->localhost = "localhost";
 		$this->username = "root";
 		$this->password = "";
 		$this->database = "mini_blog";
 	}

 	//Abre a conexão
 	public function getConnection(){
 		$link = @mysqli_connect($this->localhost, $this->username, $this->password, $this->database) or die(mysqli_connect_erro());
 		mysqli_set_charset($link, "utf8") or die(mysqli_error($link));

 		return $link;
 	}

 	//Fecha a conexão
 	public function closeConnection($link){
 		@mysqli_close($link) or die(mysqli_error($link));
 	}

 	//Protegendo contra SQL Injection
 	public function escape($date){

 		$link = $this->getConnection();

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

 		$this->closeConnection($link);
 		return $date;
 	}

 		
 	}
 ?>