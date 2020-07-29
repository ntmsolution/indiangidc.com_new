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
				<?php 
					lvi("personal-details");
					lvi("company-details");
					lvi("billing-details");
					lvi("bank-details");
				?>
			</div>
		</div>
	</div>
</div>
<script>
	$(".gbr").change(function(){		
		var gbr = $(this).val();
		
		if(gbr == "I am exempted")
		{
			$(".gst-box").css('display',"none");
		}
		else
		{
			$(".gst-box").css('display',"block");
		}
	});
</script>
<?php 
	lvi("footer");
?>