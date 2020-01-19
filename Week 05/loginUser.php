<?php
session_start();
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
    if ($recaptcha->score >= 0.0) 
    {
        //Verified, send data to API
    	include "../Model/usersAPI.php";

		$data -> Username = $_POST["logUsername"];
		$data -> Password = $_POST["logPassword"];

		$loginDataJSON = json_encode($data);

		$result = loginUser($loginDataJSON);

		//If statement calls JS alert depending on loginUser result, sets session
		if ($result != "0") 
		{
			echo "<script type='text/javascript'>
					  	alert('Logged in');
						location = '../View/login.php';
				  </script>";
			$_SESSION["UserID"] = $result;
		}
		else
		{
			echo "<script type='text/javascript'>
					  	alert('Incorrect credentials');
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