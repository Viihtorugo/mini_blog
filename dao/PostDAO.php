<?php 

 include_once('../model/Post.php');
 include_once('CRUD.php');
 include_once('../bo/PostBO.php');

 class PostDAO{

 	//obter apenas um post
 	public function readOnePost($id){
 		$crud = new CRUD();
 		$bo = new PostBO();
 		$post = new Post();

 		$result = $crud->read('post', "WHERE id = ".$id);

		if($bo->validReadPost($result)){
 			$object = current($result);

			foreach ($object as $key => $value) {
 				if ($key=="id")
 					$post->setId($value);
 				if ($key=="title")
 					$post->setTitle($value);
 				if ($key=="content")
 					$post->setContent($value);
 			}
 			
 		}
 		
 		return $post;
 	}

 	//obter todos os posts
 	public function readPosts(){
 		$crud = new CRUD();
 		$bo = new PostBO();
 		$posts = array();


 		$result = $crud->read("post");

 		if($bo->validReadPost($result)){
 		foreach ($result as $key => $post) {
 			$newPost = new Post();

 			foreach ($post as $key => $value) {
 				if ($key=="id")
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