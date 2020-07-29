<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{

	function __construct()
	{
        parent::__construct();
		beforeLogin("admin",ADMINFOLDER."Home");
    }
	
	public function index()
	{
		$data["title"] 	= "Admin Login"; 
		$this->load->view(ADMINFOLDER.'login',$data);
	}
	
	public function check()
	{
		if(isset($_POST["login"]))
		{			
			$data = xssClean($_POST);
			$admin = select("admin","username = '$data[username]' && password = '$data[password]'");
			if(count($admin) == 1)
			{
				list($admin) = $admin;
				if(isset($_POST["remember"]))
				{
					$this->input->set_cookie("username",$data['username'],(time()+(86400*7)));
					$this->input->set_cookie("password",$data['password'],(time()+(86400*7)));
				}
				setLoginId($admin['id'],"admin");
				setMsg("Login successfully");
				redirect(ADMINFOLDER."Home/index");
			}
			else
			{
				setMsg("Username or password is wrong",1);
				redirect(ADMINFOLDER."Login");
			}
		}
		else
		{
			redirect(ADMINFOLDER."Login/index");
		}
	}
	
	
}
