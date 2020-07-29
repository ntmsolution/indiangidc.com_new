<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$captcha_image 		= getCaptchaImage();
?>
<style>
	.bodyseller
	{
		display:none;
	}
</style>
	<!-- Modal -->
	<div class="modal fade" id="loginmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!---<div class="login-header">
					<div class="text-center login-title buyerlogin active">
						Login Buyer 
					</div>
					<div class="text-center login-title sellerlogin">
						Login Seller
					</div>
				</div>-->
				
				<div class="bodybuyer">
					<?php 
					/*	echo form_open(LOGIN_BUYER);
					?>
						<div class="modal-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Mobile Number</label>
								<input type="text" name="mobile" class="form-control"   placeholder="Enter Mobile Number" value="<?php echo set_value('mobile'); ?>" required pattern="[6789][0-9]{9}" maxlength="10" />
								<small class="form-text text-muted "><?php echo form_error('mobile'); ?></small>
							</div>
							<div class="row">
								<div class="col-md-5">
									<p class="captImg"><?php echo $captcha_image; ?></p>
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
						<div class="modal-footer">
							<div class="form-group">
								<input type="submit" name="login" class="btn btn-primary" value="Login" />
								<button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					<?php 
						echo form_close();
					?>
				</div>
				<div class="bodyseller">
					<?php 
						*/
						echo form_open(LOGIN_INDEX);
					?>
						<div class="modal-body">
							<div class="form-group">
								<label for="exampleInputEmail1">Mobile Number or Email Address</label>
								<input type="text" name="mobile" class="form-control"   placeholder="Enter Mobile Number or Email Address" value="<?php echo set_value('mobile'); ?>"  required maxlength="80" />
								<small class="form-text text-muted "><?php echo form_error('mobile'); ?></small>
							</div>
							
							<div class="form-group">
								<label for="exampleInputEmail1">Password</label>
								<input type="password" name="password" class="form-control"   value="<?php echo set_value('password'); ?>" placeholder="Enter Password" required maxlength="20" />
								<small class="form-text text-muted "><?php echo form_error('password'); ?></small>
							</div>
							
							<div class="row">
								<div class="col-md-5">
									<p class="captImg"><?php echo $captcha_image; ?></p>
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
						<div class="modal-footer">
							<div class="form-group">
								<a href="<?php echo base_url(FORGOT_PASSWORD_INDEX); ?>">Forgot Password ?</a>
								&nbsp;
								<input type="submit" name="login" class="btn btn-primary" value="Login" />
								<button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					<?php 
						echo form_close();
					?>
				</div>
			</div>
		</div>
	</div>
	<!-- End Modal Dialog -->

<script>
	$(document).ready(function(){
		$(".sellerlogin").click(function(){
			$(".buyerlogin").removeClass('active');
			$(".sellerlogin").addClass('active');
			$('.bodybuyer').css('display','none');
			$('.bodyseller').css('display','block');
		});
		
		/*$(".buyerlogin").click(function(){
			$(".sellerlogin").removeClass('active');
			$(".buyerlogin").addClass('active');
			$('.bodybuyer').css('display','block');
			$('.bodyseller').css('display','none');
		});*/
		
		$('.refresh_captcha').on('click', function(){
			$.post("<?php echo base_url("Ajax/refreshCaptcha"); ?>", function(data){
				$('.captImg').html(data);
			});
		});
		
	});
</script>
