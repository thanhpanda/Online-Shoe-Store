<?php 
if(isset($_REQUEST["id"])){
    $CateId = $_REQUEST["id"];
    $DSGiay = GetGiayByCategoryId($CateId);
}
?>
<!--start-product--> 
<div class="product">
		<div class="container">
			<div class="product-main">
				<div class="col-md-9 p-left">
				<div class="product-one">
				<?php 
                while($row = $DSGiay->fetch_array()){
                    ?>
                        <div class="col-md-4 product-left single-left"> 
                            <div class="p-one simpleCart_shelfItem">
                                <a href="index.php?pages=single&ma=<?php echo $row["id"] ?>">
                                        <img src="/images/product/<?php echo $row["image"] ?>" alt="" />
                                        <div class="mask mask1">
                                            <span>Quick View</span>
                                        </div>
                                    </a>
                                <h4><?php echo $row["name"] ?></h4>
                                <p><a class="item_add" href="#"><i></i> <span class=" item_price"><?php echo PriceVND($row["sale"]); ?></span></a></p>
                            </div>
				        </div>
                    <?php
                }
                ?>
				<div class="clearfix"> </div>
			</div>

			</div>
			<div class="col-md-3 p-right single-right">
				<h3>Categories</h3>
					<ul class="product-categories">
						<li><a href="#">Blucher Shoe</a> <span class="count">(14)</span></li>
						<li><a href="#">Clog Shoe</a> <span class="count">(2)</span></li>
						<li><a href="#">Snow Boot Shoe</a> <span class="count">(2)</span></li>
						<li><a href="#">Galesh Shoe</a> <span class="count">(11)</span></li>
						<li><a href="#">pataugas Shoe</a> <span class="count">(3)</span></li>
						<li><a href="#">Jazz Shoe</a> <span class="count">(3)</span></li>
					</ul>
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
	<!--end-product-->