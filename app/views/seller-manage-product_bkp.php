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
								<h2>Add New Product</h2>
							</div>
							<div class="seperator"></div>
							<?php 
								echo form_open_multipart(SELLER_MANAGEPRODUCTS);
							?>
							<div class="row">
								<div class="col-md-12">
									<label>Select Product Category</label>
									<div class="form-group">
										<select name="category_id" id="category_id" class="form-control search-category" required >
											<option value="">--- Select Product Category ---</option>
											<?php
												$scid 				= "";
												$product_category 	= getCategory("parent_id = '0' order by category_name ASC");
												
												foreach ($product_category as $row) 
												{
													$selected = set_select('category_id', $row['id']);
													if($selected != "")
													{
														$scid = $row['id'];
													}
											?>
													<option <?php echo $selected; ?> value="<?php echo $row['id']; ?>"><?php echo $row["category_name"]; ?></option>
											<?php		
												}
											?>
										</select>
										<small class="form-text text-muted "><?php echo form_error('category_id'); ?></small>
									</div>
								</div>
								<?php /*
								<div class="col-md-6">
									<label>Select Product Group</label>
									<div class="form-group">
										<?php 
												$otherseleted 	= set_select('group_id', 'other');
												$other_option 	= "<option value='other' >Other</option>";	
												$gnm_dn 		= "display:none;";
												$gid_style		= "";

												if($otherseleted != "")
												{
													$gid_style = 'style="width:30%;float:left;"';
													$gnm_dn = "width:68%;";  
													$other_option ="<option value='other' selected >Other</option>";	
												} 
										?>
										<select name="group_id" id="group_id" class="form-control" <?php echo $gid_style; ?> required >
											<option value="" >--- Select Product Group ---</option>
											<?php
												if($scid != "")
												{
													$product_group = select("product_group");
													foreach ($product_group as $row) 
													{
														$seleted = set_select('group_id', $row['id']);
												?>
														<option <?php echo $seleted; ?> value="<?php echo $row['id']; ?>"><?php echo $row["group_name"]; ?></option>
												<?php		
													}
														echo "$other_option";
												}
											?>
												
										</select>
										<input type="text" name="group_name" id="group_name" class="form-control" placeholder="Enter Group Name" style="<?php echo $gnm_dn; ?>" value="<?php echo set_value('group_name'); ?>" />
										<span style="clear:both"></span>
										<small class="form-text text-muted "><?php echo form_error('group_id'); ?></small>
										<small class="form-text text-muted "><?php echo form_error('group_name'); ?></small>
									</div>
								</div>*/ ?>
							</div>	
							
							<div class="row">
								<div class="col-md-6">
									<label>Area of use</label>
									<div class="form-group">
										<?php 
												$sc_otherseleted 	= set_select('subcategory_id', 'other');
												$sc_other_option 	= "<option value='other' >Other</option>";	
												$sc_gnm_dn 			= "display:none;";
												$sc_gid_style		= "";

												if($sc_otherseleted != "")
												{
													$sc_gid_style = 'style="width:30%;float:left;"';
													$sc_gnm_dn = "width:68%;";  
													$sc_other_option ="<option value='other' selected >Other</option>";	
												} 
										?>
										<select name="subcategory_id" id="subcategory_id" class="form-control search-subcategory" <?php echo $sc_gid_style; ?> required >
											<option value="">--- Select Area of use ---</option>
											
											<?php
												if($scid != "")
												{
													$product_group = getCategory("parent_id = '$scid'  order by category_name ASC");
													foreach ($product_group as $row) 
													{
														$seleted = set_select('subcategory_id', $row['id']);
											?>
														<option <?php echo $seleted; ?> value="<?php echo $row['id']; ?>"><?php echo $row["group_name"]; ?></option>
											<?php		
													}
														echo "$sc_other_option";
												}
											?>
										</select>
										<input type="text" name="subcategory_name" id="subcategory_name" class="form-control" placeholder="Enter Area of use" style="<?php echo $sc_gnm_dn; ?>" value="<?php echo set_value('subcategory_name'); ?>" />
										<span style="clear:both"></span>
										<small class="form-text text-muted "><?php echo form_error('subcategory_id'); ?></small>
										<small class="form-text text-muted "><?php echo form_error('subcategory_name'); ?></small>
									</div>
								</div>
								<div class="col-md-6">
									<label>Product Name</label>
									<div class="form-group">
										<input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter Product Name"   value="<?php echo set_value('product_name'); ?>" required maxlength="150" />
										<small class="form-text text-muted"><?php echo form_error('product_name'); ?></small>
									</div>
								</div>
							</div>
							<?php /*<div class="row">
								<div class="col-md-12">
									<label>Product Description</label>
									<div class="form-group">
										<textarea name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" maxlength="5000"  ><?php echo set_value('product_description'); ?></textarea>
										<small class="form-text text-muted"><?php echo form_error('product_description'); ?></small>
									</div>
								</div>
							</div>*/ ?>
							<div class="row">
								<div class="col-md-12">
									<label>Product Keywords</label>
									<div class="form-group">
										<input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Enter Product Keywords"  value="<?php echo set_value('meta_keywords'); ?>" maxlength="300" />
										<small class="form-text text-muted"><?php echo form_error('meta_keywords'); ?></small>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<label>Product Description</label>
									<div class="form-group">
										<textarea name="meta_description" maxlength="5000" id="meta_description" class="form-control" placeholder="Enter Product Description" style="height:500px;"><?php echo set_value('meta_description'); ?></textarea>
										<small class="form-text text-muted"><?php echo form_error('meta_description'); ?></small>
									</div>
								</div>
							</div> 
							<div class="row">
								<div class="col-md-6">
									<label>Product Price</label>
									<div class="form-group">
										<input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price"  value="<?php echo set_value('product_price'); ?>" required />
										<small class="form-text text-muted"><?php echo form_error('product_price'); ?></small>
									</div>
								</div>
								<div class="col-md-6">
									<label>Product Price As Per</label>
									<div class="form-group">
										<select name="product_price_as_per" id="product_price_as_per" class="form-control" required >
											<option value="">--- Product Price As Per ---</option>
											<option value="Pack" <?php echo set_select('product_price_as_per', 'Pack'); ?> >Pack</option>
											<option value="Packet" <?php echo set_select('product_price_as_per', 'Packet'); ?> >Packet</option>
											<option value="Pair" <?php echo set_select('product_price_as_per', 'Pair'); ?> >Pair</option>
											<option value="Person" <?php echo set_select('product_price_as_per', 'Person'); ?> >Person</option>
											<option value="Piece" <?php echo set_select('product_price_as_per', 'Piece'); ?> >Piece</option>
										</select>
										<small class="form-text text-muted "><?php echo form_error('product_price_as_per'); ?></small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6" style="display:none;">
									<label>Product Youtube Url</label>
									<div class="form-group">
										<input type="text" name="product_youtube_url" id="product_youtube_url" class="form-control" placeholder="Enter Product Youtube URL" maxlength="500"  value="<?php echo set_value('product_youtube_url'); ?>" />
										<small class="form-text text-muted"><?php echo form_error('product_youtube_url'); ?></small>
									</div>
								</div>
								<div class="col-md-6">
									<label>Product Image 1</label>
									<div class="form-group">
										<input type="file" required name="product_image1" id="product_image1" class="form-control" accept="images/*" />
										<small class="form-text text-muted "><?php echo form_error('product_image1'); ?></small>
									</div>
								</div>
							</div>
							<div class="row" style="display:none;">
								<div class="col-md-6">
									<label>Product Image 2</label>
									<div class="form-group">
										<input type="file" name="product_image2" id="product_image2" class="form-control" accept="images/*" />
										<small class="form-text text-muted "><?php echo form_error('product_image2'); ?></small>
									</div>
								</div>
								<div class="col-md-6">
									<label>Product Image 3</label>
									<div class="form-group">
										<input type="file" name="product_image3" id="product_image3" class="form-control" accept="images/*" />
										<small class="form-text text-muted "><?php echo form_error('product_image3'); ?></small>
									</div>
								</div>
							</div>
							<div class="row" style="display:none;">
								<div class="col-md-6">
									<label>Product Image 4</label>
									<div class="form-group">
										<input type="file" name="product_image4" id="product_image4" class="form-control" accept="images/*" />
										<small class="form-text text-muted "><?php echo form_error('product_image4'); ?></small>
									</div>
								</div>
								<div class="col-md-6">
									<label>Product Image 5</label>
									<div class="form-group">
										<input type="file" name="product_image5" id="product_image5" class="form-control" accept="images/*" />
										<small class="form-text text-muted "><?php echo form_error('product_image5'); ?></small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<label>Product Attribute</label>
								</div>
								<div class="col-md-6 text-right">
									<button type="button" id="add_txt_attr"><i class="fa fa-plus" aria-hidden="true"></i></button>
								</div>
							</div>
							<div class="row " >
								<div class="col-md-6">
									<input type="text" required name="attr_name1" placeholder='Ex. Label' class="form-control"  value="<?php echo set_value('attr_name1'); ?>" maxlength="500" />
									<small class="form-text text-muted "><?php echo form_error('attr_name1'); ?></small>
								</div>
								<div class="col-md-6">
									<input type="text" required name="attr_value1" value="<?php echo set_value('attr_value1'); ?>" placeholder='Ex. Value' class="form-control" maxlength="500" />
									<small class="form-text text-muted "><?php echo form_error('attr_value1'); ?></small>
								</div>
							</div>
							<div class="row append-after-attr" style="margin-top:10px;">
								<div class="col-md-4 offset-md-4 text-center">
									<div class="form-group">
										<input type="submit" name="add_product" class="form-control btn btn-primary" value="Add Product" />
									</div>
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
		
		/*$.post("<?php echo base_url("Ajax/getGroupName"); ?>",{[csrfName]: csrfHash, category_id: category_id })
		.done(function(data)
		{
			$("#group_id").html(data);
		});*/
		
		$.post("<?php echo base_url("Ajax/getSubcategory"); ?>",{[csrfName]: csrfHash, category_id: category_id })
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
	
	/*$("#group_id").change(function(){
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
	});*/
	
	$("#add_txt_attr").click(function(){
		var  no1 = 2;
			$('.append-after-attr').before("<div class='row' style='margin-top:10px;'><div class='col-md-6'><input type='text' maxlength='500' name='attr_name[]' class='form-control' placeholder='Ex. Label' /></div><div class='col-md-6'><input type='text' placeholder='Ex. Value' maxlength='500' name='attr_value[]' class='form-control' /></div></div>");
		no1++;
	});
</script>
<?php 
	//$pg = "addimage";
	//lvi("footer",array("pg"=>$pg));
	lvi("footer");
?>