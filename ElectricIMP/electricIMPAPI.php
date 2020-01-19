<?php
include "../connectionInclude.php";

function insertInto($body, $deviceID)
{
	global $conn;

	//Getting date and time
	$date = date("d/m/Y");
	$time = date("h:ia");

	$dateTime = $date." - ".$time;

	$statement = mysqli_stmt_init($conn);

	$query = "INSERT INTO ElectricIMP (DeviceID, DateTime, ReadingsString) VALUES (?, ?, ?)";

	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_param($statement, 'sss', $deviceID, $dateTime, $body);
	mysqli_stmt_execute($statement);
}

function getOneResult()
{		
	global $conn;

	$query = "SELECT ReadingID, ReadingsString FROM ElectricIMP ORDER BY ReadingID DESC LIMIT 1";

	$result = mysqli_query($conn, $query);

	$rows = array();

	while ($r = mysqli_fetch_assoc($result))
	{
		$rows[] = $r;
	}

	return json_encode($rows);
}

function getTenResults()
{
	global $conn;

	$query = "SELECT ReadingID, ReadingsString FROM ElectricIMP ORDER BY ReadingID ASC LIMIT 10";

	$result = mysqli_query($conn, $query);

	$rows = array();

	while ($r = mysqli_fetch_assoc($result))
	{
		$rows[] = $r;
	}

	$row = mysqli_fetch_assoc($result);

	return json_encode($rows);
}
?>