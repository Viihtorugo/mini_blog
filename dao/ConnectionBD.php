<?php 

 class ConnectionBD{

 	private $link;

	//Conectar com banco de dados
 	function __construct($host, $user, $pass, $bd){

 		$this->link = @new mysqli($host, $user, $pass, $bd);

 		if($this->link->connect_errno){
 			echo "Falha na conexão com o banco de dados";
 		}
 	}

 	public function getLink(){
 		return $this->link;
 	}

 	//Fecha conexão do banco de dados
 	public function closeConnection($link){
 		if(@!mysqli_close($link))
 			echo "Erro ao fechar a conexão com BD";
 	}

 	}
 ?>