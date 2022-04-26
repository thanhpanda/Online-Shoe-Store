<?php
// co ma hóa 
$IdOrder = $_REQUEST["idorder"];
$ListOrderDetail = GetOrderDetail($IdOrder, true);


?>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Amount</th>
            <th>Into money</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $dem = 1;
        while ($row = $ListOrderDetail->fetch_assoc()) {
            $Product = GetGiayById($row["idproduct"]);
        ?>
            <tr>
                <th><?php echo $dem++; ?></th>
                <th><?php echo $Product["name"]; ?></th>
                <th><?php echo PriceVND($Product["sale"]); ?></th>
                <th><?php echo $row["soluong"] ; ?></th>
                <th><?php echo PriceVND($row["soluong"] * $Product["sale"]); ?></th>
            </tr>
        <?php
        }

        ?>

    </tbody>
</table>