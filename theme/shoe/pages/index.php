<!--banner-starts-->
<div class="bnr" id="home">
		<div  id="top" class="callbacks_container">
		<?php
            echo ThemeBanner();
        ?>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--banner-ends--> 

    <!--Slider-Starts-Here-->
    <script src="/public/js/responsiveslides.min.js"></script>
			 <script>
			    // You can also use "$(window).load(function() {"
			    $(function () {
			      // Slideshow 4
			      $("#slider4").responsiveSlides({
			        auto: true,
			        pager: true,
			        nav: false,
			        speed: 500,
			        namespace: "callbacks",
			        before: function () {
			          $('.events').append("<li>before event fired.</li>");
			        },
			        after: function () {
			          $('.events').append("<li>after event fired.</li>");
			        }
			      });
			
			    });
			  </script>
			<!--End-slider-script-->

<!--start-banner-bottom--> 
<?php 
	echo ThemeBannerBottom();
?>
	<!--end-banner-bottom--> 

<!--start-shoes--> 
<?php 
	echo ThemShoe();
?>
	<!--end-shoes-->

<!--start-abt-shoe-->
<?php 
	echo ThemeAbtShoe();
?>
	<!--end-abt-shoe-->