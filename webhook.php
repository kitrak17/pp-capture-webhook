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
        "8qvhrwz6fm24dym2%7C48e018ca371559f16b40ca6b855ce5aefdfd3ca7%268wpp4nqmb9bdtkqx%7C0769f4ba7806e5dd906aa1f97ab901c1485f8924", "PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPG5vdGlm%0AaWNhdGlvbj4KICA8a2luZD5jaGVjazwva2luZD4KICA8dGltZXN0YW1wIHR5%0AcGU9ImRhdGV0aW1lIj4yMDIxLTExLTI1VDAzOjQ3OjU3WjwvdGltZXN0YW1w%0APgogIDxzdWJqZWN0PgogICAgPGNoZWNrIHR5cGU9ImJvb2xlYW4iPnRydWU8%0AL2NoZWNrPgogIDwvc3ViamVjdD4KPC9ub3RpZmljYXRpb24%2BCg%3D%3D%0A"
    );

    // Example values for webhook notification properties
    $message = $webhookNotification->kind; // "subscription_went_past_due"
    $message = $webhookNotification->timestamp->format('D M j G:i:s T Y'); // "Sun Jan 1 00:00:00 UTC 2012"

    file_put_contents("/tmp/webhook.log", $message, FILE_APPEND);

} catch (Braintree_Exception_NotFound $e) {
	echo $e->getMessage();
}
?>