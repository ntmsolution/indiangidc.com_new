<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	lvi("header");
?>
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="section padd">
					<div style="padding:30px;" id="tabbody">
						<div class="form">
							<?php 
								echo form_open(FORGOT_PASSWORD_CHANGE_PASSWORD);
							?>
								<div class="form-group">
									<label for="exampleInputEmail1">Enter New Password</label>
									<input type="text" name="new_password" id="new_password" class="form-control"  placeholder="Enter New Password" value="<?php echo set_value('new_password'); ?>" maxlength="20" required />
									<small class="form-text text-muted "><?php echo form_error('new_password'); ?></small>
								</div>
								<div class="seperator"></div>
								<div class="form-group">
									<label for="exampleInputEmail1">Enter Confirm Password</label>
									<input type="text" name="confirm_password" id="confirm_password" class="form-control"  placeholder="Enter Confirm Password" value="<?php echo set_value('confirm_password'); ?>" maxlength="20"  required  />
									<small class="form-text text-muted "><?php echo form_error('confirm_password'); ?></small>
								</div>
								<div class="seperator"></div>
								<div class="form-group">
									<input type="submit" name="forgot_change_password" class="btn btn-primary" value="Change Password" />
									
								</div>
								<div class="seperator"></div>
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
	
	$("#confirm_password").blur(function(){
		if($("#confirm_password").val() != $("#new_password").val())
		{
			$("#confirm_password").val("");
			alert("Your new password and confirm password not matched.");
		}
	});
	
	$("#new_password").blur(function(){
		if($("#confirm_password").val() != $("#new_password").val())
		{
			$("#confirm_password").val("");
		}
	});

</script>
<?php 
	lvi("footer");
?>