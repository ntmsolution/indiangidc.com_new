<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	include "include/header.php";
	$category = selectById("category",$eid);
	extract($category);
?>
	  <div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-4">
				<h1 class="m-0 text-dark">Update Category</h1>
			  </div>
			  <div class="col-sm-4">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="<?php echo base_url(ADMINFOLDER."Category/view") ?>">Category</a></li>
				  <li class="breadcrumb-item active">Update Category</li>
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
							<form method="post" action="<?php echo base_url(ADMINFOLDER."Category/edit/$eid"); ?>" enctype="multipart/form-data">
								<div class="card-body">
									<div class="form-group">
									  <input class="form-control" name="category_name" placeholder="Category" value="<?php echo $category_name; ?>" required />
									</div>
									<div class="form-group">
										<label>Parent Category</label>
										<select class="form-control" name="parent_id" >
											<option value="0">Parent Category</option>
											<?php 
												$category = select("category","id != $eid && parent_id != $eid","order by parent_id ASC");
												foreach($category as $cat)
												{
													$s = "";
													if($parent_id == $cat['id'])
													{
														$s = "selected";
													}
											?>
												<option <?php echo $s; ?> value="<?php echo $cat['id']; ?>"><?php echo $cat['category_name']; ?></option>
											<?php 
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Category Image</label>
										<input type="file" class="form-control" name="category_image"  />
										<input type="hidden" class="form-control" name="category_image" value="<?php echo $category_image; ?>" />
										<?php 
											if($category_image != "")
											{
										?>
										<img src="<?php echo base_url(); ?>assets/upload/category-images/<?php echo $category_image; ?>" height="100px" />
										<?php 
											}
										?>
									</div>
								</div>						  
								<div class="card-footer">
									<button type="submit" name="edit" class="btn btn-primary"> Update Category</button>
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