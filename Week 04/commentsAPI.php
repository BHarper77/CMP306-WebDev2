<?php
	include "../connectionInclude.php";

	function getComments($id)
	{	
		global $conn;

		$statement = mysqli_stmt_init($conn);

		$query = "SELECT Users.Username, Comments.Comment
				  FROM Users
				  INNER JOIN Comments
				  ON Users.UserNo = Comments.UserNo WHERE Comments.ArticleNo = ?";
		
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

	function createComment($commentJSON)
	{
		global $conn;

		$comment = json_decode($commentJSON);

		$statement = mysqli_stmt_init($conn);

		$query = "INSERT INTO Comments (UserNo, ArticleNo, Comment) VALUES (?, ?, ?)";

		$UserNo = $comment -> UserNo;
		$ArticleNo = $comment -> ArticleNo;
		$Comment = $comment -> Comment;

		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, 'sss', $UserNo, $ArticleNo, $Comment);
		mysqli_stmt_execute($statement);
	}
?>