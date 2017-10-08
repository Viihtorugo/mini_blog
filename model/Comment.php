<?php 

 //Objeto comentário
 class Comment{

	private $id;
 	private $name;
 	private $email;
 	private $content;

 	public function setId($id){
 		$this->id = $id;
 	}

 	public function getId(){
 		return $this->id;
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