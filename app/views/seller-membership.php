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
										<p><i class="fa <?php echo $symbol1; ?>"></i> <?php echo $line1; ?></p>
										<p><i class="fa <?php echo $symbol2; ?>"></i> <?php echo $line2; ?></p>
										<p><i class="fa <?php echo $symbol3; ?>"></i> <?php echo $line3; ?></p>
										<p><i class="fa <?php echo $symbol4; ?>"></i> <?php echo $line4; ?></p>
										<p><i class="fa <?php echo $symbol5; ?>"></i> <?php echo $line5; ?></p>
										<p><i class="fa <?php echo $symbol6; ?>"></i> <?php echo $line6; ?></p>
										
									</div>
								</div>
								<button class="btn-buy-now"  >Buy Now</button>
							</div>
					<?php
						}
					?>
					
				</div>
			</div>
		</div>
	</div>		
</div>
<button id="paynow">Buy Noew</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_live_2vAkWUTruoRYqC", // Enter the Key ID generated from the Dashboard
    "amount": "50000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://www.careerinfoway.com/assets/img/logo.png",
    "order_id": "t", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "http://192.168.1.5/development/ajay/indiangidc.com/membership",
    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('paynow').onclick = function(e){
	
    rzp1.open();
	e.preventDefault();
}
</script>
<?php 
	lvi("footer");
?>