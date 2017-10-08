<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listagem dos Post</title>
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
<body class="container">
<nav>
	<a href="">Listagem dos post</a> |
	<a href="">Editar Posts</a> |
	<a href="">Criar Post</a>
</nav>
	<?php 
		require_once '../model/Post.php';
		require_once '../dao/PostDAO.php';
		$dao = new PostDAO();
		$posts = $dao->getPosts();

		foreach ($posts as $key => $post) {
	?>

	<table>
		<tr>
			<th><a href="postView.php"><?php echo $post->getTitle(); ?></a></th>
		</tr>
		<tr>
			<td><?php echo $post->getContent(); ?></td>
		</tr>
	</table>

	<?php 
		}
	 ?>
</body>
</html>