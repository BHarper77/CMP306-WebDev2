<?php session_start(); ?>
<!DOCTYPE html>
<html lang = 'en'>
    <head>
        <title>Formula 1</title>

        <meta charset = 'utf-8'>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 

        <link rel="stylesheet" type="text/css" href="passwordStrengthMeterStyling.css">

        <!--JQM links-->
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>

        <!--reCAPTCHA link-->
        <script src="https://www.google.com/recaptcha/api.js?render=6LezTMMUAAAAAACDEd7OZE3th_cd4kTo9x23zLn_"></script>
    </head>

    <script>
    	grecaptcha.ready(function () 
    	{
            grecaptcha.execute("6LezTMMUAAAAAACDEd7OZE3th_cd4kTo9x23zLn_", { action: "Login" }).then(function (token) 
            {
                var recaptchaResponse = document.getElementById("recaptchaResponse");
                recaptchaResponse.value = token;
            });
        });
    </script>

    <script>
    	//Sript for password strength on register
    	window.onload = function()
    	{
	    	var strength = {
	    		0: "Worst",
	    		1: "Bad",
			    2: "Weak",
			    3: "Good",
			    4: "Strong"
	    	}

	    	var password = document.getElementById("password");
			var meter = document.getElementById("passwordStrength");
			var text = document.getElementById("passwordStrengthText");

			password.addEventListener('input', function() 
			{
		    	var val = password.value;
		  		var result = zxcvbn(val);

		  		// Update the password strength meter
		  		meter.value = result.score;

			  	// Update the text indicator
			  	if (val !== "") 
			  	{
			    	text.innerHTML = "Strength: " + strength[result.score]; 
			  	} 
			  	else 
			  	{
			    	text.innerHTML = "";
			  	}
			});
		}
    </script>

    <body>
    	<?php include "../navbarInclude.php"; ?>

    	<script>
    		function validate(form)
    		{
    			//Grabbing passwords from form
    			var firstPassword = form.regPassword.value;
				var secondPassword = form.regConfirmPassword.value;

				if (firstPassword == secondPassword)
				{
					return true;
				}
				else
				{
					alert("Passwords did not match");
					
					return false;
				}    			
    		}
    	</script>

    	<div class="container">
    		<div class="row">
    			<div class="col">
			    	<form action="../Controller/createUser.php" method="post" onsubmit="return validate(this)">
			    		<h4>Register</h4>
			    		<div class="form-group">
			    			<label>Username:</label>
			    			<input class="form-control" type="text" name="regUsername" required pattern="{50}">
			    		</div>

			    		<div class="form-group">
			    			<label>Password:</label>
			    			<input class="form-control" type="password" id="password" name="regPassword" required>
			    			<meter max="4" id="passwordStrength"></meter>
			    			<p id="passwordStrengthText"></p>
			    		</div>

			    		<div class="form-group">
			    			<label>Confirm Password:</label>
			    			<input class="form-control" type="password" name="regConfirmPassword" id="showPassword" required>
			    		</div>

			    		<div class="form-group">
			    			<label>Mobile Number:</label>
			    			<input class="form-control" type="text" name="regMobileNo" required pattern="[0-9]{11}">
			    		</div>

			    		<div class="form-group">
			    			<label>Email:</label>
			    			<input class="form-control" type="email" name="regEmail" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
			    		</div>

			    		<button class="btn btn-primary" type="submit">Submit</button>

			    		<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
			    	</form>
			    </div>

			    <div class="col">
			    	<form action="../Controller/loginUser.php" method="post">
			    		<h4>Login</h4>
			    		<div class="form-group">
			    			<label>Username:</label>
			    			<input class="form-control" type="text" name="logUsername" required>
			    		</div>

			    		<div class="form-group">
			    			<label>Password:</label>
			    			<input class="form-control" type="password" name="logPassword" required>
			    		</div>

			    		<button class="btn btn-primary" type="submit">Submit</button>

			    		<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
			    	</form>

			    	<?php
			    	if ($_SESSION["UserID"] != 0)
			    	{
			    		echo '<div class="alert alert-danger">
			    			 	<p>You are already logged in</p>
			    			 	<p>Log out <a href="logout.php">here</a></p>
			    			 </div>';
			    	}
			    	?>
			    </div>
		    </div>
	    </div>
    </body>
</html>