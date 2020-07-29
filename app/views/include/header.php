<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <?php
	        if((getClass() == "Home" || getMethod() == "index"))
		    {
		?>    
		        <title>Biggest Market Place for Indian Exporters, Manufacturers Directory</title>
		<?php
		    }
		    else
		    {
		?>
		        <title><?php echo $page_title."".DEFAULT_TITLE; ?></title>
		<?php
		    }
		?>
		        
		<?php lvi("css"); ?>
		<?php lvi("js"); ?>
		<?php 
			$meta_keywords 		= "";
			$meta_description	= "";
			if(getMethod() == 'productDetails')
			{
				if(isset($sp['meta_keywords']))
				{
					$meta_keywords 		= $sp['meta_keywords'];
				} 		
				
				if(isset($sp['meta_description']))
				{
					$meta_description 	= $sp['meta_description'];
				}
			}
			if((getClass() == "Home" || getMethod() == "index"))
			{
			    $meta_keywords 		= "B2B Market Place, Indian exporter data, Indian manufacturer data, Indian manufacturer directory, Indian exporter directory, Premium exporter Directory";
			    $meta_description 	= "Indian GIDC is a largest B2B Portal of manufacturer exporters suppliers and importer.";
			}
		?>
			<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			<meta name="keywords" content="<?php echo $meta_keywords; ?>">
			<meta name="description" content="<?php echo $meta_description; ?>">
	</head>
	<body>
		<?php echo getMsg(); ?>
		<div class="main">
			<div class="header">
				<div class="logoarea">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<h2 class="logo"><a href="<?php echo base_url("/"); ?>">indiangidc.com</a></h2>
							</div>
							<div class="col-md-6">
								<div class="rightpart">
									<?php lvi('menu'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php 
					$class_inner = "";
					if(getClass() != "Home" || getMethod() == "productDetails")
					{
						$class_inner = "inner";
					}
				?>	
					
				<?php 
					if(getClass() != "Category" && (getClass() != "Home" || getMethod() == "productDetails"))
					{
				?>
						<div class="searcharea search-heading">
							<div class="container">
								<div class="text-center heading">
									<h2><?php echo $page_heading; ?></h2>
								</div>
							</div>
						</div>
						
				<?php
					}
					else
					{
						//$attributes = array('id' => 'search_form', 'method'=>'post');
						//echo form_open(HOME_INDEX,$attributes);
				?>
					<form method="post" action="<?php echo base_url(HOME_INDEX); ?>" id='search_form'>
						<div class="searcharea <?php echo $class_inner ?>">
							<div class="container">
								<div class="text-center">
									<h2>Search for products & find verified sellers near you</h2>
								</div>
								<div class="row justify-content-md-center">
									<div class="col-md-8">
										<select class="search-category select" id="category_name" name="category_name" >
											<option value="">- Category -</option>
											<?php  
												$city_data = query('select category_name from seller_product group by category_name');
												foreach($city_data as $cd)
												{
													$s = '';
													if(isset($category_name) && $cd['category_name'] == $category_name)
													{
														$s = "selected";
													}
											?>
												<option <?php echo $s; ?> value="<?php echo $cd['category_name']; ?>"><?php echo $cd['category_name']; ?></option>
											<?php
												}
											?>
										</select>
										<input type="text" name="product_name" id='product_name' placeholder="Enter Product/Services" class="text" required value="<?php if(isset($product_name)){ echo $product_name; } ?>" maxlength="50" />
										<input type="submit" name="search_product"  id="search_product"class="btnsearch" value="Search" />
									</div>
								</div>
							</div>
						</div>
					</form>
				<?php
						
						//echo form_close();
					}									
				?>
			</div>