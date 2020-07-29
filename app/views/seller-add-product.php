<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	lvi("header");
?>
<div class="content seller-dashboard"  style="padding:0px 0px;">
	<div class="container">	
		<div class="row">
			<div class="col-md-3">
				<?php lvi("seller-dashboard-menu"); ?>
			</div>
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-12">
						<div class="section padd">					
							<div class="heading">
								<h2>Add Your GST Number (GST number will get you genuine customers.) </h2>
							</div>
							<div class="seperator"></div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input type="text" name="gst_number" class="form-control" value="<?php echo set_value('gst_number'); ?>" placeholder="Enter GST Number" />
										<small class="form-text text-muted "><?php echo form_error('gst_number'); ?></small>
									</div>
									<div class="seperator"></div>
									<div class="form-group">
										<input type="submit" name="add_gst" class="btn btn-primary" value="Add GST" />
									</div>
								</div>
							</div>
						</div>
						<div class="section padd">					
							<div class="heading">
								<h2>Products </h2>
							</div>
							<div class="seperator"></div>
							<div class="row">
								<div class="col-md-12">
									<small><b>Add 3 Product/ Service</b></small>
									<?php 
										echo form_open_multipart(REGISTRATION_STEP3);
									?>
									<div class="row">
										<div class="col-md-4">
											<div class="product-image">
												<?php 
													if(getSession('product_image1'))
													{
														$product_image1 = getSession('product_image1');
												?>
														<img src="<?php echo base_url("assets/upload/product-image/$product_image1") ?>" />
												<?php
													}
													else
													{
												?>
														<img src="<?php echo base_url("assets/upload/product-image/default.png") ?>" onclick="document.getElementById('product_image1').click();" />
														<input type="file" name="product_image1" style="display:none" onchange="form.submit();" id="product_image1" accept="image/*" />
												<?php
													}
												?>
											</div>
											<div class="product-category">
												<select name="product_category1" class="form-control">
													<option value="">--- Select Category ---</option>
													<?php 
														foreach(getCategory() as $row)
														{
															$s = "";
															if(getSession('product_category1') == $row['id'])
															{
																$s = "selected";
															}
															
													?>
														<option <?php echo $s; ?> value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
													<?php
														}
													?>
												</select>
												<small class="form-text text-muted"><?php echo form_error('product_category1'); ?></small>
											</div>
											<div class="product-title">
												<input type="text" name="product_name1" placeholder="Product Name" class="form-control" value="<?php echo getSession('product_name1'); ?>" />
												<small class="form-text text-muted"><?php echo form_error('product_name1'); ?></small>
											</div>
										</div>
										<div class="col-md-4">
											<div class="product-image">
												<?php 
													if(getSession('product_image2'))
													{
														$product_image2 = getSession('product_image2');
												?>
														<img src="<?php echo base_url("assets/upload/product-image/$product_image2") ?>" />
												<?php
													}
													else
													{
												?>
														<img src="<?php echo base_url("assets/upload/product-image/default.png") ?>" onclick="document.getElementById('product_image2').click();" />
														<input type="file" name="product_image2" style="display:none" onchange="form.submit();" id="product_image2" accept="image/*" />
												<?php
													}
												?>
											</div>
											<div class="product-category">
												<select name="product_category2" class="form-control">
													<option value="">--- Select Category ---</option>
													<?php 
														foreach(getCategory() as $row)
														{
															$s = "";
															if(getSession('product_category2') == $row['id'])
															{
																$s = "selected";
															}
															
													?>
														<option <?php echo $s; ?> value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
													<?php
														}
													?>
												</select>
												<small class="form-text text-muted"><?php echo form_error('product_category2'); ?></small>
											</div>
											<div class="product-title">
												<input type="text" name="product_name2" placeholder="Product Name" class="form-control" value="<?php echo getSession('product_name2'); ?>" />
												<small class="form-text text-muted"><?php echo form_error('product_name2'); ?></small>
											</div>
										</div>
										<div class="col-md-4">
											<div class="product-image">
												<?php 
													if(getSession('product_image3'))
													{
														$product_image3 = getSession('product_image3');
												?>
														<img src="<?php echo base_url("assets/upload/product-image/$product_image3") ?>" />
												<?php
													}
													else
													{
												?>
														<img src="<?php echo base_url("assets/upload/product-image/default.png") ?>" onclick="document.getElementById('product_image3').click();" />
														<input type="file" name="product_image3" style="display:none" onchange="form.submit();" id="product_image3" accept="image/*" />
												<?php
													}
												?>
											</div>
											<div class="product-category">
												<select name="product_category3" class="form-control">
													<option value="">--- Select Category ---</option>
													<?php 
														foreach(getCategory() as $row)
														{
															$s = "";
															if(getSession('product_category3') == $row['id'])
															{
																$s = "selected";
															}
															
													?>
														<option <?php echo $s; ?> value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
													<?php
														}
													?>
												</select>
												<small class="form-text text-muted"><?php echo form_error('product_category3'); ?></small>
											</div>
											<div class="product-title">
												<input type="text" name="product_name3" placeholder="Product Name" class="form-control" value="<?php echo getSession('product_name3'); ?>" />
												<small class="form-text text-muted"><?php echo form_error('product_name3'); ?></small>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12 text-right">
											<div class="seperator"></div>
												<div class="form-group">
													<input type="submit" name="registration_step3" class="btn btn-primary" value="Continue" />
												</div>
										<div class="seperator"></div>
										</div>
									</div>
									<?php 
										echo form_close();
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
<?php 
	lvi("footer");
?>