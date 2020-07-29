<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
	if(!function_exists('setSession'))
	{
		function setSession($name,$value,$group="user")
		{
			if(session_id() == '')
			{
				session_start();
			}
			$_SESSION["$group"][$name] = $value;
		}
	}
	
	if(!function_exists('getSession'))
	{
		function getSession($name,$group="user")
		{
			
			if(session_id() == '')
			{
				session_start();
			}
			
			if(isset($_SESSION["$group"][$name]))
			{
				return $_SESSION["$group"][$name];
			}
			else
			{
				return false;
			}			
		}
	}
	
	if(!function_exists('removeSession'))
	{
		function removeSession($name,$group="user")
		{
			if(session_id() == '')
			{
				session_start();
			}
			if(isset($_SESSION["$group"][$name]))
			{
				unset($_SESSION["$group"][$name]);
			}
		}
	}
	
	if(!function_exists('removeAllSession'))
	{
		function removeAllSession($group="user")
		{
			if(session_id() == '')
			{
				session_start();
			}
			if(isset($_SESSION["$group"]))
			{
				unset($_SESSION["$group"]);
			}
		}
	}
	
	
	if(!function_exists('setMsg'))
	{
		function setMsg($msg,$error_type=0,$title="Success")
		{
			if(session_id() == '')
			{
				session_start();
			}
			
			if($error_type == 0)
			{
				//$_SESSION['msg'] = "<script> swal('$title', '$msg', 'success'); </script>";
				
				$_SESSION['msg'] = "<script> $.toaster({ priority : 'success', title : '$title', message : '$msg'}); </script>";
			}
			else
			{
				$title="Error";
				//$_SESSION['msg'] = "<script> swal('$title', '$msg', 'error'); </script>";
				$_SESSION['msg'] = "<script> $.toaster({ priority : 'danger', title : '$title', message : '$msg'}); </script>";
			}
		}
	}
	
	if(!function_exists('getMsg'))
	{
		function getMsg()
		{
			$msg = "";
			if(session_id() == '')
			{
				session_start();
			}
			
			if(isset($_SESSION["msg"]))
			{
				$msg = $_SESSION["msg"];
				unset($_SESSION["msg"]);				
			}
			return $msg;
		}
	}	
	
	
	if(!function_exists('setRequiredField'))
	{
		function setRequiredField($name,$type="text",$group='user')
		{
			if(session_id() == '')
			{
				session_start();
			}
			
			$_SESSION["$group"]["required"]["$type"][] = $name;			
		}
	}
	
	if(!function_exists('getRequiredField'))
	{
		function getRequiredField($group='user')
		{
			if(session_id() == '')
			{
				session_start();
			}
			$required = $_SESSION["$group"]["required"];
			unset($_SESSION["$group"]["required"]);
			return $required;
		}
	}
	
	
	if(!function_exists('setValidation'))
	{
		function setValidation($data,$group='user')
		{
			
			if(session_id() == '')
			{
				session_start();
			}
			
			$required 	= getRequiredField($group);
			$flag 		= true;
			foreach($data as $k=>$v)
			{
				if(in_array($k,$required["text"]))
				{
					if(str_replace(' ', '', $v) == "")
					{
						$flag	 							= false;
						$name 								= ucfirst(str_replace("_"," ",$k));
						$_SESSION["$group"]["error"]["$k"] 	= "<div style='color:red;width:100%;'>$name is required.</div>";
					}
				}
			}
			
			return $flag;
		}
	}
	
	if(!function_exists('getValidationError'))
	{
		function getValidationError($name,$group='user')
		{
			$msg = "";
			if(session_id() == '')
			{
				session_start();
			}
			
			if(isset($_SESSION["$group"]["error"]["$name"]))
			{
				$msg = $_SESSION["$group"]["error"]["$name"];
				unset($_SESSION["$group"]["error"]["$name"]);
			}
			return $msg;
		}
	}
	
	
	if(!function_exists('setLoginId'))
	{
		
		function setLoginId($id,$group='user')
		{
			$name_id = $group."_id";
			$_SESSION["$group"]["$name_id"] = $id;
		}
	}
	
	if(!function_exists('getLoginId'))
	{
		
		function getLoginId($group='user')
		{
			$name_id = $group."_id";
			if(isset($_SESSION["$group"]["$name_id"]))
			{
				return $_SESSION["$group"]["$name_id"];				
			}
			else
			{
				return false;
			}
		}
	}
	
	if(!function_exists('afterLogin'))
	{
		function afterLogin($group='user',$redirect="Login",$msg="Login First.")
		{
			$name_id = $group."_id";
			if(!isset($_SESSION["$group"]["$name_id"]))
			{
				setMsg("$msg",1);
				redirect("$redirect");
			}
		}
	}
	
	if(!function_exists('beforeLogin'))
	{
		function beforeLogin($group='user',$redirect="Home",$msg="Already Login.")
		{
			$name_id = $group."_id";
			if(isset($_SESSION["$group"]["$name_id"]))
			{
				setMsg("$msg",1);
				redirect("$redirect");
			}
		}
	}
	
	
	
	