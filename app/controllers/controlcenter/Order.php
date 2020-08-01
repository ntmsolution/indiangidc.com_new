<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		afterLogin("admin",ADMINFOLDER."Login");
    }
	
	public function index()
	{
		redirect(ADMINFOLDER."Plan/view");
	}
	
	public function view()
	{
		
		$data["title"] 		= "View Plan";
		lva("view-order",$data);
	}
	
	
	
}
