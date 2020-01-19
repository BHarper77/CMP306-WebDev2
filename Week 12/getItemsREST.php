<?php
//CURL session
$url = "https://mayar.abertay.ac.uk/~1700485/CMP306Website/Controller/itemsReroute.php";

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);
echo "Finished: ".$response;

if (!$response) 
	{
		die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); 
	}

curl_close($curl);
?>