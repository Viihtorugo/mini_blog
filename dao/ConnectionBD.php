<?php 
	
	//Conectar com banco de dados
 	function getConnectionBD($host, $user, $pass, $bd){
 		$link = new mysqli($host, $user, $pass, $bd);

 		if($link->connect_errno)
 			echo "Falha na conexão: (".$mysqli->connect_errno.") ".$mysqli->connect_error;

 		return $link;
 	}

 	//Fecha conexão do banco de dados
 	function closeConnectionBD($link){
 		if(!mysqli_close($link))
 			echo "Erro ao fechar a conexão com BD";
 	}
 ?>