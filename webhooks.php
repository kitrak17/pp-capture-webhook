<?php
$rawData = file_get_contents("php://input");
$textfilename="text ".date("Y-m-d His").".txt";
$phno = 1;
file_put_contents ($textfilename, $phno."\n".$rawData."\n");
?>