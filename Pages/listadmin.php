<?php

$sql = "SELECT * FROM `tbl_admin`";
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
$taiKhoans = GetAdminsPT($keyword, $pagesNumber, $rowNumber, $total);
//var_dump($res);
//echo $total;
// tính tổng số trang 
$totalPages = ceil($total / $rowNumber);
$pagesNumber = min($pagesNumber, $totalPages);
$taiKhoans = GetAdminsPT($keyword, $pagesNumber, $rowNumber, $total);
?>



<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Danh Sách Loại</h3>
    </div>
    <div class="panel-body">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>BOD</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 1;
                while ($row = $taiKhoans->fetch_array()) {
                ?>
                    <tr>
                        <th><?php echo $index++; ?></th>
                        <th><?php echo $row["Name"]; ?></th>
                        <th><?php echo $row["Username"]; ?></th>
                        <th><?php echo $row["Phone"]; ?></th>
                        <th><?php echo $row["Email"]; ?></th>
                        <th><?php echo $row["BOD"]; ?></th>
                        <th><?php echo $row["Address"]; ?></th>
                        <th><?php echo $row["Active"]; ?></th>
                        <th class="col-md-2">
                            <a class="btn btn-primary" href="?pages=adminput&id=<?php echo $row["Id"] ?>">Update</a>
                            <a onclick="return confirm('Do you want to delete this account?')" class="btn btn-danger" href="?pages=admindelete&id=<?php echo $row["Id"] ?>">Delete</a>
                        </th>
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
            "?pages=listadmin&pagesNumber=[i]"
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
                    <a href="?pages=listadmin&pagesNumber=1">
                    First
                    </a>
                </li>
                <li >
                    <a href="?pages=listadmin&pagesNumber=<?php echo $prev ?>">
                        Prev
                    </a>
                </li>
                <?php
            }
            for ($i = $start; $i <= $end; $i++) {
                ?>
                        <li class="<?php echo $pagesNumber == $i ? 'active' : '' ?>" >
                            <a href="?pages=listadmin&pagesNumber=<?php echo $i ?>">
                                <?php echo $i ?>
                            </a>
                        </li>
                     <?php

                    }
                    // chưa đến trang cuối
                    if ($totalPages != $pagesNumber) {
                        ?>
            <li >   
                <a href="?pages=listadmin&pagesNumber=<?php echo $next ?>">
                    next
                </a>
            </li>
            <li >
                <a href="?pages=listadmin&pagesNumber=<?php echo $totalPages ?>">
                    Last
                </a>
            </li>
                <?php
                    }
                ?> 
            
        </ul>              -->
    </div>
</div>