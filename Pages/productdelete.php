<?php
$id = $_GET["id"];
$product = GetProductById($id);
$row = $product->fetch_array();
$filePath = "images/product/" . $row["image"];
unlink($filePath);
$sql = "DELETE FROM `tbl_product` 
    WHERE `id` = {$id}";
$res = $db->query($sql);
header("Location: ?pages=listproduct");
