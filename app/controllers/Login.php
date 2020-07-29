<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		beforeLogin();
		if(isset($_POST['mobile']) && is_numeric($_POST['mobile']))
		{
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|regex_match[/^[6789][0-9]{9}$/]');	
		}
		else
		{
			$this->form_validation->set_rules('mobile', 'Email Address', "required|valid_email");
		}
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('captcha_code', 'Captcha Code', 'required|min_length[5]|max_length[5]');

		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST['login']))
			{
				unset($_POST['login']);
				$seller 		= xssClean($_POST);
				$mobile			= $seller['mobile'];
				$password		= $seller['password'];
				$sr 			= getRegistration("(mobile = '$mobile' || email = '$mobile') && password = '$password'");
				
				if($seller['captcha_code'] != getCaptchaCode())
				{
					setMsg(WRONG_CAPTCHA_MSG,1);
					redirect(LOGIN_INDEX);	
				}
				
				if(count($sr) == 0)
				{
					setLoginId($sr[0]['id']);
					setMsg(LOGIN_INDEX_MSG_E,1);
					redirect(LOGIN_INDEX);	
				}
				else
				{
					if(isset($sr[0]['id']))
					{
						setLoginId($sr[0]['id']);
						setMsg(LOGIN_INDEX_MSG);
						redirect(SELLER_COMPANYPROFILE);						
					}
				}
			}
		}
		else
		{
			$data['captcha_image'] 		= getCaptchaImage();
			$data['page_title'] 		= LOGIN_INDEX_TITLE;
			$data['page_heading'] 		= LOGIN_INDEX_HEADING;
			lv('login',$data);
		}
	}
	
	public function buyer()
	{
		beforeLogin();
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|regex_match[/^[6789][0-9]{9}$/]');
		$this->form_validation->set_rules('captcha_code', 'Captcha Code', 'required|min_length[5]|max_length[5]');
		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST['login']))
			{
				unset($_POST['login']);
				$seller 		= xssClean($_POST);
				$mobile			= $seller['mobile'];
				$sr 			= getRegistration("mobile = '$mobile' && user_type = '1'");
				
				if($seller['captcha_code'] != getCaptchaCode())
				{
					setMsg(WRONG_CAPTCHA_MSG,1);
					redirect(LOGIN_BUYER);	
				}
				
				if(count($sr) == 0)
				{
					setMsg(LOGIN_BUYER_MSG_E,1);
					redirect(LOGIN_BUYER);
				}
				else
				{
					if(isset($sr[0]['id']))
					{
						$_SESSION['buyer_otp_id'] 	= $sr[0]['id'];
						$otp						= generateOTP();
						
						if(MSG_TYPE == "mobile")
						{
							sendOTP($mobile,MSG_OTP_SEND_START.$otp.MSG_OTP_SEND_START);
						}
						else
						{
							sendEmail($email,MSG_OTP_EMAIL_SUBJECT,MSG_OTP_EMAIL_SEND_START.$otp.MSG_OTP_EMAIL_SEND_END);
						}
						updateById('registration',array('otp'=>$otp),$sr[0]['id']);
						redirect(LOGIN_BUYER_OTP);
					}
				}
			}
		}
		else
		{
			$data['captcha_image'] 	= getCaptchaImage();
			$data['page_title'] 	= LOGIN_BUYER_TITLE;
			$data['page_heading'] 	= LOGIN_BUYER_HEADING;
			lv('buyer-login',$data);
		}
	}
	
	public function buyerOTP()
	{
		if(isset($_SESSION['buyer_otp_id']))
		{
			$registration = getRegistrationById($_SESSION['buyer_otp_id']);
			$this->form_validation->set_rules('otp', 'OTP', 'required|min_length[6]|max_length[6]');

			if($this->form_validation->run() == TRUE)
			{
				if(isset($_POST['login_otp']))
				{
					unset($_POST['login_otp']);
					$otp 		= xssClean($_POST['otp']);
					if(isset($registration['otp']) && $otp == $registration['otp'])
					{
						setLoginId($_SESSION['buyer_otp_id'],'buyer');
						unset($_SESSION['buyer_otp_id']);						
						setMsg(LOGIN_BUYER_MSG);
						redirect('/');					
					}
					else
					{
						setMsg(REGISTRATION_BUYER_OTP_MSG_E,1);
						redirect(LOGIN_BUYER_OTP);
					}
				}
			}
			else
			{
				$data['page_title'] 	= LOGIN_OTP_TITLE;
				$data['page_heading'] 	= LOGIN_OTP_HEADING;
				lv('buyer-login-otp',$data);
			}
		}
		else
		{
			redirect(LOGIN_BUYER);
		}
	}
}

