<?php
include "../Model/electricIMPAPI.php";

$jsonBody = file_get_contents('php://input');

$body = json_decode($jsonBody);

$deviceID = $body -> deviceID;

insertInto($jsonBody, $deviceID);
?>