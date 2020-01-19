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

	    //Getting articles and comments from API, calculating length of returned arrays 
		$id = $_GET['id'];

		$articlesJSON = getArticle($id);
		$articles = json_decode($articlesJSON);

		$numberOfArticles = count($articles);

		//Displaying all articles
		for ($i=0; $i < $numberOfArticles; $i++) 
		{ 
			$articleID = $articles[$i] -> ArticleNo;

			$commentsJSON = getComments($articleID);
			$comments = json_decode($commentsJSON);

			$numberOfComments = count($comments);

			echo '<div class="container">
				  	<h4>'.$articles[$i] -> ArticleTitle.'</h4>
				  	<p>'.$articles[$i] -> Text.'</p>
				  	<p>Article by: '.$articles[$i] -> Author.'
				  	<img class="img-fluid" src="../'.$articles[$i] -> ImagePath.'">
				  </div>';

			//Displaying comment form is user is logged in
			if ($_SESSION["UserID"] != 0) 
			{
				//Hidden inputs posting user and article IDs
				echo '<div class="container">
					  	<form action="../Controller/createComment.php" method="post">
							<div class="form-group">
								<label>Comment:</label>
								<input type="text" name="comment">
							</div>

							<input type="hidden" name="userNo" value="'.$_SESSION["UserID"].'">
							<input type="hidden" name="articleNo" value="'.$articleID.'">

							<button class="btn btn-primary" type="submit">Submit</button>
						</form>
					</div>';
			}

			//Displaying all comments for relevant articles
			for ($j=0; $j < $numberOfComments; $j++)
			{ 
				echo '<div class="container">
					  	<div class="media border p-3">
							<div class="media-body">
								<h4>'.$comments[$j]-> Username.'</h4>
								<p>'.$comments[$j]-> Comment.'</p> 
							</div>
						</div>
					</div>';
			}
		}
		?>

		<div class="container">
			<button class="btn btn-light"><a href="Week10.php">Homepage</a></button>
		</div>
	</body>
</html>