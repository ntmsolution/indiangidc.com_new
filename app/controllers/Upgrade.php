<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upgrade extends CI_Controller
{
	var $keyId 						= 'rzp_test_K7cDzVyqxJ1PLM';
	var $keySecret 					= 'G00ztNEWAoC7CAsH23wJYqIb';
	var $displayCurrency 			= 'INR';
	
	public function __construct()
	{
		parent::__construct();
		afterLogin();
	}
	
	public function index()
	{
		$data['page_title'] 			= UPGRADE_INDEX_TITLE;
		$data['page_heading'] 			= UPGRADE_INDEX_HEADING;
		lv('seller-membership',$data);
	}
	
	public function paynow()
	{
		//UPGRADE_PAYNOW
		
		if(isset($_POST['plan_id']))
		{
			$seller_id 					= getLoginId();			
			$plan_id					= $_POST['plan_id'];
			$plan						= selectById("seller_plan",$plan_id);
			$seller						= selectById("registration",$seller_id);
			$data['mobile']				= $seller['mobile'];
			$data['email']				= $seller['email'];
			$data['plan_price']			= $plan['plan_price'];
			$data['plan_duration']		= $plan['plan_duration'];
			$data['plan_name']			= $plan['plan_name'];
			$data['plan_id']			= $plan_id;
			$data['keyId']				= $this->keyId;
			$data['keySecret']			= $this->keySecret;
			$data['displayCurrency']	= $this->displayCurrency;			
			$data['page_title'] 		= UPGRADE_INDEX_TITLE;
			$data['page_heading'] 		= UPGRADE_INDEX_HEADING;
			lv('seller-pay-now',$data);
		}
		else
		{
			redirect(UPGRADE);
		}
	}
	
	public function verifyPayment()
	{
		//UPGRADE_PAYMENT_VERIFY
		//upgrade code here 
		if(isset($_POST['razorpay_payment_id']))
		{
			$data['keyId']					= $this->keyId;
			$data['keySecret']				= $this->keySecret;
			$data['displayCurrency']		= $this->displayCurrency;			
			$data['razorpay_payment_id']	= $_POST['razorpay_payment_id'];
			$data['razorpay_signature']		= $_POST['razorpay_signature'];
			
			$data['page_title'] 			= UPGRADE_INDEX_TITLE;
			$data['page_heading'] 			= UPGRADE_INDEX_HEADING;
			lv('seller-payment-verify',$data);
			
		}
		
	}
	
}
