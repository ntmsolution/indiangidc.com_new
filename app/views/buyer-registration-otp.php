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
								echo form_open(REGISTRATION_BUYER_OTP);
							?>
								<div class="form-group">
									<label for="exampleInputEmail1">Enter Your OTP</label>
									<input type="number" name="otp" class="form-control"  placeholder="Enter your OTP" value="<?php echo set_value('otp'); ?>" maxlength="6" />
									<small class="form-text text-muted "><?php echo form_error('otp'); ?></small>
								</div>
								<div class="seperator"></div>
								<div class="form-group">
									<input type="submit" name="registration_otp" class="btn btn-primary" value="Verify OTP" />
									&nbsp;
									 <span class="countdown"></span>
									 <button type="button"  class="btn btn-dark resend_otp">Resend OTP</button>
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
	var timer2 = "02:00";
	$('.resend_otp').on('click', function(){
		$.post("<?php echo base_url("Ajax/resendBuyerRegisterOTP"); ?>", function(data){
			$.toaster({ priority : 'success', title : 'Success:', message : '<?php echo RESEND_OTP_MSG; ?>'});
			$('.resend_otp').css('display','none');
			$('.countdown').html("");
			timer2 = "02:00";
		});
	});
	var interval = setInterval(function() {


		var timer = timer2.split(':');
		  //by parsing integer, I avoid all extra string processing
		var minutes = parseInt(timer[0], 10);
		var seconds = parseInt(timer[1], 10);
		--seconds;
		minutes = (seconds < 0) ? --minutes : minutes;
		if (minutes < 0) clearInterval(interval);
		seconds = (seconds < 0) ? 59 : seconds;
		seconds = (seconds < 10) ? '0' + seconds : seconds;
		  //minutes = (minutes < 10) ?  minutes : minutes;
		
		if(minutes == 0 && seconds == 0)
		{
			$('.resend_otp').css('display','inline-block');
			$('.countdown').html("");
		}else
		{
			$('.countdown').html(minutes + ':' + seconds);
			timer2 = minutes + ':' + seconds;
		}					
	}, 1000);
</script>
<?php 
	lvi("footer");
?>