<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Static_pages extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function about()
	{
		$data['page_title'] 	= ABOUT_TITLE;
		$data['page_heading'] 	= ABOUT_HEADING;
		lv('about-us',$data);
	}
	
	public function contact()
	{
		$data['page_title'] 	= CONTACT_TITLE;
		$data['page_heading'] 	= CONTACT_HEADING;
		lv('contact-us',$data);
	}
	
	public function privacy()
	{
		$data['page_title'] 	= PRIVACY_TITLE;
		$data['page_heading'] 	= PRIVACY_HEADING;
		lv('privacy-policy',$data);
	}
	
	public function refund()
	{
		$data['page_title'] 	= REFUND_TITLE;
		$data['page_heading'] 	= REFUND_HEADING;
		lv('refund-policy',$data);
	}
	
	public function term()
	{
		$data['page_title'] 	= TERM_TITLE;
		$data['page_heading'] 	= TERM_HEADING;
		lv('terms-of-services',$data);
	}
	
	public function price()
	{
		$data['page_title'] 	= PRICE_TITLE;
		$data['page_heading'] 	= PRICE_HEADING;
		lv('price',$data);
	}
	
}

