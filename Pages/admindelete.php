<?php
$id = $_GET["id"];
$sql = "DELETE FROM `tbl_admin` 
    WHERE `Id` = {$id}";
$res = $db->query($sql);
header("Location: ?pages=listadmin");
