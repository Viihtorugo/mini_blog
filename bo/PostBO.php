<?php 
	
 class PostBO{
 	
 	//Verifica tem posts no banco
 	public function validReadPost($array){
 		if($array==null)
 			return false;

 		return true;
 	}

 	//Valida a criação do registro no banco
 	public function validCreatePost($title, $content){
 		if($title)
 			if($content)
 				return true;

 		return false;
 	}
 }

 ?>