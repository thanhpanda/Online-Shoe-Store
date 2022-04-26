<?php
$order["diachi"] = $_POST["Address"];
$order["tongtien"] = $_SESSION["TongTien"];
$order["tenkhachhang"] = $_POST["FullName"];
$order["email"] = $_POST["Email"];
$order["phone"] = $_POST["PhoneNumber"];
$order["note"] = $_POST["Note"];
if ($_POST["HTGH"] == 1)
    $order["giaohang"] = "Express delivery";
else 
    $order["giaohang"] = "Ordinary Delivery";

if ($_POST["HTTT"] == 1)
    $order["thanhtoan"] = "Cash";
else if ($_POST["HTTT"] == 2)
    $order["thanhtoan"] = "Transfer";
else
    $order["thanhtoan"] = "COD";
$order["tinhtrang"] = "Pending";

//tao don hang
$idorder = CreateOrder($order);
foreach($_SESSION["GioHang"] as $maGiay=>$sanPham){
    $OrderDetail["maOrder"] = $idorder;
    $OrderDetail["idproduct"] = $sanPham["id"];
    $OrderDetail["soluong"] = $sanPham["SoLuong"];
    OrderDetail($OrderDetail);
}


?>
<img src="/public/successorder.jfif" alt="">
<?php $_SESSION["GioHang"] = null ?>