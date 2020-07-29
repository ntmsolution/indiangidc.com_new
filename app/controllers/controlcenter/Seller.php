<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		afterLogin("admin",ADMINFOLDER."Login");
    }
	
	
	public function index()
	{
		$data["title"] 		= "View Users";
		lva("view-seller",$data);
	}
	
}
