<!DOCTYPE html>
<html>
<head>
	<title>Electric IMP Readings</title>
</head>
<body>
	<h2>Display Readings</h2>

	<h4>Latest reading</h4>

	<div id="latestValue">
		<!--AJAX stuff in here, javascript function on another file to start request, then AJAX file with sql query, use W3Schools-->
	</div>

	<?php
	include "../Model/electricIMPAPI.php";

	$infoJSON = getInfo();
	$info = json_decode($infoJSON);

	for ($i=0; $i < 10; $i++) 
	{ 
		echo "<br>".$info[$i]-> ReadingID;
		echo $info[$i]-> ReadingsString;
	}
	?>
</body>
</html>