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
		if($this->form_validation->run() == TRUE)
		{
			if(isset($_POST["update_seller_plan"]))
			{
				$data_seller_plan["plan_name"]	 	=	$_POST["plan_name"];
				$data_seller_plan["plan_price"]	 	=	$_POST["plan_price"];
				$data_seller_plan["plan_duration"]	=	$_POST["plan_duration"];
					
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
