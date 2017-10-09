<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Postagem</title>
	<style type="text/css">
		.container{
			background: gray;
			display: flex;
			flex-direction: column;
			align-content: center;
		}

		nav{
			margin: -10px -10px auto;
			text-align: center;
			width: 101%;
			height: 50px;
			background: darkblue;
			color: white;
		}

		nav a{
			padding: 10px auto;
			color: white;
		}

		table{
			width: 600px;
			height: 300px;
			margin: 10px auto;
			border: 1px solid black;
		}

		th{
			height: 10%;
			width: 100%;
			text-align: center;
		}

		td{
			text-indent: 50px;
			text-align: justify;
			height: 90%;
			width: 100%;
		}

		form{
			width: 600px;
			margin: 10px auto;
		}

		input{
			width: 40%;
			margin: 5px auto;
		}

		textarea{
			width: 100%;
		}

		button{
			width: 20%;
			margin: 10px auto;
		}
	</style>
</head>
<body>
<nav>
	<a href="HomeView.php">Listagem dos post</a> |
	<a href="CreatePostView.php">Criar Post</a>
</nav>
<?php 
	include_once('../dao/PostDAO.php');
	include_once('../model/Post.php');

	$id = $_GET['id'];
	$dao = new PostDAO();
	$post = new Post();

	$post = $dao->readOnePost($id);
?>
<table>
	<tr>
		<th><?php echo $post->getTitle(); ?></th>
	</tr>
	<tr>
		<td><?php echo $post->getContent(); ?></td>
	</tr>
</table>
<form action="#" method="post">
	<input type="text" name="name" placeholder="Digete seu Nome. Ex: Victor">
	<input type="text" name="email" placeholder="Email. Ex: exemplo@ex.com">
	<textarea name="content" placeholder="Comente aqui.."></textarea>
	<button type="submit">Comentar</button>
</form>
<?php
	
	include_once('../dao/CommentDAO.php');

	if(count(@$_POST)){
		$dao = new CommentDAO();

		$name = $_POST['name'];
		$email = $_POST['email'];
		$content = $_POST['content'];
		
		if($dao->createComment($name, $email, $content, $id)){
			echo "<script>alert('Obrigado por comentar!');</script>";
		}else{
			echo "<script>alert('Erro ao comentar, tente novamente!');</script>";
		}
	}

?>
</body>
</html>