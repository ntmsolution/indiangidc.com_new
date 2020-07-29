<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="section padd">	
	<div class="row">
		<div class="col-md-12">
			<div class="heading">
				<h2>Billing Details</h2>
			</div>
			<div class="seperator"></div>
			<?php
				echo form_open(ADMINFOLDER."User/edit/$user_id");
				if($ss['gst_no'] != "")
				{
			?>
				<style>
				.gnp{ display:none; }
				</style>
			<?php
				}
			?>
			<div class="row">
				<div class="col-md-6">
					<label>GST Number</label>
					<div class="form-group">
						<input type="text" name="gst_no" id="gst_no" class="form-control" value="<?php echo set_value('gst_no',$ss['gst_no']); ?>" placeholder="Enter GST Number" maxlength="15"  />
						<small class="form-text text-muted "><?php echo form_error('gst_no'); ?></small>
					</div>
				</div>
				<div class="col-md-6 gnp">
					<label>GST Not Provide Reason</label>
					<div class="form-group" style="font-size:15px;">
						<input type="radio" name="gst_no_reson" <?php echo  set_radio('gst_blank_reason', "I don't remember",($ss['gst_no_reson'] == "I don\'t remember") ? true : false); ?> value="I don't remember" /> I don't remember
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="gst_no_reson" <?php echo  set_radio('gst_blank_reason', "I don't have it",($ss['gst_no_reson'] == "I don\'t have it") ? true : false); ?> value="I don't have it" /> I don't have it
						&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="radio" name="gst_no_reson" <?php echo  set_radio('gst_blank_reason', 'I am exempted',($ss['gst_no_reson'] == "I am exempted") ? true : false); ?> value="I am exempted" /> I am exempted
						<small class="form-text text-muted "><?php echo form_error('pan_no'); ?></small>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>PAN Number</label>
					<div class="form-group">
						<input type="text" name="pan_no" class="form-control" value="<?php echo set_value('pan_no',$ss['pan_no']); ?>" placeholder="Enter PAN Number" />
						<small class="form-text text-muted "><?php echo form_error('pan_no'); ?></small>
					</div>
				</div>
				<div class="col-md-6">
					<label>TAN Number</label>
					<div class="form-group">
						<input type="text" name="tan_no" class="form-control" value="<?php echo set_value('tan_no',$ss['tan_no']); ?>" placeholder="Enter TAN Number" />
						<small class="form-text text-muted "><?php echo form_error('tan_no'); ?></small>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<label>CIN Number</label>
					<div class="form-group">
						<input type="text" name="cin_no" class="form-control" value="<?php echo set_value('cin_no',$ss['cin_no']); ?>" placeholder="Enter CIN Number" />
						<small class="form-text text-muted "><?php echo form_error('cin_no'); ?></small>
					</div>
				</div>
				<div class="col-md-6">
					<label>IE Code</label>
					<div class="form-group">
						<input type="text" name="ie_code" class="form-control" value="<?php echo set_value('ie_code',$ss['ie_code']); ?>" placeholder="Enter IE Code" />
						<small class="form-text text-muted "><?php echo form_error('ie_code'); ?></small>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 offset-md-4 text-center">
					<div class="form-group">
						<input type="submit" name="sd" class="form-control btn btn-primary" value="Save" />
					</div>
				</div>
			</div>
			<?php 
				echo form_close();
			?>
		</div>
	</div>
</div>