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
	<a href="HomeView.php">Listagem dos post</a> |
	<a href="CreatePostView.php">Criar Post</a>
</nav>
	<?php 
		require_once '../model/Post.php';
		require_once '../dao/PostDAO.php';
		$dao = new PostDAO();
		$posts = $dao->readPosts();

		if(!is_null($posts)){
		foreach ($posts as $key => $post) {
	?>

	<table>
		<tr>
			<th><a href="PostView.php?id=<?php echo $post->getId() ?>"><?php echo $post->getTitle(); ?></a></th>
		</tr>
		<tr>
			<td>
			<?php
				//Mostrar apenas os 100 primeiros caracteres
				$content = $post->getContent(); 
				$length = strlen($content);
  				$max = 100;

  				if($length > $max){
  					$content = substr_replace($content, "...", $max, $length - $max);
  				}

  				echo $content;
			?></td>
		</tr>
	</table>

	<?php 
		}
		}
	 ?>
</body>
</html>