<?php
$username = $_GET["username"];
echo $sql = "DELETE FROM `tbl_user` 
    WHERE `username` = '{$username}'";
$res = $db->query($sql);
header("Location: ?pages=listuser");
