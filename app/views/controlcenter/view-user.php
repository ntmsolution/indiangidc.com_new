<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	include "include/header.php";
	
	
?>
	  <div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-12">
				<h1 class="m-0 text-dark">View User</h1>
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
							
								<table id="example1" class="table table-bordered table-striped data-table">
									<thead>
										<tr>
											<th>No</th>
											<th>Company Name</th>
											<th>DOR</th>
											<th>Cotact Person</th>
											<th>Cotact No</th>
											<th>Product</th>
											<th>Email Id</th>
											<th>Support Pin</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											foreach($table_data as $row)
											{
												extract($row);
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $company_name; ?></td>
											<td><?php echo dateConvert($register_date); ?></td>
											<td><?php echo $first_name." ".$last_name; ?></td>
											<td><?php echo $mobile; ?></td>
											<td><?php echo $pro_nm; ?></td>
											<td><?php echo $email; ?></td>
											<td><?php echo $support_pin; ?></td>
											<td>
												<a target="_blank" style="color:blue;" href="<?php echo base_url(ADMINFOLDER."User/view/$row[id]");?>">View</a>
												|
												<a target="_blank" style="color:blue;" href="<?php echo base_url(ADMINFOLDER."User/edit/$row[id]");?>">Edit</a>
												|
												<a onclick="return confirm('Are you sure you want to delete this user ?');" style="color:red;" href="<?php echo base_url(ADMINFOLDER."User/delete/$row[id]");?>">Delete</a>
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