<?php
$sql = "SELECT * FROM `tbl_oder`";
$res = $db->query($sql);
// từ khoán tìm kiếm
$keyword = "";
// trang hien tai nhỏ nhất 1
$pagesNumber =
    isset($_REQUEST["pagesNumber"]) ? $_REQUEST["pagesNumber"] : 1;
$pagesNumber = max(1, $pagesNumber);

// só dòng / trang
$rowNumber =
    isset($_REQUEST["rowNumber"]) ? $_REQUEST["rowNumber"] : 5;
// tổng số dòng
$total = 0;
$order = GetOrdersPT($keyword, $pagesNumber, $rowNumber, $total);
//var_dump($res);
//echo $total;
// tính tổng số trang 
$totalPages = ceil($total / $rowNumber);
$pagesNumber = min($pagesNumber, $totalPages);
$order = GetOrdersPT($keyword, $pagesNumber, $rowNumber, $total);
//$order = GetOrder();
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">List Order</h3>
    </div>
    <div class="panel-body">

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Address</th>
                    <th>Total Money</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Note</th>
                    <th>Delivery</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                if ($order)
                    while ($row = $order->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $index++; ?></td>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["diachi"] ?></td>
                        <td><?php echo $row["tongtien"] ?></td>
                        <td><?php echo $row["tenkhachhang"] ?></td>
                        <td><?php echo $row["email"] ?></td>
                        <td><?php echo $row["phone"] ?></td>
                        <td><?php echo $row["note"] ?></td>
                        <td><?php echo $row["giaohang"] ?></td>
                        <td><?php echo $row["thanhtoan"] ?></td>
                        <td><?php echo $row["tinhtrang"] ?></td>

                        <td class="col-md-2">
                            <a class="btn btn-primary" href="/admin.php?pages=orderdetail&id=<?php echo $row["id"] ?>">Detail</a>
                            <a onclick="return confirm('Do you want to browser this order?')" class="btn btn-success" href="/admin.php?pages=orderbrowser&id=<?php echo $row["id"] ?>">Browser</a>
                        </td>
                    </tr>
                <?php
                    }

                ?>


            </tbody>
        </table>

        <?php
        echo  PhanTrang(
            $totalPages,
            $pagesNumber,
            "?pages=listorder&pagesNumber=[i]"
        );

        ?>

        <!-- <ul class="pagination">
            <?php
            // vi tri bat dau
            $start = $pagesNumber - 2;
            $start = max($start, 1);
            $prev = $pagesNumber - 1;
            $prev = max($prev, 1);
            // vi trí kết thuc
            $end = $pagesNumber + 2;
            $next = $pagesNumber + 1;
            $end = min($end, $totalPages);
            $next = min($next, $totalPages);
            if ($pagesNumber > 1) {
            ?>
                <li >
                    <a href="?pages=listorder&pagesNumber=1">
                    First
                    </a>
                </li>
                <li >
                    <a href="?pages=listorder&pagesNumber=<?php echo $prev ?>">
                        Prev
                    </a>
                </li>
                <?php
            }
            for ($i = $start; $i <= $end; $i++) {
                ?>
                        <li class="<?php echo $pagesNumber == $i ? 'active' : '' ?>" >
                            <a href="?pages=listorder&pagesNumber=<?php echo $i ?>">
                                <?php echo $i ?>
                            </a>
                        </li>
                     <?php

                    }
                    // chưa đến trang cuối
                    if ($totalPages != $pagesNumber) {
                        ?>
            <li >   
                <a href="?pages=listorder&pagesNumber=<?php echo $next ?>">
                    next
                </a>
            </li>
            <li >
                <a href="?pages=listorder&pagesNumber=<?php echo $totalPages ?>">
                    Last
                </a>
            </li>
                <?php
                    }
                ?> 
            
        </ul>              -->

    </div>
</div>