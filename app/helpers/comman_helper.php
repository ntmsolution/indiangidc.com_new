<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	
	if(!function_exists('sendEmail'))
	{
		function sendEmail($to_email,$subject,$message,$from_email="noreply@indiangidc.com")
		{
			//noreply@indiangidc.com pwd: SgtWg$TxB72^
			//support@indiangidc.com pwd: [L#E#yR630}k
			$ci 	= & get_instance();
			$config = array('mailtype' => 'html', 'charset'  => 'utf-8', 'priority' => '1');
			$ci->email->initialize($config);
			$ci->email->from($from_email, 'indiangidc.com');
			$ci->email->reply_to('support@indiangidc.com', 'indiangidc.com');
			$ci->email->to($to_email);
			$ci->email->subject($subject);
			$ci->email->message($message);
			$ci->email->send();
		}
	}
	
	if(!function_exists('passwordRand'))
	{

		function passwordRand($length=8)
		{
			$keyspace 	= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$str 		= '';
			$max 		= mb_strlen($keyspace, '8bit') - 1;
			
			for($i=0; $i<$length; $i++)
			{
				$str .= $keyspace[rand(0, $max)];
			}
			
			return $str;
		}
	}
	
	if(!function_exists('paging'))
	{
		function paging($total_row, $per_page,$url="",$tabs="",$float="right")
		{
			$config['base_url']          = base_url($url."/$tabs");
			$config['total_rows']        = $total_row;
			$config['per_page']          = $per_page;
			$config['full_tag_open']     = "<nav aria-label='navigation example' class='float-$float'><ul class='pagination p-b-10'>";
			$config['full_tag_close']    = '</ul></nav>';
			$config['num_tag_open']      = '<li class="page-item">';
			$config['num_tag_close']     = '</li>';
			$config['cur_tag_open']      = '<li class="active page-item"><a class="page-link" >';
			$config['cur_tag_close']     = '</a></li>';
			$config['prev_tag_open']     = '<li class="page-item">';
			$config['prev_tag_close']    = '</li>';
			$config['first_tag_open']    = '<li class="page-item">';
			$config['first_tag_close']   = '</li>';
			$config['last_tag_open']     = '<li class="page-item">';
			$config['last_tag_close']    = '</li>';
			$config['prev_link']         = '<i class="fa fa-angle-double-left"></i>';
			$config['prev_tag_open']     = '<li class="page-item">';
			$config['prev_tag_close']    = '</li>';
			$config['next_link']         = '<i class="fa fa-angle-double-right"></i>';
			$config['next_tag_open']     = '<li class="page-item">';
			$config['next_tag_close']    = '</li>';
			$config['attributes']        = array('class' => 'page-link');
			
			$ci 	= & get_instance();
			
			$ci->pagination->initialize($config);
			
			return $ci->pagination->create_links();
		}
	}
	
	if(!function_exists('fileUpload'))
	{
		function fileUpload($file_name,$path="",$delete="",$type='gif|jpg|png|jpeg')
		{
			$config['upload_path']		= "./assets/upload/$path";
			$config['allowed_types']    = $type;       
			$config['encrypt_name']     = true;   
			$ci 						= & get_instance();
			
			$ci->load->library('upload', $config);
			if($ci->upload->do_upload("$file_name",$config))
			{
				if($delete != "")
				{
					unlink("./assets/upload/$path".$delete);
				}
				return $ci->upload->data('file_name');
			}
			else
			{
				return false;
			}			
		}
	}
	
	if(!function_exists('resizeImage'))
	{
		function resizeImage($path_with_name="",$width=200,$height=200)
		{
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= "./assets/upload/$path_with_name";
			$config['width']         	= $width;
			$config['height']         	= $height;			
			$ci 						= & get_instance();
			
			$ci->load->library('image_lib', $config);
			$ci->image_lib->initialize($config);
			if (!$ci->image_lib->resize())
			{
				return false;
			}
			else
			{	
				return true;
			}
		}
	}
	
	if(!function_exists('getValue'))
	{
		function getValue($name,$data="")
		{
			$value = "";
			if(is_array($data))
			{
				if(isset($data[0]["$name"]))
				{
					$value = $data[0]["$name"];
				}
				else if(isset($data["$name"]))
				{
					$value = $data["$name"];
				}
			}			
			return $value;
		}
	}
	
	
	if(!function_exists('printOptionArray'))
	{
		function printOptionArray($name,$name_ary=0)
		{
			$name_ary 		= explode(", ",$name_ary);
			$ci 			= & get_instance();
			$data    		= "";
			$a        		= 1;
			if(empty($name_ary) || (isset($name_ary[0]) && ($name_ary[0] == "" || $name_ary[0] == 0)))
			{
				return "";
			}
			if(is_string($name))
			{
				$array = $ci->config->item("$name");
			}
			else
			{
				$array = $name;
			} 
			foreach($array as $v)
			{
				if(in_array($a ,$name_ary))
				{
					$data .= $v.", ";
				}
				$a++;
			}
			
			if(in_array(4444,$name_ary))
			{
				$data = "No, ";
			}
			else if(in_array(5555,$name_ary))
			{
				$data = "As per company, ";
			}
			return rtrim($data,", ");
		}
	}
	
	if(!function_exists('printOptionArrayMulti'))
	{
		function printOptionArrayMulti($name,$name_ary=0)
		{
			$ci 			= & get_instance();
			$name_ary 		= explode(", ",$name_ary);
			$data   	  	= "";
			$a    	    	= 1;
			
			if(empty($name_ary) || (isset($name_ary[0]) && ($name_ary[0] == "" || $name_ary[0] == 0)))
			{
				return "";
			}
			
			if(is_string($name))
			{
				$array = $ci->config->item("$name");
			}
			else
			{
				$array = $name;
			} 
			
			foreach($array as $v)
			{
				foreach($v as $v1)
				{
					if(in_array($a ,$name_ary))
					{
						$data .= $v1.", ";
					}
					$a++;
				}
			}
			return rtrim($data,", ");
		}
	}
	
	if(!function_exists('printOptionTable'))
	{
		
		function printOptionTable($tbnm,$ids=0,$field="name")
		{
			return $ids;
			$data 	= "";
			
			if($ids != "" && $ids != 0)
			{
				$ids = explode(", ",$ids);				
				foreach($ids as $id)
				{
					$tbdata 	 = selectFieldById("$tbnm","$field","$id");
					$data 		.= $tbdata["$field"].", ";					
				}
			}
			else
			{
				return "";
			}
			return rtrim($data, ", ");
		}
	}
	
	if(!function_exists('getOptionTable'))
	{
		function getOptionTable($table_name,$values="",$condition="",$field="name")
		{
			$data   = "";		
			$values = explode(", ",$values);
			$array = select("$table_name",$condition);
			foreach($array as $v)
			{
				$s = "";
				if(in_array($v["$field"],$values))
				{
					$s = "selected";
				}
				$data .= "<option $s value='".$v["$field"]."'>".$v["$field"]."</option>";
			}
			return $data;
		}
	}
	
	if(!function_exists('getOptionTableSearch'))
	{
		function getOptionTableSearch($table_name,$values=0,$condition="",$field="name")
		{
			$data   = "";		
			$values = explode(", ",$values);
			$array = select("$table_name",$condition);
			foreach($array as $v)
			{
				$s = "";
				if(in_array($v["id"],$values))
				{
					$s = "selected";
				}
				$data .= "<option $s value='".$table_name."-".$v["id"]."'>".$v["$field"]."</option>";
			}
			return $data;
		}
	}
	
	if(!function_exists("getOptionArrayMulti"))
	{
		function getOptionArrayMulti($name,$values=0)
		{
			$ci 	= & get_instance();
			$data   = "";
			$values = explode(", ",$values);
			$a      = 1;
			
			if(is_string($name))
			{
				$array = $ci->config->item("$name");
			}
			else
			{
				$array = $name;
			}
			foreach($array as $k=>$v1)
			{
				$data .= "<optgroup class='mediumtxt' label='$k'>";
				foreach($v1 as $v)
				{
					$s = "";
					if(in_array($a,$values))
					{
						$s = "selected";
					}
					$data .= "<option $s value='$a'>$v</option>";
					$a++;
				}
				$data .= "</optgroup>";
			}
			return $data;
		}
	}
	
	if(!function_exists('getOptionArray'))
	{
	
		function getOptionArray($name,$values=0)
		{
			$data   = "";
			$ci 	= & get_instance();
			$values = explode(", ",$values);
			$a      = 1;
			
			if(is_string($name))
			{
				$array = $ci->config->item("$name");
			}
			else
			{
				$array = $name;
			}
			foreach($array as $v)
			{
				$s = "";
				if(in_array($a,$values))
				{
					$s = "selected";
				}
				$data .= "<option $s value='$a'>$v</option>";
				$a++;
			}
			return $data;
		}
	}
	
	if(!function_exists('getOptionArrayName'))
	{
	
		function getOptionArrayName($name,$values=0)
		{
			$data   = "";
			$ci 	= & get_instance();
			$values = explode(", ",$values);
			
			if(is_string($name))
			{
				$array = $ci->config->item("$name");
			}
			else
			{
				$array = $name;
			}
			foreach($array as $v)
			{
				$s = "";
				if(in_array($v,$values))
				{
					$s = "selected";
				}
				$data .= "<option $s value='$v'>$v</option>";
				
			}
			return $data;
		}
	}
	
	if(!function_exists('getChecked'))
	{
		function getChecked($v1,$v2)
		{
			if($v1 == $v2)
			{
				echo "checked";
			}
		}
	}
	
	if(!function_exists('getSelected'))
	{
		function getSelected($v1,$v2)
		{
			if($v1 == $v2)
			{
				echo "selected";
			}
		}
	}
	
	if(!function_exists('dateConvert'))
	{
		function dateConvert($date,$sparator="-",$rc="-")
		{
			if($date != "")
			{
				$dob = explode("$sparator",$date);
				return $dob[2]."$rc".$dob[1]."$rc".$dob[0];				
			}			
		}
	}
	
	if(!function_exists('dateTimeConvert'))
	{
		function dateTimeConvert($date,$sparator="-",$rc="-")
		{
			if($date != "")
			{
				$dob 	= explode("$sparator",$date);
				$time 	= explode(" ",$dob[2]);
				return $time[0]."$rc".$dob[1]."$rc".$dob[0]." ".$time[1];				
			}			
		}
	}
	
	if(!function_exists('arrayToString'))
	{
		function arrayToString($data,$sparator=", ")
		{
			$rdata = array();
			foreach($data as $k=>$v)
			{
				if(is_array($v))
				{
					$rdata["$k"] = implode(", ",$v);
				}
				else
				{
					$rdata["$k"] = $v;
				}
			}
			
			return $rdata;
		}
	}
	
	
	if(!function_exists('salaryConvert'))
	{
		function salaryConvert($lac,$thosand,$format=true)
		{
			$lac = str_replace(" Lcas","",$lac);
			$lac =  (int)str_replace(" Lac","",$lac)."00000";
			$thosand = str_replace(" Thousands","",$thosand);
			$thosand =  (int)str_replace(" Thousand","",$thosand)."000";
			
			$value = ($lac + $thosand);
			if($format)
			{
				$value = number_format($value);			
			}
			return $value;
		}
	}
	
	if(!function_exists('stringRang'))
	{
		function stringRang($str,$no)
		{
			
			if(strlen($str) >= $no)
			{
				$str = substr($str,0,$no)."...";
			}
			
			return $str;
		}
	}
	
	if(!function_exists('singleComa'))
	{
		function singleComa($str,$sptr=", ")
		{
			$data = "";
			$array = explode($sptr,$str);
			foreach($array as $val){
				if($val != "")
				{
					$data .= "'$val', ";					
				}
			}
			return rtrim($data, ", ");
		}
	}
	
	
	if(!function_exists('likeCondition'))
	{
		function likeCondition($str,$field_name,$qry_sptr="||",$sptr=", ")
		{
			$data 	= "";
			$array = explode($sptr,$str);
			foreach($array as $val){
				if($val != "")
				{
					$data .= " ($field_name like '%$val%') $qry_sptr ";					
				}
			}
			return rtrim($data, " $qry_sptr ");
		}
	}
	
	
	if(!function_exists('yearDiffrance'))
	{
	
		function yearDiffrance($endDate, $beginDate)
		{
		   $date_parts1 = explode("-", $beginDate);
		   $date_parts2 = explode("-", $endDate);
		   $start_date = gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
		   $end_date = gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
		   $diff = abs($end_date - $start_date);
		   //$years = floor($diff / 365.25);
		   $years = floor($diff / 364);
		   return $years;
		}
	}
	
	if(!function_exists('seoUrl'))
	{
	
		function seourl($value)
		{
			$value = strtolower($value);
			$value = str_replace(" ","-",$value);
			$removechar = array("?","/","{","}","|","(",")","!",",",":",".","&");
			
			foreach($removechar as $v){
				$value = str_replace($v,"",$value);	
			}
			$value = preg_replace('/-+/', '-', $value);
			
			return $value;
		}
	}
	
	if(!function_exists('isBlankMultiArray'))
	{
		function isBlankMultiArray($data)
		{
			
			foreach($data as $key=>$val)
			{
				if(!is_array($val[0]))
				{
					return true;
				}
				
				foreach($val[0] as $k=>$v)
				{
					$v = trim($v," ");
					if($v == "")
					{
						return true;
					}
				}
			}
			return false;
		}
	}
	
	if(!function_exists('getBlankValue'))
	{
		function getBlankValue($data)
		{
			
			foreach($data as $key=>$val)
			{
				if(!is_array($val[0]))
				{
					return ucfirst(str_replace("_"," ",$key));
				}
				foreach($val[0] as $k=>$v)
				{
					
					$v = trim($v," ");
					if($v == "")
					{
						return ucfirst(str_replace("_"," ",$k));
					}
				}
			}
			return false;
		}
	}
	
	
	if(!function_exists('xssClean'))
	{	
		function xssClean($all_data)
		{
			$return_array = array();
			
			if(is_array($all_data))
			{
				foreach($all_data as $k=>$data)
				{
					// Fix &entity\n;
					$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
					$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
					$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
					$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

					// Remove any attribute starting with "on" or xmlns
					$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

					// Remove javascript: and vbscript: protocols
					$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
					$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
					$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

					// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
					$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
					$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
					$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

					// Remove namespaced elements (we do not need them)
					$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

					do
					{
						// Remove really unwanted tags
						$old_data = $data;
						$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
					}
					while($old_data !== $data);
					
					$return_array["$k"] = addslashes($data);
				}
				
				return $return_array;
				
			}
			else
			{
				$data = $all_data;
				
				// Fix &entity\n;
				$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
				$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
				$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
				$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

				// Remove any attribute starting with "on" or xmlns
				$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

				// Remove javascript: and vbscript: protocols
				$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
				$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
				$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

				// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
				$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
				$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
				$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

				// Remove namespaced elements (we do not need them)
				$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

				do
				{
					// Remove really unwanted tags
					$old_data = $data;
					$data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
				}
				while($old_data !== $data);
				
				return addslashes($data);
			}
		}
	}
	
	if(!function_exists('getClass'))
	{
		function getClass()
		{
			$ci = & get_instance();
			return $ci->router->fetch_class();
		}
	}
	
	if(!function_exists('getMethod'))
	{
		function getMethod()
		{
			$ci = & get_instance();
			return $ci->router->fetch_method();
		}
	}
	
	
	if(!function_exists('getClassMethod'))
	{
		function getClassMethod()
		{
		$ci = & get_instance();
		return $ci->router->fetch_class()."-".$ci->router->fetch_method();
		}
	}
	
	if(!function_exists('lv'))
	{
		function lv($view,$data=array())
		{
			$ci = & get_instance();	
			$ci->load->view("$view",$data);
		}
	}
	
	if(!function_exists('lvi'))
	{
		function lvi($view,$data=array())
		{
			$ci = & get_instance();	
			$ci->load->view("include/$view",$data);
		}
	}
	
	if(!function_exists('lva'))
	{
		function lva($view,$data=array())
		{
			$ci = & get_instance();	
			$ci->load->view(ADMINFOLDER."/$view",$data);
		}
	}
	
	if(!function_exists('lvai'))
	{
		function lvai($view,$data=array())
		{
			$ci = & get_instance();	
			$ci->load->view(ADMINFOLDER."include/$view",$data);
		}
	}
	
	if(!function_exists('getIP'))
	{
		function getIP()
		{
			$ci = & get_instance();	
			return $ci->input->ip_address();
		}
	}
	
	if(!function_exists('generateOTP'))
	{

		function generateOTP($length=6)
		{
			$keyspace 	= '0123456789';
			$str 		= '';
			$max 		= mb_strlen($keyspace, '8bit') - 1;
			
			for($i=0; $i<$length; $i++)
			{
				$str .= $keyspace[rand(0, $max)];
			}
			
			return $str;
		}
	}
	
	if(!function_exists('sendOTP'))
	{
		function sendOTP($mobno,$message)
		{
			// Account details
			$apiKey = urlencode('QlJuFAd/gVk-nSKUyXgtjuyfoEdqRPrJv6bZCLvM54');
			
			// Message details
			$numbers = $mobno;
			$sender	 = urlencode('ingidc');
			$message = rawurlencode($message);
			
			// Prepare data for POST request
			$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
		 
			// Send the POST request with cURL
			$ch = curl_init('https://api.textlocal.in/send/');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);			
			// Process your response here
			return $response; 
			
			
		}
	}
	
	if(!function_exists('getCaptchaImage'))
	{
		function getCaptchaImage()
		{
			$ci = & get_instance();	
			$ci->load->helper('captcha');
			$config = array(
							'img_path'      => 'assets/captcha_images/',
							'img_url'       => base_url().'assets/captcha_images/',
							'img_width'     => '200',
							'img_height'    => 50,
							'font_path'     => './assets/fonts/verdana.ttf',
							'word_length'   => 5,
							'font_size'     => 20,
							'expiration' 	=> 7200
						);
			$captcha 	= create_captcha($config);
			
			// Unset previous captcha and store new captcha word
			$ci->session->unset_userdata('captchaCode');
			$ci->session->set_userdata('captchaCode',$captcha['word']);
			
			return $captcha['image'];
		}
	}
	
	if(!function_exists('getCaptchaCode'))
	{
		function getCaptchaCode()
		{
			$ci = & get_instance();	
			return $ci->session->userdata('captchaCode');
		}
	}
	
	if(!function_exists('redirectStep'))
	{
		function redirectStep($step="")
		{
			if(getLoginId())
			{				
				$sr = selectById("registration",getLoginId());
				
			
				if($sr['current_step'] == 1)
				{
					if(getMethod() != "otp")
					{						
						redirect(REGISTRATION_OTP);
					}
				}
				else if($sr['current_step'] == 2)
				{
					if(getMethod() != "step2")
					{	
						redirect(REGISTRATION_STEP2);
					}
				}
				else if($sr['current_step'] == 3)
				{
					if(getMethod() != "step3")
					{	
						redirect(REGISTRATION_STEP3);
					}
				}
				else if($sr['current_step'] == 4)
				{
					if(getMethod() != "step4")
					{						
						redirect(REGISTRATION_STEP4);
					}
				}
				else if($sr['current_step'] == 5)
				{
					$seller_id = getLoginId();
					
					$sm = select("seller_membership","seller_id = '$seller_id' order by id DESC");
					if(count($sm) == 0)
					{
						if(getClass() != "Upgrade")
						{						
							redirect(UPGRADE);
						}					
					}
					else if(strtotime($sm[0]['expire_date']) < (time()+86400))
					{
						if(getClass() != "Upgrade")
						{		
							setMsg("your membership is expire upgrade your membership",1);
							redirect(UPGRADE);
						}
					}
					else
					{
						if(getClass() != "Seller")
						{						
							redirect(SELLER_COMPANYPROFILE);
						}
					}
				}
				
			}
			else
			{
				if(getClass() == "Registration" && getMethod() == "step1")
				{
					
				}else if(getClass() != "Home")
				{
					redirect(HOME_INDEX);
				}
			}
		}
	}
	