<?php 

 include_once('../model/Post.php');
 include_once('CRUD.php');
 include_once('../bo/PostBO.php');

 class PostDAO{

 	public function readPosts(){
 		$crud = new CRUD();
 		$bo = new PostBO();
 		$posts = array();


 		$array = $crud->read("post");

 		if($bo->validReadPost($array)){
 		foreach ($array as $key => $post) {
 			$newPost = new Post();

 			foreach ($post as $key => $value) {
 				if ($key==="id")
 					$newPost->setId($value);
 				if ($key=="title")
 					$newPost->setTitle($value);
 				if ($key=="content")
 					$newPost->setContent($value);
 			}
 			
 			$posts[] = $newPost;
 		}
 		
 		}
 		return $posts;
 	}
 	
 	public function createPost($title, $content){
 		$crud = new CRUD();
 		$bo = new PostBO();

 		if($bo->validCreatePost($title, $content)){
 			$array = array(
 				'title' => $title,
 				'content' => $content
 			);

 			return $crud->create('post', $array);
 		}else{
 			echo "<script>alert('Preencha todos os campos!');</script>";
 		}
 	}
 }
 ?>