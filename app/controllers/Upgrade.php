<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upgrade extends CI_Controller
{
	public function index()
	{
		$data['page_title'] 	= UPGRADE_INDEX_TITLE;
		$data['page_heading'] 	= UPGRADE_INDEX_HEADING;
		lv('seller-membership',$data);
	}
	
}
