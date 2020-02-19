<?php
$rawData = file_get_contents("php://input");
$textfilename="text.txt";
$success = file_put_contents($textfilename, $rawData."\n");
if ($success === TRUE)
{
	echo "success";
} else {
	echo "faield";
}
?>