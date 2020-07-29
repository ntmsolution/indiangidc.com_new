<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	include "include/header.php";	
?>
	  <div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-4">
				<h1 class="m-0 text-dark">Add Category</h1>
			  </div>
			  <div class="col-sm-4">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="<?php echo base_url(ADMINFOLDER."Category/view") ?>">Category</a></li>
				  <li class="breadcrumb-item active">Add Category</li>
				</ol>
			  </div>
			</div>
		  </div>
		</div>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8">
						<div class="card card-primary card-outline">
							<form method="post" action="<?php echo base_url(ADMINFOLDER."Category/add"); ?>" enctype="multipart/form-data">
								<div class="card-body">
									<div class="form-group">
										<label>Category</label>
										<input type="text" class="form-control" name="category_name" placeholder="Category" required />
									</div>
									<div class="form-group">
										<label>Parent Category</label>
										<select class="form-control" name="parent_id" >
											<option value="0">Parent Category</option>
											<?php 
												$category = select("category","","order by parent_id ASC");
												foreach($category as $cat)
												{
											?>
												<option value="<?php echo $cat['id']; ?>"><?php echo $cat['category_name']; ?></option>
											<?php 
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Category Image</label>
										<input type="file" class="form-control" name="category_image"  />
									</div>
								</div>	
								<div class="card-footer">
									<button type="submit" name="add" class="btn btn-primary"> Add Category</button>
									<button type="button" name="cancel" class="btn btn-danger"> Cancel</button>
								</div>
							</form>							
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<?php include "include/footer.php"; ?>