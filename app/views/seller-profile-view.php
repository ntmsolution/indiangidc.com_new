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
				<p align="justify" style="line-height:23px;"><?php echo nl2br($sbp['meta_description']); ?></p>
			</div>			
		</div>
		<div class="ourproducts" id="product">
			<h2 class="heading1">Our Products
				<span class="line"></span>
			</h2>
			<div class="product-view">
				<div class="row">
					<?php 	
						$i 				= 1;
						$add_cate_id	= 0;
						$add_cate_id1	= 0;
						$our_product 	= array();
						$j 				= -1;
						$category_ids	= "";
						
						foreach($product as $row)
						{
								if($i == 1 || $add_cate_id1 != $row['category_id'])
								{
									$category_ids  .= "category_id = '".$row['category_id']."' || ";
									$add_cate_id1 	= $row['category_id'];
								}
								
								if($i == 1 || $add_cate_id != $row['subcategory_id'])
								{
									$j++;
									
									$add_cate_id 							= $row['subcategory_id'];
									$our_product[$j]['cat_id']				= $row['subcategory_id'];
									$our_product[$j]['seller_id']			= $row['seller_id'];
									$our_product[$j]['category_name']		= $row['subcategory_name'];
									$our_product[$j]['product_image']		= $row['product_image1'];
									$our_product[$j]['product_name'][]		= $row['product_name'];
									$our_product[$j]['product_id'][]		= $row['id'];
								
								}
								else
								{
									$our_product[$j]['product_name'][]		= $row['product_name'];
									$our_product[$j]['product_id'][]		= $row['id'];
								}
							
							
						
							$i++;
						}
						
						foreach($our_product as $op)
						{
					?>
							<div class="col-md-4">
								<div class="singleproduct">
									<table class="mytable">
										<tr>
											<td class="image">
												<img src="<?php echo base_url('assets/upload/product-image/'.$op['product_image']); ?>" height="240px" />
											</td>
										</tr>
										<tr>
											<td>
												<h2 class="producttitle"><?php echo $op['category_name']; ?></h2>
											</td>
										</tr>
										<tr>
											<td>
												<ul>
													<?php 
														$product_url1 	= $product_url2 	= $product_url3 	= "";
														$product_name1 	= $product_name2	= $product_name3	= "";
														if(isset($op['product_id'][0]))
														{
															$product_url1 	=  base_url().HOME_PRODUCT_DETAILS."/".seourl($op['product_name'][0])."/".$op['product_id'][0];
															$product_name1 	= $op['product_name'][0];
														}
														if(isset($op['product_id'][1]))
														{
															$product_url2 	=  base_url().HOME_PRODUCT_DETAILS."/".seourl($op['product_name'][1])."/".$op['product_id'][1];
															$product_name2 	= $op['product_name'][1];
														}
														if(isset($op['product_id'][2]))
														{
															$product_url3 	=  base_url().HOME_PRODUCT_DETAILS."/".seourl($op['product_name'][2])."/".$op['product_id'][2];
															$product_name3 	= $op['product_name'][2];
														}
															
													?>
															<li><a href="<?php echo $product_url1; ?>" target="_blank"><?php echo $product_name1; ?></a></li>
															<li><a href="<?php echo $product_url2; ?>" target="_blank"><?php echo $product_name2; ?></a></li>
															<li><a 
															="<?php echo $product_url3; ?>" target="_blank"><?php echo $product_name3; ?></a> 
															<?php
																
																if(count($op['product_name']) > 3)
																{
															?>	
																	<span style='float:right;text-decoration:underline;'><a style='color:red;' href="<?php echo base_url(SELLERPROFILE_MORE.'/'.seourl($op['category_name']).'/'.$op['seller_id'].'/'.$op['cat_id']); ?>">More</a></span>
																	<span style="clear:both;"></span>
															<?php
																}
															?>
															</li>
												</ul>
												
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
						<p class="address"><i class="fa fa-map-marker"></i> <?php echo ucwords(strtolower($sp['address']))." - ".ucwords(strtolower($sp['city'])).", ".ucwords(strtolower($sp['state'])).", ".ucwords(strtolower($sp['country']))."."; ?></p>
						
						<?php 
							if(!empty($sbp['ceo_name'])){
						?>
						<h2>CEO Name</h2>
						<p class="address"><i class="fa fa-user-o"></i> <?php echo $sbp['ceo_name']; ?></p>
						<?php
							}
						?>
						
						<?php 
							if(!empty($sp['first_name'])){
						?>
						<h2>Contact Person</h2>
						<p class="address"><i class="fa fa-user-o"></i> <?php echo $sp['first_name']." ".$sp['last_name']; ?> <?php if($sp['designation'] != ""){ echo "(".$sp['designation'].")"; } ?></p>
						<?php
							}
						?>
						
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
						<div class="otherdetails" style="margin-top:0px;">
							<div class="row">
								<?php
									if(!empty($sbp['primary_business_type'])){
								?>
								<div class="col-md-6">
									<div class="details">
										<h2>Nature of Business</h2>
										<p><?php echo ($sbp['primary_business_type'] != "") ? $sbp['primary_business_type'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($ss['gst_no'])){
								?>
								<div class="col-md-6">
									<div class="details">
										<h2>GST Number</h2>
										<p><?php echo ($ss['gst_no'] != "") ? $ss['gst_no'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($ss['pan_no'])){
								?>
								<div class="col-md-6">
									<div class="details">
										<h2>PAN Number</h2>
										<p><?php echo ($ss['pan_no'] != "") ? $ss['pan_no'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($ss['tan_no'])){
								?>
								<div class="col-md-6">
									<div class="details">
										<h2>TAN Number</h2>
										<p><?php echo ($ss['tan_no'] != "") ? $ss['tan_no'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($ss['cin_no'])){
								?>
								<div class="col-md-6">
									<div class="details">
										<h2>CIN Number</h2>
										<p><?php echo ($ss['cin_no'] != "") ? $ss['cin_no'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($ss['ie_code'])){
								?>
								<div class="col-md-6">
									<div class="details">
										<h2>IE Code</h2>
										<p><?php echo ($ss['ie_code'] != "") ? $ss['ie_code'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($ss['anuual_turnover'])){
								?>
								<div class="col-md-6">
									<div class="details">
										<h2>Annual Turn Over</h2>
										<p><?php echo ($ss['anuual_turnover'] != "") ? $ss['anuual_turnover'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($ss['number_of_employee'])){
								?>
								<div class="col-md-6">
									<div class="details">
										<h2>Number of Employee</h2>
										<p><?php echo ($ss['number_of_employee'] != "") ? $ss['number_of_employee'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($sbp['year_establishment'])){
								?>
								<div class="col-md-6">
									<div class="details">
										<h2>Year of Establishment</h2>
										<p><?php echo ($sbp['year_establishment'] != "") ? $sbp['year_establishment'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($sbp['ownership_type'])){
								?>
								<div class="col-md-6">
									<div class="details">
										<h2>Legal Status of Firm</h2>
										<p><?php echo ($sbp['ownership_type'] != "") ? $sbp['ownership_type'] : "&nbsp;"; ?></p>
									</div>
								</div>
								<?php
									}
									if(!empty($sbi['account_no'])){
								?>
								<div class="col-md-6">
									<div class="details">
										<h2>Bank Details</h2>
										<div style="font-size:14px;">
											<div><strong>Bank Name: </strong><?php echo ($sbi['bank_name'] != "") ? $sbi['bank_name'] : "&nbsp;"; ?></div>
											<div><strong>Account Type: </strong><?php echo ($sbi['account_type'] != "") ? $sbi['account_type'] : "&nbsp;"; ?></div>
											<div><strong>Account Name: </strong><?php echo ($sbi['account_name'] != "") ? $sbi['account_name'] : "&nbsp;"; ?></div>
											<div><strong>Account No: </strong><?php echo ($sbi['account_no'] != "") ? $sbi['account_no'] : "&nbsp;"; ?></div>
											<div><strong>IFSC Code: </strong><?php echo ($sbi['ifsc_code'] != "") ? $sbi['ifsc_code'] : "&nbsp;"; ?></div>
										
										</div>
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
		<div class="ourproducts relatedproducts" style="display:none;">
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