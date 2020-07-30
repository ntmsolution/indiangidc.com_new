<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	include "include/header.php";	
	$data_seller_plan = selectById("seller_plan",$eid);
	extract($data_seller_plan);
?>
	  <div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-4">
				<h1 class="m-0 text-dark"><?php echo HEADING_EDIT_SELLER_PLAN; ?></h1>
			  </div>
			  <div class="col-sm-4">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="<?php echo base_url(ADMINFOLDER."Plan/view") ?>">Plan</a></li>
				  <li class="breadcrumb-item active">Update Plan</li>
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
								<form onsubmit="javascript: return validation();" method="post" action="<?php echo base_url(ADMINFOLDER."Plan/edit/$eid"); ?>">
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-name">Enter Your Plan name</label>
												<input type="text" class="form-control" id="plan_name" name="plan_name" placeholder="Plan name" value="<?php echo set_value("plan_name",$plan_name); ?>" />
												<small id="error_plan_name" class="form-text" style="color:red;"><?php echo form_error("plan_name"); ?></small>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-price">Enter Your Plan price</label>
												<input type="text" class="form-control" id="plan_price" name="plan_price" placeholder="Plan price" value="<?php echo set_value("plan_price",$plan_price); ?>" />
												<small id="error_plan_price" class="form-text" style="color:red;"><?php echo form_error("plan_price"); ?></small>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-duration">Enter Your Real Plan duration</label>
												<input type="text" class="form-control" id="real_duration" name="real_duration" placeholder="Real Plan duration" value="<?php echo set_value("real_duration",$real_duration); ?>" />
												<small id="error_plan_duration" class="form-text" style="color:red;"><?php echo form_error("real_duration"); ?></small>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-duration">Enter Your Offer Plan duration</label>
												<input type="text" class="form-control" id="plan_duration" name="plan_duration" placeholder="Plan duration" value="<?php echo set_value("plan_duration",$plan_duration); ?>" />
												<small id="error_plan_duration" class="form-text" style="color:red;"><?php echo form_error("plan_duration"); ?></small>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-duration">Enter Line 1</label>
												<div class="d-flex">
													<?php
														$lat1 = false;
														if($line1_active ==  "Y")
														{
															$lat1 = true;
														}
													?>
													<input type="checkbox"  id="line1_active" name="line1_active"  value="Y" style="margin-top:13px;margin-right:10px;" <?php echo set_checkbox('line1_active', 'Y',$lat1); ?> />
													<input type="text" class="form-control" id="line1" name="line1" placeholder="Line 1" value="<?php echo set_value("line1",$line1); ?>" />
												</div>
													<small id="error_plan_duration" class="form-text" style="color:red;"><?php echo form_error("line1"); ?></small>
											</div>			
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-duration">Enter Line 2</label>
												<div class="d-flex">
													<?php
														$lat2 = false;
														if($line2_active ==  "Y")
														{
															$lat2 = true;
														}
													?>
													<input type="checkbox"  id="line2_active" name="line2_active"  value="Y" style="margin-top:13px;margin-right:10px;" <?php echo set_checkbox('line2_active', 'Y',$lat2); ?> />
													<input type="text" class="form-control" id="line2" name="line2" placeholder="Line 2" value="<?php echo set_value("line2",$line2); ?>" <?php echo set_checkbox('line2_active', 'Y'); ?>  />
												</div>
													<small id="error_plan_duration" class="form-text" style="color:red;"><?php echo form_error("line2"); ?></small>
											</div>			
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-duration">Enter Line 3</label>
												<div class="d-flex">
													<?php
														$lat3 = false;
														if($line3_active ==  "Y")
														{
															$lat3 = true;
														}
													?>
													<input type="checkbox"  id="line3_active" name="line3_active"  value="Y" style="margin-top:13px;margin-right:10px;" <?php echo set_checkbox('line3_active', 'Y',$lat3); ?> />
													<input type="text" class="form-control" id="line3" name="line3" placeholder="Line 3" value="<?php echo set_value("line3",$line3); ?>" <?php echo set_checkbox('line3_active', 'Y'); ?>  />
												</div>
													<small id="error_plan_duration" class="form-text" style="color:red;"><?php echo form_error("line3"); ?></small>
											</div>			
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-duration">Enter Line 4</label>
												<div class="d-flex">
													<?php
														$lat4 = false;
														if($line4_active ==  "Y")
														{
															$lat4 = true;
														}
													?>
													<input type="checkbox"  id="line4_active" name="line4_active"  value="Y" style="margin-top:13px;margin-right:10px;" <?php echo set_checkbox('line4_active', 'Y',$lat4); ?> />
													<input type="text" class="form-control" id="line4" name="line4" placeholder="Line 4" value="<?php echo set_value("line4",$line4); ?>" <?php echo set_checkbox('line4_active', 'Y'); ?>  />
												</div>
													<small id="error_plan_duration" class="form-text" style="color:red;"><?php echo form_error("line4"); ?></small>
											</div>			
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-duration">Enter Line 5</label>
												<div class="d-flex">
													<?php
														$lat5 = false;
														if($line5_active ==  "Y")
														{
															$lat5 = true;
														}
													?>
													<input type="checkbox"  id="line5_active" name="line5_active"  value="Y" style="margin-top:13px;margin-right:10px;" <?php echo set_checkbox('line5_active', 'Y',$lat5); ?> />
													<input type="text" class="form-control" id="line5" name="line5" placeholder="Line 5" value="<?php echo set_value("line5",$line5); ?>" <?php echo set_checkbox('line5_active', 'Y'); ?>  />
												</div>
													<small id="error_plan_duration" class="form-text" style="color:red;"><?php echo form_error("line5"); ?></small>
											</div>			
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label for="plan-duration">Enter Line 6</label>
												<div class="d-flex">
													<?php
														$lat6 = false;
														if($line6_active ==  "Y")
														{
															$lat6 = true;
														}
													?>
													<input type="checkbox"  id="line6_active" name="line6_active"  value="Y" style="margin-top:13px;margin-right:10px;" <?php echo set_checkbox('line6_active', 'Y',$lat6); ?> />
													<input type="text" class="form-control" id="line6" name="line6" placeholder="Line 6" value="<?php echo set_value("line6",$line6); ?>" <?php echo set_checkbox('line6_active', 'Y'); ?>  />
												</div>
													<small id="error_plan_duration" class="form-text" style="color:red;"><?php echo form_error("line6"); ?></small>
											</div>			
										</div>
									</div>
									
									
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<input type="submit" name="update_seller_plan" value="Update seller plan" class="btn btn-primary" />
												<input type="reset" name="reset" value="Cancel" class="btn btn-danger" />
											</div>
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