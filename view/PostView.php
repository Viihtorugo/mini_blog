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
			margin: 10px auto;
			border: 1px solid black;
		}

		th{
			height: 10%;
			width: 100%;
			text-align: center;
		}
		td{
			height: 90%;
			width: 100%;
			text-align: center;
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
</body>
</html>