<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		afterLogin("admin",ADMINFOLDER."Login");
    }
	
	public function index()
	{
		redirect(ADMINFOLDER."Category/view");
	}
	
	public function view()
	{
		$data["title"] 		= "View Category";
		lva("view-category",$data);
	}
	
	public function delete($id)
	{
		if(isset($id))
		{
			if(deleteById("category",$id))
			{
				delete("category","parent_id = $id");
				delete("product","category_id = $id");
				setMsg("delete category successfully.");
				redirect(ADMINFOLDER."Category/view");
			}
		}
		else
		{
			$this->agent->referrer();
		}
	}
	
	public function add()
	{
		$data["title"] = "Add Category";
		lva("add-category",$data);
		
		if(isset($_POST["add"]))
		{
			unset($_POST["add"]);
			if($_FILES['category_image']['name'] != "")
			{
				$_POST['category_image'] = fileUpload("category_image","category-images/");
			}
			if(insert("category",$_POST))
			{
				setMsg("Add category successfully.");
				redirect($this->agent->referrer());
			}		
		}		
	}
	
	public function edit($id)
	{
		if(isset($id))
		{
			$data["title"] 	= "Update Category";
			$data["eid"]	= $id;
			lva("edit-category",$data);
			
			if(isset($_POST["edit"]))
			{
				unset($_POST["edit"]);
				if($_FILES['category_image']['name'] != "")
				{
					$_POST['category_image'] = fileUpload("category_image","category-images/",$_POST['category_image']);
				}
				if(updateById("category",$_POST,$id))
				{
					setMsg("Update category successfully.");
					redirect($this->agent->referrer());
				}
			}
		}
		else
		{
			redirect($this->agent->referrer());
		}
	}
	
}
