<!--start-ckeckout-->
<div class="ckeckout">
    <div class="container">
        <div class="ckeckout-top">
            <div class=" cart-items heading">
                <h3>Item In Cart:
                    <?php
                    if (isset($_SESSION["GioHang"]))
                        echo count($_SESSION["GioHang"]);
                    ?>
                </h3>

                <div class="col-md-12 in-check">
                    <table class="unit table table-bordered ">
                        <thead>
                            <tr>
                                <th class="col-md-2">Item</th>
                                <th class="col-md-2">Product Name</th>
                                <th class="col-md-1">Unit Price</th>
                                <th class="col-md-2">Stock Status</th>
                                <th class="col-md-1">Amount</th>
                                <th class="col-md-2">Into Money</th>
                                <th class="col-md-2 action">
                                    <a href="/index.php?pages=xulymycart&XoaHet=1"><i>Delete All</i></a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $gioHang = $_SESSION["GioHang"];
                            $tongTien = 0;
                            if ($gioHang)
                                foreach ($gioHang as $idSanPham => $SanPham) {
                                    $thanhTien = $SanPham["SoLuong"] * $SanPham["sale"];
                                    $tongTien += $thanhTien;
                            ?>
                                <tr>
                                    <td class="col-md-2"><img src="/images/product/<?php echo $SanPham["image"] ?>" class="img-responsive" alt=""></td>
                                    <td class="col-md-2"><?php echo $SanPham["name"] ?></td>
                                    <td class="col-md-1"><?php echo PriceVND($SanPham["sale"]) ?></td>
                                    <td class="col-md-2">In Stock</td>
                                    <td class="col-md-1"><span>
                                            <input onchange="window.location.href
                                    ='/index.php?pages=xulymycart&CapNhatSanPhamGH=<?php
                                                                                echo $SanPham["id"];
                                                                                ?>&SL='+this.value" class='form-control input-sm' type="text" value="<?php echo $SanPham["SoLuong"] ?>">
                                            <a href="/index.php?pages=xulymycart&TangGH=<?php echo $SanPham["id"] ?>"><i class="fa fa-caret-up"></i></a>
                                            <a href="/index.php?pages=xulymycart&GiamGH=<?php echo $SanPham["id"] ?>"><i class="fa fa-caret-down"></i></a>
                                        </span></td>
                                    <td class="col-md-2"><?php echo PriceVND($SanPham["sale"] * $SanPham["SoLuong"]); ?></td>
                                    <td class="action">
                                        <a href="index.php?pages=xulymycart&XoaGH=<?php echo $SanPham["id"]; ?>">Delete item</a>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2" rowspan="2"></td>
                                <td colspan="3">Total Money</td>
                                <td colspan="2"><?php echo PriceVND($tongTien); ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"><strong>Payment (VAT included)</strong></td>
                                <td colspan="2"><?php echo PriceVND($tongTien * 1.1); ?></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="col-md-12 cart_navigation">
                        <a class="col-md-6 prev-btn" href="/">Continue Shopping</a>
                        <a class="col-md -6 next-btn" href="index.php?pages=order">Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-ckeckout-->