<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="section padd">	
	<div class="row">
		<div class="col-md-12">
			<div class="heading">
				<h2>Business Information</h2>
			</div>
		</div>
	</div>
	<div class="seperator"></div>
	<div class="row">
		<div class="col-md-2">
			<?php 
				echo form_open(ADMINFOLDER."User/edit/$user_id");
			?>
				<input type="file" name="company_logo" id="company_logo" class="form-control"  accept="image/*" onchange="javascript: return form.submit();" style='display:none;' width="150px"  />
				<small class="form-text text-muted "><?php echo form_error('company_logo'); ?></small>
				
					<?php 
						if($sbp['company_logo'] != "")
						{
					?>
							<img src="<?php echo base_url("assets/upload/user-image/".$sbp['company_logo']) ?>"  style="border:1px solid #000;" onclick="javascript: return document.getElementById('company_logo').click(); " />
							<input type="hidden" name="company_logo" value="<?php echo set_value('company_logo',$sbp['company_logo']); ?>" />
					<?php
						}
						else
						{
					?>
							<img src="<?php echo base_url("assets/upload/user-image/default-company.jpg") ?>"  style="border:1px solid #000;" onclick="javascript: return document.getElementById('company_logo').click(); " width="150px"  />
					<?php
						}
					?>
			<?php
				echo form_close();
			?>
				<div class="text-center">Company Logo</div>
		</div>
				
		<div class="col-md-10">
		<?php 
			echo form_open(ADMINFOLDER."User/edit/$user_id");
		?>
			<div class="row">
				<div class="col-md-6">
					<label>Company Name</label>
					<div class="form-group">
						<input type="text" name="company_name" class="form-control" value="<?php echo set_value('company_name',$sbp['company_name']); ?>" placeholder="Enter Company Name" maxlength="30" required />
						<small class="form-text text-muted "><?php echo form_error('company_name'); ?></small>
					</div>
				</div>
				<div class="col-md-6">
					<label>Year Establishment</label>
					<div class="form-group">
						<input type="text" name="year_establishment" class="form-control" value="<?php echo set_value('year_establishment',$sbp['year_establishment']); ?>" placeholder="Enter Designation/Job Title" maxlength="4" />
						<small class="form-text text-muted "><?php echo form_error('year_establishment'); ?></small>
					</div>
				</div>
				
			</div>
			<div class="row">
				<?php /*
				<div class="col-md-6" style="display:none;">
					<label>CEO Name</label>
					<div class="form-group">
						<input type="text" name="ceo_name" class="form-control" value="<?php echo set_value('ceo_name',$sbp['ceo_name']); ?>" placeholder="Enter CEO Name" maxlength="30"  />
						<small class="form-text text-muted "><?php echo form_error('ceo_name'); ?></small>
					</div>
				</div> */ ?>
				<div class="col-md-12">
					<label>Company Website</label>
					<div class="form-group">
						<input type="text" name="company_website" class="form-control" value="<?php echo set_value('company_website',$sbp['company_website']); ?>" placeholder="Enter Company Website" maxlength="100" />
						<small class="form-text text-muted "><?php echo form_error('company_website'); ?></small>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Are you(manu./exporter/etc) ?</label>
					<div class="form-group">
						<select name="primary_business_type" id="primary_business_type" class="form-control">
							<option value="">--- Select ---</option>
							<?php 
								$primary_business_type = getPrimaryBusinessType();
								foreach($primary_business_type as $row)
								{
									$flag = false;
									if($sbp['primary_business_type'] == $row['primary_business_type'])
									{
										$flag = true;
									}
							?>
									<option value="<?php echo $row['primary_business_type']; ?>" <?php echo set_select('primary_business_type', $row['primary_business_type'],$flag); ?> ><?php echo $row['primary_business_type']; ?></option>
							<?php
								}
							?>
						</select>
						<small class="form-text text-muted "><?php echo form_error('primary_business_type'); ?></small>
					</div>
				</div>
				<div class="col-md-6">
					<label>Company type</label>
					<div class="form-group">
						<select name="ownership_type" id="ownership_type" class="form-control">
							<option value="">--- Select Company type ---</option>
							<?php 
								$ownership_type = getOwnershipType();
								foreach($ownership_type as $row)
								{
									$flag = false;
									if($sbp['ownership_type'] == $row['ownership_type'])
									{
										$flag = true;
									}
							?>
									<option value="<?php echo $row['ownership_type']; ?>" <?php echo set_select('ownership_type', $row['ownership_type'],$flag); ?> ><?php echo $row['ownership_type']; ?></option>
							<?php
								}
							?>
						</select>
						<small class="form-text text-muted "><?php echo form_error('ownership_type'); ?></small>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Anuual Turn Over</label>
					<div class="form-group">
						<select name="anuual_turnover" id="anuual_turnover" class="form-control">
							<option value="">--- Select Anuual Turn Over ---</option>
							<?php 
								$anuual_turnover = getAnuualTurnover();
								foreach($anuual_turnover as $row)
								{
									$flag = false;
									if($sbp['anuual_turnover'] == $row['anuual_turnover'])
									{
										$flag = true;
									}
							?>
									<option value="<?php echo $row['anuual_turnover']; ?>" <?php echo set_select('anuual_turnover', $row['anuual_turnover'],$flag); ?> ><?php echo $row['anuual_turnover']; ?></option>
							<?php
								}
							?>
						</select>
						<small class="form-text text-muted "><?php echo form_error('anuual_turnover'); ?></small>
					</div>
				</div>
				<div class="col-md-6">
					<label>Number of Employee</label>
					<div class="form-group">
						<select name="number_of_employee" id="number_of_employee" class="form-control">
							<option value="">--- Select Number of Employee ---</option>
							<?php 
								$number_of_employee = getNumberOfEmployee();
								foreach($number_of_employee as $row)
								{
									$flag = false;
									if($sbp['number_of_employee'] == $row['number_of_employee'])
									{
										$flag = true;
									}
							?>
									<option value="<?php echo $row['number_of_employee']; ?>" <?php echo set_select('number_of_employee', $row['number_of_employee'],$flag); ?> ><?php echo $row['number_of_employee']; ?></option>
							<?php
								}
							?>
						</select>
						<small class="form-text text-muted "><?php echo form_error('number_of_employee'); ?></small>
					</div>
				</div>
			</div>
			<div class="row" style="display:none;">	
				<div class="col-md-12">
					<label>Secondary Business</label>
					<div class="form-group">
						<div class="row">
							<?php 
								$sb_array = explode(", ",$sbp['secondary_business']);
								$secondary_business = getSecondaryBusiness();
								foreach($secondary_business as $sb)
								{
									$flag = false;
									if(in_array($sb['secondary_business'],$sb_array))
									{
										$flag = true;
									}
							?>
									<div class="col-md-4">
										<input type="checkbox" name="secondary_business[]" value="<?php echo $sb['secondary_business']; ?>" <?php echo set_checkbox("secondary_business", $sb['secondary_business'], $flag); ?>  /> <?php echo $sb['secondary_business']; ?>
									</div>
							<?php 
								}
							?>
						</div>
						<small class="form-text text-muted "><?php echo form_error('secondary_business'); ?></small>
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col-md-12">
					<label>Web Page URL</label>
					<div class="form-group">
						<input type="text" readonly style='width:45%;float:left;' value="<?php echo base_url().SELLERPROFILE_INDEX; ?>/" class="form-control">
						<input type="text" name="catalog_url" class="form-control" value="<?php echo set_value('catalog_url',$sbp['catalog_url']); ?>" placeholder="Ex. <?php echo seourl("$sbp[company_name]"); ?>" style='width:40%;float:left;' required maxlength="100" />
						<?php
							if($sbp['catalog_url'] != "")
							{
						?>
								<a class="btn btn-dark" href="<?php echo base_url().SELLERPROFILE_INDEX; ?>/<?php echo set_value('catalog_url',$sbp['catalog_url']); ?>" style='width:15%' target="_blank">Go to URL</a>
						<?php 
							}
						?>
						<span style='clear:both;'></span>
						<small class="form-text text-muted "><?php echo form_error('catalog_url'); ?></small>
					</div>
				</div>
			</div>
			<?php /*
			<div class="row">
				<div class="col-md-12">
					<label>About Company</label>
					<div class="form-group">
						<textarea name="about_company" maxlength="5000" class="form-control" ><?php echo set_value('about_company',$sbp['about_company']); ?></textarea>
						<small class="form-text text-muted "><?php echo form_error('about_company'); ?></small>
					</div>
				</div>
			</div>*/?>
			
			<div class="row">
				<div class="col-md-12">
					<label>Company Keywords</label>
					<div class="form-group">
						<input type="text" name="meta_keywords" maxlength="300" class="form-control" value="<?php echo set_value('meta_keywords',$sbp['meta_keywords']); ?>" />
						<small class="form-text text-muted "><?php echo form_error('meta_keywords'); ?></small>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
					<label>About Company</label>
					<div class="form-group">
						<textarea name="meta_description" maxlength="10000" class="form-control" style="height:500px;"><?php echo set_value('meta_description',$sbp['meta_description']); ?></textarea>
						<small class="form-text text-muted "><?php echo form_error('meta_description'); ?></small>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4 offset-md-4 text-center">
					<div class="form-group">
						<input type="submit" name="ci" class="form-control btn btn-primary" value="Save" />
					</div>
				</div>
			</div>
	<?php 
		echo form_close();
	?>
			<div class="row" style="margin-bottom:20px;">
				<div class="col-md-6">
					<label>Business Card Front</label>
					<?php 
						echo form_open(ADMINFOLDER."User/edit/$user_id");
					?>
						<input type="file" name="business_card_front" id="business_card_front" class="form-control"  accept="image/*" onchange="javascript: return form.submit();" style='display:none;' />
						<small class="form-text text-muted "><?php echo form_error('business_card_front'); ?></small>
						
							<?php 
								if($sbp['business_card_front'] != "")
								{
							?>
									<img src="<?php echo base_url("assets/upload/business-card/".$sbp['business_card_front']) ?>"  style="border:1px solid #000;" onclick="javascript: return document.getElementById('business_card_front').click(); " />
									<input type="hidden" name="business_card_front" value="<?php echo set_value('business_card_front',$sbp['business_card_front']); ?>" />
							<?php
								}
								else
								{
							?>
									<img src="<?php echo base_url("assets/upload/business-card/default.png") ?>"  style="border:1px solid #000;" onclick="javascript: return document.getElementById('business_card_front').click(); " />
							<?php
								}
							?>
					<?php
						echo form_close();
					?>
					
				</div>
				<div class="col-md-6">
					<label>Business Card Back</label>
					<?php 
						echo form_open(ADMINFOLDER."User/edit/$user_id");
					?>
						<input type="file" name="business_card_back" id="business_card_back" class="form-control"  accept="image/*" onchange="javascript: return form.submit();" style='display:none;' />
						<small class="form-text text-muted "><?php echo form_error('business_card_back'); ?></small>
						
							<?php 
								if($sbp['business_card_back'] != "")
								{
							?>
									<img src="<?php echo base_url("assets/upload/business-card/".$sbp['business_card_back']) ?>"  style="border:1px solid #000;" onclick="javascript: return document.getElementById('business_card_back').click(); " />
									<input type="hidden" name="business_card_back" value="<?php echo set_value('business_card_back',$sbp['business_card_back']); ?>" />
							<?php
								}
								else
								{
							?>
									<img src="<?php echo base_url("assets/upload/business-card/default.png") ?>"  style="border:1px solid #000;" onclick="javascript: return document.getElementById('business_card_back').click(); " />
							<?php
								}
							?>
					<?php
						echo form_close();
					?>
				</div>
				<br/><br/>
			</div>
		</div>
	</div>
</div>
