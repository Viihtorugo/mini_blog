<?php 

 include_once('../model/Comment.php');
 include_once('CRUD.php');
 include_once('../bo/CommentBO.php');

 class CommentDAO{
 	
 	//Adicionar comentario
 	public function createComment($name, $email, $content, $id){
 		$crud = new CRUD();
 		$bo = new CommentBO();

 		if($bo->validCreateComment($name, $email, $content, $id)){
 			$array = array(
 				'name' 	=> $name,
 				'email' => $email,
 				'content' => $content,
 				'id_post' => $id
 			);

 			return $crud->create('coment', $array);
 		}else{
 			echo "<script>alert('Preencha todos os campos, o comentário tem que ter mais de 3 caracteres e um email válido!');</script>";
 		}
 	}
 	
 }


?>