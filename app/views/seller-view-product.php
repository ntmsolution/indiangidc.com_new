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
							<div class="heading" style="display:inline-block;margin-bottom:10px;">
								<h2>Manage Product </h2>
							</div>
							<div class="text-right" style="float:right;">
								<a href="<?php echo base_url(SELLER_MANAGEPRODUCTS); ?>" class="btn btn-primary" >Add Products</a>
							</div>
							<div style="clear:both;"></div>
							<div class="seperator"></div>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Product Category</th>
											<th>Product are of use</th>
											<th>Product Name</th>
											<th>Product Image</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$seller_id 		= getLoginId();
											$seller_product = getSellerProduct("seller_id = '$seller_id' LIMIT $pno, ".PER_PAGE_REC);
											foreach($seller_product as $row)
											{
										?>
												<tr>
													<td><?php echo $row['category_name']; ?></td>
													<td><?php echo $row['subcategory_name']; ?></td>
													<td><?php echo $row['product_name']; ?></td>
													<td><img src="<?php echo base_url("assets/upload/product-image/".$row['product_image1']); ?>" height="100px" /></td>
													<td>
														<a href="<?php echo base_url(SELLER_UPDATEPRODUCTS."/".$row['id']); ?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
														| 
														<a href="<?php echo base_url(SELLER_VIEWPRODUCTS."/$pno/".$row['id']); ?>" onclick="javascript: return confirm('<?php echo SELLER_BUYLEADS_MSG_ALERT; ?>'); "><i class="fa fa-trash" style='color:red;' aria-hidden="true"></i></a>
													</td>
												</tr>
										<?php
											}
										?>
										<tr>
											<td colspan="5">
												<?php 
													echo paging(countRec("seller_product","seller_id = $seller_id"),PER_PAGE_REC,SELLER_VIEWPRODUCTS);
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