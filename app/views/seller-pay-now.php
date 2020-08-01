<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	lvi("header");
?>
<div class="content bg-white">
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4">
				<div class="row">
					<div class="col-md-12">
						<div class="membership-box">
							<div class="title">
								<h1>Pay Using Razorpay</h1>
							</div>
							<div class="details">
								<table style="width:100%;">
									<tr>
										<th><?php echo "$plan_name $plan_duration (Month)"; ?></th>
										<th><?php echo "RS. ".$plan_price."/-"; ?></th>
									</tr>
								</table>
							</div>
						</div>
						<button class="btn-buy-now" id="rzp-button1">Pay Now</button>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>
	
<?php	
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

require 'razorpay-php/Razorpay.php';

if(session_id() == '') {
    session_start();
}

// Create the Razorpay Order

use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);

$orderData = [
    'receipt'         => 3456,
    'amount'          => $plan_price  * 100, // rupees in paise
    'currency'        => $displayCurrency,
    'payment_capture' => 1 // auto capture
];

$razorpayOrder = $api->order->create($orderData);

$razorpayOrderId = $razorpayOrder['id'];

$_SESSION['razorpay']['razorpay_order_id'] 	= $razorpayOrderId;
$_SESSION['razorpay']['plan_id']			= $plan_id;

$displayAmount = $amount = $orderData['amount'];

if ($displayCurrency !== 'INR')
{
    $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
    $exchange = json_decode(file_get_contents($url), true);

    $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
}

if ($displayCurrency !== 'INR')
{
    $data['display_currency']  = $displayCurrency;
    $data['display_amount']    = $displayAmount;
}


?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "<?php echo $keyId; ?>", // Enter the Key ID generated from the Dashboard
    "amount": "<?php echo $plan_price; ?>", 
    "currency": "<?php echo $displayCurrency; ?>",
    "name": "Indiangidc.com",
    "description": "<?php echo "$plan_name payment"; ?>",
    "image": "<?php echo base_url("assets/images/indian-gidc-logo.png") ?>",
    "order_id": "<?php echo $razorpayOrderId; ?>", 
    "callback_url": "<?php echo base_url(UPGRADE_PAYMENT_VERIFY); ?>",
    "prefill": {
        "name": "",
        "email": "<?php echo $email; ?>",
        "contact": "<?php echo $mobile; ?>"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#B51C1C"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>
<?php
	lvi("footer");
?>