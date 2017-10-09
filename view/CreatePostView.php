<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Criar Post</title>
	<style type="text/css">
		.container{
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

		form{
			width: 600px;
			margin: 10px auto;
		}

		input{
			margin: 5px auto;
			width: 100%;
			text-align: center;
		}

		textarea{
			margin: 5px auto;
			width: 100%;
			text-align: center;
		}
		
		button{
			margin: 5px auto;
			width: 25%;
			text-align: center;
		}
	</style>
</head>
<body>
<nav>
	<a href="HomeView.php">Listagem dos post</a> |
	<a href="CreatePostView.php">Criar Post</a>
</nav>
<form action="#" method="post">
	<input type="text" name="title" placeholder="Digite o título">	
	<textarea name="content" placeholder="Digite o conteúdo do post aqui"></textarea>
	<button type="submit">Salvar</button>
</form>
<?php 
	include_once('../dao/PostDAO.php');

	if(count($_POST)){
	$dao = new PostDAO();
	$title = @$_POST['title'];
 	$content = @$_POST['content'];

 	if($dao->createPost($title, $content)){
 		echo "<script>alert('Post salvado com sucesso!');</script>";
 	}else{
 		echo "<script>alert('Tente novamente preenchando todos os dados!');</script>";
 	}
 	}
	?>
</body>
</html>