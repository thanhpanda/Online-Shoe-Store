<?php 
$id = $_GET["id"];
$sql = "UPDATE `tbl_oder` SET `tinhtrang`='approved' WHERE `id` = '{$id}'";
$res = $db->query($sql);
header("Location: ?pages=listorder");
?>