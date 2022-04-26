<?php
$id = $_GET["id"];
$post = GetPostById($id);
$row = $post->fetch_array();
$filePath = "images/post/" . $row["image"];
unlink($filePath);
$sql = "DELETE FROM `tbl_post` 
    WHERE `id` = {$id}";
$res = $db->query($sql);
header("Location: ?pages=listpost");
