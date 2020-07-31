<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upgrade extends CI_Controller
{
	
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
			$keyId 						= 'rzp_test_K7cDzVyqxJ1PLM';
			$keySecret 					= 'G00ztNEWAoC7CAsH23wJYqIb';
			$displayCurrency 			= 'INR';
			$seller_id 					= getLoginId();
			
			$plan_id					= $_POST['plan_id'];
			$plan						= selectById("seller_plan",$plan_id);
			$seller						= selectById("registration",$seller_id);
			$data['mobile']				= $seller['mobile'];
			$data['email']				= $seller['email'];
			$data['plan_price']			= $plan['plan_price'];
			$data['plan_duration']		= $plan['plan_duration'];
			$data['plan_name']			= $plan['plan_name'];
			$data['keyId']				= $keyId;
			$data['keySecret']			= $keySecret;
			$data['displayCurrency']	= $displayCurrency;
			
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
		
		print_r($_POST);
	}
	
}
