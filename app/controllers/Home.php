<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		$data['page_title'] 	= HOME_INDEX_TITLE;
		$data['page_heading'] 	= "";
		lv('home',$data);
		
		if(isset($_POST['search_product']))
		{
			unset($_SESSION['product_name']);
			unset($_SESSION['category_name']);
			$url_data 					= xssClean($_POST);
			$_SESSION['product_name']	= $url_data['product_name'];
			$_SESSION['category_name']	= $url_data['category_name'];
			$product_name				= seourl($url_data['product_name']);
			$category_name 				= seourl($url_data['category_name']);
			if($product_name == "")
			{
				setMsg(HOME_INDEX_MSG_E1,1);
				redirect(HOME_INDEX);
			}
			else
			{				
				redirect(HOME_SEARCH."/$product_name/$category_name");
			}
			
		}
	}
	
	public function sendProductInquiry()
	{
        $this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('contact_email', 'contact_email', 'required|valid_email');
		$this->form_validation->set_rules('contact_no', 'Contact No', 'required|regex_match[/^[6789][0-9]{9}$/]');
		$this->form_validation->set_rules('message', 'Message', 'required');
		
		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST['send_inquiry']))
			{
				
				unset($_POST['send_inquiry']);
				$data 				= xssClean($_POST);
				$data['buyer_id'] 	= getLoginId('buyer');
				$data['date_time']  = date('Y-m-d H:i:s');
				$sr 				= getRegistrationById($data['seller_id']);
				insert("lead_buy",$data);
				
				if(MSG_TYPE == "mobile")
				{
					sendOTP($sr['mobile'],MSG_INQUIRY_MOBILE);
				}
				else
				{
					sendEmail($sr['email'],MSG_INQUIRY_SUBJECT_EMAIL,MSG_INQUIRY_EMAIL);
				}
				setMsg(HOME_SENDPRODUCTINQUIRY_MSG_S);
			}
		}
		else
		{
			setMsg(HOME_SENDPRODUCTINQUIRY_MSG_E,1);
		}
		
		redirect($this->agent->referrer());
	}
	
	public function productDetails($product_name,$product_id)
	{
		$data['sp'] 			= getSellerProductById($product_id);
		$sbp					= getSellerBusinessProfile('seller_id = "'.$data['sp']['seller_id'].'"');
		$data['brochure']		= (isset($sbp[0])) ? $sbp[0]['brochure'] : "";
		$data['page_title'] 	= HOME_PRODUCT_DETAILS_TITLE;
		$data['page_heading'] 	= HOME_PRODUCT_DETAILS_HEADING;
		lv('product-details',$data);
		
	}
	
	public function autoComplete()
	{
		$product_name 		= $_GET["product_name"];
		$category_name		= $_GET["category_name"];
		$where				= (!empty($product_name)) ? "product_name like '%$product_name%'" : "";
		$where			   .= (!empty($category_name)) ? " and category_name = '$category_name'" : "";
		$data	 			= getSellerProduct($where);
		$results 			= array();
		
		foreach($data as $v)
		{
			$results[] = array("id"=>$v["product_name"],"label"=>$v["product_name"],"value"=>$v["product_name"]);
		}
		
		echo json_encode($results);
	}
	
	public function search($proudct_name,$category_name="")
	{
		$data['page_title'] 	= HOME_SEARCH_TITLE;
		$data['page_heading'] 	= HOME_SEARCH_HEADING;
		$data['product_name']	= $_SESSION['product_name'];
		$data['category_name']	= $_SESSION['category_name'];
		lv('home',$data);			
	}
	
}
