<?php
	include "../connectionInclude.php";

	function checkDuplicate($dataJSON)
	{
		global $conn;

		$data = json_decode($dataJSON);

		$statement = mysqli_stmt_init($conn);

		$query = "SELECT Username, Email, MobileNo FROM Users WHERE Username = ? OR Email = ? OR MobileNo = ?";

		$Username = $data -> Username;
		$Email = $data -> Email;
		$MobileNo = $data -> MobileNo;

		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, 'sss', $Username, $Email, $MobileNo);

		mysqli_stmt_execute($statement);

		//Getting number of rows returned
		mysqli_stmt_store_result($statement);
		
		$rowCount = mysqli_stmt_num_rows($statement);
		echo $rowCount;

		if ($rowCount == 0) 
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	function createUser($dataJSON)
	{
		global $conn;

		$data = json_decode($dataJSON);

		$statement = mysqli_stmt_init($conn);

		$query = "INSERT INTO Users (Username, Password, MobileNo, Email) VALUES (?, ?, ?, ?)";

		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, 'ssss', $Username, $Password, $MobileNo, $Email);

		$Username = $data -> Username;
		$Password = $data -> Password;
		$MobileNo = $data -> MobileNo;
		$Email = $data -> Email;

		mysqli_stmt_execute($statement);
	}

	function loginUser($loginDataJSON)
	{
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);
		
		global $conn;

		$data = json_decode($loginDataJSON);

		$statement = mysqli_stmt_init($conn);

		$query = "SELECT UserNo, Password FROM Users WHERE Username = ?";

		$Username = $data -> Username;
		$Password = $data -> Password;

		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param($statement, 's', $Username);
		mysqli_stmt_execute($statement);
		mysqli_stmt_bind_result($statement, $UserNo, $DBpassword);

		while (mysqli_stmt_fetch($statement)) 
		{
			$passwordHash = $DBpassword;
		}

		mysqli_stmt_store_result($statement);

		$rowCount = mysqli_stmt_num_rows($statement);

		//Nested if statements to decide if user credentials are correct, return UserNo for session variable 
		if ($rowCount == 0)
		{
			return 0;

			break;
		}
		else
		{
			if (password_verify($Password, $passwordHash)) 
			{
				return $UserNo;

				break;
			}
			else
			{
				return 0;

				break;
			}
		}
	}
?>