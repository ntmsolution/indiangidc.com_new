<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	lvi("header");
	$seller_product = getSellerProductById($product_id);
?>
<div class="content seller-dashboard"  style="padding:0px 0px;">
	<div class="container">	
		<div class="row" style="padding-top:50px;">
			<div class="col-md-3">
				<?php lvi("seller-dashboard-menu"); ?>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div class="section padd">					
							<div class="heading">
								<h2><?php echo $seller_product['product_name']; ?> Inquiry Message Details</h2>
								
							</div>
							<div class="seperator"></div>
							<?php 
								$lead_buy = getLeadBuyById($msg_id);
							?>
							<div class="product-name">
								<strong>Name</strong>: <?php echo ucfirst(strtolower($lead_buy['name'])); ?> 
							</div>
							<div>
								<strong>Mobile Number</strong>: <?php echo ucfirst(strtolower($lead_buy['contact_no'])); ?>
							</div>
							<div>
								<strong>Email Address</strong>: <?php echo ucfirst(strtolower($lead_buy['contact_email'])); ?>
							</div>
							<div>
								<strong>Message</strong>: 
								<p style='text-align:justify;'><?php echo ucfirst(strtolower($lead_buy['message'])); ?></p>
							</div>
							<div class="text-right"> 
								<button class="btn btn-dark"  onclick="location.href = '<?php echo base_url(SELLER_LEADMANAGER_PRODUCTS."/0/$product_id/no/$pno"); ?>'">Back</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	$("#category_id").change(function()
	{
		var category_id = $(this).val();
		
		$.post("<?php echo base_url("Ajax/getGroupName"); ?>",{ category_id: category_id })
		.done(function(data)
		{
			$("#group_id").html(data);
		});
		
		$.post("<?php echo base_url("Ajax/getSubcategory"); ?>",{ category_id: category_id })
		.done(function(data)
		{
			$("#subcategory_id").html(data);
		});
		
	});
	
	$("#subcategory_id").change(function(){
		var subcategory_id = $(this).val();
		if(subcategory_id == "other")
		{
			$("#subcategory_name").css('display','block');
			$("#subcategory_name").css('width','68%');
			$("#subcategory_id").css('width','30%');
			$("#subcategory_id").css('float','left');
		}
		else
		{
			$("#subcategory_name").css('display','none');
			$("#subcategory_id").css('width','');
			$("#subcategory_id").css('float','');
		}
	});
	
	$("#group_id").change(function(){
		var group_id = $(this).val();
		if(group_id == "other")
		{
			$("#group_name").css('display','block');
			$("#group_name").css('width','68%');
			$("#group_id").css('width','30%');
			$("#group_id").css('float','left');
		}
		else
		{
			$("#group_name").css('display','none');
			$("#group_id").css('width','');
			$("#group_id").css('float','');
		}
	});
	
	$("#add_txt_attr").click(function(){
		var  no1 = 2;
			$('.append-after-attr').before("<div class='row'><div class='col-md-6'><input type='text' name='attr_name[]' class='form-control' placeholder='Ex. Color' /></div><div class='col-md-6'><input type='text' placeholder='Ex. Blue' name='attr_value[]' class='form-control' /></div></div>");
		no1++;
	});
</script>
<?php 
	//$pg = "addimage";
	//lvi("footer",array("pg"=>$pg));
	lvi("footer");
?>