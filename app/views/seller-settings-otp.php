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
								<?php 
									if(isset($_SESSION['mobile_change']))
									{
								?>
									<h2>Change Mobile Number OTP</h2>
								<?php 
									}
									else if(isset($_SESSION['email_change']))
									{
								?>
										<h2>Change Email Address OTP</h2>
								<?php
									}
								?>
							</div>
									
						</div>
					</div>
					<div class="seperator"></div>
					
							
							<?php
								echo form_open(SELLER_SETTINGS_OTP);
							?>
								<?php 
									if(isset($_SESSION['mobile_change']))
									{
								?>
										<div class="row">
											<div class="col-md-2" style='margin-top:5px;'>
												<label>Enter Your OTP</label>
											</div>
											<div class="col-md-5">
												<div class="form-group">
										
													<input type="number" name="otp" class="form-control"  placeholder="Enter your OTP" value="<?php echo set_value('otp'); ?>" maxlength="6" min="6" />
													<small class="form-text text-muted "><?php echo form_error('otp'); ?></small>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<input type="submit" name="change_mobile" class="btn btn-primary" value="Verify OTP" />
												</div>
											</div>
											
										</div>
								<?php 
									}
									else if(isset($_SESSION['email_change']))
									{
								?>
										<div class="row">
											<div class="col-md-2" style='margin-top:5px;'>
												<label>Enter Your OTP</label>
											</div>
											<div class="col-md-5">
												<div class="form-group">
										
													<input type="number" name="otp" class="form-control"  placeholder="Enter your OTP" value="<?php echo set_value('otp'); ?>" maxlength="6" min="6" />
													<small class="form-text text-muted "><?php echo form_error('otp'); ?></small>
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<input type="submit" name="change_email" class="btn btn-primary" value="Verify OTP" />
												</div>
											</div>
										</div>

								<?php
									}
								?>
								
							<?php 
								echo form_close();
							?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<?php 
	lvi("footer");
?>