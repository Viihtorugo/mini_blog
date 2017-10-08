<?php 

 include_once('../model/Post.php');
 include_once('CRUD.php');

 class PostDAO{

 	public function getPosts(){
 		$crud = new CRUD();
 		$posts = array();

 		$array = $crud->read("post");

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
 		
 		return $posts;
 	}
 	
 }
 ?>