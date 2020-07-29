<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	$admin_id 	= getLoginId("admin");
	$admin 		= selectById("admin",$admin_id);
	include "include/header.php";
?>
	  <div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-4">
				<h1 class="m-0 text-dark">Change Password</h1>
			  </div>
			</div>
		  </div>
		</div>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						<div class="card card-primary card-outline">
							<form method="post" action="<?php echo base_url(ADMINFOLDER."Home/changepassword"); ?>" >
								<div class="card-body">
									<div class="form-group">
										<label for="exampleInputPassword1">Username: </label>
										<input type="text" class="form-control" name="username" id="exampleInputPassword1" placeholder="Enter your username" required value="<?php echo $admin['username']; ?>" />
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Old Password: </label>
										<input type="password" class="form-control" name="opassword" id="exampleInputPassword1" placeholder="Enter your old password" required minlength="8" maxlength="20" />
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">New Password: </label>
										<input type="password" class="form-control" name="password" id="password" placeholder="Enter your new password" required minlength="8" maxlength="20" />
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Confirm Password: </label>
										<input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Enter your confirm password" required minlength="8" maxlength="20" />
									</div>
								</div>
								<div class="card-footer">
									<button type="submit" name="change_password" class="btn btn-primary">Change Password</button>
								</div>
							</form>							
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php include "include/footer.php"; ?>