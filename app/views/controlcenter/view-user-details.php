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
				<h1 class="m-0 text-dark">View User Full Details</h1>
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
										<th colspan="4">
											<h3>Business Details</h3>
										</th>
									</tr>
									<tr>
										<th>Company Name</th>
										<td><?php echo $sbp['company_name']; ?></td>
										<th>Year Establishment</th>
										<td><?php echo $sbp['year_establishment']; ?></td>
									</tr>
									<tr>
										<th>CEO Name</th>
										<td><?php echo $sbp['ceo_name']; ?></td>
										<th>Meta Keywords</th>
										<td><?php echo $sbp['meta_keywords']; ?></td>
									</tr>
									<tr>
										<th>Ownership Type</th>
										<td><?php echo $sbp['ownership_type']; ?></td>
										<th>Primary Business Type</th>
										<td><?php echo $sbp['primary_business_type']; ?></td>
									</tr>
									<tr>
										<th>Number of employee</th>
										<td><?php echo $sbp['number_of_employee']; ?></td>
										<th>Annual Turn Over</th>
										<td><?php echo $sbp['anuual_turnover']; ?></td>
									</tr>
									<tr>
										<th>Catalog URL</th>
										<td><?php echo $sbp['catalog_url']; ?></td>
										<th>Company Website</th>
										<td><?php echo $sbp['company_website']; ?></td>
									</tr>
									<tr>
										<th>Secondary Business</th>
										<td colspan="3"><?php echo $sbp['secondary_business']; ?></td>
										
									</tr>
									<tr>
										<th>About Company</th>
										<td colspan="3"><?php echo $sbp['meta_description']; ?></td>
									</tr>
									<tr>
										<th>Download Brochure</th>
										<td>
											<?php 
												if($sbp['brochure'] != "")
												{
											?>
													<a href="<?php echo base_url('assets/upload/brochure/'.$sbp['brochure']) ?>" download >Download</a>
											<?php 
												}
											?>
										</td>
										<th>Company Logo</th>
										<td>
											<?php 
												if($sbp['company_logo'] != "")
												{
											?>
													<img src="<?php echo base_url('assets/upload/user-image/'.$sbp['company_logo']); ?>" height="150px" />
											<?php 
												}
											?>
										</td>
									</tr>
									<tr>
										<th>Business Card Front</th>
										<td>
											<?php 
												if($sbp['business_card_front'] != "")
												{
											?>
													<img src="<?php echo base_url('assets/upload/business-card/'.$sbp['business_card_front']); ?>" height="150px" />
											<?php 
												}
											?>
										</td>
										<th>Business Card Front</th>
										<td>
											<?php 
												if($sbp['business_card_back'] != "")
												{
											?>
													<img src="<?php echo base_url('assets/upload/business-card/'.$sbp['business_card_back']); ?>" height="150px" />
											<?php 
												}
											?>
										</td>
									</tr>
								</table>
								
								<table id="example1" class="table table-bordered table-striped data-table">
									<tr>
										<th colspan="4">
											<h3>Billing Details</h3>
										</th>
									</tr>
									<tr>
										<th>GST Number</th>
										<td><?php echo $ss['gst_no']; ?></td>
										<th>GST Not Provide Reason</th>
										<td>
											<?php 
												if($ss['gst_no'] == "")
												{													
													echo $ss['gst_no_reson']; 
												}
											?>
										</td>
									</tr>
									<tr>
										<th>PAN Number</th>
										<td><?php echo $ss['pan_no']; ?></td>
										<th>TAN Number</th>
										<td><?php echo $ss['tan_no']; ?></td>
									</tr>
									<tr>
										<th>CIN Number</th>
										<td><?php echo $ss['cin_no']; ?></td>
										<th>IE Code</th>
										<td><?php echo $ss['ie_code']; ?></td>
									</tr>
								</table>
								
								<table id="example1" class="table table-bordered table-striped data-table">
									<tr>
										<th colspan="4">
											<h3>Bank Info</h3>
										</th>
									</tr>
									<tr>
										<th>IFSC Code</th>
										<td><?php echo $sbi['ifsc_code']; ?></td>
										<th>Bank Name</th>
										<td><?php echo $sbi['bank_name']; ?></td>
									</tr>
									<tr>
										<th>Account Number</th>
										<td><?php echo $sbi['account_no']; ?></td>
										<th>Account Type</th>
										<td><?php echo $sbi['account_type']; ?></td>
									</tr>
								</table>
								
								<table id="example1" class="table table-bordered table-striped data-table">
									<tr>
										<th colspan="4">
											<h3>Personal Information</h3>
										</th>
									</tr>
									<tr>
										<th>First Name</th>
										<td><?php echo $sp['first_name']; ?></td>
										<th>Last Name</th>
										<td><?php echo $sp['last_name']; ?></td>
									</tr>
									<tr>
										<th>Designation</th>
										<td><?php echo $sp['designation']; ?></td>
										<th>Address</th>
										<td><?php echo $sp['address']; ?></td>
									</tr>
									<tr>
										<th>Mobile Number 1</th>
										<td><?php echo $reg['mobile']; ?></td>
										<th>Mobile Number 2</th>
										<td><?php echo $sp['mobile_number2']; ?></td>
									</tr>
									<tr>
										<th>Email Address 1</th>
										<td><?php echo $reg['email']; ?></td>
										<th>Email Address 2</th>
										<td><?php echo $sp['email_address2']; ?></td>
									</tr>
									<tr>
										<th>Locality</th>
										<td><?php echo $sp['locality']; ?></td>
										<th>City</th>
										<td><?php echo $sp['city']; ?></td>
									</tr>
									<tr>
										<th>State</th>
										<td><?php echo $sp['state']; ?></td>
										<th>Country</th>
										<td><?php echo $sp['country']; ?></td>
									</tr>
									<tr>
										<th>Pin Code</th>
										<td><?php echo $sp['pin_code']; ?></td>
										<th>Support Pin</th>
										<td><?php echo $reg['support_pin']; ?></td>
									</tr>
								</table>
								
								<table id="example1" class="table table-bordered table-striped data-table">
									<tr>
										<th colspan="4">
											<h3>Product Details</h3>
										</th>
									</tr>
								<?php 
									$i = 1;
									foreach($products as $row)
									{
										
								?>
									<tr>
										<td colspan="4"><h4>Product <?php echo $i; ?></h4></td>
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
									<tr>
										<td colspan="4">
											
										</td>
									</tr>
									
								<?php
										$i++;
									}
								?>
								
								</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	
<?php include "include/footer.php"; ?>