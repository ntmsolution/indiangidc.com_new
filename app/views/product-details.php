<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	lvi("header");
?>
<div class="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12 homeproduct productdetails">
				<div class="section padd">
					<div class="row">
						<div class="col-md-4">
							<div class="productimg text-center">
							    <img src="<?php echo base_url('assets/upload/product-image/'.$sp['product_image1']); ?>" height="240px" />
							</div>
						</div>
						<div class="col-md-5">
							<div class="product-name">
								<h2><?php echo ucwords(strtolower($sp['product_name'])); ?></h2>
							</div>
							<div class="price">
								Rs <?php echo $sp['product_price']."/".$sp['product_price_as_per']; ?>
								&nbsp;&nbsp;
								<?php 
									if($brochure != "" && (getLoginId('buyer') || getLoginId()))
									{
										$brochure_url 	= base_url("assets/upload/brochure/".$brochure);
								?>
										<a href="<?php echo $brochure_url; ?>" class="btn btn-primary" download title="Download brochure"><i class="fa fa-file-pdf-o" aria-hidden="true"> Download Brochure</i></a>
								<?php
									}	
								?>
							</div>
							<div class="description">
								
								<table class="table table-hover">
									<tbody>
									<?php 
										$seller_product_attributes = getSellerProductAttributes("product_id = '".$sp['id']."' ");
										foreach($seller_product_attributes as $spa)
										{
									?>
											<tr>
												<th><?php echo $spa['name']; ?></th>
												<td><?php echo $spa['value']; ?></td>
											</tr>
									  <?php 
										}
									  ?>
									</tbody>
								  </table>
							</div>
						</div>
						<div class="col-md-3">
							<div class="companynamedetails">
								<div class="company_name">
									<?php
											if($sp['catalog_url'] != "")
											{
									?>
												<h2><a href="<?php echo base_url().SELLERPROFILE_INDEX."/".seourl($sp['catalog_url']); ?>"><?php echo ucwords(strtolower($sp['company_name'])); ?></a></h2>
									<?php 
											}
											else
											{
									?>
												<h2><a><?php echo ucwords(strtolower($sp['company_name'])); ?></a></h2>
									<?php
											}
									?>
								</div>
								<div class="locationdetails">
									<?php echo $sp['city'].", ".$sp['state'].", India."; ?>
								</div>
								<div class="d-flex">
									<!-- Start Modal Dialog -->
									<?php 
										if(getLoginId('buyer') || getLoginId())
										{													
									?>
											<button type="button" class="btn btn-primary myinqbtn " 
											data-toggle="modal" data-target="#productmodel" data-sellerid="<?php echo $sp["seller_id"]; ?>" data-idimg="<?php echo base_url("assets/upload/product-image/".$sp["product_image1"]); ?>" data-productid="<?php echo $sp["id"]; ?>" data-productname="<?php echo $sp["product_name"]; ?>" data-productprice="<?php echo $sp["product_price"]; ?>" >Contact Supplier</button>
											&nbsp;&nbsp;&nbsp;
											
											<button type="button" class="btn btn-dark getquote" target="_blank" data-toggle="modal" data-target="#productmodel" data-sellerid="<?php echo $sp["seller_id"]; ?>" data-idimg="<?php echo base_url("assets/upload/product-image/".$sp["product_image1"]); ?>" data-productid="<?php echo $sp["id"]; ?>" data-productname="<?php echo $sp["product_name"]; ?>" data-productprice="<?php echo $sp["product_price"]; ?>" > Get Quote</button>
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
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="product-description">
								<h2>Product Description</h2>	
								<div align="justify">
									<?php echo nl2br(stripslashes($sp['meta_description'])); ?>
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
	$(".productimg .owl-carousel").owlCarousel({
		items:1,
		dots:true,
		loop:true,
		autoplay:true,
		smartSpeed:500
	  });
</script>
<?php 
	lvi('model-login');
	lvi("model-inquiry");
	lvi("footer");
?>