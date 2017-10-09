<?php 
	
 class CommentBO{

 	//Valida a criação do registro no banco
 	public function validCreateComment($name, $email, $content, $id){
 		if ($id){
 			if($name){
 				if ($content && strlen($content) > 3){
 					if($email && filter_var($email, FILTER_VALIDATE_EMAIL)) {
 						return true;
 					}
 				}
 			}
 		}

 		return false;
 	}

 	//Verifica se tem comentario no banco
 	public function validReadComment($array){
 		if($array==null)
 			return false;

 		return true;
 	}
}
 ?>