<?php
	require_once(dirname(__FILE__).'/../Functions.php');
	$fun = new Functions();

	$reference = null;
	$pesapal_tracking_id = null;

	if(isset($_GET['pesapal_merchant_reference']) && isset($_GET['pesapal_transaction_tracking_id']))
	{

        $reference = $_GET['pesapal_merchant_reference'];
        $pesapal_tracking_id = $_GET['pesapal_transaction_tracking_id'];

        echo $reference;
        echo $pesapal_tracking_id;

        echo $fun -> savePesapalPayment($reference, $pesapal_tracking_id);
	}
	else
	{
        echo $fun -> getMsgInvalidParam();
	}
        
?>
