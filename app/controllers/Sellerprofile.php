<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sellerprofile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index($catalog_url)
	{
		$sbp = getSellerBusinessProfile("catalog_url = '$catalog_url'");
		if(count($sbp) == 1)
		{
			$data['seller_id']		= $sbp[0]['seller_id'];
			$seller_profile			= getSellerProfile("seller_id = '".$sbp[0]['seller_id']."'");
			$data['sp']				= isset($seller_profile[0]) ? $seller_profile[0] : array("first_name"=>"","last_name"=>"","designation"=>"","address"=>"","locality"=>"","city"=>"","state"=>"","country"=>"","pin_code"=>"","mobile_number2"=>"","email_address1"=>"","email_address2"=>"","photo"=>"");
			$seller_statutory		= getSellerStatutory("seller_id = '".$sbp[0]['seller_id']."'"); 
			$data['ss']				= isset($seller_statutory[0]) ? $seller_statutory[0] : array("gst_no"=>"","gst_no_reson"=>"","pan_no"=>"","tan_no"=>"","cin_no"=>"","ie_code"=>"");
			$data['product']		= getSellerProduct("seller_id = '".$sbp[0]['seller_id']."'");
			list($data['sbi'])			= getSellerBankInfo("seller_id = '".$sbp[0]['seller_id']."'");
			$data['sbp'] 			= $sbp[0];	
			$data['page_title'] 	= SELLERPROFILE_INDEX_TITLE;
			$data['page_heading'] 	= SELLERPROFILE_INDEX_HEADING;
			lv('seller-profile-view',$data);			
		}
		else
		{
			setMsg("No Page Found",1);
			redirect("/");
		}
		
	}
	
	public function more($seller_id,$subcategory_id)
	{
		$data['page_title'] 	= SELLERPROFILE_MORE_TITLE;
		$data['page_heading'] 	= SELLERPROFILE_MORE_HEADING;
		$data['seller_id']		= $seller_id;
		$data['subcategory_id']	= $subcategory_id;
		lv('more-products',$data);
	}
	
}
