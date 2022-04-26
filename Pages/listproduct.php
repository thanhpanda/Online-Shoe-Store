<?php
$sql = "SELECT * FROM `tbl_product`";
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
$product = GetProductsPT($keyword, $pagesNumber, $rowNumber, $total);
//var_dump($res);
//echo $total;
// tính tổng số trang 
$totalPages = ceil($total / $rowNumber);
$pagesNumber = min($pagesNumber, $totalPages);
$product = GetProductsPT($keyword, $pagesNumber, $rowNumber, $total);
//$listShoe = GetGiay();
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">List Product</h3>
    </div>
    <div class="panel-body">

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Detail</th>
                    <th>Sale</th>
                    <th>Description</th>
                    <th>Upload On</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                if ($product)
                    while ($row = $product->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $index++; ?></td>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["name"] ?></td>
                        <td><?php echo $row["code"] ?></td>
                        <td><?php echo $row["price"] ?></td>
                        <td><?php echo $row["amount"] ?></td>
                        <td><?php echo $row["image"] ?></td>
                        <td><?php echo $row["category"] ?></td>
                        <td><?php echo $row["detail"] ?></td>
                        <td><?php echo $row["sale"] ?></td>
                        <td><?php echo $row["description"] ?></td>
                        <td><?php echo $row["uploaded_on"] ?></td>
                        <td class="col-md-2">
                            <a class="btn btn-primary" href="/admin.php?pages=productput&id=<?php echo $row["id"] ?>">Update</a>
                            <a onclick="return confirm('Do you want to delete this type?')" class="btn btn-danger xoa" href="/admin.php?pages=productdelete&id=<?php echo $row["id"] ?>">Delete</a>
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
            "?pages=listproduct&pagesNumber=[i]"
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
                    <a href="?pages=listproduct&pagesNumber=1">
                    First
                    </a>
                </li>
                <li >
                    <a href="?pages=listproduct&pagesNumber=<?php echo $prev ?>">
                        Prev
                    </a>
                </li>
                <?php
            }
            for ($i = $start; $i <= $end; $i++) {
                ?>
                        <li class="<?php echo $pagesNumber == $i ? 'active' : '' ?>" >
                            <a href="?pages=listproduct&pagesNumber=<?php echo $i ?>">
                                <?php echo $i ?>
                            </a>
                        </li>
                     <?php

                    }
                    // chưa đến trang cuối
                    if ($totalPages != $pagesNumber) {
                        ?>
            <li >   
                <a href="?pages=listproduct&pagesNumber=<?php echo $next ?>">
                    next
                </a>
            </li>
            <li >
                <a href="?pages=listproduct&pagesNumber=<?php echo $totalPages ?>">
                    Last
                </a>
            </li>
                <?php
                    }
                ?> 
            
        </ul>              -->

    </div>
</div>