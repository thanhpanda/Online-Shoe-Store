<?php
$hinhThucGiaoHang = GetOptionByGroups("HTGH");
$hinhThucThanhToan = GetOptionByGroups("HTTT");

?>
<form action="?pages=xulyorder" id="FormDatHang" method="POST">

    <div class="columns-container">
        <div class="container" id="columns">
            <!-- page heading-->
            <h2 class="page-heading">
                <span class="col-md-6 page-heading-title2">checkout</span>
            </h2>
            <!-- ../page heading-->
            <div class="page-content checkout-page">

                <h3 class="col-md-12 checkout-sep">customer information</h3>
                <div class="box-border">
                    <?php
                    if (isset($_SESSION["KhachHang"])) {
                        $khachHang = $_SESSION["KhachHang"];
                    ?>
                        <ul>
                            <ul class="row">
                                <div class="col-sm-4">
                                    <label class="required">Full Name</label>
                                    <input value="<?php echo $khachHang["name"] ?>" type="text" class="input form-control" name="FullName" id="FullName">
                                </div>
                                <!--/ [col] -->
                                <div class="col-sm-4">
                                    <label for="email_address" class="required">Email</label>
                                    <input value="<?php echo $khachHang["email"] ?>" type="text" class="input form-control" name="Email" id="Email">
                                </div>
                                <div class="col-sm-4">
                                    <label for="email_address" class="required">Phone Number</label>
                                    <input value="<?php echo $khachHang["phone"] ?>" type="text" class="input form-control" name="PhoneNumber" id="PhoneNumber">
                                </div>
                                <div class="col-sm-12">
                                    <label for="email_address" class="required">Address</label>
                                    <input value="<?php echo $khachHang["address"] ?>" name="Address" class="input form-control" id="Address"></input>
                                </div>
                                <div class="col-sm-12">
                                    <label for="" class="required">Note</label>
                                    <input type="text" class="input form-control" id="Note" name="Note">
                                </div>
                                <!--/ [col] -->
                            </ul>
                            <!--/ .row -->
                        </ul>
                    <?php
                    } else {
                    ?>
                        <ul>
                            <ul class="row">
                                <div class="col-sm-4">
                                    <label class="required">Full Name</label>
                                    <input type="text" class="input form-control" name="FullName" id="FullName">
                                </div>
                                <!--/ [col] -->
                                <div class="col-sm-4">
                                    <label for="email_address" class="required">Email</label>
                                    <input type="text" class="input form-control" name="Email" id="Email">
                                </div>
                                <div class="col-sm-4">
                                    <label for="email_address" class="required">Phone Number</label>
                                    <input type="text" class="input form-control" name="PhoneNumber" id="PhoneNumber">
                                </div>
                                <div class="col-sm-12">
                                    <label for="email_address" class="required">Address</label>
                                    <input name="Address" class="input form-control" id="Address"></input>
                                </div>
                                <div class="col-sm-12">
                                    <label for="" class="required">Note</label>
                                    <input type="text" class="input form-control" id="Note" name="Note">
                                </div>
                                <!--/ [col] -->
                            </ul>
                        <?php
                    }
                        ?>
                </div>
                <h3 class="col-md-12 checkout-sep">delivery form</h3>
                <ul class="shipping_method">
                    <?php
                    while ($row = $hinhThucGiaoHang->fetch_assoc()) {
                    ?>
                        <ul class="col-md-2">
                            <label>
                                <input type="radio" checked value="<?php echo $row["Code"] ?>" name="HTGH">
                                <?php echo $row["Name"] ?>
                            </label>
                        </ul>
                    <?php
                    }
                    ?>
                </ul>
                <h3 class="col-md-12 checkout-sep"> payment form</h3>
                <div class="box-border">
                    <ul>
                        <?php
                        while ($row = $hinhThucThanhToan->fetch_assoc()) {
                        ?>
                            <ul class="col-md-2">
                                <label>
                                    <input type="radio" checked value="<?php echo $row["Code"] ?>" name="HTTT">
                                    <?php echo $row["Name"] ?>
                                </label>
                            </ul>
                        <?php
                        }
                        ?>

                    </ul>
                </div>
                <h3 class="col-md-12 checkout-sep">list of products</h3>
                <div class="box-border ajaxHtml" id="mycart" data-id="#mycart" data-url="ajax.php?pages=mycartfull">
                </div>
                <button class="button pull-right">Order</button>
            </div>
        </div>
    </div>
</form>