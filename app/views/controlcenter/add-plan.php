<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	include "include/header.php";	
?>
	  <div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-4">
				<h1 class="m-0 text-dark"><?php echo HEADING_ADD_SELLER_PLAN; ?></h1>
			  </div>
			  <div class="col-sm-4">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="<?php echo base_url(ADMINFOLDER."Plan/view") ?>">Plan</a></li>
				  <li class="breadcrumb-item active">Add Plan</li>
				</ol>
			  </div>
			</div>
		  </div>
		</div>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						<div class="card card-primary card-outline">
							<div class="card-body">
								<form onsubmit="javascript: return validation();" method="post" action="<?php echo base_url(ADMINFOLDER."Plan/add"); ?>">
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-name">Enter Your Plan name</label>
												<input type="text" class="form-control" id="plan_name" name="plan_name" placeholder="Plan name" value="<?php echo set_value("plan_name"); ?>" />
												<small id="error_plan_name" class="form-text" style="color:red;"><?php echo form_error("plan_name"); ?></small>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-price">Enter Your Plan price</label>
												<input type="text" class="form-control" id="plan_price" name="plan_price" placeholder="Plan price" value="<?php echo set_value("plan_price"); ?>" />
												<small id="error_plan_price" class="form-text" style="color:red;"><?php echo form_error("plan_price"); ?></small>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-duration">Enter Your Plan duration</label>
												<input type="text" class="form-control" id="plan_duration" name="plan_duration" placeholder="Plan duration" value="<?php echo set_value("plan_duration"); ?>" />
												<small id="error_plan_duration" class="form-text" style="color:red;"><?php echo form_error("plan_duration"); ?></small>
											</div>
										</div>
									</div>
							
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="submit" name="add_seller_plan" value="Add seller plan" class="btn btn-primary" />
												<input type="reset" name="reset" value="Cancel" class="btn btn-danger" />
											</div>
										</div>
									</div>
									
								</form>			
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	
	<script>
		function validation()
		{
			var flag = true;
			
			var plan_name 	= document.getElementById("plan_name").value;
			var plan_price 	= document.getElementById("plan_price").value;
			var plan_duration 	= document.getElementById("plan_duration").value;
			
			if(plan_name == "")
			{
				document.getElementById("error_plan_name").innerHTML = "Plan Name  is required.";
				flag = false;
			}
			else
			{
				document.getElementById("error_plan_name").innerHTML = "";
			}
			
			if(plan_price == "")
			{
				document.getElementById("error_plan_price").innerHTML = "Plan Price  is required.";
				flag = false;
			}
			else
			{
				document.getElementById("error_plan_price").innerHTML = "";
			}
			
			if(plan_duration == "")
			{
				document.getElementById("error_plan_duration").innerHTML = "Plan Duration  is required.";
				flag = false;
			}
			else
			{
				document.getElementById("error_plan_duration").innerHTML = "";
			}
			
			
			
			
			if(flag == false)
			{
				return false;
			}
			
		}
	</script>
<?php include "include/footer.php"; ?>