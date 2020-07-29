<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title><?php echo $page_title."".DEFAULT_TITLE; ?></title>
		<?php lvi("css"); ?>
		<?php lvi("js"); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="keywords" content="<?php echo $sbp['meta_keywords']; ?>">
			<meta name="description" content="<?php echo $sbp['meta_description']; ?>">
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
			</div>
			<div class="companypage">
				<div class="container whitebg">
					<div class="companypage-header">
						<div class="row justify-content-between">
							<div class="col-md-6">
								<div class="logo float-left">
								<?php 
									if($sbp['company_logo'] != "")
									{
								?>
										<img src="<?php echo base_url("assets/upload/user-image/".$sbp['company_logo']); ?>" height="100" align="center" />
								<?php
									}
									else
									{
								?>
										<img src="<?php echo base_url("assets/upload/user-image/default-company.jpg") ?>" height="100" align="center" />
								<?php
									}
								?>
								</div>
								<div class="title float-left">
									<h2 class="companyname"><?php echo ucwords(strtolower($sbp['company_name'])); ?></h2>
									<div class="location">
									<i class="fa fa-map-marker"></i> <?php echo ucfirst(strtolower($sp['city'])).", ".ucfirst(strtolower($sp['state'])).". (".ucfirst(strtolower($sp['country'])).")"; ?>
									&nbsp;&nbsp;
									
									</div>
									<div class="gst">GST TIN No: <?php echo $ss['gst_no']; ?></div>
								</div>
							</div>
							<div class="col-md-5 text-right">
								<div class="contactandemailblock">
									<?php 
										if(getLoginId('buyer') || getLoginId())
										{
									?>
											<a href="#" class="contactno sendmsg" data-toggle="modal" data-target="#productmodel" data-sellerid="<?php echo $sp['seller_id']; ?>" data-typeinquiry="mobile"  ><i class="fa fa-phone"></i> Contact Us</a>
											<a href="#" class="email sendemail" data-toggle="modal" data-target="#productmodel" data-sellerid="<?php echo $sp['seller_id']; ?>" data-typeinquiry="email"  ><i class="fa fa-envelope"></i> Send Email</a>
											<?php 
												$brochure = "";
												if($sbp["brochure"] != "" && (getLoginId('buyer') || getLoginId()))
												{
													$brochure_url 	= base_url("assets/upload/brochure/".$sbp["brochure"]);
											?>
													<a href="<?php echo $brochure_url; ?>" class="contactno" download title="Download brochure"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Brochure</a>
											<?php
												}	
											?>
									<?php 
										}
										else
										{
									?>
										<a href="javascript: void();" data-toggle="modal" data-target="#loginmodel" class="contactno" ><i class="fa fa-phone"></i> Contact Us</a>
										<a href="javascript: void();" class="email"  data-toggle="modal" data-target="#loginmodel" ><i class="fa fa-envelope"></i> Send Email</a>
										
										
									<?php
										}
									?>
								</div>
							</div>
						</div>
					</div>
					<div class="companypage-menu">
						<ul>
							<li><a href="#home">Home</a></li>
							<li><a href="#about">About Company</a></li>
							<li><a href="#product">Our Products</a></li>
							<li><a href="#contact">Contact Us</a></li>
						</ul>
					</div>