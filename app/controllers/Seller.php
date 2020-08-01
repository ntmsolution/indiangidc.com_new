<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		redirectStep();
	}
	
	public function index()
	{
		$data['page_title'] 	= SELLER_INDEX_TITLE;
		$data['page_heading'] 	= SELLER_INDEX_HEADING;
		lv('home',$data);
	}
	
	public function dashboard()
	{
		$data['user_id']		= getLoginId();
		$data['sr']				= getRegistrationById($data['user_id']); 
		$data['page_title'] 	= SELLER_DASHBOARD_TITLE;
		$data['page_heading'] 	= SELLER_DASHBOARD_HEADING;
		lv('seller-dashboard',$data);
	}
	
	public function order($pno=0)
	{
		//SELLER_ORDER
		$data['pno']			= $pno;
		$data['page_title'] 	= SELLER_ORDER_TITLE;
		$data['page_heading'] 	= SELLER_ORDER_HEADING;
		lv('seller-view-order.php',$data);
	}
	
	
	public function companyProfile()
	{		
		$data['user_id']			= getLoginId();
		$data['sr']					= getRegistrationById($data['user_id']);
		$seller_profile				= getSellerProfile("seller_id = '".$data['user_id']."'");
		$data['sp']					= isset($seller_profile[0]) ? $seller_profile[0] : array("first_name"=>"","last_name"=>"","designation"=>"","address"=>"","locality"=>"","city"=>"","state"=>"","country"=>"","pin_code"=>"","mobile_number2"=>"","email_address1"=>"","email_address2"=>"","photo"=>"");
		
		$seller_business_profile	= getSellerBusinessProfile("seller_id = '".$data['user_id']."'");
		$data['sbp']				= isset($seller_business_profile[0]) ? $seller_business_profile[0] : array("company_name"=>"","year_establishment"=>"","ceo_name"=>"","primary_business_type"=>"","ownership_type"=>"","number_of_employee"=>"","anuual_turnover"=>"","catalog_url"=>"","company_logo"=>"","company_website"=>"","business_card_front"=>"","business_card_back"=>"","secondary_business"=>""
		);
		
		$seller_statutory			= getSellerStatutory("seller_id = '".$data['user_id']."'"); 
		$data['ss']					= isset($seller_statutory[0]) ? $seller_statutory[0] : array("gst_no"=>"","gst_no_reson"=>"","pan_no"=>"","tan_no"=>"","cin_no"=>"","ie_code"=>"");
		
		$seller_bank_info			= getSellerBankInfo("seller_id = '".$data['user_id']."'");
		$data['sbi']				= isset($seller_bank_info[0]) ? $seller_bank_info[0] : array("ifsc_code"=>"","bank_name"=>"","account_no"=>"","account_type"=>"","account_name"=>"","swift_code"=>"");
		
		
		$sbp						= getSellerBusinessProfile("seller_id = '".$data['user_id']."'");
		$data['brochure'] 			= (isset($sbp[0]['brochure'])) ? $sbp[0]['brochure'] : "";
		$data['page_title'] 		= SELLER_COMPANYPROFILE_TITLE;
		$data['page_heading'] 		= SELLER_COMPANYPROFILE_HEADING;
		

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
				redirect(SELLER_COMPANYPROFILE);
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
				$ai['address'] 		= xssClean($_POST['address']);
				$ai['locality'] 	= xssClean($_POST['locality']);
				$ai['city'] 		= xssClean($_POST['city']);
				$ai['state'] 		= xssClean($_POST['state']);
				$ai['pin_code'] 	= xssClean($_POST['pin_code']);
				$ai['landmark'] 	= xssClean($_POST['landmark']);
				unset($_POST['address']);
				unset($_POST['locality']);
				unset($_POST['city']);
				unset($_POST['state']);
				unset($_POST['pin_code']);
				unset($_POST['landmark']);
				update("seller_profile",$ai,"seller_id = '".$data['user_id']."'");
				update('seller_product',array('state'=>$ai['state'],'city'=>$ai['city']),"seller_id = '".$data['user_id']."'");
				setMsg(SELLER_COMPANYPROFILE_MSG_S2);
				redirect(SELLER_COMPANYPROFILE);
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
			
			$this->form_validation->set_rules('address', 'Address', 'required');
			$this->form_validation->set_rules('locality', 'Locality', 'required');
			$this->form_validation->set_rules('city', 'City', 'required');
			$this->form_validation->set_rules('state', 'State', 'required');
			$this->form_validation->set_rules('pin_code', 'Pin Code', 'required');
			
			
			if($_POST["catalog_url"] != "" && $data['sbp']['catalog_url'] != $_POST["catalog_url"])
			{
				$this->form_validation->set_rules('catalog_url', 'Catelog URL', 'is_unique[seller_business_profile.catalog_url]');
			}
			
			if($this->form_validation->run() == TRUE)
			{
				
				unset($_POST['country']);
				$ai['address'] 		= xssClean($_POST['address']);
				$ai['locality'] 	= xssClean($_POST['locality']);
				$ai['city'] 		= xssClean($_POST['city']);
				$ai['state'] 		= xssClean($_POST['state']);
				$ai['pin_code'] 	= xssClean($_POST['pin_code']);
				$ai['landmark'] 	= xssClean($_POST['landmark']);
				unset($_POST['address']);
				unset($_POST['locality']);
				unset($_POST['city']);
				unset($_POST['state']);
				unset($_POST['pin_code']);
				unset($_POST['landmark']);
				update("seller_profile",$ai,"seller_id = '".$data['user_id']."'");
				update('seller_product',array('state'=>$ai['state'],'city'=>$ai['city']),"seller_id = '".$data['user_id']."'");
				
				$_POST['secondary_business'] = (isset($_POST['secondary_business'])) ? implode(", ",$_POST['secondary_business']) : "";
				$ci 				= xssClean($_POST);
				$ci['catalog_url'] 	= seourl($ci['catalog_url']);
				
				update("seller_business_profile",$ci,"seller_id = '".$data['user_id']."'");
				update('seller_product',array('company_name'=>$ci['company_name'],'catalog_url'=>$ci['catalog_url']),"seller_id = '".$data['user_id']."'");
				setMsg(SELLER_COMPANYPROFILE_MSG_S3);
				redirect(SELLER_COMPANYPROFILE);
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
				//$this->form_validation->set_rules('gst_no', 'GST Number', 'regex_match[/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$/]',array("regex_match"=>"GST Number is not valid."));
			}
			
			unset($_POST['sd']);
			$sd = xssClean($_POST);
			update("seller_statutory",$sd,"seller_id = '".$data['user_id']."'");
			setMsg(SELLER_COMPANYPROFILE_MSG_S8);
			redirect(SELLER_COMPANYPROFILE);
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
			redirect(SELLER_COMPANYPROFILE);
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
			redirect(SELLER_COMPANYPROFILE);
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
			redirect(SELLER_COMPANYPROFILE);
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
			redirect(SELLER_COMPANYPROFILE);
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
			redirect(SELLER_COMPANYPROFILE);
		}
		else if(isset($_FILES['brochure']['name']) && $_FILES['brochure']['name'] != "")
		{
			//Brochure 
			if($data['brochure'] == "")
			{
				$brochure['brochure'] 	= fileUpload('brochure',"brochure/","","pdf");
			}
			else
			{
				$brochure['brochure'] 	= fileUpload('brochure',"brochure/",$data['brochure'],"pdf");
			}
			
			update("seller_business_profile",$brochure,"seller_id = '".$data['user_id']."'");
			setMsg(SELLER_BUYERTOOLS_MSG);
			redirect(SELLER_COMPANYPROFILE);
		}
		else 
		{
			lv('seller-company-profile',$data);
		}
	}

	public function profileview()
	{
		$data['page_title'] 	= "Career Infoway";
		$data['page_heading'] 	= "Career Infoway";
		lv('seller-profile-view',$data);
	}	
	
	public function viewProducts($pno=0,$is_delete="no")
	{
		$seller_id 				= getLoginId();
		$data['pno']			= $pno;
		$data['page_title'] 	= SELLER_VIEWPRODUCTS_TITLE;
		$data['page_heading'] 	= SELLER_VIEWPRODUCTS_HEADING;
		lv('seller-view-product',$data);
		
		if($is_delete != 'no')
		{
			$lb = getSellerProductById($is_delete);
			if($lb['product_image1'] != '')
			{
				unlink("./assets/upload/product-image/".$lb['product_image1']);
			}
			if($lb['product_image2'] != '')
			{
				unlink("./assets/upload/product-image/".$lb['product_image2']);
			}
			if($lb['product_image3'] != '')
			{
				unlink("./assets/upload/product-image/".$lb['product_image3']);
			}
			if($lb['product_image4'] != '')
			{
				unlink("./assets/upload/product-image/".$lb['product_image4']);
			}
			if($lb['product_image5'] != '')
			{
				unlink("./assets/upload/product-image/".$lb['product_image5']);
			}
			deleteById('seller_product',$is_delete);
			setMsg(SELLER_VIEWPRODUCTS_MSG);
			redirect(SELLER_VIEWPRODUCTS);
		}
	}
	
	public function updateProduct($product_id)
	{
		
		$seller_id 				= getLoginId();
		$data['page_title'] 	= SELLER_UPDATEPRODUCTS_TITLE;
		$data['page_heading'] 	= SELLER_UPDATEPRODUCTS_HEADING;
		$data['product_id'] 	= $product_id;
		$data['product'] 		= getSellerProductById($product_id);
		
		if(isset($_POST['update_product']))
		{
			
			unset($_POST['update_product']);			
			$this->form_validation->set_rules('category_id', 'Product Category', 'required');
			$this->form_validation->set_rules('subcategory_id', 'Area of use', 'required');
			$this->form_validation->set_rules('product_name', 'Product name', 'required');
			$this->form_validation->set_rules('product_price', 'Product price', 'required|numeric');
			$this->form_validation->set_rules('product_price_as_per', 'Product price as per', 'required');			
			
			if($_POST['subcategory_id'] == "other")
			{
				$this->form_validation->set_rules('subcategory_name', 'Area of use name', 'required');				
			}
			
			if($this->form_validation->run() == TRUE)
			{
				
				if($_FILES['product_image1']['name'] != "")
				{
					$_POST['product_image1'] = (isset($_POST['product_image1'])) ? fileUpload('product_image1',"product-image/",$_POST['product_image1']) : fileUpload('product_image1',"product-image/");
				}
				else
				{
					if(!isset($_POST['product_image1'])){ $_POST['product_image1'] = ""; }
				}
				
				if($_FILES['product_image2']['name'] != "")
				{
					$_POST['product_image2'] = (isset($_POST['product_image2'])) ? fileUpload('product_image2',"product-image/",$_POST['product_image2']) : fileUpload('product_image2',"product-image/");
				}
				else
				{
					if(!isset($_POST['product_image2'])){ $_POST['product_image2'] = ""; }
				}
				
				if($_FILES['product_image3']['name'] != "")
				{
					$_POST['product_image3'] = (isset($_POST['product_image3'])) ? fileUpload('product_image3',"product-image/",$_POST['product_image3']) : fileUpload('product_image3',"product-image/");
				}
				else
				{
					if(!isset($_POST['product_image3'])){ $_POST['product_image3'] = ""; }
				}
				
				if($_FILES['product_image4']['name'] != "")
				{
					$_POST['product_image4'] = (isset($_POST['product_image4'])) ? fileUpload('product_image4',"product-image/",$_POST['product_image4']) : fileUpload('product_image4',"product-image/");
				}
				else
				{
					if(!isset($_POST['product_image4'])){ $_POST['product_image4'] = ""; }
				}
				
				if($_FILES['product_image5']['name'] != "")
				{
					$_POST['product_image5'] = (isset($_POST['product_image5'])) ? fileUpload('product_image5',"product-image/",$_POST['product_image5']) : fileUpload('product_image5',"product-image/");
				}
				else
				{
					if(!isset($_POST['product_image5'])){ $_POST['product_image5'] = ""; }
				}
				
				$attr_name							= $_POST['attr_name'];
				$attr_value							= $_POST['attr_value'];
				$attr_id							= $_POST['attr_id'];
				
				unset($_POST['attr_id']);
				unset($_POST['attr_name']);
				unset($_POST['attr_value']);
				
				$product_data 						= xssClean($_POST);
				
				$product['seller_id'] 				= $seller_id;
				$product['category_id'] 			= $product_data['category_id'];				
				$product['subcategory_id'] 			= $product_data['subcategory_id'];
				$product['product_name']	 		= $product_data['product_name'];				
				$product['meta_description'] 		= $product_data['meta_description'];
				$product['meta_keywords'] 			= $product_data['meta_keywords'];
				$product['product_price'] 			= $product_data['product_price'];
				$product['product_price_as_per'] 	= $product_data['product_price_as_per'];
				$product['product_youtube_url'] 	= $product_data['product_youtube_url'];
				$product['product_image1'] 			= $product_data['product_image1'];
				$product['product_image2'] 			= $product_data['product_image2'];
				$product['product_image3'] 			= $product_data['product_image3'];
				$product['product_image4'] 			= $product_data['product_image4'];
				$product['product_image5'] 			= $product_data['product_image5'];				
				$category_name			 			= getCategoryById($product_data['category_id']);
				$product['category_name'] 			= $category_name['category_name'];
				
				if($product_data['subcategory_id'] == 'other')
				{
					$c	= getCategory("category_name = '".$product_data['subcategory_name']."'");
					
					if(count($c) == 0)
					{
						$product['subcategory_id'] 		= insert("category",array("category_name"=>$product_data['subcategory_name'],"parent_id"=>$product_data['category_id']));
						$product['subcategory_name']	= $product_data['subcategory_name'];
					}
					else
					{
						$product['subcategory_id'] 		= $c[0]['id'];
						$product['subcategory_name'] 	= $c[0]['category_name'];
					}
				}
				else
				{
					$c_name								= getCategoryById($product_data['subcategory_id']);
					$product['subcategory_id'] 			= $product_data['subcategory_id'];
					$product['subcategory_name'] 		= $c_name['category_name'];
				}
				
				$sbp								= getSellerBusinessProfile("seller_id = '$seller_id'");
				$product['catalog_url'] 			= (isset($sbp[0]['catalog_url'])) ? $sbp[0]['catalog_url'] : "";
				$product['company_name'] 			= (isset($sbp[0]['company_name'])) ? $sbp[0]['company_name'] : "";
				$sp									= getSellerProfile("seller_id = '$seller_id'");
				$product['state'] 					= (isset($sp[0]['state'])) ? $sp[0]['state'] : "";
				$product['city'] 					= (isset($sp[0]['city'])) ? $sp[0]['city'] : "";
				
				updateById("seller_product",$product,$product_id);
				
				
				if(isset($attr_name[0]) && isset($attr_value[0]))
				{
					$attr_cnt = count($attr_name);
					for($i=0;$i<$attr_cnt;$i++)
					{
						if($attr_name[$i] != "")
						{
							if(isset($attr_id[$i]))
							{
								updateById("seller_product_attributes",array("name"=>$attr_name[$i],"value"=>$attr_value[$i],"product_id"=>$product_id),$attr_id[$i]);
							}
							else
							{
								insert("seller_product_attributes",array("name"=>$attr_name[$i],"value"=>$attr_value[$i],"product_id"=>$product_id));
							}
						}
					}
				}
				
				setMsg(SELLER_UPDATEPRODUCTS_MSG_S1);
				redirect(SELLER_UPDATEPRODUCTS."/$product_id");
			}
			else
			{
				lv('seller-update-product.php',$data);
			}
		}
		else
		{
			lv('seller-update-product.php',$data);
		}
	}
	
	public function manageProducts()
	{
		$seller_id 				= getLoginId();
		$data['page_title'] 	= SELLER_MANAGEPRODUCTS_TITLE;
		$data['page_heading'] 	= SELLER_MANAGEPRODUCTS_HEADING;
		
		
		if(isset($_POST['add_product']))
		{
			$sr = getRegistrationById($seller_id);
			if($sr['user_type'] == 0)
			{
				$seller_product = getSellerProduct("seller_id = '$seller_id'");
				if(count($seller_product) == MAX_PRODUCT_UPLOAD_FREE_USER)
				{
					setMsg(SELLER_MANAGEPRODUCTS_MSG_S2,1);
					redirect(SELLER_MANAGEPRODUCTS);
				}
			}
			
			unset($_POST['add_product']);			
			$this->form_validation->set_rules('category_id', 'Product Category', 'required');
			$this->form_validation->set_rules('subcategory_id', 'Area of use', 'required');
			$this->form_validation->set_rules('product_name', 'Product name', 'required');
			$this->form_validation->set_rules('product_price', 'Product price', 'required|numeric');
			$this->form_validation->set_rules('product_price_as_per', 'Product price as per', 'required');
			$this->form_validation->set_rules('attr_name1', 'Product Attribute Name', 'required');
			$this->form_validation->set_rules('attr_value1', 'Product Attribute Value', 'required');
			
			if($_FILES['product_image1']['name'] == "")
			{
				$this->form_validation->set_rules('product_image1', 'Product image', 'required');
			}
			
			if($_POST['subcategory_id'] == "other")
			{
				$this->form_validation->set_rules('subcategory_name', 'Area of use name', 'required');				
			}
			
			if($this->form_validation->run() == TRUE)
			{
				$_POST['product_image1']			= ($_FILES['product_image1']['name'] != "") ? fileUpload('product_image1',"product-image/") : "";
				$_POST['product_image2']			= ($_FILES['product_image2']['name'] != "") ? fileUpload('product_image2',"product-image/") : "";
				$_POST['product_image3']			= ($_FILES['product_image3']['name'] != "") ? fileUpload('product_image3',"product-image/") : "";
				$_POST['product_image4']			= ($_FILES['product_image4']['name'] != "") ? fileUpload('product_image4',"product-image/") : "";
				$_POST['product_image5']			= ($_FILES['product_image5']['name'] != "") ? fileUpload('product_image5',"product-image/") : "";
				
				
				$attr_name							= (isset($_POST['attr_name'])) ? $_POST['attr_name'] : "";
				$attr_value							= (isset($_POST['attr_value'])) ? $_POST['attr_value'] : "";
				
				
				unset($_POST['attr_name']);
				unset($_POST['attr_value']);
				
				$product_data 						= xssClean($_POST);
				
				$product['seller_id'] 				= $seller_id;
				$product['category_id'] 			= $product_data['category_id'];				
				$product['subcategory_id'] 			= $product_data['subcategory_id'];
				$product['product_name']	 		= $product_data['product_name'];				
				$product['meta_description'] 		= $product_data['meta_description'];
				$product['meta_keywords'] 			= $product_data['meta_keywords'];
				$product['product_price'] 			= $product_data['product_price'];
				$product['product_price_as_per'] 	= $product_data['product_price_as_per'];
				$product['product_youtube_url'] 	= $product_data['product_youtube_url'];
				$product['product_image1'] 			= $product_data['product_image1'];
				$product['product_image2'] 			= $product_data['product_image2'];
				$product['product_image3'] 			= $product_data['product_image3'];
				$product['product_image4'] 			= $product_data['product_image4'];
				$product['product_image5'] 			= $product_data['product_image5'];					
				$category_name			 			= getCategoryById($product_data['category_id']);
				$product['category_name'] 			= $category_name['category_name'];
				
				
				if($product_data['subcategory_id'] == 'other')
				{
					$c	= getCategory("category_name = '".$product_data['subcategory_name']."'");
					
					if(count($c) == 0)
					{
						$product['subcategory_id'] 		= insert("category",array("category_name"=>$product_data['subcategory_name'],"parent_id"=>$product_data['category_id']));
						$product['subcategory_name']	= $product_data['subcategory_name'];
					}
					else
					{
						$product['subcategory_id'] 		= $c[0]['id'];
						$product['subcategory_name'] 	= $c[0]['category_name'];
					}
				}
				else
				{
					$c_name								= getCategoryById($product_data['subcategory_id']);
					$product['subcategory_id'] 			= $product_data['subcategory_id'];
					$product['subcategory_name'] 		= $c_name['category_name'];
				}
				
				$sbp								= getSellerBusinessProfile("seller_id = '$seller_id'");
				$product['company_name'] 			= (isset($sbp[0]['company_name'])) ? $sbp[0]['company_name'] : "";
				$product['catalog_url'] 			= (isset($sbp[0]['catalog_url'])) ? $sbp[0]['catalog_url'] : "";
				$sp									= getSellerProfile("seller_id = '$seller_id'");
				$product['state'] 					= (isset($sp[0]['state'])) ? $sp[0]['state'] : "";
				$product['city'] 					= (isset($sp[0]['city'])) ? $sp[0]['city'] : "";
				
				$product_id 						= insert("seller_product",$product);
				
				
				insert("seller_product_attributes",array("name"=>$product_data['attr_name1'],"value"=>$product_data['attr_value1'],"product_id"=>$product_id));
				
				if(isset($attr_name[0]) && isset($attr_value[0]))
				{
					$attr_cnt = count($attr_name);
					for($i=0;$i<$attr_cnt;$i++)
					{
						if($attr_name[$i] != "")
						{
							insert("seller_product_attributes",array("name"=>$attr_name[$i],"value"=>$attr_value[$i],"product_id"=>$product_id));							
						}
					}
				}
				
				setMsg(SELLER_MANAGEPRODUCTS_MSG_S1);
				redirect(SELLER_MANAGEPRODUCTS);
			}
			else
			{
				lv('seller-manage-product',$data);
			}
		}
		else
		{
			lv('seller-manage-product',$data);
		}
	}
	
	
	public function viewRequirement($msg_id=0,$is_delete='no',$pno=0)
	{
		$seller_id 					= getLoginId();
		$data['seller_id']			= $seller_id;
		$data['pno'] 				= $pno;
		$data['msg_id'] 			= $msg_id;
		$data['page_title'] 		= SELLER_VIEW_REQUIREMENT_TITLE;
		$data['page_heading'] 		= SELLER_VIEW_REQUIREMENT_HEADING;
		lv('seller-view-requirement',$data);
		
		// if($is_delete == "yes" && $msg_id != 0)
		// {
			// setMsg(SELLER_VIEW_REQUIREMENT_MSG);
			// deleteById("lead_buy",$msg_id);
			// redirect(SELLER_VIEW_REQUIREMENT."/0/0/$pno");
		// }
	}
	public function addPostRequirement()
	{
		$seller_id 				= getLoginId();
		$data['page_title'] 	= SELLER_POST_REQUIREMENT_TITLE;
		$data['page_heading'] 	= SELLER_POST_REQUIREMENT_HEADING;		
		
		if(isset($_POST['add_requirement']))
		{
			unset($_POST['add_requirement']);			
			$this->form_validation->set_rules('category_id', 'Product Category', 'required');
			$this->form_validation->set_rules('subcategory_id', 'Area of use', 'required');
			$this->form_validation->set_rules('message', 'Message', 'required');			
				
			$requirement_data 							= xssClean($_POST);
			$requirement['buyer_id'] 					= $seller_id;
			$requirement['category_id'] 				= $requirement_data['category_id'];				
			$requirement['subcategory_id'] 				= $requirement_data['subcategory_id'];
			$requirement['message']	 					= $requirement_data['message'];
			$requirement['date_time']					= date('Y-m-d H:i:s');
			insert("buy_request",$requirement);
			setMsg(SELLER_POST_REQUIREMENT_MSG);
			redirect(SELLER_POST_REQUIREMENT);
		}
		else
		{
			lv('seller-post-requirement',$data);
		}
	}
	
	public function photoDocs()
	{
		
	}
	
	public function buyerTools()
	{
		$seller_id					= getLoginId();
		$data['seller_id']			= $seller_id;
		$sbp						= getSellerBusinessProfile("seller_id = '$seller_id'");
		$data['brochure'] 			= (isset($sbp[0]['brochure'])) ? $sbp[0]['brochure'] : "";
		$data['page_title'] 		= SELLER_BUYERTOOLS_TITLE;
		$data['page_heading'] 		= SELLER_BUYERTOOLS_HEADING;
		
		//Brochure 
		if(isset($_FILES['brochure']['name']) && $_FILES['brochure']['name'] != "")
		{
			if($data['brochure'] == "")
			{
				$brochure['brochure'] 	= fileUpload('brochure',"brochure/","","pdf");
			}
			else
			{
				$brochure['brochure'] 	= fileUpload('brochure',"brochure/",$data['brochure'],"pdf");
			}
			
			update("seller_business_profile",$brochure,"seller_id = '$seller_id'");
			setMsg(SELLER_BUYERTOOLS_MSG);
			redirect(SELLER_SETTINGS);
		}
		else if(isset($_POST['change_support_pin']))
		{
			$this->form_validation->set_rules('support_pin', 'Support Pin', 'required|regex_match[/^[0-9]{4}$/]',array("regex_match"=>"Invalid Support Number."));
			if($this->form_validation->run() == TRUE)
			{
				$support_pin 	= xssClean($_POST['support_pin']);
				updateById("registration",array('support_pin'=>$support_pin),getLoginId());
				setMsg(SELLER_BUYERTOOLS_MSG_S2);
				redirect(SELLER_SETTINGS);
			}
			else
			{
				lv('seller-buyer-tools',$data);
			}
		}
		else
		{
			lv('seller-buyer-tools',$data);
		}
		
		
		
	}
	
	public function buyLeads($msg_id,$is_delete='no',$pno=0)
	{
		$seller_id 					= getLoginId();
		$data['seller_id']			= $seller_id;
		$data['pno'] 				= $pno;
		$data['msg_id'] 			= $msg_id;
		$data['page_title'] 		= SELLER_BUYLEADS_TITLE;
		$data['page_heading'] 		= SELLER_BUYLEADS_HEADING;
		lv('seller-buy-lead',$data);
		
		if($msg_id != 0 && $is_delete == 'no')
		{
			updateById("lead_buy",array('is_read'=>1),$msg_id);
			redirect(SELLER_BUYLEADS_VIEW."/$msg_id/$pno/");
		}
		
		if($is_delete == "yes" && $msg_id != 0)
		{
			setMsg(SELLER_BUYLEADS_E1);
			deleteById("lead_buy",$msg_id);
			redirect(SELLER_BUYLEADS."/0/0/$pno");
		}
	}
	
	public function buyLeadsView($msg_id,$pno=0)
	{
		$data['pno'] 				= $pno;
		$data['msg_id'] 			= $msg_id;
		$data['page_title'] 		= SELLER_BUYLEADS_VIEW_TITLE;
		$data['page_heading'] 		= SELLER_BUYLEADS_VIEW_HEADING;
		lv('seller-buy-lead-view',$data);
	}
	
	
	public function leadManager($pno=0)
	{
		$seller_id 				= getLoginId();
		$data['seller_id']		= $seller_id;
		$data['pno']			= $pno;
		$data['page_title'] 	= SELLER_LEADMANAGER_TITLE;
		$data['page_heading'] 	= SELLER_LEADMANAGER_HEADING;
		lv('seller-lead-manager',$data);
	}
	
	public function leadManagerProduct($msg_id,$product_id,$is_delete="no",$pno=0)
	{
		$seller_id 					= getLoginId();
		$data['seller_id']			= $seller_id;
		$data['pno'] 				= $pno;
		$data['product_id']			= $product_id;
		$data['msg_id'] 			= $msg_id;
		$data['page_title'] 		= SELLER_LEADMANAGER_PRODUCTS_TITLE;
		$data['page_heading'] 		= SELLER_LEADMANAGER_PRODUCTS_HEADING;
		lv('seller-lead-manager-msg',$data);
		
		if($msg_id != 0 && $is_delete == "no")
		{
			updateById("lead_buy",array('is_read'=>1),$msg_id);
			
			redirect(SELLER_LEADMANAGER_PRODUCTS_VIEW."/$pno/$msg_id/$product_id");
		}
		
		if($is_delete == "yes" && $msg_id != 0)
		{
			deleteById("lead_buy",$msg_id);
			setMsg(SELLER_BUYLEADS_MSG_DELETE);
			redirect(SELLER_LEADMANAGER_PRODUCTS."/$pno/0/$product_id");
		}
	}
	
	public function leadManagerProductView($pno=0,$msg_id,$product_id)
	{
		
		$data['pno'] 				= $pno;
		$data['msg_id'] 			= $msg_id;
		$data['product_id'] 		= $product_id;
		$data['page_title'] 		= SELLER_LEADMANAGER_PRODUCTS_VIEW_TITLE;
		$data['page_heading'] 		= SELLER_LEADMANAGER_PRODUCTS_VIEW_HEADING;
		lv('seller-lead-manager-product-view',$data);
	}
	
	public function sellerSettings()
	{
		$data['seller_id']			= getLoginId();
		$data['page_title'] 		= SELLER_SETTINGS_TITLE;
		$data['page_heading'] 		= SELLER_SETTINGS_HEADING;
		$sbp						= getSellerBusinessProfile("seller_id = ".$data['seller_id']);
		$data['brochure'] 			= (isset($sbp[0]['brochure'])) ? $sbp[0]['brochure'] : "";
		if(isset($_POST['change_mobile']))
		{
			$this->form_validation->set_rules('mobile', 'Alternate Mobile Number', "regex_match[/^[6789][0-9]{9}$/]|is_unique[registration.mobile]",array("is_unique"=>"Mobile Number is already exiest."));
			
			if($this->form_validation->run() == TRUE)
			{
				unset($_SESSION['email_change']);
				unset($_SESSION['mobile_change']);
				$_SESSION['mobile_change'] 	= xssClean($_POST['mobile']);
				$otp						= generateOTP(); 
				updateById('registration',array('otp'=>$otp),getLoginId());
				sendOTP($_SESSION['mobile_change'],"Dear User, Welcome To Indian GIDC. Your OTP is: $otp.");
				redirect(SELLER_SETTINGS_OTP);
			}
			else
			{
				lv('seller-settings',$data);
			}
		}
		else if(isset($_POST['change_email']))
		{
			$this->form_validation->set_rules('email', 'Email', "required|valid_email|is_unique[registration.email]",array("is_unique"=>"Email address is already exiest."));
			
			if($this->form_validation->run() == TRUE)
			{
				unset($_SESSION['email_change']);
				unset($_SESSION['mobile_change']);
				$_SESSION['email_change'] 	= xssClean($_POST['email']);
				$otp						= generateOTP(); 
				updateById('registration',array('otp'=>$otp),getLoginId());
				sendEmail($_SESSION['email_change'],"Change Email Addres OTP","Dear User, Welcome To Indian GIDC. Your OTP is: $otp.");
				redirect(SELLER_SETTINGS_OTP);
			}
			else
			{
				lv('seller-settings',$data);
			}
		}
		else if(isset($_POST['change_password']))
		{
			$this->form_validation->set_rules('old_password', 'Old Password', 'required|min_length[6]|max_length[20]');
			$this->form_validation->set_rules('confirm_password', 'Cofirm Password', 'required|min_length[6]|max_length[20]');
			$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]|max_length[20]');
			if($this->form_validation->run() == TRUE)
			{
				$cp = xssClean($_POST);
				$sr = getRegistrationById(getLoginId());
				if($cp['old_password'] == $sr['password'])
				{
					if($cp['new_password'] == $cp['confirm_password'])
					{
						updateById("registration",array("password"=>$cp['new_password']),getLoginId());
						setMsg(SELLER_SETTINGS_MSG_S1);
						redirect(SELLER_SETTINGS);
					}
					else
					{
						setMsg(SELLER_SETTINGS_MSG_E2,1);
						redirect(SELLER_SETTINGS);
					}
				}
				else
				{
					setMsg(SELLER_SETTINGS_MSG_E1,1);
					redirect(SELLER_SETTINGS);
				}
								
			}
			else
			{
				lv('seller-settings',$data);
			}
		}			
		else
		{			
			lv('seller-settings',$data);
		}
		
	}
	
	public function sellerSettingsOTP()
	{
		if(isset($_SESSION['mobile_change']))
		{
			$sr = getRegistrationById(getLoginId());
			$this->form_validation->set_rules('otp', 'OTP', 'required|min_length[6]|max_length[6]');

			if($this->form_validation->run() == TRUE)
			{
				if(isset($_POST['change_mobile']))
				{
					unset($_POST['change_mobile']);
					$otp 		= xssClean($_POST['otp']);
					if(isset($sr['otp']) && $otp == $sr['otp'])
					{
						updateById('registration',array('mobile'=>$_SESSION['mobile_change']),getLoginId());
						unset($_SESSION['mobile_change']);
						setMsg(SELLER_SETTINGS_MSG);
						redirect(SELLER_SETTINGS);					
					}
					else
					{
						setMsg(REGISTRATION_BUYER_OTP_MSG_E,1);
						redirect(SELLER_SETTINGS_OTP);
					}
				}
			}
			else
			{
				$data['seller_id']			= getLoginId();
				$data['page_title'] 		= SELLER_SETTINGS_OTP_TITLE;
				$data['page_heading'] 		= SELLER_SETTINGS_OTP_HEADING;
				lv('seller-settings-otp',$data);
			}
			
		}
		else if(isset($_SESSION['email_change']))
		{
			$sr = getRegistrationById(getLoginId());
			$this->form_validation->set_rules('otp', 'OTP', 'required|min_length[6]|max_length[6]');

			if($this->form_validation->run() == TRUE)
			{
				if(isset($_POST['change_email']))
				{
					unset($_POST['change_email']);
					$otp 		= xssClean($_POST['otp']);
					if(isset($sr['otp']) && $otp == $sr['otp'])
					{
						updateById('registration',array('email'=>$_SESSION['email_change']),getLoginId());
						unset($_SESSION['email_change']);
						setMsg(SELLER_SETTINGS_EMAIL_MSG);
						redirect(SELLER_SETTINGS);					
					}
					else
					{
						setMsg(REGISTRATION_BUYER_OTP_MSG_E,1);
						redirect(SELLER_SETTINGS_OTP);
					}
				}
			}
			else
			{
				$data['seller_id']			= getLoginId();
				$data['page_title'] 		= SELLER_SETTINGS_OTP_EMAIL_TITLE;
				$data['page_heading'] 		= SELLER_SETTINGS_OTP_EMAIL_HEADING;
				lv('seller-settings-otp',$data);
			}
		}
		else
		{
			redirect(SELLER_SETTINGS);
		}
	}
	
	
	
}
