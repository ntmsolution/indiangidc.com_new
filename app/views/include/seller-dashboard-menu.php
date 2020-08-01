<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$user_id 					= getLoginId();
	$seller_profile				= select("seller_profile","seller_id = $user_id");
	$seller_business_profile	= select("seller_business_profile","seller_id = $user_id");
?>
<div class="section padd">					
	<div class="row">
		<div class="col-md-12">
			<div class="heading" >
				<div class="user-name"><i class="fa fa-user menuicon"></i>  <?php if(isset($seller_profile[0]['first_name'])){ echo $seller_profile[0]['first_name']." ".$seller_profile[0]['last_name']; } ?> </div>
				<div class="company-name"><i class="fa fa-building-o menuicon"></i>  <?php if(isset($seller_business_profile[0]['company_name'])){ echo $seller_business_profile[0]['company_name']; } ?> </div>
			</div>
		</div>
	</div>
	<div class="row" style="padding:20px 0px;">
		<div class="col-md-12">
			<ul class="seller-menu">
				<li>
					<i class="menuicon fa fa-industry"></i> 
					<a href="#">Dashborad</a>
				</li>
				
				<li <?php if(getMethod() == "companyProfile"){ echo "class='active'"; } ?> >
					<i class="menuicon fa fa-pencil-square-o" aria-hidden="true"></i>
					<a href="<?php echo base_url(SELLER_COMPANYPROFILE); ?>">Edit Profile</a>
				</li>
				<li <?php if(getMethod() == "viewProducts" || getMethod() == "updateProduct"){ echo "class='active'"; } ?> >
					<i class="menuicon fa fa-product-hunt"></i> 
					<a href="<?php echo base_url(SELLER_VIEWPRODUCTS); ?>">Manage Products</a>
				</li>
				<li>
					<i class="menuicon fa fa-picture-o"></i> 
					<a href="#">Ad Manager</a>
				</li>
				<li <?php if(getMethod() == "addPostRequirement"){ echo "class='active'"; } ?>>
					<i class="menuicon fa fa-asterisk" aria-hidden="true"></i>

					<a href="<?php echo base_url(SELLER_POST_REQUIREMENT); ?>">Requirement</a>
				</li>
				<li <?php if(getMethod() == "sellerSettings"){ echo "class='active'"; } ?>>
					<i class="menuicon fa fa-gear"></i> 
					<a href="<?php echo base_url(SELLER_SETTINGS); ?>">Settings</a>
				</li>
				<li <?php if(getMethod() == "order"){ echo "class='active'"; } ?>>
					<i class="menuicon fa fa-money"></i> 
					<a href="<?php echo base_url(SELLER_ORDER); ?>">Payment Details</a>
				</li>
				<?php /*
				<li <?php //if(getMethod() == "dashboard"){ echo "class='active'"; } ?> >
					<i class="menuicon fa fa-dashboard"></i> 
					<a href="<?php //echo base_url(SELLER_DASHBOARD); ?>"></a>
				</li> 
				<li <?php //if(getMethod() == ""){ echo "class='active'"; } ?> >
					<i class="menuicon fa fa-list-alt"></i> 
					<a href="<?php //echo base_url(SELLER_COMPANYPROFILE); ?>">Premium Services</a>
				</li> 
				<li <?php if(getMethod() == "companyProfile"){ echo "class='active'"; } ?> >
					<i class="menuicon fa fa-industry"></i> 
					<a href="<?php echo base_url(SELLER_COMPANYPROFILE); ?>">Company Profile</a>
				</li>
				<li <?php if(getMethod() == "leadManager" || getMethod() == "leadManagerProduct"  || getMethod() == "leadManagerProductView"){ echo "class='active'"; } ?>>
					<i class="menuicon fa fa-tasks"></i> 
					<a href="<?php echo base_url(SELLER_LEADMANAGER); ?>">Lead Manager</a>
				</li>
				<li <?php if(getMethod() == "buyLeads" || getMethod() == "buyLeadsView"){ echo "class='active'"; } ?>>
					<i class="menuicon fa fa-cart-plus" ></i> 
					<a href="<?php echo base_url(SELLER_BUYLEADS); ?>">Buy Leads</a>
				</li>
				<?php /*<li <?php if(getMethod() == "manageProducts"){ echo "class='active'"; } ?> >
					<i class="menuicon fa fa-product-hunt"></i> 
					<a href="<?php echo base_url(SELLER_MANAGEPRODUCTS); ?>">Add Products</a>
				</li>
				
				<li <?php if(getMethod() == "addPostRequirement"){ echo "class='active'"; } ?>>
					<i class="menuicon fa fa-shopping-basket"></i> 
					<a href="<?php echo base_url(SELLER_POST_REQUIREMENT); ?>">Post Requirement</a>
				</li>
				<li <?php if(getMethod() == "viewRequirement"){ echo "class='active'"; } ?>>
					<i class="menuicon fa fa-get-pocket"></i> 
					<a href="<?php echo base_url(SELLER_VIEW_REQUIREMENT); ?>">Receive Requirement</a>
				</li>*/ ?>
				<?php /*<li>
					<i class="menuicon fa fa-picture-o"></i> 
					<a href="<?php //echo base_url(SELLER_PHOTODOCS); ?>">Photo & Docs</a>
				</li>
				<li <?php if(getMethod() == "buyerTools"){ echo "class='active'"; } ?> >	
					<i class="menuicon fa fa-wrench"></i> 
					<a href="<?php echo base_url(SELLER_BUYERTOOLS); ?>">Tools & Utility</a>
				</li>*/?>
				
				
			</ul>
			
		</div>
	</div>
</div>