<?php 
  
  require_once 'Comment.php';

  class Post{

 	private $id;
 	private $title;
 	private $content;
 	private $comments = array();

 	public function setId($id){
 		$this->id = $id;
 	}
 	public function getId(){
 		return $this->id;
 	}

 	public function setTitle($title){
 		$this->title = $title;
 	}
 	public function getTitle(){
 		return $this->title;
 	}

 	public function setContent($content){
 		$this->content = $content;
 	}
 	public function getContent(){
 		return $this->content;
 	}

 	//Adicionar um comentário
 	public function addComment($comment){
 		$this->comment[] = $comment;
 	}

 	//Remove um comentário
 	public function rmComment($comment){

 		/*array_search é uma função que busca 
 		o valor do primeiro parametro com o array
 		informado no segundo paramentro, assim
 		retornando a chave do elemento comparado*/

 		$key = array_search($comment, $this->comment);
 		if($key!==false){
 			unset($this->comment[$key]);
 		}
 	}
 }

 ?>