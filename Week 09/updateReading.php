<?php
include "../errorReportingInclude.php";
include "../Model/electricIMPAPI.php";

$resultJSON = getOneResult();

$result = json_decode($resultJSON);

echo $result[0] -> ReadingID;
echo $result[0] -> ReadingsString;
?>