<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
?>

<div class="section padd">	
	<div class="row">
		<div class="col-md-12">
			<div class="heading">
				<h2>Bank Details</h2>
			</div>
			<div class="seperator"></div>
			<?php
				echo form_open(ADMINFOLDER."User/edit/$user_id");
			?>
			<div class="row">
				<div class="col-md-6">
					<label>Bank Name</label>
					<div class="form-group">
						<input type="text" name="bank_name" class="form-control" value="<?php echo set_value('bank_name',$sbi['bank_name']); ?>" maxlength="50" placeholder="Enter Bank Name" />
						<small class="form-text text-muted "><?php echo form_error('bank_name'); ?></small>
					</div>
				</div>
				<div class="col-md-6">
					<label>Account Number</label>
					<div class="form-group">
						<input type="text" name="account_no" class="form-control" value="<?php echo set_value('account_no',$sbi['account_no']); ?>" placeholder="Enter Account Number" maxlength="20" />
						<small class="form-text text-muted "><?php echo form_error('account_no'); ?></small>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>Account Name</label>
					<div class="form-group">
						<input type="text" name="account_name" class="form-control" value="<?php echo set_value('account_name',$sbi['account_name']); ?>" placeholder="Enter Account Name" maxlength="20" />
						<small class="form-text text-muted "><?php echo form_error('account_name'); ?></small>
					</div>
				</div>
				<div class="col-md-6">
					<label>Account Type</label>
					<div class="form-group">
						<input type="text" name="account_type" class="form-control" value="<?php echo set_value('account_type',$sbi['account_type']); ?>" placeholder="Enter Account Type" maxlength='20' />
						<small class="form-text text-muted "><?php echo form_error('account_type'); ?></small>
					</div>
				</div>
				
			</div>
			
			<div class="row">
				<div class="col-md-6">
					<label>IFSC Code</label>
					<div class="form-group">
						<input type="text" name="ifsc_code" class="form-control" value="<?php echo set_value('ifsc_code',$sbi['ifsc_code']); ?>" placeholder="Enter IFSC Code" maxlength="20" />
						<small class="form-text text-muted "><?php echo form_error('ifsc_code'); ?></small>
					</div>
				</div>
				<div class="col-md-6">
					<label>Swift  Code</label>
					<div class="form-group">
						<input type="text" name="swift_code" class="form-control" value="<?php echo set_value('swift_code',$sbi['swift_code']); ?>" placeholder="Enter IFSC Code" maxlength="20" />
						<small class="form-text text-muted "><?php echo form_error('swift_code'); ?></small>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 offset-md-4 text-center">
					<div class="form-group">
						<input type="submit" name="bd" class="form-control btn btn-primary" value="Save" />
					</div>
				</div>
			</div>
			<?php 
				echo form_close();
			?>
		</div>
	</div>
</div>