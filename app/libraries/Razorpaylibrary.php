<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	//include 'razorpay-php/Razorpay.php';
	include 'razorpay-php/src/Api.php';
	
	
		
	Class Razorpaylibrary  extends Api
	{
		public function __construct()
		{
			$api 	= new Api("rzp_test_K7cDzVyqxJ1PLM", "G00ztNEWAoC7CAsH23wJYqIb");	
		}
		
		public function setOrder($user_id=1,$order_no=1,$amount=500)
		{
			
			
			$order  = $client->order->create([
					  'receipt'         => "order_no1",
					  'amount'          => 400 * 100 ,
					  'currency'        => 'INR',
					  'payment_capture' =>  1
					]);
			
			$razorpayOrder 		= $api->order->create($order);
			$razorpayOrderId 	= $razorpayOrder['id'];		
			return $razorpayOrderId;
		}
		
	}
?>
	
