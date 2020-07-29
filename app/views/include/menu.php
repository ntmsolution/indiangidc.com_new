<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ul class="top-right-menu">
	<?php 
		if(getLoginId() || getLoginId('buyer'))
		{
			if(getLoginId())
				{
		?>
				<li><a href="<?php echo base_url(SELLER_COMPANYPROFILE); ?>"><span class="highlight">Dashboard</span></a></li>
		<?php
				}
				
				if(getLoginId('buyer'))
				{
		?>
					<li><a href="<?php echo base_url("/"); ?>"><span class="highlight">Home</span></a></li>
		<?php
				}else
				{
		?>
					<li><a href="<?php echo base_url("/"); ?>">Home</a></li>
		<?php
				}
		?>	
			
			<li><a href="<?php echo base_url("Logout"); ?>">Logout</a></li>
	<?php
		}
		else
		{
	?>
			<li><a href="<?php echo base_url("/"); ?>" >Home</a></li>
			<li><a href="<?php echo base_url(REGISTRATION_STEP1); ?>"><span class="highlight">Join Now</span></a></li>
			<li><a href="<?php echo base_url(LOGIN_INDEX); ?>">Login</a></li>
	<?php
			/*<li><a href="<?php echo base_url(LOGIN_BUYER); ?>">Buyer Login</a></li>*/
		}
	?>
</ul>