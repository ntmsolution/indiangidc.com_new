<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgotpassword extends CI_Controller
{
	//FORGOT_PASSWORD_INDEX
	//FORGOT_PASSWORD_SELLER_OTP
	//FORGOT_PASSWORD_CHANGE_PASSWORD
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		beforeLogin();
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|regex_match[/^[6789][0-9]{9}$/]');
		$this->form_validation->set_rules('captcha_code', 'Captcha Code', 'required|min_length[5]|max_length[5]');
		
		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST['forgot_password']))
			{
				unset($_POST['forgot_password']);
				$seller 		= xssClean($_POST);
				$mobile			= $seller['mobile'];
				$sr 			= getRegistration("mobile = '$mobile' && user_type = '0'");
				
				if($seller['captcha_code'] != getCaptchaCode())
				{
					setMsg(WRONG_CAPTCHA_MSG,1);
					redirect(FORGOT_PASSWORD_INDEX);	
				}
				
				if(count($sr) == 0)
				{
					setMsg(LOGIN_BUYER_MSG_E,1);
					redirect(FORGOT_PASSWORD_INDEX);
				}
				else
				{
					if(isset($sr[0]['id']))
					{
						$_SESSION['seller_forgot_password'] 	= $sr[0]['id'];
						$otp									= generateOTP();
						if(MSG_TYPE == "mobile")
						{
							sendOTP($mobile,MSG_OTP_SEND_START.$otp.MSG_OTP_SEND_START);
						}
						else
						{
							sendEmail($email,MSG_OTP_EMAIL_SUBJECT,MSG_OTP_EMAIL_SEND_START.$otp.MSG_OTP_EMAIL_SEND_END);
						}
						updateById('registration',array('otp'=>$otp),$sr[0]['id']);
						redirect(FORGOT_PASSWORD_SELLER_OTP);
					}
				}
			}
		}
		else
		{
			$data['captcha_image'] 	= getCaptchaImage();
			$data['page_title'] 	= FORGOT_PASSWORD_INDEX_TITLE;
			$data['page_heading'] 	= FORGOT_PASSWORD_INDEX_HEADING;
			lv('forgot-password',$data);
		}
	}
	
	public function sellerOTP()
	{
		if(isset($_SESSION['seller_forgot_password']))
		{
			$registration = getRegistrationById($_SESSION['seller_forgot_password']);
			$this->form_validation->set_rules('otp', 'OTP', 'required|min_length[6]|max_length[6]');

			if($this->form_validation->run() == TRUE)
			{
				if(isset($_POST['forgot_password_otp']))
				{
					unset($_POST['forgot_password_otp']);
					$otp 		= xssClean($_POST['otp']);
					if(isset($registration['otp']) && $otp == $registration['otp'])
					{
						$_SESSION['seller_forgot_password_otp'] = $_SESSION['seller_forgot_password'];
						unset($_SESSION['seller_forgot_password']);						
						setMsg(FORGOT_PASSWORD_SELLER_OTP_MSG_S1);
						redirect(FORGOT_PASSWORD_CHANGE_PASSWORD);					
					}
					else
					{
						setMsg(FORGOT_PASSWORD_SELLER_OTP_MSG_E1,1);
						redirect(FORGOT_PASSWORD_SELLER_OTP);
					}
				}
			}
			else
			{
				$data['page_title'] 	= FORGOT_PASSWORD_SELLER_OTP_TITLE;
				$data['page_heading'] 	= FORGOT_PASSWORD_SELLER_OTP_HEADING;
				lv('forgot-password-otp',$data);
			}
		}
		else
		{
			redirect(LOGIN_INDEX);
		}
	}
	
	public function changePassword()
	{
		if(isset($_SESSION['seller_forgot_password_otp']))
		{
			$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]|max_length[20]');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]|max_length[20]');
			
			$registration = getRegistrationById($_SESSION['seller_forgot_password_otp']);
			

			if($this->form_validation->run() == TRUE)
			{
				if(isset($_POST['forgot_change_password']))
				{
					unset($_POST['forgot_change_password']);
					$forgot 	= xssClean($_POST);
					$new_pwd	= $forgot['new_password'];	
					$cn_pwd     = $forgot['confirm_password'];
					if($new_pwd == $cn_pwd)
					{
						updateById('registration',array('password'=>"$new_pwd"),$_SESSION['seller_forgot_password_otp']);
						unset($_SESSION['seller_forgot_password_otp']);
						setMsg(FORGOT_PASSWORD_CHANGE_PASSWORD_MSG);
						redirect(LOGIN_INDEX);
					}
					else
					{
						setMsg(FORGOT_PASSWORD_CHANGE_PASSWORD_MSG_E,1);
						redirect(FORGOT_PASSWORD_CHANGE_PASSWORD);
					}
				}
			}
			else
			{
				$data['page_title'] 	= FORGOT_PASSWORD_CHANGE_PASSWORD_TITLE;
				$data['page_heading'] 	= FORGOT_PASSWORD_CHANGE_PASSWORD_HEADING;
				lv('forgot-change-password',$data);
			}
		}
		else
		{
			redirect(LOGIN_INDEX);
		}
	}
}

