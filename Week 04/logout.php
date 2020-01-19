<?php
session_start();

session_destroy();

echo '<script type="text/javascript">
	  	alert("Logged out");
		location = "login.php";
	  </script>';
?>