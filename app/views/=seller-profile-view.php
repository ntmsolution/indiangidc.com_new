<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	lvi("seller-header");
?>
		<div class="banner" id="home">
			<div class="owl-carousel owl-theme">
				<?php 
					foreach($product as $row)
					{
				?>
						<div class="item">
							<div class="box">
								<img src="<?php echo base_url('assets/upload/product-image/'.$row['product_image1']); ?>" />
								
								<div class="description">
									<h2><?php echo $row['product_name']; ?></h2>
									<?php 
										if(getLoginId('buyer') || getLoginId())
										{													
									?>
											<a  class="getquote getaquote" target="_blank" data-toggle="modal" data-target="#productmodel" data-sellerid="<?php echo $row["seller_id"]; ?>" data-idimg="<?php echo base_url("assets/upload/product-image/".$row["product_image1"]); ?>" data-productid="<?php echo $row["id"]; ?>" data-productname="<?php echo $row["product_name"]; ?>" data-productprice="<?php echo $row["product_price"]; ?>" > Get Quote</a>
									<?php
										}
										else
										{
									?>
											<a class="getquote getaquote" data-toggle="modal" data-target="#loginmodel" > Get Quote</a>
									<?php 
										}
									?>
									
								</div>
							</div>
						</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="aboutcompany" id="about">
			<h2 class="heading1">About Company
				<span class="line"></span>
			</h2>
			<div class="description">
				<p align="center"><?php echo $sbp['about_company']; ?></p>
			</div>			
		</div>
		<div class="ourproducts" id="product">
			<h2 class="heading1">Our Products
				<span class="line"></span>
			</h2>
			<div class="product-view">
				<div class="row">
					<?php 	
						foreach($product as $op){
					?>
							<div class="col-md-3">
								<div class="singleproduct">
									<table class="mytable">
										<tr>
											<td class="image">
												<img src="<?php echo base_url('assets/upload/product-image/'.$op['product_image1']); ?>" height="200px" />
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="producttitle"><?php echo $op['product_name']; ?></h2>
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="productprice">Rs. <?php echo $op['product_price']; ?> / <?php echo $op['product_price_as_per']; ?></h2>
											</td>
										</tr>
									</table>
								</div>
							</div>
					<?php
						}
					?>
							
				
				</div>
			</div>
		</div>
		<div class="contactus" id="contact">
			<h2 class="heading1">Get in touch with us 
				<span class="line"></span>
			</h2>
			<div class="container">
				<div class="row">
					<div class="col-md-5 contactdetails">
						<h2><?php echo ucwords(strtolower($sbp['company_name'])); ?></h2>
						<p class="address"><i class="fa fa-map-marker"></i> <?php echo stripslashes(strtolower($sp['address'])." - ".ucfirst(strtolower($sp['city'])).", ".ucfirst(strtolower($sp['state'])).", ".ucfirst(strtolower($sp['country']))."."); ?></p>
						
						<h2>Contact Person</h2>
						<p class="address"><i class="fa fa-user-o"></i> <?php echo $sp['first_name']." ".$sp['last_name']; ?> <?php if($sp['designation'] != ""){ echo "(".$sp['designation'].")"; } ?></p>
						
						<div class="actionbutton">
							<?php 
								if(getLoginId('buyer') || getLoginId())
								{
							?>
									<button  class="button contactno sendmsg" data-toggle="modal" data-target="#productmodel" data-sellerid="<?php echo $sp['seller_id']; ?>" data-typeinquiry="mobile"  ><i class="fa fa-paper-plane"></i> Send Message</button>
									<button  class="button email sendemail" data-toggle="modal" data-target="#productmodel" data-sellerid="<?php echo $sp['seller_id']; ?>" data-typeinquiry="email"  ><i class="fa fa-envelope"></i> Send Email</button>
							<?php 
								}
								else
								{
							?>
								<button href="javascript: void();" class="button contactno" data-toggle="modal" data-target="#loginmodel" ><i class="fa fa-paper-plane"></i> Send Message</button>
								<button href="javascript: void();" class="button email" data-toggle="modal" data-target="#loginmodel" ><i class="fa fa-envelope"></i> Send Email</button>
							<?php
								}
							?>
						</div>
					</div>
					<div class="col-md-7">
						<div class="otherdetails">
							<div class="row">
								<?php
									if(!empty($sbp['primary_business_type'])){
								?>
								<div class="col-md-3">
									<div class="details">
										<h2>Nature of Business</h2>
										<p><?php echo ($sbp['primary_business_type'] != "") ? $sbp['primary_business_type'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($ss['gst_no'])){
								?>
								<div class="col-md-3">
									<div class="details">
										<h2>GST Number</h2>
										<p><?php echo ($ss['gst_no'] != "") ? $ss['gst_no'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($sbp['year_establishment'])){
								?>
								<div class="col-md-3">
									<div class="details">
										<h2>Year of Establishment</h2>
										<p><?php echo ($sbp['year_establishment'] != "") ? $sbp['year_establishment'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($sbp['ownership_type']!="")){
								?>
								<div class="col-md-3">
									<div class="details">
										<h2>Legal Status of Firm</h2>
										<p><?php echo ($sbp['ownership_type'] != "") ? $sbp['ownership_type'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="ourproducts relatedproducts">
			<h2 class="heading1">Related Product from Other Suppliers
				<span class="line"></span>
			</h2>
			<div class="product-view">
				<div class="row">
					<?php
						$category_ids		= rtrim($category_ids," || ");
						if($category_ids == ""){ $category_ids = "1 = 1"; }
						$other_product 		= getSellerProduct("($category_ids) && seller_id != '$seller_id' order by rand() limit 6");
						foreach($other_product as $row)
						{
							$catalog_url 	= $row['catalog_url'];
							$cmp_url		= ($catalog_url != "") ? "href='".base_url().SELLERPROFILE_INDEX."/".seourl($catalog_url)."' target='_blank'" : "href='javascript: void()'";
					?>
							<div class="col-md-4">
								<div class="singleproduct">
									<table class="mytable">
										<tr>
											<td class="image">
												<img src="<?php echo base_url('assets/upload/product-image/'.$row['product_image1']); ?>" height="240px" />
											</td>
										</tr>
										<tr>
											<td class="text-center">
												<h2 class="producttitle"><?php echo $row['product_name']; ?></h2>
												<p>Rs <?php echo $row['product_price']; ?>/ <?php echo $row['product_price_as_per']; ?></p>
												<p style="margin-top:10px;"><strong><a <?php echo $cmp_url; ?>><?php echo $row['company_name']; ?></a></strong></p>
												<p class="address"><?php echo ucfirst(strtolower($row['city'])).", ".ucfirst(strtolower($row['state'])).", India"; ?> </p>
												<div class="actionbutton">
													<?php 
														if(getLoginId('buyer') || getLoginId())
														{													
													?>
														<button type="button" class="contactno myinqbtn" 
														data-toggle="modal" data-target="#productmodel" data-sellerid="<?php echo $row["seller_id"]; ?>" data-idimg="<?php echo base_url("assets/upload/product-image/".$row["product_image1"]); ?>" data-productid="<?php echo $row["id"]; ?>" data-productname="<?php echo $row["product_name"]; ?>" data-productprice="<?php echo $row["product_price"]; ?>" >Contact Supplier</button>
													<?php
														}
														else
														{
													?>
														<button type="button" class="contactno myinqbtn" data-toggle="modal" data-target="#loginmodel">Contact Supplier</button>
													<?php
														}
													?>
												</div>
											</td>
										</tr>
									</table>
								</div>
							</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	lvi('model-login');
	lvi("model-inquiry");
	lvi("footer");
?>