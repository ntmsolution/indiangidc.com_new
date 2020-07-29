<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
?>

<div class="section padd">	
	<div class="row">
		<div class="col-md-12">
			<div class="heading">
				<h2>Personal Information</h2>
			</div>
		</div>
	</div>
	<div class="seperator"></div>
	<div class="row">
	<?php /*
		<div class="col-md-2">
			<?php
				echo form_open_multipart(SELLER_COMPANYPROFILE);
			?>
				<input type="file" name="photo" id="photo" class="form-control"  accept="image/*" onchange="javascript: return form.submit();" style='display:none;' />
				<small class="form-text text-muted "><?php echo form_error('photo'); ?></small>
				<?php 
					if($sp['photo'] != "")
					{
				?>
						<img src="<?php echo base_url("assets/upload/user-image/".$sp['photo']) ?>"  style="border:1px solid #000;" onclick="javascript: return document.getElementById('photo').click(); " />
						<input type="hidden" name="photo" value="<?php echo set_value('photo',$sp['photo']); ?>" />
				<?php
					}
					else
					{
				?>
						<img src="<?php echo base_url("assets/upload/user-image/default-user.jpg") ?>" style="border:1px solid #000;" onclick="javascript: return document.getElementById('photo').click(); " />
				<?php
					}
				?>
					
			<?php 
				echo form_close();
			?>
		</div> */ ?>
		<div class="col-md-12">
			<?php
				echo form_open(SELLER_COMPANYPROFILE);
			?>	
				<div class="row">
					<div class="col-md-6">
						<label>First Name</label>
						<div class="form-group">
							<input type="text" name="first_name" class="form-control" value="<?php echo set_value('first_name',$sp['first_name']); ?>" placeholder="Enter First Name" maxlength="30" required />
							<small class="form-text text-muted "><?php echo form_error('first_name'); ?></small>
						</div>
					</div>
					<div class="col-md-6">
						<label>Last Name</label>
						<div class="form-group">
							<input type="text" name="last_name" class="form-control" value="<?php echo set_value('last_name',$sp['last_name']); ?>" placeholder="Enter Last Name" maxlength="30" required />
							<small class="form-text text-muted "><?php echo form_error('last_name'); ?></small>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-6">
						<label>Mobile Number</label>
						<div class="form-group">
							<div class="input-group mb-3">
								<input type="text"  class="form-control" value="<?php echo set_value('mobile',$sr['mobile']); ?>" readonly placeholder="Enter Mobile Number" maxlength="10" required />
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fa fa-pencil-square-o" onclick="javascript: location.href = '<?php echo base_url(SELLER_SETTINGS); ?>'"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<label>Email Address</label>
						<div class="form-group">
							<div class="input-group mb-3">
								<input type="text"  class="form-control" value="<?php echo set_value('email',$sr['email']); ?>" readonly placeholder="Enter Email Address" maxlength="10" required />
								<div class="input-group-append">
									<div class="input-group-text">
										<span class="fa fa-pencil-square-o" onclick="javascript: location.href = '<?php echo base_url(SELLER_SETTINGS); ?>'"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row" style="display:none;">
					<div class="col-md-6">
						<label>Alternate Mobile Number</label>
						<div class="form-group">
							<input type="text" maxlength="10" pattern="[6789][0-9]{9}" name="mobile_number2" class="form-control" value="<?php echo set_value('mobile_number2',$sp['mobile_number2']); ?>" placeholder="Enter Alternate Mobile Number" />
							<small class="form-text text-muted "><?php echo form_error('mobile_number2'); ?></small>
						</div>
					</div>
					
					<div class="col-md-6">
						<label>Alternate Email Address</label>
						<div class="form-group">
							<input type="email" name="email_address2" class="form-control" value="<?php echo set_value('email_address2',$sp['email_address2']); ?>" placeholder="Enter Alternate Email Address" maxlength="80" />
							<small class="form-text text-muted "><?php echo form_error('email_address2'); ?></small>
						</div>
					</div>
				</div>
				<div class="row" style="display:none;">
					<div class="col-md-6">
						<label>Designation</label>
						<div class="form-group">
							<input type="text" name="designation" class="form-control" value="<?php echo set_value('designation',$sp['designation']); ?>" placeholder="Enter Designation" />
							<small class="form-text text-muted "><?php echo form_error('designation'); ?></small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 offset-md-4 text-center">
						<div class="form-group">
							<input type="submit" name="pi" class="form-control btn btn-primary" value="Save" />
						</div>
					</div>
				</div>
			<?php 
				echo form_close();
			?>
		</div>
	</div>
</div>