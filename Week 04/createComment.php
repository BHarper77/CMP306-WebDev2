<?php
include "../Model/commentsAPI.php";

$data-> UserNo = $_POST["userNo"];
$data-> ArticleNo = $_POST["articleNo"];
$data-> Comment = $_POST["comment"];

$commentDataJSON = json_encode($data);
createComment($commentDataJSON);

header("Location: ../View/Week10.php");
?>