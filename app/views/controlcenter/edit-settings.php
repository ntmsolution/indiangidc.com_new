<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	include "include/header.php";
	
?>
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-4">
				<h1 class="m-0 text-dark">Update Settings</h1>
			  </div>
			 
			</div>
		  </div>
		</div>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						<div class="card card-primary card-outline">
							<form method="post" enctype="multipart/form-data" action="<?php echo base_url(ADMINFOLDER."Settings/edit/"); ?>">
								<div class="card-body">
									<div class="form-group">
										<label>Site Title</label>
										<input type="text" class="form-control" name="company_name" placeholder="Company Name" value="<?php echo $settings["company_name"]; ?>" required />
									</div>
									<div class="form-group">
										<label>Pagging per page records in site</label>
										<input type="number" class="form-control" name="site_per_page" placeholder="Pagging per page records in site" value="<?php echo $settings["site_per_page"]; ?>" required />
									</div>
									<div class="form-group">
										<label>Pagging per page records in admin panel</label>
										<input type="number" class="form-control" name="admin_per_page" placeholder="Pagging per page records in admin panel" value="<?php echo $settings["admin_per_page"]; ?>" required />
									</div>
									<div class="form-group">
										<label>Site Logo</label>
										<input type="file" class="form-control" name="logo"  />
										<input type="hidden"  name="logo"  value="<?php echo $settings["logo"]; ?>"  /><br/>
										<img src="<?php echo base_url('assets/upload/site-images/'.$settings["logo"]); ?>" width="200px" />
									</div>
									<div class="form-group">
										<label>Site Favicon Icon</label>
										<input type="file" class="form-control" name="favicon"  />
										<input type="hidden"  name="favicon"  value="<?php echo $settings["favicon"]; ?>"  /><br/>
										<img src="<?php echo base_url('assets/upload/site-images/'.$settings["favicon"]); ?>" width="80px" />
									</div>
								</div>
								<div class="card-footer">
									<button type="submit" name="edit" class="btn btn-primary"> Update Settings</button>
									<button type="button" name="cancel" class="btn btn-danger"> Cancel</button>
								</div>
							</form>							
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php include "include/footer.php"; ?>