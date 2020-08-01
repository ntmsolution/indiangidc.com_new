<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	lvi("header");
	
?>
<div class="content bg-white">
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="row">
					<?php 
						$seller_plan	= select("seller_plan");
						foreach($seller_plan as $sp)
						{
							$symbol1 = "fa-close";
							if($sp['line1_active'] == "Y")
							{
								$symbol1 = "fa-check";
							}
							
							$symbol2 = "fa-close";
							if($sp['line2_active'] == "Y")
							{
								$symbol2 = "fa-check";
							}
							
							$symbol3 = "fa-close";
							if($sp['line3_active'] == "Y")
							{
								$symbol3 = "fa-check";
							}
							
							$symbol4 = "fa-close";
							if($sp['line4_active'] == "Y")
							{
								$symbol4 = "fa-check";
							}
							
							$symbol5 = "fa-close";
							if($sp['line5_active'] == "Y")
							{
								$symbol5 = "fa-check";
							}
							
							$symbol6 = "fa-close";
							if($sp['line6_active'] == "Y")
							{
								$symbol6 = "fa-check";
							}

							extract($sp);
					?>
							<div class="col-md-6">
								<div class="membership-box">
									<div class="title">
										<h1><?php echo $sp['plan_name']; ?></h1>
									</div>
									<div class="details">
										<h2 style="text-align:center;">Rs. <?php echo $plan_price; ?>/- </h2>
										<h3 style="text-align:center;font-size:18px;"><strike><?php echo $real_duration; ?></strike> | <?php echo $plan_duration; ?> Month</h3>
										<?php /*<p><i class="fa <?php echo $symbol1; ?>"></i> <?php echo $line1; ?></p>
										<p><i class="fa <?php echo $symbol2; ?>"></i> <?php echo $line2; ?></p>
										<p><i class="fa <?php echo $symbol3; ?>"></i> <?php echo $line3; ?></p>
										<p><i class="fa <?php echo $symbol4; ?>"></i> <?php echo $line4; ?></p>
										<p><i class="fa <?php echo $symbol5; ?>"></i> <?php echo $line5; ?></p>
										<p><i class="fa <?php echo $symbol6; ?>"></i> <?php echo $line6; ?></p>*/?>
									</div>
								</div>
								<form method="post" action="<?php echo base_url(UPGRADE_PAYNOW); ?>">	
									<input type="hidden" name="plan_id" value="<?php echo $id; ?>" />
									<button class="btn-buy-now" >Buy Now</button>
								</form>
							</div>
					<?php
						}
					?>
					
				</div>
			</div>
		</div>
	</div>		
</div>
	
<?php	
	
	lvi("footer");
?>