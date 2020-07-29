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
							<div class="selection" style="margin-top:10px;">
								<table style="width:700px;">
									<tr>
										<td><input type="radio" name="type" checked="true" onclick="javascript:$('#tab2').hide();$('#tab1').show();"> Single Product</td>
										<td><input type="radio" name="type"  onclick="javascript:$('#tab1').hide();$('#tab2').show();"> Group Product</td>
									</tr>
								</table>
								
							</div>
							<div class="product-display-add">
								<div class="row" id="tab1">
									<div class="col-md-5">
										<div class="product-add-imgbox">	
											<div class="main border1">
												<table align="center">
													<tr>
														<td height="150">
															<img src="<?php echo base_url('assets/images/products/default-img.png'); ?>" id="p1" />	
															<input type="file" name="file1" id="file1" style="display:none;" />
														</td>
													</tr>
												</table>
											</div>
											<div class="subimage">
												<table align="center" width="100%">
													<tr>
														<td height="100">
															<img src="<?php echo base_url('assets/images/products/default-img.png'); ?>" id="p2" />
															<input type="file" name="file2" id="file2" style="display:none;" />
														</td>
														<td height="100">
															<img src="<?php echo base_url('assets/images/products/default-img.png'); ?>" id="p3" />
															<input type="file" name="file3" id="file3" style="display:none;" />
														</td>
														<td height="100">
															<img src="<?php echo base_url('assets/images/products/default-img.png'); ?>" id="p4" />
															<input type="file" name="file4" id="file4" style="display:none;" />
														</td>
													</tr>
												</table>
											</div>
										</div>
										<div class="clear"></div>
									</div>
									<div class="col-md-7">
										<table>
											<tr>
												<td></td>
											</tr>
										</table>
									</div>
								</div>
								<div id="tab2">
									<form id="addgropform" class="form">
										<table width="100%">
											<tr>
												<td>Enter Category Name</td>
											</tr>
											<tr>
												<td>
													<select name="category" id="groupproduct_option" class="form-control" onchange="javascript:$('#groupname_option').show();$('#groupname_option').focus();">
														<option value="">-Select-</option>
														<?php
															$product_category = select("category");

															foreach ($product_category as $key => $value) {
														?>
														<option value="<?php echo $value['id']; ?>"><?php echo $value["category_name"]; ?></option>
														<?php		
															}
														?>
													</select>
												</td>
											<tr>	
											<tr>
												<td style="padding-top: 10px;">Select Group</td>
											</tr>
											<tr>
												<td>
													<select name="groupproduct" id="groupproduct_option" class="form-control" onchange="javascript:$('#groupname_option').show();$('#groupname_option').focus();">
														<option value="">-Select-</option>
														<?php
															$product_group = select("product_group");

															foreach ($product_group as $key => $value) {
														?>
														<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
														<?php		
															}
														?>
														<option value="other">Other</option>
													</select>
													<input type="text" name="groupname" id="groupname_option" class="form-control" style="display:none;margin-top: 10px;" />
												</td>
											</tr>
											<tr>
												<td class="text-right">
													<input type="button" name="add" id="add" class="btn btn-danger" value="Add" />
												</td>
											</tr>
										</table>
									</form>
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
	//$pg = "addimage";
	//lvi("footer",array("pg"=>$pg));
	lvi("footer");
?>