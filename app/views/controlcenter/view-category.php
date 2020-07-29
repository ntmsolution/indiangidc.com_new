<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	include "include/header.php";
	$total_rec 		= countRec("category");
	$category 		= select("category");
	
?>
	  <div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-12">
				<h1 class="m-0 text-dark">View Category</h1>
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
											<th>Category Name</th>
											<th>Parent Category</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$i = 1;
											foreach($category as $row){
										?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $row["category_name"]; ?></td>
											<td>
												<?php 
													if($row["parent_id"] == 0)
													{
														echo "No Parent";
													}
													else
													{
														$parent = selectByID("category",$row['parent_id']);
														echo $parent["category_name"];
													}
												?>
											</td>
											<td>
												<a target="_blank" href="<?php echo base_url(ADMINFOLDER."Category/edit/$row[id]");?>">Edit</a>
												&nbsp;&nbsp;|&nbsp;&nbsp;
												<a target="_blank" onclick="return confirm('Are you sure you want to delete ?');" style="color:red;" href="<?php echo base_url(ADMINFOLDER."Category/delete/$row[id]");?>">Delete</a>
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