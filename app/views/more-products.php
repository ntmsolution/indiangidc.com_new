<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	lvi("header");
?>
<div class="content">
	<div class="container">
		<div class="row homeproduct">
			<div class="col-md-12">
		<?php 
			
			
			
			$categories 	= moreProduct($seller_id,$subcategory_id);
			
			
			$cate_id 		= 0;
			$i 				= 1;
			$add_cate_id	= 0;
			foreach($categories as $row)
			{
				
				if($i == 1 || $add_cate_id != $row['category_id'])
				{
					if($i != 1)
					{
						echo "</div>";
					}
					
					$add_cate_id 	= $row['category_id'];
					$category_name 	= ucwords(strtolower($row['category_name']));
		?>
						
							<div class="section padd">					
								<div class="heading">
									<h2 style="margin-bottom: 10px;"><?php echo $category_name; ?></h2>
								</div>
		<?php
			
				}
		?>
								<div class="row product" style="margin: 0px 0px 10px;padding: 0px;">
									<div class="col-md-3 gray">
										<table class="tablecenter">
											<tr>
												<td valign="middle">
													<a href="<?php echo base_url().HOME_PRODUCT_DETAILS."/".seourl($row['product_name'])."/".$row['id']; ?>"><img src="<?php echo base_url("assets/upload/product-image/".$row["product_image1"]); ?>" /></a>
												</td>
											</tr>
										</table>
										
									</div>
									<div class="col-md-6">
										<div class="product-name">
											<h2><a href="<?php echo base_url().HOME_PRODUCT_DETAILS."/".seourl($row['product_name'])."/".$row['id']; ?>"><?php echo ucwords(strtolower($row['product_name'])); ?></a></h2>
										</div>
										<div class="price">
											Rs <?php echo $row['product_price']?> / <span><?php echo $row['product_price_as_per']; ?></span>
											&nbsp;&nbsp;
											<?php 
												$brochure = "";
												if($row["brochure"] != "" && getLoginId('buyer'))
												{
													$brochure_url 	= base_url("assets/upload/brochure/".$row["brochure"]);
													
											?>
													<a href="<?php echo $brochure_url; ?>" class="btn btn-primary" download title="Download brochure"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Brochure</a>
											<?php
												}	
											?>
										</div>
										<div class="description">
											<ul>
												<?php 
													$seller_product_attributes = homeProductAttribute($row['id']);
													foreach($seller_product_attributes as $spa)
													{
												?>
														<li><strong><?php echo $spa['name']; ?></strong>: <?php echo $spa['value']; ?></li>
												  <?php 
													}
												  ?>
												</tbody>
											  </ul>
										</div>
									</div>
									<div class="col-md-3 gray companynamedetails">
										<div class="company_name">
											<?php 
												if($row['catalog_url'] != "")
												{
											?>
													<h2><a href="<?php echo base_url().SELLERPROFILE_INDEX."/".seourl($row['catalog_url']); ?>" ><?php echo ucwords(strtolower($row['company_name'])); ?></a></h2>
											<?php 
												}
												else
												{
											?>
													<h2><a href="javascript: void();"  ><?php echo ucwords(strtolower($row['company_name'])); ?></a></h2>
											<?php 
												}
											?>
										</div>
										<div class="locationdetails">
											<?php echo $row['city'].", ".$row['state'].", India."; ?>
										</div>
										<div class="d-flex">
											<!-- Start Modal Dialog -->
											<?php 
												if(getLoginId('buyer'))
												{													
											?>
													<button type="button" class="btn btn-primary myinqbtn " 
													data-toggle="modal" data-target="#productmodel" data-sellerid="<?php echo $row["seller_id"]; ?>" data-idimg="<?php echo base_url("assets/upload/product-image/".$row["product_image1"]); ?>" data-productid="<?php echo $row["id"]; ?>" data-productname="<?php echo $row["product_name"]; ?>" data-productprice="<?php echo $row["product_price"]; ?>" >Contact Supplier</button>
													&nbsp;&nbsp;&nbsp;
													
													<button type="button" class="btn btn-dark getquote" target="_blank" data-toggle="modal" data-target="#productmodel" data-sellerid="<?php echo $row["seller_id"]; ?>" data-idimg="<?php echo base_url("assets/upload/product-image/".$row["product_image1"]); ?>" data-productid="<?php echo $row["id"]; ?>" data-productname="<?php echo $row["product_name"]; ?>" data-productprice="<?php echo $row["product_price"]; ?>" > Get Quote</button>
											<?php
												}
												else
												{
											?>
													<button class="btn btn-primary" data-toggle="modal" data-target="#loginmodel">Contact Supplier</button>
													&nbsp;&nbsp;&nbsp;
													<button type="button" class="btn btn-dark"  data-toggle="modal" data-target="#loginmodel" >Get Quote</button>
											<?php
												}
											?>
										</div>
									</div>
								</div>
		<?php
				
				
			$i++;
			}
		?>
							</div>
						</div>
					</div>
	
		<?php 
			//lv('premium-member');
		?>
	</div>
</div>
<script>
	$(function(){
		$( "#product_name" ).autocomplete({
			source: function(request, response) {
			$.getJSON("<?php echo base_url("Home/autoComplete"); ?>", { category_name: $('#category_name').val(),product_name: $('#product_name').val() }, response);
			},
			minLength: 1
		});
		
		$("#search_form").each(function(){
			$(this).find('input').keypress(function(e) {
					// Enter pressed?
					if(e.which == 10 || e.which == 13) 
					{
						this.form.submit();
					}
				});
		});
	});
</script>
<?php 
	lvi('model-login');
	lvi('model-inquiry');
	lvi("footer");
?>