<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		afterLogin("admin",ADMINFOLDER."Login");
    }
	
	public function index()
	{
		$qry 						= 	"select sp.*, count(sp.product_name) as total_product from seller_product sp group by sp.subcategory_name order by count(sp.product_name) DESC";
		
		$total_rec 					= countRec($qry);
		$table_data 				= query($qry);
		$data['total_rec']			= $total_rec;
		$data['table_data']			= $table_data;
		$data["title"] 				= "View Product Statistics";
		lva("view-product",$data);
	}
	
	public function view($subcategory_id)
	{
		$qry 						= "select *from seller_product where subcategory_id = '$subcategory_id'";
		$total_rec 					= countRec($qry);
		$table_data 				= query($qry);
		$data['total_rec']			= $total_rec;
		$data['table_data']			= $table_data;
		$data["title"] 				= "View Product";
		lva("view-product-subcate",$data);
	}
	
	public function all()
	{
		$qry 						= "select *from seller_product";
		$total_rec 					= countRec($qry);
		$table_data 				= query($qry);
		$data['total_rec']			= $total_rec;
		$data['table_data']			= $table_data;
		$data["title"] 				= "View All Product";
		lva("view-product-all",$data);
	}
	
	public function details($product_id)
	{
		$data['row']				= getSellerProductById($product_id);
		$data["title"] 				= "View Product Details";
		lva("view-product-details",$data);
	}
	
	
}
