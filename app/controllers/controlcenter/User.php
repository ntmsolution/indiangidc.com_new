<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		afterLogin("admin",ADMINFOLDER."Login");
    }
	
	public function index()
	{
	//	$qry 						= 	"select r.*, sp.first_name, sp.last_name, sbp.company_name, GROUP_CONCAT(spro.product_name) pro_nm from 	
	$qry 						= 	"select r.*, sp.first_name, sp.last_name, sbp.company_name, spro.product_name as pro_nm from 	
															registration r 
															left join seller_profile sp
															on r.id = sp.seller_id
															left join seller_product spro
															on r.id = spro.seller_id
															left join seller_business_profile sbp
															on r.id = sbp.seller_id group by r.id";
		
		$total_rec 					= countRec($qry);
		$table_data 				= query($qry);
		$data['total_rec']			= $total_rec;
		$data['table_data']			= $table_data;
		$data["title"] 				= "View User";
		lva("view-user",$data);
	}
	
	public function view($id)
	{
		$seller_business_profile	= getSellerBusinessProfile("seller_id = '$id'");
		$data['sbp']				= isset($seller_business_profile[0]) ? $seller_business_profile[0] : array("company_name"=>"","year_establishment"=>"","ceo_name"=>"","primary_business_type"=>"","ownership_type"=>"","number_of_employee"=>"","anuual_turnover"=>"","catalog_url"=>"","company_logo"=>"","company_website"=>"","business_card_front"=>"","business_card_back"=>"","secondary_business"=>"","meta_keywords"=>"","meta_description"=>"","brochure"=>"");		
		
		$seller_bank_info			= getSellerBankInfo("seller_id = '$id'");
		$data['sbi']				= isset($seller_bank_info[0]) ? $seller_bank_info[0] : array("ifsc_code"=>"","bank_name"=>"","account_no"=>"","account_type"=>"");
		
		$seller_statutory			= getSellerStatutory("seller_id = '$id'"); 
		$data['ss']					= isset($seller_statutory[0]) ? $seller_statutory[0] : array("gst_no"=>"","gst_no_reson"=>"","pan_no"=>"","tan_no"=>"","cin_no"=>"","ie_code"=>"");
		
		$seller_profile				= getSellerProfile("seller_id = '$id'");
		$data['sp']					= isset($seller_profile[0]) ? $seller_profile[0] : array("first_name"=>"","last_name"=>"","designation"=>"","address"=>"","locality"=>"","city"=>"","state"=>"","country"=>"","pin_code"=>"","mobile_number2"=>"","email_address1"=>"","email_address2"=>"","photo"=>"");
		
		$data['reg']				= getRegistrationById($id);
		$data['products']			= getSellerProduct("seller_id = '$id'");
		$data["title"] 				= "View User Details";
		lva("view-user-details",$data);
	}
	
	public function delete($id)
	{
		$sbp 	= select("seller_business_profile","seller_id = $id");
		$sp 	= select("seller_profile","seller_id = $id");
		$spro 	= select("seller_product","seller_id = $id");
		
		if(isset($sp[0]))
		{
			if($sp[0]['photo'] != "")
			{
				unlink("./assets/upload/user-image/".$sp[0]['photo']);
			}
		}
		if(isset($sbp[0]))
		{
			if($sbp[0]['brochure'] != "")
			{
				unlink("./assets/upload/brochure/".$sbp[0]['brochure']);
			}
			
			if($sbp[0]['business_card_front'] != "")
			{
				unlink("./assets/upload/business-card/".$sbp[0]['business_card_front']);
			}				
			 
			if($sbp[0]['business_card_back'] != "")
			{
				unlink("./assets/upload/business-card/".$sbp[0]['business_card_back']);	
			} 
				
			if($sbp[0]['company_logo'] != "") 
			{
				unlink("./assets/upload/user-image/".$sbp[0]['company_logo']);
			}
		}
		
		foreach($spro as $row)
		{
			if($row['product_image1'] != "")
			{
				unlink("./assets/upload/product-image/".$row['product_image1']);
			} 
			
			if($row['product_image2'] != "")
			{
				 unlink("./assets/upload/product-image/".$row['product_image2']);
			}
			
			if($row['product_image3'] != "")
			{
				unlink("./assets/upload/product-image/".$row['product_image3']);
			}
			
			if($row['product_image4'] != "")
			{
				unlink("./assets/upload/product-image/".$row['product_image4']);
			}
			 
			if($row['product_image5'] != "")
			{
				unlink("./assets/upload/product-image/".$row['product_image5']);
			}
			
			delete('seller_product_attributes',"product_id = ".$row['id']);
		}
		
		deleteById('registration',$id);
		delete('seller_bank_info',"seller_id = $id");
		delete('seller_additional_contact',"seller_id = $id");
		delete('seller_bank_info',"seller_id = $id");
		delete('seller_business_profile',"seller_id = $id");
		delete('seller_product',"seller_id = $id");
		delete('seller_profile',"seller_id = $id");
		delete('seller_statutory',"seller_id = $id");
		setMsg(USER_INDEX_MSG_S1);
		redirect(ADMINFOLDER."User/index");
	}
	
	public function add()
	{
		//$data["title"] = "Add User";
		//lva("add-category",$data);
		
		
	}
	
	public function edit($id)
	{
		$seller_business_profile	= getSellerBusinessProfile("seller_id = '$id'");
		$data['sbp']				= isset($seller_business_profile[0]) ? $seller_business_profile[0] : array("company_name"=>"","year_establishment"=>"","ceo_name"=>"","primary_business_type"=>"","ownership_type"=>"","number_of_employee"=>"","anuual_turnover"=>"","catalog_url"=>"","company_logo"=>"","company_website"=>"","business_card_front"=>"","business_card_back"=>"","secondary_business"=>"","meta_keywords"=>"","meta_description"=>"","brochure"=>"");		
		
		$seller_bank_info			= getSellerBankInfo("seller_id = '$id'");
		$data['sbi']				= isset($seller_bank_info[0]) ? $seller_bank_info[0] : array("ifsc_code"=>"","bank_name"=>"","account_no"=>"","account_type"=>"");
		
		$seller_statutory			= getSellerStatutory("seller_id = '$id'"); 
		$data['ss']					= isset($seller_statutory[0]) ? $seller_statutory[0] : array("gst_no"=>"","gst_no_reson"=>"","pan_no"=>"","tan_no"=>"","cin_no"=>"","ie_code"=>"");
		
		$seller_profile				= getSellerProfile("seller_id = '$id'");
		$data['sp']					= isset($seller_profile[0]) ? $seller_profile[0] : array("first_name"=>"","last_name"=>"","designation"=>"","address"=>"","locality"=>"","city"=>"","state"=>"","country"=>"","pin_code"=>"","mobile_number2"=>"","email_address1"=>"","email_address2"=>"","photo"=>"");
		
		$data['user_id']			= $id;
		$data['sr']					= getRegistrationById($id);
		$data['products']			= getSellerProduct("seller_id = '$id'");
		$data["title"] 				= "View User Details";
		
		if(isset($_POST['pi']))
		{
			unset($_POST['pi']);
			$mobile_unique = "";
			$email_unique = "";
			
			// if($_POST['email_address1'] != $data['sp']['email_address1'])
			// {
				// $email_unique = "|is_unique[seller_profile.email_address1]";
			// }
			
			$this->form_validation->set_rules('mobile_number2', 'Alternate Mobile Number', "regex_match[/^[6789][0-9]{9}$/]|is_unique[registration.mobile]",array("is_unique"=>"Mobile Number is already exiest."));			
			
			//$this->form_validation->set_rules('email_address1', 'Email', "required|valid_email$email_unique",array("is_unique"=>"Email address is already exiest."));
			
			$this->form_validation->set_rules('email_address2', 'Email', "valid_email|is_unique[registration.email]",array("is_unique"=>"Email address is already exiest."));
			
			$this->form_validation->set_rules('first_name', 'First Name', 'required');
			$this->form_validation->set_rules('last_name', 'Last Name', 'required');
			
			if($this->form_validation->run() == TRUE)
			{
				$pi = xssClean($_POST);
				update("seller_profile",$pi,"seller_id = '".$data['user_id']."'");
				setMsg(SELLER_COMPANYPROFILE_MSG_S1);
				redirect(ADMINFOLDER."User/edit/".$data['user_id']);
			}
			else
			{
				lv('seller-company-profile',$data);
			}
		}
		else if(isset($_POST['ai']))
		{
			unset($_POST['ai']);
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('locality', 'Locality', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('pin_code', 'Pin Code', 'required');
			
			if($this->form_validation->run() == TRUE)
			{
				unset($_POST['country']);
				$ai = xssClean($_POST);
				update("seller_profile",$ai,"seller_id = '".$data['user_id']."'");
				update('seller_product',array('state'=>$ai['state'],'city'=>$ai['city']),"seller_id = '".$data['user_id']."'");
				setMsg(SELLER_COMPANYPROFILE_MSG_S2);
				redirect(ADMINFOLDER."User/edit/".$data['user_id']);
			}
			else
			{
				lv('seller-company-profile',$data);
			}
		}
		else if(isset($_POST['ci']))
		{
			unset($_POST['ci']);
			$this->form_validation->set_rules('company_name', 'Company Name', 'required');
			$this->form_validation->set_rules('year_establishment', 'Year Establishment', 'required|regex_match[/^[1-9][0-9]{3}$/]',array('regex_match'=>"Year establishment write in proper format. Ex. 2010"));
			if($_POST["catalog_url"] != "" && $data['sbp']['catalog_url'] != $_POST["catalog_url"])
			{
				$this->form_validation->set_rules('catalog_url', 'Catelog URL', 'is_unique[seller_business_profile.catalog_url]');
			}
			
			if($this->form_validation->run() == TRUE)
			{
				$_POST['secondary_business'] = (isset($_POST['secondary_business'])) ? implode(", ",$_POST['secondary_business']) : "";
				$ci 				= xssClean($_POST);
				$ci['catalog_url'] 	= seourl($ci['catalog_url']);
				
				update("seller_business_profile",$ci,"seller_id = '".$data['user_id']."'");
				update('seller_product',array('company_name'=>$ci['company_name'],'catalog_url'=>$ci['catalog_url']),"seller_id = '".$data['user_id']."'");
				setMsg(SELLER_COMPANYPROFILE_MSG_S3);
				redirect(ADMINFOLDER."User/edit/".$data['user_id']);
			}
			else
			{
				lv('seller-company-profile',$data);
			}
		}
		else if(isset($_POST['sd']))
		{
			if(isset($_POST["gst_no"]) && $_POST["gst_no"] == "")
			{
				$this->form_validation->set_rules('gst_no_reson', 'GST Not Provide Reason', 'required');
			}
			else
			{
				$this->form_validation->set_rules('gst_no', 'GST Number', 'regex_match[/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/]',array("regex_match"=>"GST Number is not valid."));
			}
			unset($_POST['sd']);
			$sd = xssClean($_POST);
			update("seller_statutory",$sd,"seller_id = '".$data['user_id']."'");
			setMsg(SELLER_COMPANYPROFILE_MSG_S8);
			redirect(ADMINFOLDER."User/edit/".$data['user_id']);
		}
		else if(isset($_POST['bd']))
		{
			unset($_POST['bd']);
			$bd = xssClean($_POST);
			$sbi = getSellerBankInfo("seller_id = '".$data['user_id']."'");
			if(count($sbi) == 0)
			{
				$bd['seller_id'] = $data['user_id'];
				insert("seller_bank_info",$bd);
			}
			else
			{
				update("seller_bank_info",$bd,"seller_id = '".$data['user_id']."'");				
			}	
			
			setMsg(SELLER_COMPANYPROFILE_MSG_S9);
			redirect(ADMINFOLDER."User/edit/".$data['user_id']);
		}
		else if(isset($_FILES['photo']['name']) && $_FILES['photo']['name'] != "")
		{
			if($data['sp']['photo'] == "")
			{
				$seller_photo['photo'] 	= fileUpload('photo',"user-image/");
			}
			else
			{
				$seller_photo['photo'] 	= fileUpload('photo',"user-image/",$data['sp']['photo']);
			}
			update("seller_profile",$seller_photo,"seller_id = '".$data['user_id']."'");
			setMsg(SELLER_COMPANYPROFILE_MSG_S4);
			redirect(ADMINFOLDER."User/edit/".$data['user_id']);
		}
		else if(isset($_FILES['company_logo']['name']) && $_FILES['company_logo']['name'] != "")
		{
			if($data['sbp']['company_logo'] == "")
			{
				$cmp_photo['company_logo'] 	= fileUpload('company_logo',"user-image/");
			}
			else
			{
				$cmp_photo['company_logo'] 	= fileUpload('company_logo',"user-image/",$data['sbp']['company_logo']);
			}
			update("seller_business_profile",$cmp_photo,"seller_id = '".$data['user_id']."'");
			setMsg(SELLER_COMPANYPROFILE_MSG_S5);
			redirect(ADMINFOLDER."User/edit/".$data['user_id']);
		}
		else if(isset($_FILES['business_card_front']['name']) && $_FILES['business_card_front']['name'] != "")
		{
			if($data['sbp']['business_card_front'] == "")
			{
				$cmp_photo['business_card_front'] 	= fileUpload('business_card_front',"business-card/");
			}
			else
			{
				$cmp_photo['business_card_front'] 	= fileUpload('business_card_front',"business-card/",$data['sbp']['business_card_front']);
			}
			
			update("seller_business_profile",$cmp_photo,"seller_id = '".$data['user_id']."'");
			setMsg(SELLER_COMPANYPROFILE_MSG_S6);
			redirect(ADMINFOLDER."User/edit/".$data['user_id']);
		}
		else if(isset($_FILES['business_card_back']['name']) && $_FILES['business_card_back']['name'] != "")
		{
			if($data['sbp']['business_card_back'] == "")
			{
				$cmp_photo['business_card_back'] 	= fileUpload('business_card_back',"business-card/");
			}
			else
			{
				$cmp_photo['business_card_back'] 	= fileUpload('business_card_back',"business-card/",$data['sbp']['business_card_back']);
			}
			
			update("seller_business_profile",$cmp_photo,"seller_id = '".$data['user_id']."'");
			setMsg(SELLER_COMPANYPROFILE_MSG_S7);
			redirect(ADMINFOLDER."User/edit/".$data['user_id']);
		}
		else
		{
			lva("edit-user-details",$data);
			
		}
	}
	
}
