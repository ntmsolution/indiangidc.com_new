<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	
	if(!function_exists('getAdmin'))
	{
		function getAdmin($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("admin",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getAdminById'))
	{
		function getAdminById($id)
		{
			return selectById("admin",$id);
		}
	}
	
	if(!function_exists('getAnuualTurnover'))
	{
		function getAnuualTurnover($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("anuual_turnover",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getAnuualTurnoverById'))
	{
		function getAnuualTurnoverById($id)
		{
			return selectById("anuual_turnover",$id);
		}
	}
	
	if(!function_exists('getBuyRequest'))
	{
		function getBuyRequest($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("buy_request",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getBuyRequestById'))
	{
		function getBuyRequestById($id)
		{
			return selectById("buy_request",$id);
		}
	}
	
	if(!function_exists('getCategory'))
	{
		function getCategory($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("category",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getCategoryById'))
	{
		function getCategoryById($id)
		{
			return selectById("category",$id);
		}
	}
	
	if(!function_exists('getCity'))
	{
		function getCity($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("city",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getCityById'))
	{
		function getCityById($id)
		{
			return selectById("city",$id);
		}
	}
	
	if(!function_exists('getLeadBuy'))
	{
		function getLeadBuy($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("lead_buy",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getLeadBuyById'))
	{
		function getLeadBuyById($id)
		{
			return selectById("lead_buy",$id);
		}
	}
	
	if(!function_exists('getNumberOfEmployee'))
	{
		function getNumberOfEmployee($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("number_of_employee",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getNumberOfEmployeeById'))
	{
		function getNumberOfEmployeeById($id)
		{
			return selectById("number_of_employee",$id);
		}
	}
	
	if(!function_exists('getOwnershipType'))
	{
		function getOwnershipType($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("ownership_type",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getOwnershipTypeById'))
	{
		function getOwnershipTypeById($id)
		{
			return selectById("ownership_type",$id);
		}
	}
	
	if(!function_exists('getPrimaryBusinessType'))
	{
		function getPrimaryBusinessType($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("primary_business_type",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getPrimaryBusinessTypeById'))
	{
		function getPrimaryBusinessTypeById($id)
		{
			return selectById("primary_business_type",$id);
		}
	}
	
	if(!function_exists('getRegistration'))
	{
		function getRegistration($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("registration",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getRegistrationById'))
	{
		function getRegistrationById($id)
		{
			return selectById("registration",$id);
		}
	}
	
	if(!function_exists('getSecondaryBusiness'))
	{
		function getSecondaryBusiness($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("secondary_business",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getSecondaryBusinessById'))
	{
		function getSecondaryBusinessById($id)
		{
			return selectById("secondary_business",$id);
		}
	}
	
	if(!function_exists('getSellerAdditionalContact'))
	{
		function getSellerAdditionalContact($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("seller_additional_contact",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getSellerAdditionalContactById'))
	{
		function getSellerAdditionalContactById($id)
		{
			return selectById("seller_additional_contact",$id);
		}
	}
	
	if(!function_exists('getSellerBankInfo'))
	{
		function getSellerBankInfo($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("seller_bank_info",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getSellerBankInfoById'))
	{
		function getSellerBankInfoById($id)
		{
			return selectById("seller_bank_info",$id);
		}
	}
	
	if(!function_exists('getSellerBusinessProfile'))
	{
		function getSellerBusinessProfile($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("seller_business_profile",$condition,$order_by,$pno,$per_page,$field);
		}
	}

	
	if(!function_exists('getSellerBusinessProfileById'))
	{
		function getSellerBusinessProfileById($id)
		{
			return selectById("seller_business_profile",$id);
		}
	}
	
	if(!function_exists('getSellerProduct'))
	{
		function getSellerProduct($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("seller_product",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getSellerProductById'))
	{
		function getSellerProductById($id)
		{
			return selectById("seller_product",$id);
		}
	}
	
	if(!function_exists('getSellerProductAttributes'))
	{
		function getSellerProductAttributes($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("seller_product_attributes",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getSellerProductAttributesById'))
	{
		function getSellerProductAttributesById($id)
		{
			return selectById("seller_product_attributes",$id);
		}
	}
	
	if(!function_exists('getSellerProfile'))
	{
		function getSellerProfile($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("seller_profile",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getSellerProfileById'))
	{
		function getSellerProfileById($id)
		{
			return selectById("seller_profile",$id);
		}
	}
	
	if(!function_exists('getSellerStatutory'))
	{
		function getSellerStatutory($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("seller_statutory",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getSellerStatutoryById'))
	{
		function getSellerStatutoryById($id)
		{
			return selectById("seller_statutory",$id);
		}
	}
	

	
	if(!function_exists('getState'))
	{
		function getState($condition="",$order_by="",$pno="",$per_page="",$field="*")
		{
			return select("state",$condition,$order_by,$pno,$per_page,$field);
		}
	}
	
	if(!function_exists('getStateById'))
	{
		function getStateById($id)
		{
			return selectById("state",$id);
		}
	}
		
	//Page wise function 
	
	if(!function_exists('homeSearch'))
	{
		function homeSearch()
		{
			$qry 			= "SELECT sp.*, sbp.catalog_url,sbp.brochure FROM seller_product sp
													left join seller_business_profile sbp
													on sp.seller_id = sbp.seller_id
													order by category_id ";
			return query($qry);
		}
	}
	
	if(!function_exists('homeSearchCategoryProduct'))
	{
		function homeSearchCategoryProduct($product_name,$category_name)
		{
			$qry 	= "SELECT sp.*, sbp.catalog_url,sbp.brochure FROM seller_product sp 
													left join seller_business_profile sbp
													on sp.seller_id = sbp.seller_id
													where product_name like '%$product_name%'
													&& category_name = '$category_name'
													order by category_id ";
			return query($qry);
		}
	}
	
	if(!function_exists('homeSearchProduct'))
	{
		function homeSearchProduct($product_name)
		{
			$qry 	= "SELECT sp.*, sbp.catalog_url,sbp.brochure FROM seller_product sp 
													left join seller_business_profile sbp
													on sp.seller_id = sbp.seller_id
													where product_name like '%$product_name%'
													order by category_id ";
			return query($qry);
		}
	}
	
	if(!function_exists('homeProductAttribute'))
	{
		function homeProductAttribute($product_id)
		{
			return select("seller_product_attributes","product_id = '$product_id' Limit 4");
		}
	}
	
	if(!function_exists('moreProduct'))
	{
		function moreProduct($seller_id,$subcategory_id)
		{
			$qry 			= "SELECT sp.*, sbp.catalog_url,sbp.brochure FROM seller_product sp 
												left join seller_business_profile sbp
												on sp.seller_id = sbp.seller_id
												where sp.seller_id  = '$seller_id' && sp.subcategory_id = '$subcategory_id'";
			return query($qry);
		}
	}
	
	if(!function_exists('getSettings'))
	{
		function getSettings()
		{
			return selectById("settings",1);
		}
	}
	
	
	