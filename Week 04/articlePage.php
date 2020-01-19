<?php session_start(); ?>
<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Formula 1</title>

		<meta charset = 'utf-8'>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
	</head>

	<body>
		<?php 
		include "../navbarInclude.php";
	    include "../connectionInclude.php";
	    include "../Model/articlesAPI.php";
	    include "../Model/commentsAPI.php";

		$id = $_GET['id'];
		$article = getArticle($id);
		$articleJSON = json_decode($article);

		echo '<div class="container">
				<h4>'.$articleJSON-> ArticleTitle.'</h4>

				<p>'.$articleJSON-> Text.'</p>

				<p>Article by: '.$articleJSON-> Author.'</p>	

				<img class="img-fluid" src="../'.$articleJSON-> ImagePath.'">
			</div>';
		?>
		
		<div class="container">
			<button class="btn btn-light"><a href="Week04.php">Homepage</a></button>
		</div>

		<?php
		//Get ID from URL to find what article to display
		$commentsJSON = getComments($id);
		$comments = json_decode($commentsJSON);

		//If statement to check if user is logged in, then display comment form
		if($_SESSION["UserID"] != 0)
		{
			//Hidden inputs posting user and article IDs
			echo '<div class="container">
				  	<form action="../Controller/createComment.php" method="post">
						<div class="form-group">
							<label>Comment:</label>
							<input type="text" name="comment">
						</div>

						<input type="hidden" name="userNo" value="'.$_SESSION["UserID"].'">
						<input type="hidden" name="articleNo" value="'.$id.'">

						<button class="btn btn-primary" type="submit">Submit</button>
					</form>
				</div>';
		}

		//Calculate length to make sure all comments are displayed
		$length = count($comments);

		for ($i=0; $i < $length; $i++) 
		{ 
			echo '<div class="container">
					<div class="media border p-3">
						<div class="media-body">
							<h4>'.$comments[$i]-> Username.'</h4>
							<p>'.$comments[$i]-> Comment.'</p>
						</div>
					</div>
				</div>';
		}
		?>
	</body>
</html>