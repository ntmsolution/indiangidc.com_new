<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	lvi("header");
?>
<div class="content">
	<div class="container">
		<div class="row">
		<?php /*	<div class="col-md-3">
			<?php
				if(getLoginId())
				{
					$user_id 	= getLoginId();
					$sr 		= selectById("registration",$user_id); 
					$sp 		= select("seller_product","seller_id = $user_id");
			?>
					<div class="sectioncard">
						<div class="card-heading">
							Your Seller Profile
						</div>
						<div class="card-body">
							<table class="smallfont">
								<?php 
									if($sr['mobile'] != "")
									{
								?>
										<tr>
											<td width="120">Mobile No</td>
											<td>+91 <?php echo $sr['mobile']; ?></td>
										</tr>
								<?php
									}
								?>
								
								<?php 
								/*	if($sr['email'] != "")
									{
								?>
										<tr>
											<td width="120">Email Address</td>
											<td><?php echo $sr['email']; ?></td>
										</tr>
								<?php
									}*//*
								?>
								
								<?php 
								/*	if($sr['company_name'] != "")
									{
								?>
										<tr>
											<td width="120">Company Name</td>
											<td><?php echo $sr['company_name']; ?></td>
										</tr>
								<?php
									}*//*
								?>
								
								<?php 
								/*	if(count($sp) != 0)
									{
										$i = 1;
										foreach($sp as $row)
										{
								?>
								
										<tr>
											<td width="120">Product <?php echo $i; ?></td>
											<td><?php echo $row['product_name']; ?></td>
										</tr>
								<?php
											$i++;
										}
									}*//*
								?>
									
								
								
							</table>									
						</div>
					</div>
			<?php
				}
			?>
			</div>
			<div class="col-md-1">
			</div> */ ?>
			<div class="col-md-6 offset-md-3">
				<div class="section padd">					
					<div class="heading">
						<div class="tablinks">
							<ul>
								<li <?php if(getClass() == "Registration" && (getMethod() == "step1" || getMethod() == "otp")){ echo "class='current'"; } ?> ><a href="#">Create Account</a></li>
								<li <?php if(getClass() == "Registration" && getMethod() == "step2"){ echo "class='current'"; } ?> ><a href="#">Bussiness Details</a></li>
								<li <?php if(getClass() == "Registration" && getMethod() == "step4"){ echo "class='current'"; } ?> ><a href="#">Location Details</a></li>
							</ul>
						</div>
					</div>
					<div style="padding:30px;" id="tabbody">
						<?php 
							if(getMethod() == "step1")
							{
						?>
								<div class="form">
									<?php 
										echo form_open(REGISTRATION_STEP1);
									?>
										<div class="form-group">
											<label for="exampleInputEmail1">Mobile Number</label>
											<input type="text" name="mobile" class="form-control"  placeholder="Enter Mobile Number" value="<?php echo set_value('mobile'); ?>" pattern="[6789][0-9]{9}" maxlength="10" required />
											<small class="form-text text-muted "><?php echo form_error('mobile'); ?></small>
										</div>
										<div class="seperator"></div>
										<div class="form-group">
											<label for="exampleInputEmail1">Email Address</label>
											<input type="email" name="email" class="form-control"  placeholder="Enter Email Address" value="<?php echo set_value('email'); ?>" maxlength="80" required />
											<small class="form-text text-muted "><?php echo form_error('email'); ?></small>
										</div>
										<div class="seperator"></div>
										<div class="form-group">
											<label for="exampleInputEmail1">Password</label>
											<input type="password" name="password" class="form-control"   value="<?php echo set_value('password'); ?>" maxlength="20"min="6" placeholder="Enter Password" required>
											<small class="form-text text-muted "><?php echo form_error('password'); ?></small>
										</div>
										<div class="seperator"></div>
											<div class="row">
												<div class="col-md-5">
													<p id="captImg"><?php echo $captcha_image; ?></p>
												</div>
												<div class="col-md-1" style="margin-top:8px;">
													<a href="javascript:void(0);" class="refresh_captcha" ><img src="<?php echo base_url().'assets/images/refresh.png'; ?>" height="20px" /></a>
												</div>
												<div class="col-md-6">
													<input type="text" name="captcha_code" class="form-control"   placeholder="Enter Captcha Code" value="<?php echo set_value('captcha_code'); ?>"  required maxlength="5" />
													<small class="form-text text-muted "><?php echo form_error('captcha_code'); ?></small>
												</div>
											</div>
										<div class="seperator"></div>
										<div class="form-group">
											<input type="submit" name="registration_step1" class="btn btn-primary" value="Register Now" />
										</div>
										<div class="seperator"></div>
									<?php 
										echo form_close();
									?>
								</div>
						<?php
							}
							else if(getMethod() == "otp")
							{
						?>
								<div class="form">
									<?php 
										echo form_open(REGISTRATION_OTP);
									?>
										<div class="form-group">
											<label for="exampleInputEmail1">Enter Your OTP</label>
											<input type="number" name="otp" class="form-control"  placeholder="Enter your OTP" value="<?php echo set_value('otp'); ?>" required maxlength="6" />
											<small class="form-text text-muted "><?php echo form_error('otp'); ?></small>
										</div>
										<div class="seperator"></div>
										<div class="form-group">
											<input type="submit" name="registration_otp" class="btn btn-primary" value="Verify OTP" />
											&nbsp;
											<span class="countdown"></span>
											<button type="button"  class="btn btn-dark resend_otp">Resend OTP</button>
										</div>
										<div class="seperator"></div>
									<?php 
										echo form_close();
									?>
								</div>
						<?php
							}
							else if(getMethod() == "step2")
							{
						?>
								<div class="form">
									<?php 
										echo form_open(REGISTRATION_STEP2);
									?>
										<div class="form-group">
											<label for="exampleInputEmail1">Company Name</label>
											<input type="text" name="company_name" class="form-control"   value="<?php echo set_value('company_name'); ?>" placeholder="Enter Company Name" required maxlength="30" />
											<small class="form-text text-muted "><?php echo form_error('company_name'); ?></small>
										</div>
										<div class="seperator"></div>
										<div class="form-group">
											<label for="exampleInputEmail1">Year Establishment</label>
											<input type="text" name="year_establishment" class="form-control"   value="<?php echo set_value('year_establishment'); ?>" placeholder="Enter Year Establishment" required maxlength="4" />
											<small class="form-text text-muted"><?php echo form_error('year_establishment'); ?></small>
										</div>
										<div class="seperator"></div>
										<div class="form-group">
											<input type="submit" name="registration_step2" class="btn btn-primary" value="Continue" />
										</div>
										<div class="seperator"></div>
									<?php 
										echo form_close();
									?>
								</div>
						<?php
							}
							else if(getMethod() == "step3")
							{
						?>
								<div class="step3">
									<h2>What would you like to sell ?</h2>
									<div class="seperator"></div>
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
						<?php
							}
							else if(getMethod() == "step4")
							{
								$seller_id 						= getLoginId();
								list($seller_business_profile) 	= getSellerBusinessProfile("seller_id = $seller_id");
						?>	
								<h2>Where is "<?php echo $seller_business_profile['company_name']; ?>" Located ?</h2>
								<div class="seperator"></div>
								
								<div class="form">
									<?php 
										echo form_open(REGISTRATION_STEP4);
									?>
										<div class="row">
											<div class="col-md-8">
												<label for="exampleInputEmail1">Business Address </label>
												<input type="text" name="address" class="form-control" value="<?php echo set_value('address'); ?>" placeholder="Enter Business Address" required maxlength="100" />
												<small class="form-text text-muted "><?php echo form_error('address'); ?></small>												
											</div>
											<div class="col-md-4">
												<label for="exampleInputEmail1">Locality</label>
												<input type="text" name="locality" class="form-control" value="<?php echo set_value('locality'); ?>" placeholder="Enter Locality" required maxlength="30" />
												<small class="form-text text-muted "><?php echo form_error('locality'); ?></small>
											</div>
										</div>
										<div class="seperator"></div>
										<div class="row">
											<div class="col-md-4">
												<label for="exampleInputEmail1">State</label>
												<select name="state" id="state" class="form-control" required>
													<option value="">--- Select State ---</option>
													<?php 
														$state_id_seleted = "";
														$state = getState("","order by state_name ASC");
														foreach($state as $row)
														{
															$seleted = set_select('state', strtolower($row['state_name']));
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
											<div class="col-md-4">
												<div class="form-group">
													<label for="exampleInputEmail1">City</label>
													<select name="city" id="city" class="form-control" required>
														<option value="">--- Select City ---</option>
														<?php 
															echo $state_id_seleted;
															
															if($state_id_seleted != "")
															{
																$city = getCity("state_id = $state_id_seleted");
																foreach($city as $row)
																{
														?>
																	<option value="<?php echo strtolower($row['city_name']); ?>" <?php echo set_select('city', strtolower($row['city_name'])); ?> ><?php echo $row['city_name']; ?></option>
														<?php
																}
															}
														?>
													</select>
													<small class="form-text text-muted "><?php echo form_error('city'); ?></small>
												</div>
											</div>
											<div class="col-md-4">
												<label for="exampleInputEmail1">Pin Code</label>
												<input type="text" name="pin_code" class="form-control" value="<?php echo set_value('pin_code'); ?>" placeholder="Enter Pin Code" required maxlength="6"  />
												<small class="form-text text-muted "><?php echo form_error('pin_code'); ?></small>
											</div>
										</div>
										<div class="seperator"></div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for="exampleInputEmail1">GST Number (GST number will get you genuine customers.) </label><br/>
													<input type="radio" name="gst_blank_reason" class="gbr" <?php echo  set_radio('gst_blank_reason', "I don't remember"); ?> value="I don't remember" /> I don't remember
													&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" class="gbr" name="gst_blank_reason" <?php echo  set_radio('gst_blank_reason', "I don't have it"); ?> value="I don't have it" /> I don't have it
													&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="radio" class="gbr" name="gst_blank_reason" <?php echo  set_radio('gst_blank_reason', 'I am exempted'); ?> value="I am exempted" /> I am exempted
													<small class="form-text text-muted "><?php echo form_error('gst_blank_reason'); ?></small>
													
													<input type="text" name="gst_number" id="gst_no" class="form-control" value="<?php echo set_value('gst_number'); ?>" placeholder="Enter GST Number" maxlength="15" />
													<small class="form-text text-muted "><?php echo form_error('gst_number'); ?></small>
												</div>
											</div>
										</div>
										<div class="seperator"></div>
										<div class="form-group">
											<input type="submit" name="registration_step4" class="btn btn-primary" value="Start Selling" />
										</div>
										<div class="seperator"></div>
									<?php 
										echo form_close();
									?>
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

<script>
	$("#state").change(function()
	{
		var state_name 	= $(this).val();
		var csrfName 	= '<?php echo $this->security->get_csrf_token_name(); ?>';
		var csrfHash 	= '<?php echo $this->security->get_csrf_hash(); ?>';
		
/*		var dataJson = { [csrfName]: csrfHash, state_name: state_name };

		$.ajax({
			url : "<?php echo base_url("Ajax/getCity"); ?>",
			type: 'post',
			data: dataJson,            
			success : function(data)
			{   
				$("#city").html(data);
			}  
		});*/
		$.post("<?php echo base_url("Ajax/getCity"); ?>",{ [csrfName]: csrfHash, state_name: state_name})
		.done(function(data)
		{
			$("#city").html(data);
		});
		
	});
	
	$('.refresh_captcha').on('click', function(){
		$.post("<?php echo base_url("Ajax/refreshCaptcha"); ?>", function(data){
			$('#captImg').html(data);
		});
	});
	
	
	var timer2 = "02:00";
	$('.resend_otp').on('click', function(){
		$.post("<?php echo base_url("Ajax/resendSellerRegisterOTP"); ?>", function(data){
			$.toaster({ priority : 'success', title : 'Success:', message : '<?php echo RESEND_OTP_MSG; ?>'});
			$('.resend_otp').css('display','none');
			$('.countdown').html("");
			timer2 = "02:00";
		});
	});
	
	var interval = setInterval(function() {


		var timer = timer2.split(':');
		  //by parsing integer, I avoid all extra string processing
		var minutes = parseInt(timer[0], 10);
		var seconds = parseInt(timer[1], 10);
		--seconds;
		minutes = (seconds < 0) ? --minutes : minutes;
		if (minutes < 0) clearInterval(interval);
		seconds = (seconds < 0) ? 59 : seconds;
		seconds = (seconds < 10) ? '0' + seconds : seconds;
		  //minutes = (minutes < 10) ?  minutes : minutes;
		
		if(minutes == 0 && seconds == 0)
		{
			$('.resend_otp').css('display','inline-block');
			$('.countdown').html("");
		}else
		{
			$('.countdown').html(minutes + ':' + seconds);
			timer2 = minutes + ':' + seconds;
		}					
	}, 1000);
	
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
	
	$(".gbr").change(function(){		
		var gbr = $(this).val();
		
		if(gbr == "I am exempted")
		{
			$("#gst_no").css('display',"none");
		}
		else
		{
			$("#gst_no").css('display',"block");
		}
		
	});
</script>
<?php 
	lvi("footer");
?>