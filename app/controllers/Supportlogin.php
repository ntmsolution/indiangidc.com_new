<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supportlogin extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function index()
	{
		beforeLogin();
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|regex_match[/^[6789][0-9]{9}$/]');
        $this->form_validation->set_rules('support_pin', 'support_pin', 'required|min_length[4]|max_length[4]');
		$this->form_validation->set_rules('captcha_code', 'Captcha Code', 'required|min_length[5]|max_length[5]');

		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST['support_pin_login']))
			{
				unset($_POST['support_pin_login']);
				$seller 		= xssClean($_POST);
				$mobile			= $seller['mobile'];
				$support_pin	= $seller['support_pin'];
				$sr 			= getRegistration("mobile = '$mobile' && support_pin = '$support_pin' && user_type = '0'");
				
				if($seller['captcha_code'] != getCaptchaCode())
				{
					setMsg(WRONG_CAPTCHA_MSG,1);
					redirect(SUPPORT_PIN_INDEX);	
				}
				
				if(count($sr) == 0)
				{
					setLoginId($sr[0]['id']);
					setMsg(SUPPORT_PIN_INDEX_MSG_E,1);
					redirect(SUPPORT_PIN_INDEX);	
				}
				else
				{
					if(isset($sr[0]['id']))
					{
						setLoginId($sr[0]['id']);
						$_SESSION['support_login'] = $sr[0]['id'];
						setMsg(SUPPORT_PIN_INDEX_MSG);
						redirect(SELLER_COMPANYPROFILE);						
					}
				}
			}
		}
		else
		{
			$data['captcha_image'] 		= getCaptchaImage();
			$data['page_title'] 		= SUPPORT_PIN_INDEX_TITLE;
			$data['page_heading'] 		= SUPPORT_PIN_INDEX_HEADING;
			lv('support-login',$data);
		}
	}	

}

