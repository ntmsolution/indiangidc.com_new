<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{

	public function index()
	{
		removeAllSession();
		removeAllSession('buyer');
		if(isset($_SESSION['support_login']))
		{
			redirect(SUPPORT_PIN_INDEX);
		}
		redirect(HOME_INDEX);
	}
}
