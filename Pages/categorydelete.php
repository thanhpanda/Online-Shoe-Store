<?php
$id = $_GET["id"];
$sql1 = "SELECT * FROM `tbl_product`
 WHERE `category` = {$id}";
$res1 = $db->query($sql1); 
if($res1->num_rows == 0){
    $sql = "DELETE FROM `tbl_category` 
    WHERE `id` = {$id}";
    $res = $db->query($sql);     
}


header("Location: ?pages=listcategory");

?>
