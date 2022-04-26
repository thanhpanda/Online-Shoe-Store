<?php
if(isset($_REQUEST["ma"])){
    $idGiay = $_REQUEST["ma"];
    $Giay = GetGiayById($idGiay);
    
}
?>
<!--start-single-->
<div class="single contact">
		<div class="container">
			<div class="single-main">
				<div class="col-md-9 single-main-left">
				<div class="sngl-top">
					<div class="col-md-5 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
                                <li data-thumb="/images/product/<?php echo $Giay["image"] ?>">
									<img src="/images/product/<?php echo $Giay["image"] ?>" />
								</li>
							</ul>
						</div>
<!-- FlexSlider -->
  <script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

	<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
				</div>	
				<div class="col-md-7 single-top-right">
					<div class="details-left-info simpleCart_shelfItem">
						<h3><?php echo $Giay["name"] ?></h3>
						<p class="availability">Availability: <span class="color">In stock</span></p>
						<div class="price_single">
							<span class="reducedfrom"><?php echo PriceVND($Giay["price"]) ?></span>
							<span class="actual item_price"><?php echo PriceVND($Giay["sale"]) ?></span>
						</div>
						<h2 class="quick">Quick Overview:</h2>
						<p class="quick_desc"><?php echo $Giay["description"] ?></p>
						<ul class="product-colors">
							<h3>available Colors ::</h3>
							<li><a class="color1" href="#"><span> </span></a></li>
							<li><a class="color2" href="#"><span> </span></a></li>
							<li><a class="color3" href="#"><span> </span></a></li>
							<li><a class="color4" href="#"><span> </span></a></li>
							<li><a class="color5" href="#"><span> </span></a></li>
							<li><a class="color6" href="#"><span> </span></a></li>
							<li><a class="color7" href="#"><span> </span></a></li>
							<li><a class="color8" href="#"><span> </span></a></li>
							<div class="clear"> </div>
						</ul>
						<ul class="size">
							<h3>Length</h3>
							<li><a href="#">7</a></li>
							<li><a href="#">6</a></li>
						</ul>
						<div class="quantity_box">
							<ul class="product-qty">
								<span>Quantity:</span>
								<select>
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
								</select>
							</ul>
						</div>
					<div class="clearfix"> </div>
				<div class="single-but item_add">
					<a href="/index.php?pages=xulymycart&ThemGH=<?php echo $idGiay ?>">Add To Cart</a>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
    <?php 
    $DSGiay = GetGiayByCategoryId($Giay["category"]);
    ?>
					<div class="latest products">
						<div class="product-one">
                            <div class="row">
							<?php 
                                while($Giay = $DSGiay->fetch_array()){
                                    ?>
                                        <div class="col-md-4 product-left single-left"> 
                                            <div class="p-one simpleCart_shelfItem">
                                                
                                                <a href="index.php?pages=single&ma=<?php echo $Giay["id"] ?>">
                                            <img src="/images/product/<?php echo $Giay["image"] ?>" alt="" />
                                            <div class="mask mask1">
                                                <span>Quick View</span>
                                            </div>
                                            </a>
                                                <h4><?php echo $Giay["name"] ?></h4>
                                                <p><a class="item_add" href="#"><i></i> <span class=" item_price"><?php echo $Giay["price"] ?></span></a></p>
                                                
                                            </div>
                                        </div>
                                    <?php
                                }
                            ?>
                                <div class="clearfix"> </div>
                            </div>
						</div>
						
					</div>
				</div>
				<div class="col-md-3 single-right">
					
					<h3>Colors</h3>
					<ul class="product-categories">
						<li><a href="#">Green</a> <span class="count">(14)</span></li>
						<li><a href="#">Blue</a> <span class="count">(2)</span></li>
						<li><a href="#">Red</a> <span class="count">(2)</span></li>
						<li><a href="#">Gray</a> <span class="count">(8)</span></li>
						<li><a href="#">Green</a> <span class="count">(11)</span></li>
						<li><a href="#">Yellow</a> <span class="count">(2)</span></li>
					</ul>
					<h3>Sizes</h3>
					<ul class="product-categories">
						<li><a href="#">5.5</a> <span class="count">(14)</span></li>
						<li><a href="#">6</a> <span class="count">(2)</span></li>
						<li><a href="#">6.5</a> <span class="count">(2)</span></li>
						<li><a href="#">7</a> <span class="count">(8)</span></li>
						<li><a href="#">7.5</a> <span class="count">(11)</span></li>
					</ul>
					<h3>Price</h3>
					<ul class="product-categories p1">
						<li><a href="#">600$-700$</a> <span class="count">(14)</span></li>
						<li><a href="#">700$-800$</a> <span class="count">(2)</span></li>
						<li><a href="#">800$-900$</a> <span class="count">(2)</span></li>
						<li><a href="#">900$-1000$</a> <span class="count">(8)</span></li>
						<li><a href="#">1000$-1100$</a> <span class="count">(11)</span></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-single-->