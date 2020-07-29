<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700,900&display=swap" rel="stylesheet" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/framework.css" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/responsive.css" />
		
		<?php 
			if(getClass() == "Home" || getClass() == "Seller")
			{
		?>
				<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/select2.min.css" />
		<?php 
			}
		?>
		
		<?php 
			if(getClass() == "Home")
			{
		?>
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui.css" />
		<?php
			}
		?>
		
		<?php 
			if(getClass() == "Home" || getClass() == "Sellerprofile" || getClass() == "Seller")
			{
		?>
				<!-- Owl Carousel Start -->
				<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.carousel.min.css" />
				
				<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/owl.theme.default.min.css" />
				<!-- Owl Carousel End -->
		<?php
			}
		?>
