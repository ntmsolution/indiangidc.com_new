<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
			
	if(!function_exists('select'))
	{
		function select($table_name,$condition="",$order_by="",$pno="",$per_page="",$field_name="*")
		{
			$ci 		= & get_instance();
			$order_by 	= str_replace("order by","",$order_by);
			
			$ci->db->select($field_name);
			
			if($order_by != "")
			{
				$ci->db->order_by($order_by);
			}
			
			if($condition != "")
			{
				$ci->db->where($condition);
			}	

			if($pno != "" && $per_page != "")
			{
				$ci->db->limit($per_page,$pno);
			}
			
			return $ci->db->get($table_name)->result_array();
			
		}
	}
	
	
	if(!function_exists('selectById'))
	{
		function selectById($table_name,$id,$field_name="*")
		{
			$ci 	= & get_instance();
			$ci->db->select($field_name);
			return $ci->db->get_where($table_name,"id = $id")->row_array();
		}   
	}	
	
	if(!function_exists('insert'))
	{
		function insert($table_name,$data)
		{
			$ci 	= & get_instance();
			$ci->db->insert("$table_name",$data);
			return $ci->db->insert_id();
		}   
	}
	
	if(!function_exists('update'))
	{
		function update($table_name,$data,$condition="")
		{
			$ci 	= & get_instance();
			if($condition == "")
			{
				return $ci->db->update($table_name, $data);
			}
			else
			{
				return $ci->db->update($table_name, $data, $condition);				
			}
			
		}   
	}
	
	if(!function_exists('updateById'))
	{
		function updateById($table_name,$data,$id)
		{
			$ci 	= & get_instance();
			return $ci->db->update($table_name, $data, "id = $id");
		}   
	}
	
	if(!function_exists('deleteById'))
	{
		function deleteById($table_name,$id)
		{			
			$ci 	= & get_instance();
			return $ci->db->delete($table_name, array('id' => $id));
		}   
	}
	
	if(!function_exists('delete'))
	{
		function delete($table_name,$condition="")
		{	
			$ci 	= & get_instance();
			if($condition == "")
			{
				return $ci->db->truncate($table_name);
			}
			else
			{
				return $ci->db->delete($table_name, $condition);				
			}
		}   
	}
	
	if(!function_exists('query'))
	{
		function query($qry)
		{
			$ci 	= & get_instance();
			return $ci->db->query($qry)->result_array();
		}
	}
	
	if(!function_exists('countRec'))
	{
		function countRec($table_name,$condition="")
		{
			
			if($condition != "")
			{
				$condition = " where ".$condition;
			}
					
			$table_name 	= strtolower($table_name);
			if(strpos($table_name, "limit"))
			{
				$table_name 	= substr($table_name, 0, strpos($table_name, "limit"));				
			}
			if(strpos($table_name, "from"))
			{
				$table_name 	= strstr($table_name,"from");
				$table_name 	= ltrim($table_name,"from");				
			}
			
			$qry 	= "select count(*) as total_rec from $table_name $condition";
			
			$ci 	= & get_instance();
			$row 	=  $ci->db->query($qry)->row_array();
			
			return $row["total_rec"];
		}
	}
	
	if(!function_exists('countNumRow'))
	{
		function countNumRow($table_name,$condition="")
		{
			if($condition != "")
			{
				$condition = " where ".$condition;
			}
				
			$table_name 	= strtolower($table_name);
			if(strpos($table_name, "limit"))
			{
				$table_name 	= substr($table_name, 0, strpos($table_name, "limit"));				
			}
			if(strpos($table_name, "from"))
			{
				$table_name 	= strstr($table_name,"from");
				$table_name 	= ltrim($table_name,"from");				
			}
			
			$qry 	= "select *from $table_name $condition";
			$ci 	= & get_instance();
			$row 	=  $ci->db->query($qry)->num_rows();
			
			return $row;
		}
	}