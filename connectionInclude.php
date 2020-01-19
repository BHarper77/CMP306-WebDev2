<?php
    $servername = "lochnagar.abertay.ac.uk";
    $DBusername = "sql1700485";
    $DBpassword = "5ux2ZsUdsWWE";
    $DBname = "sql1700485";

    $conn = mysqli_connect($servername, $DBusername, $DBpassword, $DBname);

    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
    }
?>