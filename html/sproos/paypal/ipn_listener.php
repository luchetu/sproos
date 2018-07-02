<?php
require_once(dirname(__FILE__).'/../Functions.php');
$fun = new Functions();

// read the post from PayPal system and add 'cmd'
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
    $value = urlencode(stripslashes($value));
    $req .= "&$key=$value";
}
// post back to PayPal system to validate
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";


//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);  //For SSL Connection
//$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);
$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);


if (!$fp) {
// HTTP ERROR
} else {
    fputs ($fp, $header . $req);
    while (!feof($fp)) {
        $res = fgets ($fp, 1024);
        if (strcmp ($res, "VERIFIED") == 0) {
            // PAYMENT VALIDATED & VERIFIED!

            $buyer_email = urldecode($_POST['payer_email']);
            $transaction_id = $_POST['ipn_track_id'];
            $unique_paypal_id = $_POST['txn_id'];

            echo $fun -> validatePaypalPayment($buyer_email, $transaction_id, $unique_paypal_id,$res);
        }

        else if (strcmp ($res, "INVALID") == 0) {

// PAYMENT INVALID & INVESTIGATE MANUALY!

        }
    }
    fclose ($fp);
}
?>