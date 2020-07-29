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
								echo form_open(FORGOT_PASSWORD_INDEX);
							?>
								<div class="form-group">
									<label for="exampleInputEmail1">Mobile Number</label>
									<input type="text" name="mobile" class="form-control"   placeholder="Enter Mobile Number" value="<?php echo set_value('mobile'); ?>" required pattern="[6789][0-9]{9}" maxlength="10" />
									<small class="form-text text-muted "><?php echo form_error('mobile'); ?></small>
								</div>
								<div class="seperator"></div>
								<div class="row">
									<div class="col-md-5">
										<p id="captImg"><?php echo $captcha_image; ?></p>
									</div>
									<div class="col-md-1" style="margin-top:8px;">
										<a href="javascript:void(0);" class="refresh_captcha" ><img src="<?php echo base_url().'assets/images/refresh.png'; ?>" height="20px" /></a>
									</div>
									<div class="col-md-6">
										<input type="text" name="captcha_code" class="form-control"   placeholder="Enter Captcha Code" value="<?php echo set_value('captcha_code'); ?>"  required maxlength="5" />
										<small class="form-text text-muted "><?php echo form_error('captcha_code'); ?></small>
									</div>
								</div>
								<div class="seperator"></div>
								<div class="form-group">
									<input type="submit" name="forgot_password" class="btn btn-primary" value="Send OTP" />
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
	$('.refresh_captcha').on('click', function(){
		$.post("<?php echo base_url("Ajax/refreshCaptcha"); ?>", function(data){
			$('#captImg').html(data);
		});
	});
</script>
<?php 
	lvi("footer");
?>