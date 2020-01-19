<?php
	include "../connectionInclude.php";

	function getArticle($id)
	{
		global $conn;

		$statement = mysqli_stmt_init($conn);

	  	$query = "SELECT Articles.ArticleTitle, Articles.Author, Articles.Text, Images.ImagePath, Articles.ArticleNo
				  FROM Articles, Images
				  INNER JOIN RelatedImagesArticles
				  WHERE Articles.ArticleNo = RelatedImagesArticles.ArticleNo AND Images.ImageNo = RelatedImagesArticles.ImageNo AND Articles.ItemNo = ?";

		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, 'i',$id);
		mysqli_stmt_execute($statement);

		$result = mysqli_stmt_get_result($statement);

		$rows = array();

		while ($r = mysqli_fetch_assoc($result)) 
		{
			$rows[] = $r;
		}

		return json_encode($rows);
	}

	function fiveLatestArticles()
	{
		global $conn;

		$query = "SELECT Articles.ArticleTitle, Articles.Author, Articles.Text, Images.ImagePath 
				  FROM Articles 
				  INNER JOIN RelatedImagesArticles ON Articles.ArticleNo = RelatedImagesArticles.ArticleNo 
				  INNER JOIN Images ON RelatedImagesArticles.ImageNo = Images.ImageNo
				  ORDER BY Articles.ArticleNo DESC LIMIT 5";

		$result = mysqli_query($conn, $query);

		$rows = array();

		while ($r = mysqli_fetch_assoc($result))
		{
			$rows[] = $r;
		}

		return json_encode($rows);
	}
?>