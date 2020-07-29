			<div class="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6 text-left">
							All Rights &copy; Reserved By IndianGIDC.com
						</div>
						<div class="col-md-6 text-right bottom-link">
							<a href="<?php echo base_url(PRICE); ?>">Membership Price</a> | 
							<a href="<?php echo base_url(ABOUT); ?>">About Us</a> | 
							<a href="<?php echo base_url(CONTACT); ?>">Contact Us</a> |
							<a href="<?php echo base_url(PRIVACY); ?>">Privacy Policy</a> |
							<a href="<?php echo base_url(REFUND); ?>">Refund Policy</a> |
							<a href="<?php echo base_url(TERM); ?>">Terms of Services</a>
						</div>
					</div>
				</div>
			</div>			
		</div>
		


		<?php
		/*	if(isset($pg) && $pg == "addimage")
			{
		?>
		<script>
			$(document).ready(function(){
				function readURL(obj,input) {
			        if (input.files && input.files[0]) {
			            var reader = new FileReader();
			            
			            reader.onload = function (e) {
			                obj.attr('src', e.target.result);
			            }
			            reader.readAsDataURL(input.files[0]);
			        }
			    }
			    
				$("#p1").click(function(){
					$("#file1").click();
				});
				$("#p2").click(function(){
					$("#file2").click();
				});
				$("#p3").click(function(){
					$("#file3").click();
				});
				$("#p4").click(function(){
					$("#file4").click();
				});

				$("#file1").change(function(){
					readURL($("#p1"),this);
			    });
			    $("#file2").change(function(){
			    	readURL($("#p2"),this);
			    });
			    $("#file3").change(function(){
			    	readURL($("#p3"),this);
			    });
			    $("#file4").change(function(){
			    	readURL($("#p4"),this);
			    });

			    $("#addgropform #add").on("click",function(){
			    	$.post("<?php echo base_url("Seller2/loadajax1"); ?>", $("#addgropform").serialize())
		            .done(function(data) {
		                if (data.trim().length > 0) {
		                    $("#groupproduct_option").html(data.trim());   
		                }
		            });
			    });
			});
		</script>
		<?php		
			}*/
		?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-163439922-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-163439922-1');
		</script>
		<!--Start of Tawk.to Script-->
		<script type="text/javascript">
			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
			(function(){
				var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
				s1.async=true;
				s1.src='https://embed.tawk.to/5e92ffe535bcbb0c9ab03363/default';
				s1.charset='UTF-8';
				s1.setAttribute('crossorigin','*');
				s0.parentNode.insertBefore(s1,s0);
			})();
		</script>
		<!--End of Tawk.to Script-->
	</body>
</html>