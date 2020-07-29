<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	lvi("header");
?>
<div class="content seller-dashboard"  style="padding:0px 0px;">
	<div class="container">	
		<div class="row" style="padding-top:50px;">
			<div class="col-md-3">
				<?php lvi("seller-dashboard-menu"); ?>
			</div>
			<div class="col-md-9">
				<div class="section padd">	
					<div class="row">
						<div class="col-md-12">
							<div class="heading">
								<h2>Change Mobile Number</h2>
							</div>
						</div>
					</div>
					<div class="seperator"></div>
					<div class="row">
						<div class="col-md-12">
							<?php
								echo form_open(SELLER_SETTINGS);
								$sr = getRegistrationById($seller_id);
							?>	
								<div class="row">
									<div class="col-md-2" style='margin-top:5px;'>
										<label>Mobile Number</label>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input type="text" name="mobile" id="mobile" class="form-control" value="<?php echo set_value('mobile',$sr['mobile']); ?>"  placeholder="Enter Mobile Number" pattern="[6789][0-9]{9}" maxlength="10" />
											<small class="form-text text-muted "><?php echo form_error('mobile'); ?></small>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="submit" name="change_mobile" class="form-control btn btn-primary" value="Update" />
										</div>
									</div>
								</div>
							<?php 
								echo form_close();
							?>
						</div>
					</div>
				</div>
				<div class="section padd">	
					<div class="row">
						<div class="col-md-12">
							<div class="heading">
								<h2>Change Email Address</h2>
							</div>
						</div>
					</div>
					<div class="seperator"></div>
					<div class="row">
						<div class="col-md-12">
							<?php
								echo form_open(SELLER_SETTINGS);
								$sr = getRegistrationById($seller_id);
							?>	
								<div class="row">
									<div class="col-md-2" style='margin-top:5px;'>
										<label>Email Address</label>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email',$sr['email']); ?>"  placeholder="Enter Email Address"  maxlength="80" />
											<small class="form-text text-muted "><?php echo form_error('email'); ?></small>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<input type="submit" name="change_email" class="form-control btn btn-primary" value="Update" />
										</div>
									</div>
								</div>
							<?php 
								echo form_close();
							?>
						</div>
					</div>
				</div>
				<div class="section padd">	
					<div class="row">
						<div class="col-md-12">
							<div class="heading">
								<h2>Change Password</h2>
							</div>
						</div>
					</div>
					<div class="seperator"></div>
					<div class="row">
						<div class="col-md-12">
							<?php
								echo form_open(SELLER_SETTINGS);								
							?>	
								<div class="row">
									<div class="col-md-3">
										<label>Old Password</label>
										<div class="form-group">
											<input type="password" name="old_password" id="old_password" class="form-control" value="<?php echo set_value('old_password'); ?>" placeholder="Enter Old Password" maxlength="20" min="6" />
											<small class="form-text text-muted "><?php echo form_error('old_password'); ?></small>
										</div>
									</div>
									<div class="col-md-3">
										<label>New Password</label>
										<div class="form-group">
											<input type="password" name="new_password" id="new_password" class="form-control" value="<?php echo set_value('new_password'); ?>"  placeholder="Enter New Password" maxlength="20" min="6" />
											<small class="form-text text-muted "><?php echo form_error('new_password'); ?></small>
										</div>
									</div>
									<div class="col-md-3">
										<label>Confirm Password</label>
										<div class="form-group">
											<input type="password" name="confirm_password" id="confirm_password" class="form-control" value="<?php echo set_value('confirm_password'); ?>"  placeholder="Enter Confirm Password" maxlength="20" min="6" />
											<small class="form-text text-muted "><?php echo form_error('confirm_password'); ?></small>
										</div>
									</div>
									<div class="col-md-3">
										<label>&nbsp;&nbsp;&nbsp;</label>
										<div class="form-group">
											<input type="submit" name="change_password" class="form-control btn btn-primary" value="Update" />
										</div>
									</div>
								</div>
							<?php 
								echo form_close();
							?>
						</div>
					</div>
				</div>
				
				<div class="section padd">	
					<div class="row">
						<div class="col-md-12">
							<div class="heading">
								<h2>Change your support pin</h2>
							</div>
						</div>
					</div>
					<div class="seperator"></div>
					<div class="row">
						<div class="col-md-12">
							<?php
								echo form_open(SELLER_BUYERTOOLS);
									$sr = getRegistrationById($seller_id);
							?>
								<div class="row">
									<div class="col-md-3" style='margin-top:5px;'>
										<label>Support Pin Number</label>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<input type="text" name="support_pin" id="support_pin" class="form-control" value="<?php echo set_value('support_pin',$sr['support_pin']); ?>"  placeholder="Enter Mobile Number" pattern="[0-9]{4}" maxlength="4" min='4' />
											<small class="form-text text-muted "><?php echo form_error('support_pin'); ?></small>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<input type="submit" name="change_support_pin" class="form-control btn btn-primary" value="Update" />
										</div>
									</div>
								</div>
							<?php 
								echo form_close();
							?>
						</div>
					</div>
				</div>
				<div class="section padd" style="display:none;">	
					<div class="row">
						<div class="col-md-12">
							<div class="heading">
								<?php 
									if($brochure != "")
									{
								?>
										<h2>Update your brochure</h2>
								<?php
									}
									else
									{
								?>
										<h2>Upload your brochure</h2>
								<?php
									}
								?>
							</div>
						</div>
					</div>
					<div class="seperator"></div>
					<div class="row">
						<div class="col-md-12">
							<?php
								echo form_open_multipart(SELLER_BUYERTOOLS);
							?>
								<div class="row">
									<div class="col-md-3" style='margin-top:5px;'>
										
										<input type="file" name="brochure" id="brochure" class="form-control"  accept="application/pdf" onchange="javascript: return form.submit();" style='display:none;' />
										<small class="form-text text-muted "><?php echo form_error('brochure'); ?></small>
										<?php 
											if($brochure != "")
											{
										?>
												<img src="<?php echo base_url("assets/upload/brochure/default.png"); ?>" style="border:1px solid #000;" onclick="javascript: return document.getElementById('brochure').click(); " title="Click to update your brochure" />
												<input type="hidden" name="brochure" value="<?php echo set_value('brochure',$brochure); ?>" />
												<div style="margin-top:10px;text-align:center;">
													<a href="<?php echo base_url("assets/upload/brochure/$brochure"); ?>" download><i class="fa fa-download" aria-hidden="true" style='font-size:24px;'></i></a>
												</div>
										<?php
											}
											else
											{
										?>
												<img src="<?php echo base_url("assets/upload/brochure/default.png") ?>"  onclick="javascript: return document.getElementById('brochure').click();" title="Click to upload your brochure" />
										<?php
											}
											
										?>
											
									</div>
								</div>
							<?php 
								echo form_close();
							?>
						</div>
					</div>
				</div>
				
				
			</div>
		</div>
	</div>
</div>

<script>
	document.getElementById("mobile").select();
</script>

<?php 
	lvi("footer");
?>