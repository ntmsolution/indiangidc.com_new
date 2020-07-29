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
								<h2>Post Requirement</h2>
							</div>
							<div class="seperator"></div>
							<?php 
								echo form_open_multipart(SELLER_POST_REQUIREMENT);
							?>
							<div class="row">
								<div class="col-md-6">
									<label>Select Product Category</label>
									<div class="form-group">
										<select name="category_id" id="category_id" class="form-control search-category" required >
											<option value="">--- Select Product Category ---</option>
											<?php
												$scid 				= "";
												$product_category 	= getCategory("parent_id = '0' order by category_name ASC");
												
												foreach ($product_category as $row) 
												{
											?>
													<option value="<?php echo $row['id']; ?>"><?php echo $row["category_name"]; ?></option>
											<?php		
												}
											?>
										</select>
										<small class="form-text text-muted "><?php echo form_error('category_id'); ?></small>
									</div>
								</div>
								<div class="col-md-6">
									<label>Area of use</label>
									<div class="form-group">
										<select name="subcategory_id" id="subcategory_id" class="form-control search-subcategory" required >
											<option value="">--- Select Area of use ---</option>
										</select>
										<span style="clear:both"></span>
										<small class="form-text text-muted "><?php echo form_error('subcategory_id'); ?></small>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-12">
									<label>Message</label>
									<div class="form-group">
										<textarea name="message" maxlength="5000" id="message" class="form-control" placeholder="Enter Message" required ><?php echo set_value('message'); ?></textarea>
										<small class="form-text text-muted"><?php echo form_error('message'); ?></small>
									</div>
								</div>
							</div> 
							<div class="row append-after-attr" style="margin-top:10px;">
								<div class="col-md-4 offset-md-4 text-center">
									<div class="form-group">
										<input type="submit" name="add_requirement" class="form-control btn btn-primary" value="Add Post" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="section padd">					
							<div class="heading">
								<h2>Receive Requirement</h2>
							</div>
							<div class="seperator"></div>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr class="lead_buy_heading">
											<th>Buyer Name</th>
											<th>Are of use</th>
											<th>Contact No</th>
											<th>Message</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$seller_id 		= getLoginId();
											$qry 			= "select br.*, spro.subcategory_name, sp.first_name, sp.last_name, r.mobile from buy_request br
																			left join  registration r 
																			on
																			br.buyer_id = r.id
																			left join seller_profile sp
																			on
																			sp.seller_id = br.buyer_id
																			left join seller_product spro
																			on
																			spro.subcategory_id = br.subcategory_id
																			where br.buyer_id != $seller_id
																			group by br.id
																			LIMIT $pno, ".PER_PAGE_REC;
											$buy_request 	= query($qry);
											foreach($buy_request as $row)
											{
												
										?>
												<tr>
													<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
													<td><?php echo $row['subcategory_name']; ?></td>
													<td><?php echo $row['mobile']; ?></td>
													<td><?php echo $row['message']; ?></td>
												</tr>
												
										<?php
											}
										?>
												<tr>
													<td colspan="4">
														<?php 
															echo paging(countRec($qry),PER_PAGE_REC,SELLER_VIEW_REQUIREMENT."/0/0/");
														?>
													</td>
												</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<div class="section padd">					
							<div class="heading">
								<h2>Lead Manager</h2>
							</div>
							<div class="seperator"></div>
							<div class="row">
								<?php 
									$product = getSellerProduct("seller_id = '$seller_id' LIMIT $pno, 6");
									
									foreach($product as $row)
									{
								?>
										<div class="col-md-4">
											<div class="lead-manager-product">
												<img src="<?php echo base_url('assets/upload/product-image/'.$row['product_image1']); ?>"  />
												<h2><?php echo $row['product_name']; ?></h2>
												<a href="<?php echo base_url(SELLER_LEADMANAGER_PRODUCTS."/0/".$row['id']."/0/0/");
												?>">Message (<?php echo countRec('lead_buy',"inquiry_type = 'get_quote'&& product_id = ".$row['id']); ?>)</a>
											</div>
										</div>
								<?php
									}
								?>
							</div>
							<div class="seperator"></div>
							<div class="row">
								<div class="col-md-12">
									<?php 
										echo paging(countRec("seller_product","seller_id = $seller_id"),6,SELLER_LEADMANAGER);
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>


<script>
	$('.search-category').select2();
	$('.search-subcategory').select2();
	
	$("#category_id").change(function()
	{
		var category_id = $(this).val();
		var csrfName 	= '<?php echo $this->security->get_csrf_token_name(); ?>';
		var csrfHash 	= '<?php echo $this->security->get_csrf_hash(); ?>';
		
		if(category_id == "")
		{
			$("#subcategory_id").html("<option value=''>--- Select Area of use ---</option>");
			return;
		}
		$.post("<?php echo base_url("Ajax/getSubcategory"); ?>",{[csrfName]: csrfHash, category_id: category_id })
		.done(function(data)
		{
			$("#subcategory_id").html(data);
		});
	
	});
</script>
<?php 
	//$pg = "addimage";
	//lvi("footer",array("pg"=>$pg));
	lvi("footer");
?>