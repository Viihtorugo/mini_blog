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
 	
 	//Obter todos os comentarios
 	public function readComments($id){
 		$crud = new CRUD();
 		$bo = new CommentBO();
 		$comments = array();


 		$result = $crud->read("coment", "WHERE id_post = {$id}");

 		if($bo->validReadComment($result)){
 		foreach ($result as $key => $coment) {
 			$newComment = new Comment();

 			foreach ($coment as $key => $value) {
 				if ($key=="name")
 					$newComment->setName($value);
 				if ($key=="email")
 					$newComment->setEmail($value);
 				if ($key=="content")
 					$newComment->setContent($value);
 			}
 			
 			$comments[] = $newComment;
 		}
 		
 		}
 		
 		return $comments;
 	}
 }


?>