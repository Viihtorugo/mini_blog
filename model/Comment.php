<?php 

 //Objeto comentário
 class Comment{

	private $idPost;
 	private $name;
 	private $email;
 	private $content;

 	public function setIdPost($idPost){
 		$this->idPost = $idPost;
 	}

 	public function getIdPost(){
 		return $this->idPost;
 	}

 	public function setName($name){
 		$this->name = $name;
 	}
 	public function getName(){
 		return $this->name;
 	}

 	public function setEmail($email){
 		$this->email = $email;
 	}
 	public function getEmail(){
 		return $this->email;
 	}

 	public function setContent($content){
 		$this->content = $content;
 	}

 	public function getContent(){
 		return $this->content;
 	}
 }
 ?>