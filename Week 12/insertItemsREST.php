<?php
$url = "https://mayar.abertay.ac.uk/~1700485/CMP306Website/Controller/itemsReroute.php";

$data -> Title = $_POST["itemTitle"];
$data -> Description = $_POST["itemDescription"];

$dataJSON = json_encode($data);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($curl, CURLOPT_POSTFIELDS, $dataJSON);                                                                 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, array(                                                                          
	'Content-Type: application/json',                                                                                
	'Content-Length: ' . strlen($dataJSON))                                                                       
); 

$response = curl_exec($curl);
echo "Finished: ".$response; 

if (!$resp) 
{
	die('Error : "'.curl_error($curl).'" - Code: '.curl_errno($curl)); 
}

curl_close($curl);
?>
