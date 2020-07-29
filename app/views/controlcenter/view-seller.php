<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	include "include/header.php";
	$total_rec 				= countRec("registration");
	$registration 			= select("registration");
	
?>
	  <div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-12">
				<h1 class="m-0 text-dark">View Seller</h1>
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
											<th>Name</th>
											<th>Company Name</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Reg. Date</th>
											<th style="display:none;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											foreach($registration as $row){
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $row["name"]; ?></td>
											<td><?php echo $row["company_name"]; ?></td>
											<td><?php echo $row["email"]; ?></td>
											<td><?php echo $row["mobile"]; ?></td>
											<td><?php echo dateConvert($row["register_date"]); ?></td>
											<td style="display:none;">
												<a target="_blank" onclick="return confirm('Are you sure you want to delete ?');" style="color:red;" href="<?php echo base_url(ADMINFOLDER."Seller/delete/$row[id]");?>">Delete</a>
											</td>
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