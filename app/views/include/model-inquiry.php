<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	if(getLoginId('buyer') || getLoginId())
	{
?>
	<!-- Modal -->
	<div class="modal fade" id="productmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Contact Supplier </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php 
					echo form_open(HOME_SENDPRODUCTINQUIRY);
				?>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<input type="hidden" id="seller_id" name="seller_id" value="<?php if(isset($seller_id)){ echo $seller_id; } ?>" />
							<div id="getdata"> 
								
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Contact Number</label>
										<input type="text" pattern="[6789][0-9]{9}" name="contact_no" id="contact_no" class="form-control" placeholder="Enter Number" maxlength="10" required />
										<small class="form-text text-muted"><?php echo form_error('contact_no'); ?></small>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Contact Email</label>
										<input type="email" name="contact_email" id="contact_email" class="form-control" placeholder="Enter Contact Email" required maxlength="100" />
										<small class="form-text text-muted"><?php echo form_error('contact_email'); ?></small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Message</label>
										<textarea name="message" id="message" class="form-control" maxlength="5000" placeholder="Enter Message" required ></textarea>
										<small class="form-text text-muted"><?php echo form_error('message'); ?></small>
									</div>
								</div>
							</div>						
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="send_inquiry" class="btn btn-primary send_inquiry">Send Inquiry</button>
					<button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				<?php 
					echo form_close();
				?>
			</div>
		</div>
	</div>
	<!-- End Modal Dialog -->
<?php
$product_data = "<option value=''>--- Inquiry For ---</option>";
if(isset($seller_id))
{
	$inquiry = select("seller_product","seller_id = $seller_id");
	foreach($inquiry as $row)
	{
		$product_data .= "<option value='$row[id]'>$row[product_name]</option>";
	}
}

$m_n  = "";
$m_nm = "";
if(getLoginId('buyer') || getLoginId())
{
	$reg_id = (getLoginId('buyer')) ?  getLoginId('buyer') : getLoginId();
	$br 	= selectById('registration',$reg_id);
	$m_n	= $br['mobile'];
	if(getLoginId('buyer'))
	{
		$m_nm	= $br['name'];
	}
	else if(getLoginId())
	{
		$seller_id 	= getLoginId();
		$sp			= select("seller_profile","seller_id = $seller_id");
		if(isset($sp[0]))
		{			
			$m_nm	= $sp[0]['first_name']." ".$sp[0]['last_name'];
		}
	}
}
?>
	<script>
		$(document).ready(function(){
			$(".getquote").on("click",function(){
				
				$("#getdata").html("<input type='hidden' name='inquiry_type' value='get_quote' /><input type='hidden' id='product_id' name='product_id'/><div class='row'><div class='col-md-6 offset-md-3'><img src='' id='idimg'/></div></div><div class='row'><div class='col-md-12 text-center'><h2 id='product_name'></h2><p id='product_price'></p></div></div><div class='row'><div class='col-md-12'><div class='form-group'><label>Name</label><input type='text' maxlength='50' name='name' id='name' class='form-control' placeholder='Enter Name' required/><small class='form-text text-muted'><?php echo form_error('name'); ?></small></div></div></div>");
				$("#seller_id").val($(this).attr("data-sellerid"));
				$("#product_id").val($(this).attr("data-productid"));
				$("#product_name").html($(this).attr("data-productname"));
				$("#product_price").html("Rs "+$(this).attr("data-productprice"));
				$("#idimg").attr("src",$(this).attr("data-idimg"));
				$('.modal-title').html("Get Quote");
				$('.send_inquiry').html('Get Quote');
				$("#contact_no").val("<?php echo $m_n; ?>");
				$("#name").val("<?php echo $m_nm; ?>");
			});
			
			$(".myinqbtn").on("click",function(){
				$("#getdata").html("<input type='hidden' name='inquiry_type' value='contact_suppliere' /><input type='hidden' id='product_id' name='product_id'/><div class='row'><div class='col-md-12'><div class='form-group'><label>Name</label><input type='text' name='name' maxlength='50' id='name' class='form-control' placeholder='Enter Name' required/><small class='form-text text-muted'><?php echo form_error('name'); ?></small></div></div></div>");
				$("#seller_id").val($(this).attr("data-sellerid"));
				$("#product_id").val($(this).attr("data-productid"));
				$('.modal-title').html("Contact Supplier");
				$('.send_inquiry').html('Contact Supplier');
				$("#contact_no").val("<?php echo $m_n; ?>");
				$("#name").val("<?php echo $m_nm; ?>");
			});
			
			$(".sendmsg").on('click',function(){
				
				var product_data = "<?php echo $product_data; ?>";
				
				$('.modal-title').html("Send inquiry message to supplier");
				$('.send_inquiry').html('Send Message');
				
				$("#getdata").html("<div class='row'><div class='col-md-6'><div class='form-group'><label>Name</label><input type='hidden' name='inquiry_type' value='mobile' /><input type='text' name='name' id='name' class='form-control' placeholder='Enter Name' maxlength='50' required/><small class='form-text text-muted'><?php echo form_error('name'); ?></small></div></div><div class='col-md-6'><div class='form-group'><label>Inquiry For </label><select name='product_id' id='product_id' class='form-control' required ><option value=''>--- Inquiry For ---</option></select><small class='form-text text-muted'><?php echo form_error('product_id'); ?></small></div></div></div>");
				$("#product_id").html(product_data);
				$("#contact_no").val("<?php echo $m_n; ?>");
				$("#name").val("<?php echo $m_nm; ?>");
			});
			
			$(".sendemail").on('click',function(){
				
				var product_data = "<?php echo $product_data; ?>";
				$('.modal-title').html("Send inquiry email to supplier");
				$('.send_inquiry').html('Send Email');
				$("#getdata").html("<div class='row'><div class='col-md-6'><div class='form-group'><label>Name</label><input type='hidden' name='inquiry_type' value='email' /><input type='text' name='name' id='name' maxlength='50' class='form-control' placeholder='Enter Name' required/><small class='form-text text-muted'><?php echo form_error('name'); ?></small></div></div><div class='col-md-6'><div class='form-group'><label>Inquiry For </label><select name='product_id' id='product_id' class='form-control' required ><option value=''>--- Inquiry For ---</option></select><small class='form-text text-muted'><?php echo form_error('product_id'); ?></small></div></div></div>");
				$("#product_id").html(product_data);
				$("#contact_no").val("<?php echo $m_n; ?>");
				$("#name").val("<?php echo $m_nm; ?>");
			});
		});
	</script>
<?php 
	}
?>