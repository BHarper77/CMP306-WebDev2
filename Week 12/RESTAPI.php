<?php
include "../connectionInclude.php";
include "../errorReportingInclude.php";

function getItems($id)
{
	global $conn;

	if ($id != 0) 
	{
		$statement = mysqli_stmt_init($conn);

		$queryID = "SELECT Title, Description FROM Items WHERE ItemNo = ?";

		mysqli_stmt_prepare($statement, $queryID);
		mysqli_stmt_bind_param($statement, 'i', $id);
		mysqli_stmt_execute($statement);

		$resultID = mysqli_stmt_get_result($statement);

		$rowsID = array();

		while ($rID = mysqli_fetch_assoc($resultID)) 
		{
			$rowsID[] = $rID;
		}

		//header("Content Type: application/json");
		echo json_encode($rowsID);
	}
	else
	{
		$query = "SELECT Title, Description FROM Items";

		$result = mysqli_query($conn, $query);

		$rows = array();

		while($r = mysqli_fetch_array($result))
		{
			$rows[] = $r;
		}

		//header('Content-Type: application/json');
		echo json_encode($rows);
	}
}

function insertItem()
{
	global $conn;

	$statement = mysqli_stmt_init($conn);

	$dataJSON = file_get_contents("php://input");
	$data = json_decode($dataJSON, true);

	$title = $data["Title"];
	$description = $data["Description"];

	$query = "INSERT INTO Items (Title, Description) VALUES (?, ?)";

	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_param($statement, 'ss', $title, $description);

	if (mysqli_stmt_execute($statement))
	{
		$response = array(
					"status" => 1,
					"message" => "Success");
	}
	else
	{
		$response = array(
					"status" => 0,
					"message" => "Fail");
	}

	header('Content-Type: application/json');
	echo json_encode($response);
}
?>