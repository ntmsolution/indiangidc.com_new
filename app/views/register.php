<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	lvi("header");
?>
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<div class="section padd">
					<div style="padding:30px;" id="tabbody">
						<div class="row" style='margin-bottom:10px;'>
							<div class="col-md-4 offset-md-2 text-center">
								Register As Buyer
							</div>
							<div class="col-md-4 text-center">
								Register As Seller
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 offset-md-2 text-center" style='border-right:2px solid #E0E0E0;'>
								<a href="<?php echo base_url(REGISTRATION_BUYER); ?>">
									<i class="fa fa-shopping-basket" style="font-size:100px" aria-hidden="true"></i>
								</a>
							</div>
							<div class="col-md-4 text-center">
								<a href="<?php echo base_url(REGISTRATION_STEP1); ?>">
									<i class="fa fa-building-o" style="font-size:100px" aria-hidden="true"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>

<script>
	$("#state").change(function()
	{
		var state_name = $(this).val();
		
		$.post("<?php echo base_url("Ajax/getCity"); ?>",{ state_name: state_name })
		.done(function(data)
		{
			csrfName = data.csrfName;
            csrfHash = data.csrfHash;
            alert(data.message);
		});
		
	});
</script>
<?php 
	lvi("footer");
?>