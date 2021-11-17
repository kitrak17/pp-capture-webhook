<?php
$rawData = file_get_contents("php://input");
$timstamp = "\n\n------------------------------------------------------------------------------------------------\n".date("Y-m-d H:i:s a")."\n------------------------------------------------------------------------------------------------\n\n";
$success = file_put_contents('logs.txt', $timstamp."\n".$rawData.PHP_EOL , FILE_APPEND | LOCK_EX);
echo 'METHOD=CallbackResponse&NO_SHIPPING_OPTION_DETAILS=0&CALLBACKVERSION=61';
?>
