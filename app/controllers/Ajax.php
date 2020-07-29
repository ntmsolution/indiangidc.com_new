<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller
{
	public function getCity()
	{
		$state_name 	= xssClean($_POST['state_name']);
		$state 			= getState("state_name = '$state_name'");
		echo "<option value=''>--- Select City ---</option>";
		if(isset($state[0]['id']))
		{
			$state_id = $state[0]['id'];
			$city = getCity("state_id = '$state_id' order by city_name ASC");
			foreach($city as $row)
			{
				echo "<option value='".strtolower($row['city_name'])."' ".set_select('city', strtolower($row['city_name']))." >".$row['city_name']."</option>";
			}
		}
	}
	
	/*	
	public function getGroupName()
	{
		$category_id 	= xssClean($_POST['category_id']);
		$group 			= select("product_group","category_id = '$category_id' ");
		
		echo "<option value=''>--- Select Group ---</option>";
		foreach($group as $row)
		{
			$group_name = $row['group_name'];
			$id			= $row['id'];
			echo "<option value='$id'>$group_name</option>";
		}
		echo "<option value='other'>Other</option>";
	}
	*/
	
	public function getSubcategory()
	{
		$category_id 		= xssClean($_POST['category_id']);
		$category 			= getCategoryById($category_id);
		$parent_id			= $category['id'];	
		$category_data 		= getCategory("parent_id = '$category_id'");
				
		echo "<option value=''>--- Select Area of use ---</option>";
		foreach($category_data as $row)
		{
			$id 			= $row['id'];
			$category_name 	= $row['category_name'];
			echo "<option value='$id'>$category_name</option>";
		}
		echo "<option value='other'>Other</option>";		
	}
	
	public function refreshCaptcha()
	{
		echo getCaptchaImage();
	}
	
	public function resendBuyerLoginOTP()
	{
		$br 			= getRegistrationById($_SESSION['buyer_otp_id']);
		$buyer['otp']	= generateOTP();
		if(MSG_TYPE == "mobile")
		{
			sendOTP($br['mobile'],MSG_OTP_SEND_START.$buyer['otp'].MSG_OTP_SEND_START);
		}
		else
		{
			sendEmail($br['email'],MSG_OTP_EMAIL_SUBJECT,MSG_OTP_EMAIL_SEND_START.$buyer['otp'].MSG_OTP_EMAIL_SEND_END);
		}
		updateById("registration",$buyer,$_SESSION['buyer_otp_id']);
	}
	
	public function resendBuyerRegisterOTP()
	{	
		$_SESSION['reg_otp_buyer']['otp']	= generateOTP();
		
		if(MSG_TYPE == "mobile")
		{
			sendOTP($_SESSION['reg_otp_buyer']['mobile'],MSG_OTP_SEND_START.$_SESSION['reg_otp_buyer']['otp'].MSG_OTP_SEND_START);
		}
		else
		{
			sendEmail($_SESSION['reg_otp_buyer']['email'],MSG_OTP_EMAIL_SUBJECT,MSG_OTP_EMAIL_SEND_START.$_SESSION['reg_otp_buyer']['otp'].MSG_OTP_EMAIL_SEND_END);
		}
	}
	
	public function resendSellerRegisterOTP()
	{
		$_SESSION['seller_reg_data']['otp']	= generateOTP();
		if(MSG_TYPE == "mobile")
		{
			sendOTP($_SESSION['seller_reg_data']['mobile'],MSG_OTP_SEND_START.$_SESSION['seller_reg_data']['otp'].MSG_OTP_SEND_START);
		}
		else
		{
			sendEmail($_SESSION['seller_reg_data']['email'],MSG_OTP_EMAIL_SUBJECT,MSG_OTP_EMAIL_SEND_START.$_SESSION['seller_reg_data']['otp'].MSG_OTP_EMAIL_SEND_END);
		}
	}
	
	
	public function resendSellerForgotPasswordOTP()
	{
		$br 			= getRegistrationById($_SESSION['seller_forgot_password']);
		$buyer['otp']	= generateOTP();
		if(MSG_TYPE == "mobile")
		{
			sendOTP($br['mobile'],MSG_OTP_SEND_START.$buyer['otp'].MSG_OTP_SEND_START);
		}
		else
		{
			sendEmail($br['email'],MSG_OTP_EMAIL_SUBJECT,MSG_OTP_EMAIL_SEND_START.$buyer['otp'].MSG_OTP_EMAIL_SEND_END);
		}
		updateById("registration",$buyer,$_SESSION['seller_forgot_password']);
	}
}
