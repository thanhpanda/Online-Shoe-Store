
<?php
include_once(__DIR__ . "/../../Functions.php");

function ThemeBanner(){
    ob_start();
    ?>
    <ul class="rslides" id="slider4">
        <?php
        $DSBanner = GetBanner();
        while($row = $DSBanner->fetch_array()){
        ?>
                <li>
					<img src="<?php echo $row["image"]; ?>" alt="Banner">
				</li>

        <?php
        }   
        ?>			    
	</ul>
    <?php
    $str = ob_get_clean();
    return $str;
}

function ThemeBannerBottom(){
    ob_start();
    ?>
    <?php 
    $shoe1 = GetGiayById(58);
    $shoe2 = GetGiayById(59);
   
    ?>
    <div class="banner-bottom">
		<div class="container">
			<div class="banner-bottom-top">
                <div class="row">
                    
                <div class="col-md-6 banner-bottom-right mt-4">
                        <div class="bnr-two">
                            <div class="bnr-left">
                                <h2><a href="index.php?pages=single&ma=<?php echo $shoe1["id"] ?>"><?php echo $shoe1["name"] ?></a></h2>
                                <p><?php echo PriceVND($shoe1["sale"]) ?></p>
                                <div class="b-btn"> 
                                    <a href="index.php?pages=single&ma=<?php echo $shoe1["id"] ?>">SHOP NOW</a>
                                </div>
                                
                            </div>
                            <div class="bnr-right"> 
                                <a href="index.php?pages=single&ma=<?php echo $shoe1["id"] ?>">
                                    <div class="thumbnail">
                                        <img src="/images/product/<?php echo $shoe1["image"] ?>" alt="" />
                                    </div>
                                </a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>

                   
                    <div class="col-md-6 banner-bottom-right mt-4">
                        <div class="bnr-two">
                            <div class="bnr-left">
                                <h2><a href="index.php?pages=single&ma=<?php echo $shoe2["id"] ?>"><?php echo $shoe2["name"] ?></a></h2>
                                <p><?php echo PriceVND($shoe2["sale"]) ?></p>
                                <div class="b-btn"> 
                                    <a href="index.php?pages=single&ma=<?php echo $shoe2["id"] ?>">SHOP NOW</a>
                                </div>
                                
                            </div>
                            <div class="bnr-right"> 
                                <a href="index.php?pages=single&ma=<?php echo $shoe2["id"] ?>">
                                    <div class="thumbnail">
                                        <img src="/images/product/<?php echo $shoe2["image"] ?>" alt="" />
                                    </div>
                                </a>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                    
                </div>
			</div>
		</div>
	</div>
    <?php
}

function ThemShoe(){
    ob_start();
    ?>
    <?php 
    $DSGiay = GetGiay();
    ?>
            <div class="shoes"> 
		<div class="container"> 
			<div class="product-one">
                <div class="row">
                    <?php 
                    while($row = $DSGiay->fetch_array()){
                    ?>
                    <div class="col-md-3 product-left"> 
                        <div class="p-one simpleCart_shelfItem">							
                                <a href="index.php?pages=single&ma=<?php echo $row["id"] ?>">
                                    <img src="/images/product/<?php echo $row["image"] ?>" alt="" />
                                    <div class="mask">
                                        <span>Quick View</span>
                                    </div>
                                </a>
                            <h4><?php echo $row["name"] ?></h4>
                            <p><a class="item_add" href="#"><i></i> <span class=" item_price"><?php echo PriceVND($row["sale"])?></span></a></p>
                        
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
				<div class="clearfix"> </div>
			</div>
			
		</div>
	</div>

<?php 
}

function ThemeAbtShoe(){
    ob_start();
    ?>
    <?php 
    $DSPost = GetPostGiay();
    ?>
        <div class="abt-shoe">
		<div class="container"> 
			<div class="abt-shoe-main">
				<div class="row">
                    <?php 
                    while($row = $DSPost->fetch_array()){
                        ?>
                        <div class="col-md-3 abt-shoe-left">
                            <div class="abt-one">
                            <a href="index.php?pages=single&ma=<?php echo $row["id"] ?>"><img src="/images/post/<?php echo $row["image"] ?>" alt="" /></a>
                            <h4><a href="single.html"><?php echo $row["title"] ?></a></h4>
                            <p><?php echo $row["description"] ?></p>
                            </div>
                        </div>	
                    <?php
                    }
                    ?>
                </div>			
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
    <?php 
}
?>