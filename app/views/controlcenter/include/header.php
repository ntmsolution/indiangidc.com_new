<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	$settings = getSettings();
	define('COMPANY_NAME',$settings['company_name']);
	define('ADMIN_PER_PAGE',$settings['admin_per_page']);
	define('PER_PAGE',$settings['site_per_page']);
	
	if(!isset($title))
	{
		$title = "";
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $title." | ".COMPANY_NAME; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--- start css file --->
		<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/fontawesome-free/css/all.min.css"); ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/fontawesome-free/css/fontawesome.min.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("assets/backend/dist/css/adminlte.css"); ?>">
		<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"); ?>">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url("assets/backend/"); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css" >		
		
		<link rel="stylesheet" href="<?php echo base_url("assets/css/data-table-arrange.css"); ?>" />	
		<!--- end css file --->
		<link rel="icon" href="<?php echo base_url('assets/upload/site-images/'.$settings['favicon']); ?>" type="image/*" sizes="16x16">
		
		<!--- start js file --->
		<script src="<?php echo base_url("assets/backend/"); ?>plugins/jquery/jquery.min.js"></script>
		<script src="<?php echo base_url("assets/backend/"); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="<?php echo base_url("assets/backend/"); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="<?php echo base_url("assets/backend/"); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
		<script src="<?php echo base_url("assets/backend/"); ?>dist/js/adminlte.js"></script>		
		<script src="<?php echo base_url("assets/js/sweetalert2.min.js"); ?>" ></script>
		<script src="<?php echo base_url("assets/backend/"); ?>plugins/datatables/jquery.dataTables.js"></script>
		<script src="<?php echo base_url("assets/backend/"); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.toaster.js"></script>	
		<!--- start js file --->
		
	</head>
	<body class="hold-transition sidebar-mini layout-fixed">
		<?php  echo getMsg(); ?>
		<div class="wrapper">
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<ul class="navbar-nav">
				  <li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
				  </li>
				</ul>
				<!-- Right navbar links -->
				<ul class="navbar-nav ml-auto">
				  <li class="nav-item" >
					<a class="nav-link " href="<?php echo base_url(ADMINFOLDER."Home/logout/"); ?>" >
						<i class="fa fa-power-off " title="Logout"></i>
					</a>
				  </li>
				</ul>
			</nav>
	<!-- /.navbar -->
<?php 
	include "menu.php";
?>