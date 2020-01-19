<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Formula 1</title>

		<meta charset = 'utf-8'>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
	</head>

	<body>
		<?php include "../navbarInclude.php"; ?>
		<?php include "../Model/articlesAPI.php"; ?>

		<?php
		include "../errorReportingInclude.php";
		$id = $_GET['id'];
		$articleJSON = getArticle($id);
		$article = json_decode($articleJSON);

		var_dump($article);

		echo '<div class="container">
				<h4>'.$article-> ArticleTitle.'</h4>

				<p>'.$article-> Text.'</p>

				<p>Article by: '.$article-> Author.'</p>	

				<img class="img-fluid" src="../'.$article-> ImagePath.'">
			</div>';
		?>

		<div class="container">
			<button class="btn btn-light"><a href="Week03.php">Homepage</a></button>
		</div>
	</body>
</html>