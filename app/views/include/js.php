<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
		<!-- Jquery Library -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrep.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.toaster.js"></script>	
		<?php 
			if(getClass() == "Home")
			{
		?>
			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>	
		<?php
			}
		?>
		
		<?php 
			if(getClass() == "Home" || getClass() == "Seller")
			{
		?>
				<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>	
		<?php
			}
		?>
		
		<?php 
			if(getClass() == "Home" || getClass() == "Seller" || getClass() == "Sellerprofile")
			{
		?>
				<!-- Owl Carousel -->
				<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
				<script type="text/javascript">
					$(document).ready(function(){
						<?php
							if(getClass() == "Home"){
						?>
						if($(".slider .owl-carousel")!=null){
						  $(".slider .owl-carousel").owlCarousel({
							items:1,
							margin:0,
							loop:true,
							nav:false,
							dots:false,
							autoplay:true,
							smartSpeed:1500
						  });
						}
						<?php
							}
							if(getClass() == "Seller"  || getClass() == "Sellerprofile"){
						?>
						if($(".banner .owl-carousel")!=null){
						  $(".banner .owl-carousel").owlCarousel({
							items:5,
							margin:10,
							loop:false,
							nav:false,
							dots:false,
							autoplay:true,
							autoplayHoverPause:true,
							smartSpeed:1500
						  });
						}
												
						<?php
							}
						?>
					});
					<?php
						if(getClass() == "Seller"  || getClass() == "Sellerprofile"){
					?>
					$(document).on('click', 'a[href^="#"]', function(e) {
						// target element id
						var id = $(this).attr('href');

						// target element
						var $id = $(id);
						if ($id.length === 0) {
							return;
						}

						// prevent standard hash navigation (avoid blinking in IE)
						e.preventDefault();

						// top position relative to the document
						var pos = $id.offset().top;

						// animated top scrolling
						$('body, html').animate({scrollTop: pos});
					});
					<?php
						}
					?>
				</script>
		<?php
			}
		?>
		
		

