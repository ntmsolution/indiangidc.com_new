<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		afterLogin("admin",ADMINFOLDER."Login");
    }
	
	public function index()
	{
		redirect(ADMINFOLDER."Settings/edit");
	}
		
	public function edit()
	{
		$data["title"] 	= "Update Settings";
		$this->load->view(ADMINFOLDER."edit-settings",$data);
		if(isset($_POST["edit"]))
		{
			unset($_POST["edit"]);
			if($_FILES['logo']['name'] != "")
			{
				$_POST['logo'] = fileUpload("logo","site-images/","site-images/".$_POST['logo']);
			}
			if($_FILES['favicon']['name'] != "")
			{
				$_POST['favicon'] = fileUpload("favicon","site-images/","site-images/".$_POST['favicon']);
			}
			if(updateById("settings",$_POST,1))
			{
				setMsg("Update settings successfully.");
				redirect($this->agent->referrer());
			}
		}
	}
	
}
