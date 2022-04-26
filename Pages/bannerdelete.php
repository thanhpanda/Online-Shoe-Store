<?php
$id = $_GET["id"];
$banner = GetBannerById($id);
$filePath = $banner["image"];
unlink($filePath);
$sql = "DELETE FROM `tbl_banner` 
    WHERE `id` = {$id}";
$res = $db->query($sql);
header("Location: ?pages=listbanner");
