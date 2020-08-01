<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	include "include/header.php";
	//seller_business_profile seller_profile
	$qry		= "select sm.*, sp.first_name, sp.last_name, sbp.company_name, r.mobile, r.email from
											seller_membership sm 
											left join seller_business_profile sbp on sbp.seller_id = sm.seller_id
											left join seller_profile sp on sp.seller_id = sm.seller_id 
											left join registration r on r.id = sm.seller_id";
	$total_rec 	= countRec("$qry");
	$plan 		= query("$qry");
	
?>
	  <div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-12">
				<h1 class="m-0 text-dark">View Order</h1>
			  </div>
			</div>
		  </div>
		</div>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary card-outline" style="padding:20px;">
							<br/>
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-striped data-table">
									<thead>
										<tr>
											<th>No</th>
											<th>Company Name</th>
											<th>Name</th>
											<th>Mobile</th>
											<th>Plan Duration</th>
											<th>Plan Name</th>
											<th>Pay Amount</th>
											<th>Order Date</th>
											<th>Order Expire Date</th>
											<th>Razor pay Order ID</th>
											<th>Razor pay Payment ID</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											foreach($plan as $row){
										?>
										<tr>
											<td><?php echo $i; ?></td>
											
											<td><?php echo $row["company_name"]; ?></td>
											<td><?php echo $row["first_name"]." ".$row["last_name"]; ?></td>
											<td><?php echo $row['mobile']; ?></td>
											<td><?php echo $row["plan_duration"]; ?> Month</td>
											<td><?php echo $row["plan_name"]; ?></td>
											<td><?php echo $row["plan_price"]; ?></td>
											<td><?php echo dateConvert($row["order_date"]); ?></td>
											<td><?php echo dateConvert($row["expire_date"]); ?></td>
											<td><?php echo $row["razorpay_order_id"]; ?></td>
											<td><?php echo $row["razorpay_payment_id"]; ?></td>
											
										</tr>
										<?php
										$i++;
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	<script>
		$(function(){
			
			$('.data-table').DataTable({	
				dom: 'Bfrtip',
				<?php 
					if($total_rec > ADMIN_PER_PAGE)
					{
				?>
				"paging":   true,
				<?php
					}
					else
					{
				?>
				"paging":   false,
				<?php
					}
				?>
				"iDisplayLength": <?php  echo ADMIN_PER_PAGE; ?>
			});
			
		});
		</script>
	
<?php include "include/footer.php"; ?>