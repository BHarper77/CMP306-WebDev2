<?php
	include "../connectionInclude.php";

	function getAllItems()
	{
		global $conn;
		
		$query = "SELECT Items.Title, Items.Description, Items.ItemNo, Images.ImagePath
                  FROM Items
                  INNER JOIN RelatedImagesItems
                  ON Items.ItemNo = RelatedImagesItems.ItemNo
                  INNER JOIN Images
                  ON RelatedImagesItems.ImageNo = Images.ImageNo";	
                                      
		$result = mysqli_query($conn, $query);

		$rows = array();

		while ($r = mysqli_fetch_assoc($result))
		{
			$rows[] = $r;
		}

		return json_encode($rows);
	}
?>