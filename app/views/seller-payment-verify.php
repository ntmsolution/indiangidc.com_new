<?php
if(session_id() == '') {
    session_start();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($razorpay_payment_id) === false)
{
    $api = new Api($keyId, $keySecret);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay']['razorpay_order_id'],
            'razorpay_payment_id' => $razorpay_payment_id,
            'razorpay_signature' => $razorpay_signature
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = '
		Error : ' . $e->getMessage();
    }
}

if ($success === true)
{
	date_default_timezone_set("Asia/Kolkata");
	$seller_id								= getLoginId();
	$sm['razorpay_order_id'] 				= $_SESSION['razorpay']['razorpay_order_id'];
	$sm['plan_id']							= $_SESSION['razorpay']['plan_id'];
	$sp										= selectById("seller_plan",$sm['plan_id']);
	$sm['plan_name']						= $sp['plan_name'];
	$sm['plan_price']						= $sp['plan_price'];
	$sm['plan_duration']					= $sp['plan_duration'];
	$plan_duration							= $sp['plan_duration'];	
	$sm['razorpay_payment_id']				= $razorpay_payment_id;
	$sm['razorpay_signature']				= $razorpay_signature;
	$sm['order_date']						= date("Y-m-d");
	$sm['expire_date']						= date("Y-m-d",strtotime("+$plan_duration months"));	
	$sm['seller_id']						= $seller_id;
	
	unset($_SESSION['razorpay']);	
	insert("seller_membership",$sm);	
	setMsg('Your payment was successful');
	redirect(SELLER_ORDER);
}
else
{
	unset($_SESSION['razorpay']);
    setMsg('Your Payment is fail',1);
	redirect(UPGRADE);
}
