<?php
$khachHang = $_SESSION["KhachHang"];
// ds don hang
$DSDonHang = GetOrderByUser($khachHang["email"]);

?>
<div class="container">
    <div class="col-md-3">
        <div class="list-group">
            <a href="/index.php?pages=profile" class="list-group-item">
                <p class="list-group-item-text">Account Information</p>
            </a>
            <a href="/index.php?pages=myorder" class="list-group-item active">
                <p class="list-group-item-text">My Order</p>
            </a>
            <a href="/index.php?pages=security" class="list-group-item">
                <p class="list-group-item-text">Security</p>
            </a>
            <a href="/index.php?pages=logout" class="list-group-item  ">
                <p class="list-group-item-text">Logout</p>
            </a>
        </div>
    </div>
    <div class="col-md-9">
        <h2>My Order</h2>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Id</th>
                    <th>Delivery</th>
                    <th>Receiver</th>
                    <th>Phone</th>
                    <th>Total Money</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $dem = 1;
                if ($DSDonHang) {
                    while ($row = $DSDonHang->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?php echo $dem++; ?></td>
                            <td><?php echo $row["id"] ?></td>
                            <td><?php echo $row["giaohang"] ?></td>
                            <td><?php echo $row["tenkhachhang"] ?></td>
                            <td><?php echo $row["phone"] ?></td>
                            <td><?php echo PriceVND($row["tongtien"]);  ?></td>
                            <td><button data-url="/ajax.php?pages=orderdetail&idorder=<?php echo sha1($row["id"]);  ?>" class="btn btnAjax btn-success" data-id="#OrderDetail<?php echo $dem; ?>">Xem</button></td>
                        </tr>
                        <tr>
                            <td colspan="7" id="OrderDetail<?php echo $dem; ?>">
                            </td>
                        </tr>
                <?php
                    }
                }

                ?>

            </tbody>
        </table>



    </div>
</div>