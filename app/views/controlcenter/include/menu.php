<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	$class 	= $this->router->fetch_class();
	$method = $this->router->fetch_method();
?>

 <!-- Main Sidebar Container -->
	  <aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a href="<?php echo base_url(ADMINFOLDER."Home/index"); ?>" class="brand-link">
		 
		  <div class="brand-text font-weight-light text-center"><img src="<?php echo base_url('assets/upload/site-images/'.$settings['logo']); ?>" height='25px' /></div>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
		  <!-- Sidebar Menu -->		  
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<li class="nav-item">
						<a href="<?php echo base_url(ADMINFOLDER."Home/index"); ?>" class="nav-link <?php if($class == "Home" && $method == "index"){ echo "active"; } ?> " >
						  <i class="nav-icon fas fa-tachometer-alt"></i>
						  <p>
							Dashboard
						  </p>
						</a>
					</li>
					
					
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link <?php if($class == "Product"){ echo "active"; } ?>">					
						  <i class=" nav-icon fa fa-object-group" aria-hidden="true"></i>
						  <p>
							Product Statistics
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="<?php echo base_url(ADMINFOLDER."Product/index/"); ?>" class="nav-link <?php if($class == "Product" && $method == "index"){ echo "active"; } ?>">
							  <i class="fa fa-eye nav-icon"></i>
							  <p>View Product Statistics</p>
							</a>
						  </li>
						   <li class="nav-item">
							<a href="<?php echo base_url(ADMINFOLDER."Product/all/"); ?>" class="nav-link <?php if($class == "Product" && $method == "all"){ echo "active"; } ?>">
							  <i class="fa fa-eye nav-icon"></i>
							  <p>View All Products</p>
							</a>
						  </li>
						</ul>
					</li>
					
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link <?php if($class == "User"){ echo "active"; } ?>">					
						  <i class=" nav-icon fa fa-users" aria-hidden="true"></i>
						  <p>
							Manage User
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="<?php echo base_url(ADMINFOLDER."User/index/"); ?>" class="nav-link <?php if($class == "User" && $method == "index"){ echo "active"; } ?>">
							  <i class="fa fa-eye nav-icon"></i>
							  <p>View User</p>
							</a>
						  </li>
						</ul>
					</li>
				  
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link <?php if($class == "Category"){ echo "active"; } ?>">
					
						  <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
						  <p>
							Manage Category
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						  <li class="nav-item">
							<a href="<?php echo base_url(ADMINFOLDER."Category/add/"); ?>" class="nav-link <?php if($class == "Category" && $method == "add"){ echo "active"; } ?>">
							  <i class="fa fa-plus nav-icon"></i>
							  <p>Add Category</p>
							</a>
						  </li>
						  <li class="nav-item">
							<a href="<?php echo base_url(ADMINFOLDER."Category/view/"); ?>" class="nav-link <?php if($class == "Category" && $method == "view"){ echo "active"; } ?>">
							  <i class="fa fa-eye nav-icon"></i>
							  <p>View Category</p>
							</a>
						  </li>
						</ul>
					</li>
					
					
					<li class="nav-item has-treeview">
						<a href="#" class="nav-link <?php if($class == "Category"){ echo "active"; } ?>">
					
						  <i class=" nav-icon fa fa-list-alt" aria-hidden="true"></i>
						  <p>
							Manage Membership Plan
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
						 <?php /* <li class="nav-item">
							<a href="<?php echo base_url(ADMINFOLDER."Plan/add/"); ?>" class="nav-link <?php if($class == "Plan" && $method == "add"){ echo "active"; } ?>">
							  <i class="fa fa-plus nav-icon"></i>
							  <p>Add Plan</p>
							</a>
						  </li>*/?>
						  <li class="nav-item">
							<a href="<?php echo base_url(ADMINFOLDER."Plan/view/"); ?>" class="nav-link <?php if($class == "Plan" && $method == "view"){ echo "active"; } ?>">
							  <i class="fa fa-eye nav-icon"></i>
							  <p>View Plan</p>
							</a>
						  </li>
						</ul>
					</li>
					
					<li class="nav-item">
						<a href="<?php echo base_url(ADMINFOLDER."Settings/edit"); ?>" class="nav-link <?php if($class == "Settings" && $method == "edit"){ echo "active"; } ?>" >
						  <i class="fa fa-cog nav-icon"></i>
						  <p>
							Settings
						  </p>
						</a>
					</li>
					  
					<li class="nav-item">
						<a href="<?php echo base_url(ADMINFOLDER."Home/changepassword"); ?>" class="nav-link <?php if($class == "Home" && $method == "changepassword"){ echo "active"; } ?>" >
						  <i class="fa fa-key nav-icon"></i>
						  <p>
							Change Password
						  </p>
						</a>
					</li>
					  
					<li class="nav-item">
						<a href="<?php echo base_url(ADMINFOLDER."Home/logout"); ?>" class="nav-link" >
						  <i class="fa fa-power-off nav-icon" title="Logout"></i>
						  <p>
							Logout
						  </p>
						</a>
					</li>
				</ul> 
			</nav>
		  <!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	  </aside>
