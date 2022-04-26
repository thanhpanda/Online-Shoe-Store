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
$listCategory = GetCategorysPT($keyword, $pagesNumber, $rowNumber, $total);
//var_dump($res);
//echo $total;
// tính tổng số trang 
$totalPages = ceil($total / $rowNumber);
$pagesNumber = min($pagesNumber, $totalPages);
$listCategory = GetCategorysPT($keyword, $pagesNumber, $rowNumber, $total);
//$listCategory = GetCategory();
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">List Category</h3>
    </div>
    <div class="panel-body">

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                if ($listCategory)
                    while ($row = $listCategory->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $index++; ?></td>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["title"] ?></td>
                        <td><?php echo $row["content"] ?></td>
                        <td class="col-md-2">
                            <a class="btn btn-primary"  href="/admin.php?pages=categoryput&id=<?php echo $row["id"] ?>">Update</a>
                            <a onclick="return confirm('Do you want to delete this type?')"  class="btn btn-danger xoa" 
                            href="/admin.php?pages=categorydelete&id=<?php echo $row["id"] ?>">Delete</a>
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
            "?pages=listcategory&pagesNumber=[i]"
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
                    <a href="?pages=listcategory&pagesNumber=1">
                    First
                    </a>
                </li>
                <li >
                    <a href="?pages=listcategory&pagesNumber=<?php echo $prev ?>">
                        Prev
                    </a>
                </li>
                <?php
            }
            for ($i = $start; $i <= $end; $i++) {
                ?>
                        <li class="<?php echo $pagesNumber == $i ? 'active' : '' ?>" >
                            <a href="?pages=listcategory&pagesNumber=<?php echo $i ?>">
                                <?php echo $i ?>
                            </a>
                        </li>
                     <?php

                    }
                    // chưa đến trang cuối
                    if ($totalPages != $pagesNumber) {
                        ?>
            <li >   
                <a href="?pages=listcategory&pagesNumber=<?php echo $next ?>">
                    next
                </a>
            </li>
            <li >
                <a href="?pages=listcategory&pagesNumber=<?php echo $totalPages ?>">
                    Last
                </a>
            </li>
                <?php
                    }
                ?> 
            
        </ul>              -->

    </div>
</div>
