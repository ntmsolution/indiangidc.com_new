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
								<h2><?php echo $seller_product['product_name']; ?> Inquiry Message</h2>
							</div>
							<div class="seperator"></div>
							<div class="text-right" style="margin-bottom:10px;">
								<button class="btn btn-dark"  onclick="location.href = '<?php echo base_url(SELLER_LEADMANAGER); ?>'">Back</button>
							</div>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr class="lead_buy_heading">
											<th>Name</th>
											<th>Contact No</th>
											<th>Email</th>
											<th >Message</th>
											<th colspan="2">Date Time</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$seller_id 			= getLoginId();
											$lead_buy 			= getLeadBuy("seller_id = '$seller_id' && inquiry_type = 'get_quote' && product_id = '$product_id'  order by date_time DESC LIMIT $pno, ".PER_PAGE_REC);
											foreach($lead_buy as $row)
											{
												$style 			= "";
												$msg 			= stringRang($row['message'],40);
												$url 			= base_url(SELLER_LEADMANAGER_PRODUCTS."/".$row['id']."/$product_id/no/$pno/");
												$del_url 		= base_url(SELLER_LEADMANAGER_PRODUCTS."/".$row['id']."/$product_id/yes"."/$pno/");
												if($row['is_read'] == 0)
												{
													$style = "style='font-weight:bold'";
												}
												else if($msg_id == $row['id'])
												{
													$style 	= "";
													$msg	= $row['message'];
													$url	= base_url(SELLER_LEADMANAGER_PRODUCTS."/0/0/$pno");
												}
												
										?>
												
												<tr class="lead_buy_data" <?php echo $style; ?> title="<?php echo SELLER_BUYLEADS_MSG_OPEN; ?>" >
													<td onclick="javascript: location.href = '<?php echo $url; ?>'" ><?php echo $row['name']; ?></td>
													<td onclick="javascript: location.href = '<?php echo $url; ?>'" ><?php echo $row['contact_no']; ?></td>
													<td onclick="javascript: location.href = '<?php echo $url; ?>'"><?php echo $row['contact_email']; ?></td>
													<td onclick="javascript: location.href = '<?php echo $url; ?>'"><?php echo $msg; ?></td>
													<td  onclick="javascript: location.href = '<?php echo $url; ?>'"><?php echo dateTimeConvert($row['date_time']); ?></td>
													<td align="right">
														<a href="<?php echo $del_url; ?>" onclick="javascript: return confirm('<?php echo SELLER_BUYLEADS_MSG_ALERT; ?>'); "><i class="fa fa-trash" style='color:' aria-hidden="true"></i></a>
													</td>
												</tr>
										<?php
											}
										?>
										<tr>
													<td colspan="6">
														<?php 
															echo paging(countRec("lead_buy","seller_id = $seller_id && inquiry_type = 'get_quote' && product_id = '$product_id' "),PER_PAGE_REC,SELLER_LEADMANAGER_PRODUCTS."/0/$product_id/no/");
														?>
													</td>
												</tr>
									</tbody>
								</table>
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