<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Formula 1</title>

		<meta charset = 'utf-8'>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
	</head>

	<body>
		<?php include "../navbarInclude.php"; ?>

		<?php include "../connectionInclude.php"; ?>

		<?php
		global $conn;
		$query = mysqli_query($conn, "SELECT ArticleTitle, Author, Text FROM Articles WHERE ArticleNo = '2004'");

		$query2 = mysqli_query($conn, "SELECT Images.ImagePath
									  FROM Images
									  INNER JOIN RelatedImagesArticles
									  ON Images.ImageNo = RelatedImagesArticles.ImageNo
									  INNER JOIN Articles
									  ON RelatedImagesArticles.ArticleNo = Articles.ArticleNo WHERE Articles.ArticleNo = '2004'");

		while ($row = mysqli_fetch_assoc($query))
		{
			$articleTitle = $row["ArticleTitle"];
			$author = $row["Author"];
			$text = $row["Text"];
		}

		while ($row = mysqli_fetch_assoc($query2)) 
		{
			$image = $row["ImagePath"];
		}

		mysqli_close($conn);
		?>

		<div class="container">
			<h4><?php echo $articleTitle; ?></h4>

			<p><?php echo $text; ?></p>

			<p>Article by: <?php echo $author; ?></p>

			<p>Source: <a href="https://en.wikipedia.org/wiki/Scuderia_Ferrari">Link</a></p>

			<img class="img-fluid" src="../<?php echo $image; ?>"><br>

			<button class="btn btn-light"><a href="Week02.php">Homepage</a></button>
		</div>
	</body>