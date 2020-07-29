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
								<h2>Buy Leads</h2>
							</div>
							<div class="seperator"></div>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr class="lead_buy_heading">
											<th>Name</th>
											<th>Contact No</th>
											<th>Email</th>
											<th >Message</th>
											<th colspan="2">Date Time</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$seller_id 		= getLoginId();
											$lead_buy = getLeadBuy("seller_id = '$seller_id' && inquiry_type != 'get_quote' order by date_time DESC LIMIT $pno, ".PER_PAGE_REC);
											foreach($lead_buy as $row)
											{
												$style 			= "";
												$msg 			= stringRang($row['message'],40);
												$url 			= base_url(SELLER_BUYLEADS."/".$row['id']."/no/$pno/");
												$del_url 		= base_url(SELLER_BUYLEADS."/".$row['id']."/yes"."/$pno/");
												if($row['is_read'] == 0)
												{
													$style = "style='font-weight:bold'";
												}
												else if($msg_id == $row['id'])
												{
													$style 	= "";
													$msg	= $row['message'];
													$url	= base_url(SELLER_BUYLEADS."/0/0/$pno");
												}
										?>
												
												<tr class="lead_buy_data" <?php echo $style; ?> title="<?php echo SELLER_BUYLEADS_MSG_OPEN; ?>" >
													<td onclick="javascript: location.href = '<?php echo $url; ?>'" ><?php echo $row['name']; ?></td>
													<td onclick="javascript: location.href = '<?php echo $url; ?>'" ><?php echo $row['contact_no']; ?></td>
													<td onclick="javascript: location.href = '<?php echo $url; ?>'"><?php echo $row['contact_email']; ?></td>
													<td onclick="javascript: location.href = '<?php echo $url; ?>'"><?php echo $msg; ?></td>
													<td  onclick="javascript: location.href = '<?php echo $url; ?>'"><?php echo dateTimeConvert($row['date_time']); ?></td>
													<td align="right">
														<a href="<?php echo $del_url; ?>" onclick="javascript: return confirm('<?php echo SELLER_BUYLEADS_MSG_ALERT; ?>'); "><i class="fa fa-trash" style='color:' aria-hidden="true"></i></a>
													</td>
												</tr>
										<?php
											}
										?>
												<tr>
													<td colspan="6">
														<?php 
															echo paging(countRec("lead_buy","seller_id = '$seller_id' && inquiry_type != 'get_quote' "),PER_PAGE_REC,SELLER_BUYLEADS."/0/0/");
														?>
													</td>
												</tr>
									</tbody>
								</table>
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