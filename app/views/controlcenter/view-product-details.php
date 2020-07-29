<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	include "include/header.php";
?>
<style>
th{
	font-weight:bold!important;
}
</style>
	  <div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-12">
				<h1 class="m-0 text-dark">View Product Details</h1>
			  </div>
			</div>
		  </div>
		</div>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary card-outline" style="padding:20px;">
							<br/>
							
								<table id="example1" class="table table-bordered table-striped data-table">
									<tr>
										<th>Company Name</th>
										<td><a href="<?php echo base_url(ADMINFOLDER."User/view/".$row['seller_id']); ?>" target="_blank"><?php echo $row['company_name']; ?></a></td>
										<th>Contact Number</th>
										<td>
											<?php
												$reg = getRegistrationById($row['seller_id']);
												echo $reg['mobile']; 
											?>
										</td>
									</tr>
									<tr>
										<th>Category Name</th>
										<td><?php echo $row['category_name']; ?></td>
										<th>Are of use</th>
										<td><?php echo $row['subcategory_name']; ?></td>
									</tr>
									<tr>
										
										<th>Product Name</th>
										<td><?php echo $row['product_name']; ?></td>
										<th>Product Price</th>
										<td><?php echo $row['product_price']; ?></td>
									</tr>
									<tr>
										<th>Product Price as per</th>
										<td><?php echo $row['product_price_as_per']; ?></td>
										<th>Product Youtube URL</th>
										<td><?php echo $row['product_youtube_url']; ?></td>
									</tr>
									<tr>
										<th>Product Description</th>
										<td colspan="3"><?php echo $row['meta_description']; ?></td>
									</tr>
									<tr>
										<th>Product Keywords</th>
										<td><?php echo $row['meta_keywords']; ?></td>
										<th>Product Image 1</th>
										<td>
											<?php 
												if($row['product_image1'] != "")
												{
											?>
													<img src="<?php echo base_url('assets/upload/product-image/'.$row['product_image1']); ?>" height="150px" />
											<?php 
												}
											?>
										</td>
									</tr>
									<tr>
										<th>Product Image 2</th>
										<td>
											<?php 
												if($row['product_image2'] != "")
												{
											?>
													<img src="<?php echo base_url('assets/upload/product-image/'.$row['product_image2']); ?>" height="150px" />
											<?php 
												}
											?>
										</td>
										<th>Product Image 3</th>
										<td>
											<?php 
												if($row['product_image3'] != "")
												{
											?>
													<img src="<?php echo base_url('assets/upload/product-image/'.$row['product_image3']); ?>" height="150px" />
											<?php 
												}
											?>
										</td>
									</tr>
									<tr>
										<th>Product Image 4</th>
										<td>
											<?php 
												if($row['product_image4'] != "")
												{
											?>
													<img src="<?php echo base_url('assets/upload/product-image/'.$row['product_image4']); ?>" height="150px" />
											<?php 
												}
											?>
										</td>
										<th>Product Image 5</th>
										<td>
											<?php 
												if($row['product_image5'] != "")
												{
											?>
													<img src="<?php echo base_url('assets/upload/product-image/'.$row['product_image5']); ?>" height="150px" />
											<?php 
												}
											?>
										</td>
									</tr>
								</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	
<?php include "include/footer.php"; ?>