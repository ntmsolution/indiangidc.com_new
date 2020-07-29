<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$settings = getSettings();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo "Login | ".$settings['company_name']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/fontawesome-free/css/all.min.css"); ?>" />
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
		<link rel="stylesheet" href="<?php echo base_url("assets/backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("assets/backend/dist/css/adminlte.min.css"); ?>" />
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
		<link rel="icon" href="<?php echo base_url('assets/upload/site-images/'.$settings['favicon']); ?>" type="image/*" sizes="16x16">
		<script src="<?php echo base_url("assets/js/sweetalert2.min.js"); ?>" ></script>
	</head>
	<body class="hold-transition login-page">
		<?php  echo getMsg(); ?>
		<div class="login-box">
			<div class="login-logo">
				<img src="<?php echo base_url('assets/upload/site-images/'.$settings['logo']); ?>" width='350px' />
			</div>			 
			<div class="card">
				<div class="card-body login-card-body">
					<p class="login-box-msg"> Admin Panel Login</p>
					<form action="<?php echo base_url(ADMINFOLDER."Login/check"); ?>" method="post">
						<div class="input-group mb-3">
						
						<input type="text" class="form-control" data-validate="true" data-message="Please enter user name" placeholder="Enter user name" required name="username" value="<?php if(isset($_COOKIE["username"])){ echo $_COOKIE["username"]; } ?>" />
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-user"></span>
								</div>
							</div>
						</div>
						<div class="input-group mb-3">
							<input type="password" class="form-control" data-validate="true" data-message="Please enter password" placeholder="Enter password" required name="password" value="<?php if(isset($_COOKIE["password"])){ echo $_COOKIE["password"]; } ?>" />
							<div class="input-group-append">
								<div class="input-group-text">
									<span class="fas fa-lock"></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-8">
								<div class="icheck-primary">
									<input type="checkbox"  name="remember" id="remember" />
									<label for="remember">
										Remember Me:
									</label>
								</div>
							</div>						  
							<div class="col-4">
								<button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
							</div>
						</div>
					</form>
					<!--<p class="mb-1">
						<a href="#">I forgot my password</a>
					</p>-->
				</div>
			</div>
		</div>
		
		<script src="<?php echo base_url("assets/backend/plugins/jquery/jquery.min.js"); ?>" ></script>
		
		<script src="<?php echo base_url("assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>"></script>
		<script src="<?php echo base_url("assets/backend/dist/js/adminlte.js"); ?>"></script>
	</body>
</html>
