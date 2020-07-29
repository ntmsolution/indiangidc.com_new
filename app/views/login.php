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
								echo form_open(LOGIN_INDEX);
							?>
								<div class="form-group">
									<label for="exampleInputEmail1">Mobile Number or Email Address</label>
									<input type="text" name="mobile" class="form-control"   placeholder="Enter Mobile Number or Email Address" value="<?php echo set_value('mobile'); ?>" required maxlength="80" />
									<small class="form-text text-muted "><?php echo form_error('mobile'); ?></small>
								</div>
								<div class="seperator"></div>
								<div class="form-group">
									<label for="exampleInputEmail1">Password</label>
									<input type="password" name="password" class="form-control"   value="<?php echo set_value('password'); ?>" placeholder="Enter Password" required maxlength="20" min="6" />
									<small class="form-text text-muted "><?php echo form_error('password'); ?></small>
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
								</div>
								<div class="seperator"></div>
								<div class="form-group">
									<input type="submit" name="login" class="btn btn-primary" value="Login" />
									&nbsp;<a href="<?php echo base_url(FORGOT_PASSWORD_INDEX); ?>">Forgot Password ?</a>
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