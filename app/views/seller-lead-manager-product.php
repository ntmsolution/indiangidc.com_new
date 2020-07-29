
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
				<div class="row">
					<div class="col-md-12">
						<div class="section padd">					
							<div class="heading">
								<h2>Buy Leads</h2>
							</div>
							<div class="seperator"></div>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Name</th>
											<th>Contact Number</th>
											<th>Email</th>
											<th>Message</th>
											<th style='display:none;'>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$seller_id 		= getLoginId();
											$lead_buy = getLeadBuy("seller_id = '$seller_id'");
											foreach($lead_buy as $row)
											{
										?>
												<tr>
													<td><?php echo $row['name']; ?></td>
													<td><?php echo $row['contact_no']; ?></td>
													<td><?php echo $row['contact_email']; ?></td>
													<td><?php echo $row['message']; ?></td>
													<td style='display:none;'>
														<a href="<?php echo base_url(SELLER_BUYLEADS."/".$row['id']); ?>" >Delete</a>
													</td>
												</tr>
										<?php
											}
										?>
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