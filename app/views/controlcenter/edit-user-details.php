<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	include "include/header.php";
?>
<style>
th{
	font-weight:bold!important;
}
</style>
	  <div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-12">
				<h1 class="m-0 text-dark">Update User Details</h1>
			  </div>
			</div>
		  </div>
		</div>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-primary card-outline" style="padding:20px;">
							<?php 
								lvai('company-details');
							?>
						</div>
						<div class="card card-primary card-outline" style="padding:20px;">
							<?php 
								
								lvai('billing-details');
								
							?>
						</div>
						<div class="card card-primary card-outline" style="padding:20px;">
							<?php 
								
								lvai('bank-details');
								
							?>
						</div>
						<div class="card card-primary card-outline" style="padding:20px;">
							<?php 
								
								lvai('location-details');
								
							?>
						</div>
						<div class="card card-primary card-outline" style="padding:20px;">
							<?php 
								
								lvai('personal-details');
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
	
<?php include "include/footer.php"; ?>