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
								<h2>Receive Requirement</h2>
							</div>
							<div class="seperator"></div>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr class="lead_buy_heading">
											<th>Buyer Name</th>
											<th>Are of use</th>
											<th>Contact No</th>
											<th>Message</th>
										</tr>
									</thead>
									<tbody>
										<?php 
											$seller_id 		= getLoginId();
											$qry 			= "select br.*, spro.subcategory_name, sp.first_name, sp.last_name, r.mobile from buy_request br
																			left join  registration r 
																			on
																			br.buyer_id = r.id
																			left join seller_profile sp
																			on
																			sp.seller_id = br.buyer_id
																			left join seller_product spro
																			on
																			spro.subcategory_id = br.subcategory_id
																			where br.buyer_id != $seller_id
																			group by br.id
																			LIMIT $pno, ".PER_PAGE_REC;
											$buy_request 	= query($qry);
											foreach($buy_request as $row)
											{
												
										?>
												<tr>
													<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
													<td><?php echo $row['subcategory_name']; ?></td>
													<td><?php echo $row['mobile']; ?></td>
													<td><?php echo $row['message']; ?></td>
												</tr>
												
										<?php
											}
										?>
												<tr>
													<td colspan="4">
														<?php 
															echo paging(countRec($qry),PER_PAGE_REC,SELLER_VIEW_REQUIREMENT."/0/0/");
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