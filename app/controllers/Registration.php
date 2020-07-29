<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['page_title'] 	= REGISTRATION_INDEX_TITLE;
		$data['page_heading'] 	= REGISTRATION_INDEX_HEADING;
		lv('register',$data);
	}
	
	public function buyer()
	{
		beforeLogin('buyer');
		
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|regex_match[/^[6789][0-9]{9}$/]|is_unique[registration.mobile]|max_length[10]',array("is_unique"=>"Mobile Number is already exiest."));
        $this->form_validation->set_rules('name', 'name', 'required');
		$this->form_validation->set_rules('captcha_code', 'Captcha Code', 'required|min_length[5]|max_length[5]');
		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST['registration']))
			{
				unset($_POST['registration']);
				$buyer 						= xssClean($_POST);
				if($buyer['captcha_code'] != getCaptchaCode())
				{
					setMsg(WRONG_CAPTCHA_MSG,1);
					redirect(REGISTRATION_BUYER);	
				}
				unset($buyer['captcha_code']);
				$buyer['register_date']		= date('Y-m-d');
				$buyer['otp']				= generateOTP();
				$buyer['user_type']			= 1;
				$_SESSION['reg_otp_buyer']	= $buyer;
				
				if(MSG_TYPE == "mobile")
				{
					sendOTP($buyer['mobile'],MSG_OTP_SEND_START.$buyer['otp'].MSG_OTP_SEND_START);
				}
				else
				{
					sendEmail($buyer['email'],MSG_OTP_EMAIL_SUBJECT,MSG_OTP_EMAIL_SEND_START.$buyer['otp'].MSG_OTP_EMAIL_SEND_END);
				}
				redirect(REGISTRATION_BUYER_OTP);
			}
		}
		else
		{
			$data['captcha_image'] 	= getCaptchaImage();
			$data['page_title'] 	= REGISTRATION_BUYER_TITLE;
			$data['page_heading'] 	= REGISTRATION_BUYER_HEADING;
			lv('buyer-registration',$data);
		}
	}
	
	public function buyer_otp()
	{
		if(isset($_SESSION['reg_otp_buyer']))
		{
			//print_r($_SESSION);
			$this->form_validation->set_rules('otp', 'OTP', 'required|min_length[6]|max_length[6]');

			if($this->form_validation->run() == TRUE)
			{
				if(isset($_POST['registration_otp']))
				{
					unset($_POST['registration_otp']);
					$otp 		= xssClean($_POST['otp']);
					if(isset($_SESSION['reg_otp_buyer']['otp']) && $otp == $_SESSION['reg_otp_buyer']['otp'])
					{
						$id = insert("registration",$_SESSION['reg_otp_buyer']);
						setLoginId($id,'buyer');
						unset($_SESSION['reg_otp_buyer']);
						setMsg(REGISTRATION_BUYER_MSG);//REGISTRATION_BUYER_OTP_MSG
						redirect('/');					
					}
					else
					{
						setMsg(REGISTRATION_BUYER_OTP_MSG_E,1);
						redirect(REGISTRATION_BUYER_OTP);
					}
				}
			}
			else
			{
				$data['page_title'] 	= REGISTRATION_OTP_TITLE;
				$data['page_heading'] 	= REGISTRATION_OTP_HEADING;
				lv('buyer-registration-otp',$data);
			}
		}
		else
		{
			redirect(REGISTRATION_BUYER);
		}
	}
	
	public function step1()
	{
		
		beforeLogin();
		$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|regex_match[/^[6789][0-9]{9}$/]|is_unique[registration.mobile]|max_length[10]',array("is_unique"=>"Mobile Number is already exiest."));
		$this->form_validation->set_rules('email', 'Email', "required|valid_email|is_unique[registration.email]",array("is_unique"=>"Email address is already exiest."));
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('captcha_code', 'Captcha Code', 'required|min_length[5]|max_length[5]');
		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST['registration_step1']))
			{
				
				unset($_POST['registration_step1']);
				$seller 						= xssClean($_POST);
				if($seller['captcha_code'] != getCaptchaCode())
				{
					setMsg(WRONG_CAPTCHA_MSG,1);
					redirect(REGISTRATION_STEP1);	
				}
				
				unset($seller['captcha_code']);
				$seller['register_date']		= date('Y-m-d');
				$seller['otp']					= generateOTP();
				$_SESSION['seller_reg_data']	= $seller;
				if(MSG_TYPE == "mobile")
				{
					setMsg(REGISTRATION_OTP_MOBILE_MSG);
					sendOTP($seller['mobile'],MSG_OTP_SEND_START.$seller['otp'].MSG_OTP_SEND_START);
				}
				else
				{
					setMsg(REGISTRATION_OTP_EMAIL_MSG);
					sendEmail($seller['email'],MSG_OTP_EMAIL_SUBJECT,MSG_OTP_EMAIL_SEND_START.$seller['otp'].MSG_OTP_EMAIL_SEND_END);
				}
				redirect(REGISTRATION_OTP);
			}
		}
		else
		{
			$data['captcha_image'] 	= getCaptchaImage();
			$data['page_title'] 	= REGISTRATION_STEP1_TITLE;
			$data['page_heading'] 	= REGISTRATION_STEP1_HEADING;
			lv('registration',$data);
		}
	}
	
	public function otp()
	{
		if(isset($_SESSION['seller_reg_data']))
		{	
		//	print_r($_SESSION);
			$this->form_validation->set_rules('otp', 'OTP', 'required|min_length[6]|max_length[6]');

			if($this->form_validation->run() == TRUE)
			{
				if(isset($_POST['registration_otp']))
				{
					unset($_POST['registration_otp']);
					$otp 		= xssClean($_POST['otp']);
					if(isset($_SESSION['seller_reg_data']['otp']) && $otp == $_SESSION['seller_reg_data']['otp'])
					{
						
						$seller						= $_SESSION['seller_reg_data'];
						$seller['current_step']		= 2;
						$seller['support_pin']		= generateOTP(4);
						$id 						= insert("registration",$seller);
						
						setLoginId($id);
						unset($_SESSION['seller_reg_data']);
						setMsg(REGISTRATION_STEP1_MSG);
						redirect(REGISTRATION_STEP2);					
					}
					else
					{
						setMsg(REGISTRATION_OTP_MSG_E,1);
						redirect(REGISTRATION_OTP);
					}
				}
			}
			else
			{
				$data['page_title'] 	= REGISTRATION_OTP_TITLE;
				$data['page_heading'] 	= REGISTRATION_OTP_HEADING;
				lv('registration',$data);
			}
		}
		else
		{
			redirect(REGISTRATION_STEP1);
		}
	}
	
	public function step2()
	{
		redirectStep();
		afterLogin();
        $this->form_validation->set_rules('company_name', 'Company Name', 'required');
        $this->form_validation->set_rules('year_establishment', 'Year Establishment', 'required|regex_match[/^[1-9][0-9]{3}$/]',array('regex_match'=>"Year establishment write in proper format. Ex. 2010"));

		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST['registration_step2']))
			{
				unset($_POST['registration_step2']);
				$user_id 					= getLoginId();
				$business_data 				= xssClean($_POST);
				$business_data['seller_id']	= $user_id;
				$seller['current_step']		= 4;
				updateById("registration",$seller,$user_id);
				insert("seller_business_profile",$business_data);
				setMsg(REGISTRATION_STEP2_MSG);
				redirect(REGISTRATION_STEP4);
			}
		}
		else
		{
			$data['page_title'] 	= REGISTRATION_STEP2_TITLE;
			$data['page_heading'] 	= REGISTRATION_STEP2_HEADING;
			lv('registration',$data);
		}
	}
	
	public function step3()
	{
		redirectStep();
		afterLogin();
		$user_id	= getLoginId();
		if(isset($_FILES['product_image1']['name']) && $_FILES['product_image1']['name'] != "")
		{
			$product_image1 = fileUpload("product_image1","product-image/");
			setSession("product_image1",$product_image1);
			setSession("product_name1",$_POST['product_name1']);
			setSession("product_name2",$_POST['product_name2']);
			setSession("product_name3",$_POST['product_name3']);
			setSession("product_category1",$_POST['product_category1']);
			setSession("product_category2",$_POST['product_category2']);
			setSession("product_category3",$_POST['product_category3']);
			redirect(REGISTRATION_STEP3);
		}
		
		if(isset($_FILES['product_image2']['name']) && $_FILES['product_image2']['name'] != "")
		{
			$product_image2 = fileUpload("product_image2","product-image/");
			setSession("product_image2",$product_image2);
			setSession("product_name1",$_POST['product_name1']);
			setSession("product_name2",$_POST['product_name2']);
			setSession("product_name3",$_POST['product_name3']);
			setSession("product_category1",$_POST['product_category1']);
			setSession("product_category2",$_POST['product_category2']);
			setSession("product_category3",$_POST['product_category3']);
			redirect(REGISTRATION_STEP3);
		}
		
		if(isset($_FILES['product_image3']['name']) && $_FILES['product_image3']['name'] != "")
		{
			$product_image3 = fileUpload("product_image3","product-image/");
			setSession("product_image3",$product_image3);
			setSession("product_name1",$_POST['product_name1']);
			setSession("product_name2",$_POST['product_name2']);
			setSession("product_name3",$_POST['product_name3']);
			setSession("product_category1",$_POST['product_category1']);
			setSession("product_category2",$_POST['product_category2']);
			setSession("product_category3",$_POST['product_category3']);
			redirect(REGISTRATION_STEP3);
		}
		
		$product_data 	= xssClean($_POST);
		$validation 	= false;
		$count 			= 0;
			
		if(getSession('product_image1'))
		{
			$this->form_validation->set_rules('product_name1', 'Product Name', 'required');
			$this->form_validation->set_rules('product_category1', 'Category', 'required');
			$validation 	= true;
			$count 			= 1;
			
		}
		
		if(getSession('product_image2'))
		{
			$this->form_validation->set_rules('product_name2', 'Product Name', 'required');
			$this->form_validation->set_rules('product_category2', 'Category', 'required');
			$validation 	= true;
			$count 			= 2;
		}
		
		if(getSession('product_image3'))
		{
			$this->form_validation->set_rules('product_name3', 'Product Name', 'required');
			$this->form_validation->set_rules('product_category3', 'Category', 'required');
			$validation 	= true;
			$count 			= 3;
		}
		
		
		if(isset($_POST['product_name1'])){ setSession("product_name1", $_POST['product_name1']); }
		if(isset($_POST['product_name2'])){ setSession("product_name2", $_POST['product_name2']); }
		if(isset($_POST['product_name3'])){ setSession("product_name3", $_POST['product_name3']); }
		
		if(isset($_POST['product_category1'])){ setSession("product_category1", $_POST['product_category1']); }
		if(isset($_POST['product_category2'])){ setSession("product_category2", $_POST['product_category2']); }
		if(isset($_POST['product_category3'])){ setSession("product_category3", $_POST['product_category3']); }
		
		
	
		if($this->form_validation->run() == TRUE)
		{
			
			if(isset($_POST['registration_step3']))
			{
				
				unset($_POST['registration_step3']);
				
				for($i=1;$i<=$count;$i++)
				{
					
					$product_data 						= array();	
					$product_data['seller_id'] 			= $user_id;
					$product_data["product_name"] 		= getSession("product_name$i");
					$product_data["product_image1"] 	= getSession("product_image$i");
					$product_data["category_id"] 		= getSession("product_category$i");
					$seller['current_step']				= 4;					
					$category 							= getCategoryById($product_data["category_id"]);					
					$product_data["category_name"] 		= $category["category_name"];
					list($seller_business_profile) 		= getSellerBusinessProfile("seller_id = '$user_id'");
					$product_data["company_name"] 		= $seller_business_profile["company_name"];
					
					removeSession("product_category$i");
					removeSession("product_name$i");
					removeSession("product_image$i");
					insert("seller_product",$product_data);
				}
				
				updateById("registration",$seller,$user_id);				
				setMsg(REGISTRATION_STEP3_MSG);
				redirect(REGISTRATION_STEP4);
			}
			else
			{
				$data['page_title'] 	= REGISTRATION_STEP3_TITLE;
				$data['page_heading'] 	= REGISTRATION_STEP3_HEADING;
				lv('registration',$data);
			}
		}
		else
		{
			if(isset($_POST['registration_step3']))
			{
				if($validation 	== false)
				{
					$seller['current_step']				= 4;
					updateById("registration",$seller,$user_id);
					redirect(REGISTRATION_STEP4);					
				}
			}
			$data['page_title'] 	= REGISTRATION_STEP3_TITLE;
			$data['page_heading'] 	= REGISTRATION_STEP3_HEADING;
			lv('registration',$data);
		}
	}
	
	public function step4()
	{
		redirectStep();
		afterLogin();
        $this->form_validation->set_rules('address', 'Business Address', 'required');
		$this->form_validation->set_rules('locality', 'Locality', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('pin_code', 'Pin Code', 'required|regex_match[/^[1-9][0-9]{5}$/]',array("regex_match"=>"Invalid Pincode Number."));
        $this->form_validation->set_rules('state', 'State', 'required');
		
		if(isset($_POST["gst_number"]) && $_POST["gst_number"] == "")
		{
			$this->form_validation->set_rules('gst_blank_reason', 'GST Not Provide Reason', 'required');
		}
		else
		{
			//$this->form_validation->set_rules('gst_number', 'GST Number', 'regex_match[/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/]',array("regex_match"=>"GST Number is not valid."));
		}

		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST['registration_step4']))
			{
				unset($_POST['registration_step4']);
				
				$user_id 							= getLoginId();
				$_POST								= xssClean($_POST);
				
				$seller_profile['address']			= $_POST['address'];
				$seller_profile['locality']			= $_POST['locality'];
				$seller_profile['state']			= $_POST['state'];
				$seller_profile['city']				= $_POST['city'];
				$seller_profile['pin_code']			= $_POST['pin_code'];
				$seller_profile['seller_id']		= $user_id;
				$seller_statutory['gst_no_reson']	= "";
				$seller_statutory['gst_no']			= $_POST['gst_number'];
				
				if($_POST['gst_number'] == "")
				{
					if(isset($_POST['gst_blank_reason']))
					{
						$seller_statutory['gst_no_reson']	= $_POST['gst_blank_reason'];						
					}
				}
				
				$seller_statutory['seller_id']		= $user_id;
				$seller['current_step']				=	 5;
				
				insert("seller_profile",$seller_profile);
				insert("seller_statutory",$seller_statutory);
				updateById("registration",$seller,$user_id);
				
				setMsg(REGISTRATION_STEP4_MSG);
				redirect(SELLER_COMPANYPROFILE);
			}
		}
		else
		{
			$data['page_title'] 	= REGISTRATION_STEP4_TITLE;
			$data['page_heading'] 	= REGISTRATION_STEP4_HEADING;
			lv('registration',$data);
		}
	}
}

