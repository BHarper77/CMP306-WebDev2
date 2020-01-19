<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["recaptcha_response"])) 
{
	// Build POST request:
    $recaptchaURL = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaSecret = '6LezTMMUAAAAADNWX8MhhRGBx_yKCjaP9m2lvNn8';
    $recaptchaResponse = $_POST['recaptcha_response'];

    // Make and decode POST request:
    $recaptcha = file_get_contents($recaptchaURL . '?secret=' . $recaptchaSecret . '&response=' . $recaptchaResponse);
    $recaptcha = json_decode($recaptcha);

    // Take action based on the score returned
    if ($recaptcha->score >= 0.5) 
    {
        //Verified, send data to API
    	include "../Model/usersAPI.php";

		$password = $_POST["regPassword"];
		$passwordHash = password_hash($password, PASSWORD_DEFAULT);

		$data -> Username = $_POST["regUsername"];
		$data -> Password = $passwordHash;
		$data -> MobileNo = $_POST["regMobileNo"];
		$data -> Email = $_POST["regEmail"];

		$dataJSON = json_encode($data);

		//If details aren't already on database, then create user
		if (checkDuplicate($dataJSON) == false) 
		{
			$result = createUser($dataJSON);

			echo "<script type='text/javascript'>
					  	alert('User created succesfully');
						location = '../View/login.php';
				  </script>";
		}
		else
		{
			echo "<script type='text/javascript'>
					  	alert('User already exists');
						location = '../View/login.php';
				  </script>";
		}
    } 
    else 
    {
        // Not verified
        echo "<script type='text/javascript'>
				  	alert('Detected as bot');
					location = '../View/login.php';
			  </script>";
    }
}
?>