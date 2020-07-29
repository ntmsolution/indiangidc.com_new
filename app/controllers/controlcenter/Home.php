<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		afterLogin("admin",ADMINFOLDER."Login");
    }
	
	public function index()
	{
		$data["title"] = "Dashboard";
		$this->load->view(ADMINFOLDER."home",$data);
	}
	
	public function changepassword()
	{
		$data["title"] = "Change Password";
		$this->load->view(ADMINFOLDER."change-password",$data);
		if(isset($_POST["change_password"]))
		{
			extract($_POST);
			$admin_id 	= getLoginId("admin");
			$admin 		= selectById("admin",$admin_id);			
			if($admin['password'] == $opassword)
			{
				if($password == $cpassword)
				{
					updateById("admin",array("password"=>$password,"username"=>$username),$admin_id);
					setMsg("Password updated successfully.");
				}
				else
				{
					setMsg("Your old password not matched.",1);
				}
			}
			else
			{
				setMsg("Your old password not matched.",1);
			}
			redirect(ADMINFOLDER."Home/changepassword");
		}
	}
	
	public function logout()
	{
		setMsg("Logout successfully.");
		removeAllSession("admin");
		redirect(ADMINFOLDER."Login/index");
	}
	
}
