<?php
$keyword = $_GET["keyword"];
$ListProduct =  GetProductByName($keyword);
?>
<ul class="list-group">
    <?php while ($row = $ListProduct->fetch_assoc()) {
    ?>
        <li class="list-group-item">
        <img style="height: 70px;" src="<?php echo UrlImage($row["image"]); ?>" alt="">
            <a  href="<?php echo LinkProduct($row["id"]); ?>" role="button">
                <?php echo $row['name']; ?>
            </a>
            <span><?php echo PriceVND($row["sale"]);  ?></span>
        </li>

    <?php  } ?>
</ul>