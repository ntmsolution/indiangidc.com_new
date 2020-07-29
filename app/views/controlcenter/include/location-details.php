<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="section padd">	
	<div class="row">
		<div class="col-md-12">
			<div class="heading">
				<h2>Location Information</h2>
			</div>
			<div class="seperator"></div>
			<?php
				echo form_open(ADMINFOLDER."User/edit/$user_id");
			?>
			<div class="row">
				<div class="col-md-6">
					<label>Address</label>
					<div class="form-group">
						<input type="text" name="address" class="form-control" value="<?php echo set_value('address',stripslashes($sp['address'])); ?>" placeholder="Enter House No/Block, Land Mark, Street" required maxlength="100" />
						<small class="form-text text-muted "><?php echo form_error('address'); ?></small>
					</div>
				</div>
				<div class="col-md-6">
					<label>Locality</label>
					<div class="form-group">
						<input type="text" name="locality" class="form-control" value="<?php echo set_value('locality',$sp['locality']); ?>" placeholder="Enter Locality" maxlength="30" required />
						<small class="form-text text-muted "><?php echo form_error('locality'); ?></small>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>State</label>
					<div class="form-group">
						<select name="state" id="state" class="form-control" required >
							<option value="">--- Select State ---</option>
							<?php 
								$state_id_seleted = "";
								$state = getState("","order by state_name ASC");
								foreach($state as $row)
								{
									$flag = false;
									if($sp['state'] == strtolower($row['state_name']))
									{
										$flag = true;
									}
									$seleted = set_select('state', strtolower($row['state_name']),$flag);
									if($seleted != "")
									{
										$state_id_seleted = $row['id'];
									}
							?>
									<option value="<?php echo strtolower($row['state_name']); ?>" <?php echo $seleted; ?> ><?php echo $row['state_name'] ?></option>
							<?php
								}
							?>
						</select>
						<small class="form-text text-muted "><?php echo form_error('state'); ?></small>
					</div>
				</div>
				<div class="col-md-6">
					<label>City</label>
					<div class="form-group">
						<select name="city" id="city" class="form-control" required>
							<option value="">--- Select City ---</option>
							<?php 
								echo $state_id_seleted;
								
								if($state_id_seleted != "")
								{
									$city = getCity("state_id = '$state_id_seleted'");
									foreach($city as $row)
									{
										$flag = false;
										if($sp['city'] == strtolower($row['city_name']))
										{
											$flag = true;
										}
							?>
										<option value="<?php echo strtolower($row['city_name']); ?>" <?php echo set_select('city', strtolower($row['city_name']),$flag); ?> ><?php echo $row['city_name']; ?></option>
							<?php
									}
								}
							?>
						</select>
						<small class="form-text text-muted "><?php echo form_error('city'); ?></small>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Pincode</label>
					<div class="form-group">
						<input type="text" name="pin_code" class="form-control" value="<?php echo set_value('pin_code',$sp['pin_code']); ?>" placeholder="Enter Pincode" maxlength="6" />
						<small class="form-text text-muted "><?php echo form_error('pin_code'); ?></small>
					</div>
				</div>
				<div class="col-md-6">
					<label>Country</label>
					<div class="form-group">
						<input type="text" name="country" readonly class="form-control" value="<?php echo set_value('country',$sp['country']); ?>" placeholder="Enter Country" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Landmark</label>
					<div class="form-group">
						<input type="text" name="landmark" class="form-control" value="<?php echo set_value('landmark',$sp['landmark']); ?>" placeholder="Enter Landmark" maxlength="100" required />
						<small class="form-text text-muted "><?php echo form_error('landmark'); ?></small>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-4 offset-md-4 text-center">
					<div class="form-group">
						<input type="submit" name="ai" class="form-control btn btn-primary" value="Save" />
					</div>
				</div>
			</div>
			<?php 
				echo form_close();
			?>
		</div>
	</div>
</div>
<script>
	$("#state").change(function()
	{
		var csrfName 	= '<?php echo $this->security->get_csrf_token_name(); ?>';
		var csrfHash 	= '<?php echo $this->security->get_csrf_hash(); ?>';
		var state_name = $(this).val();
		
		$.post("<?php echo base_url("Ajax/getCity"); ?>",{[csrfName]: csrfHash, state_name: state_name })
		.done(function(data)
		{
			$("#city").html(data);
		});
		
	});
	$("#gst_no").keyup(function(){
		if($(this).val() != "")
		{
			$(".gnp").css('display','none');
		}
		else
		{
			$(".gnp").css('display','block');
		}
	});
</script>