<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	include "include/header.php";
	
	
?>
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-12">
					<h1 class="m-0 text-dark"><?php if(isset($table_data[0])){ echo $table_data[0]['category_name']." - ".$table_data[0]['subcategory_name']; } ?> Products</h1>
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
											<th>Category Name</th>
											<th>Are of use</th>
											<th>Product Name</th>
											<th>Product Price</th>
											<th>Product Seller</th>
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
											<td><?php echo $category_name; ?></td>
											<td><?php echo $subcategory_name; ?></td>
											<td><?php echo $product_name; ?></td>
											<td><?php echo $product_price."/- (Per ".$product_price_as_per.")"; ?></td>
											<td><a href="<?php echo base_url(ADMINFOLDER."User/view/$seller_id"); ?>" target="_blank"><?php echo $company_name; ?></a></td>
											<td>
												<a target="_blank" style="color:blue;" href="<?php echo base_url(ADMINFOLDER."Product/details/$id");?>">View Product Details</a>
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