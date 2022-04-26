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
    isset($_REQUEST["rowNumber"]) ? $_REQUEST["rowNumber"] : 2;
// tổng số dòng
$total = 0;
$banner = GetBannersPT($keyword, $pagesNumber, $rowNumber, $total);
//var_dump($res);
//echo $total;
// tính tổng số trang 
$totalPages = ceil($total / $rowNumber);
$pagesNumber = min($pagesNumber, $totalPages);
$banner = GetBannersPT($keyword, $pagesNumber, $rowNumber, $total);

//$banner = GetBanner();
?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">List Banner</h3>
    </div>
    <div class="panel-body">

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Display</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                if ($banner)
                    while ($row = $banner->fetch_array()) {
                ?>
                    <tr>
                        <td><?php echo $index++; ?></td>
                        <td><?php echo $row["id"] ?></td>
                        <td><?php echo $row["title"] ?></td>
                        <td><?php echo $row["image"] ?></td>
                        <td><?php echo $row["active"] ?></td>
                        <td class="col-md-2">
                            <a class="btn btn-primary"  href="/admin.php?pages=bannerput&id=<?php echo $row["id"] ?>">Update</a>
                            <a onclick="return confirm('Do you want to delete this type?')"  class="btn btn-danger xoa" 
                            href="/admin.php?pages=bannerdelete&id=<?php echo $row["id"] ?>">Delete</a>
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
            "?pages=listbanner&pagesNumber=[i]"
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
                    <a href="?pages=listbanner&pagesNumber=1">
                    First
                    </a>
                </li>
                <li >
                    <a href="?pages=listbanner&pagesNumber=<?php echo $prev ?>">
                        Prev
                    </a>
                </li>
                <?php
            }
            for ($i = $start; $i <= $end; $i++) {
                ?>
                        <li class="<?php echo $pagesNumber == $i ? 'active' : '' ?>" >
                            <a href="?pages=listbanner&pagesNumber=<?php echo $i ?>">
                                <?php echo $i ?>
                            </a>
                        </li>
                     <?php

                    }
                    // chưa đến trang cuối
                    if ($totalPages != $pagesNumber) {
                        ?>
            <li >   
                <a href="?pages=listbanner&pagesNumber=<?php echo $next ?>">
                    next
                </a>
            </li>
            <li >
                <a href="?pages=listbanner&pagesNumber=<?php echo $totalPages ?>">
                    Last
                </a>
            </li>
                <?php
                    }
                ?> 
            
        </ul>              -->

    </div>
</div>

