<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {

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
		lva("view-plan",$data);
	}
	
	public function delete($id)
	{
		if(isset($id))
		{
			if(deleteById("seller_plan",$id))
			{
				setMsg("delete plan successfully.");
				redirect(ADMINFOLDER."Plan/view");
			}
		}
		else
		{
			$this->agent->referrer();
		}
	}
	
	public function add()
	{				
			
		$this->form_validation->set_rules("plan_name","plan name","required|alpha_numeric_spaces|max_length[30]");
		$this->form_validation->set_rules("plan_price","plan price","required|numeric");
		$this->form_validation->set_rules("plan_duration","plan duration","required|integer");
		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST["add_seller_plan"]))
			{
				$data_seller_plan["plan_name"]	 	=	$_POST["plan_name"];
				$data_seller_plan["plan_price"]	 	=	$_POST["plan_price"];
				$data_seller_plan["plan_duration"]	=	$_POST["plan_duration"];
								
				if(insert("seller_plan",$data_seller_plan))
				{
					setMsg(MSG_ADD_SELLER_PLAN_S1);
				}
				else
				{
					setMsg(MSG_ADD_SELLER_PLAN_E1,1);
				}
				redirect($this->agent->referrer());	
			}
		}
		else
		{
			$data["title"] = "Add Plan";
			lva("add-plan",$data);
		}
		
	}
	
	public function edit($id)
	{
		
		$this->form_validation->set_rules("plan_name","plan name","required|alpha_numeric_spaces|max_length[30]");
		$this->form_validation->set_rules("plan_price","plan price","required|numeric");
		$this->form_validation->set_rules("plan_duration","plan duration","required|integer");
		$this->form_validation->set_rules("real_duration","Real plan duration","required|integer");
		$this->form_validation->set_rules("line1","Line 1","required");
		$this->form_validation->set_rules("line2","Line 2","required");
		$this->form_validation->set_rules("line3","Line 3","required");
		$this->form_validation->set_rules("line4","Line 4","required");
		$this->form_validation->set_rules("line5","Line 5","required");
		$this->form_validation->set_rules("line6","Line 6","required");
		
		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST["update_seller_plan"]))
			{
				$data_seller_plan["plan_name"]	 	=	$_POST["plan_name"];
				$data_seller_plan["plan_price"]	 	=	$_POST["plan_price"];
				$data_seller_plan["plan_duration"]	=	$_POST["plan_duration"];
				$data_seller_plan["real_duration"]	=	$_POST["real_duration"];
				$data_seller_plan["line1"]			=	$_POST["line1"];
				$data_seller_plan["line2"]			=	$_POST["line2"];
				$data_seller_plan["line3"]			=	$_POST["line3"];
				$data_seller_plan["line4"]			=	$_POST["line4"];
				$data_seller_plan["line5"]			=	$_POST["line5"];
				$data_seller_plan["line6"]			=	$_POST["line6"];
				$data_seller_plan["line1_active"]	=   (isset($_POST['line1_active'])) ? "Y" : "";
				$data_seller_plan["line2_active"]	=   (isset($_POST['line2_active'])) ? "Y" : "";
				$data_seller_plan["line3_active"]	=   (isset($_POST['line3_active'])) ? "Y" : "";
				$data_seller_plan["line4_active"]	=   (isset($_POST['line4_active'])) ? "Y" : "";
				$data_seller_plan["line5_active"]	=   (isset($_POST['line5_active'])) ? "Y" : "";
				$data_seller_plan["line6_active"]	=   (isset($_POST['line6_active'])) ? "Y" : "";
				
					
				if(updateById("seller_plan",$data_seller_plan,$id))
				{
					setMsg(MSG_EDIT_SELLER_PLAN_S1);
				}
				else
				{
					setMsg(MSG_EDIT_SELLER_PLAN_E1,1);
				}
				redirect($this->agent->referrer());	
			}
		}
		else
		{
			$data["title"] = "Update Plan";
			$data["eid"]	= $id;
			lva("edit-plan",$data);
		}
		
	}
	
}
