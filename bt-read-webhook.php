<?php
require 'vendor/autoload.php';


$gateway = new Braintree_Gateway([
    'environment' => 'sandbox',
    'merchantId' => '6dbmtzfrhrty9sd8',
    'publicKey' => '8qvhrwz6fm24dym2',
    'privateKey' => 'e2339cba40a7ff9f74a5e67c269014c7'
]);


try {

    $webhookNotification = $gateway->webhookNotification()->parse(
        $_POST["bt_signature"], $_POST["bt_payload"]
    );

    // Example values for webhook notification properties
    $message = $webhookNotification->kind; // "subscription_went_past_due"
    $message = $webhookNotification->timestamp->format('D M j G:i:s T Y'); // "Sun Jan 1 00:00:00 UTC 2012"

    file_put_contents("/tmp/webhook.log", $message, FILE_APPEND);

} catch (Braintree_Exception_NotFound $e) {
	echo $e->getMessage();
}
?>
