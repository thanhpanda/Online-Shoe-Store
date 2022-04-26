<?php

$IdProduct = "";
if (isset($_GET["id"])) $IdProduct = $_GET["id"];

if (isset($_POST["UpdateProduct"])) {
    // xoa hinh cu
    $product = GetProductById($IdProduct);
    $row = $product->fetch_array();
    $filePath = "images/product/" . $row["image"];
    if ($_FILES["image"]["error"] == 0){
        unlink($filePath);
    }

    // truy van vao database va gan du lieu moi vao 
    $pro = GetProductById($_POST["idpro"]);
    $product = $pro->fetch_array();
    $product["name"] = $_POST["name"];
    $product["code"] = $_POST["code"];
    $product["price"] = $_POST["price"];
    $product["amount"] = $_POST["amount"];
    $product["Title_KhongDau"] = BoDauTiengViet($product["name"]);
    if ($_FILES["image"]["error"] == 0) {
        // có file
        // upload file hinh
        $ran = rand(1, 100000);
        $fileName =  basename($_FILES["image"]["name"]);
        $fileName = explode(".", $fileName);
        $extention =  end($fileName);
        $hinh = "images/product/" . $product["Title_KhongDau"] . $ran . ".{$extention}";
        UploadFile($_FILES["image"], $hinh);
        $product["image"] =  $product["Title_KhongDau"] . $ran . ".{$extention}";
    }
    $product["category"] = $_POST["cat"];
    $product["detail"] = $_POST["detail"];
    $product["sale"] = $_POST["sale"];
    $product["description"] = $_POST["description"];
    $product["uploaded_on"] = date("Y-m-d");
    $res =  PutProduct($product);
}

$product = GetProductById($IdProduct);
$row = $product->fetch_array();
$DSCat = GetCategory();
$cat = GetCategoryById($row["category"]);






?>

<div class="row">

    <!-- Basic Example Start -->
    <div class="boxed no-padding col-md-12">
        <div class="inner">

            <!-- Title Bart Start -->
            <div class="title-bar">
                <h4>Update Product</h4>
            </div>
            <!-- Title Bart End -->
            
            <form action="" method="POST" enctype="multipart/form-data" class="basic-form">

                <label for="email">Name</label>
                <input name="idpro" type="hidden" value="<?php echo $row["id"] ?>">
                <input value="<?php echo $row["name"] ?>" type="text" name="name" id="name" />

                <label for="email">Code</label>
                <input value="<?php echo $row["code"] ?>" type="text" name="code" id="code" />

                <label for="email">Price</label>
                <input value="<?php echo $row["price"] ?>" type="text" name="price" id="price" />

                <label for="email">Amount</label>
                <input value="<?php echo $row["amount"] ?>" type="text" name="amount" id="amount" />

                <label for="">Image</label>
                <img src="images/product/<?php echo $row['image'] ?>" style="height: 100px;" alt="">
                <input type="file" name="image">

                <label for="email">Category</label>
                <input type="text" value="<?php echo $cat["title"] ?>">
                <select name="cat">
                    <?php
                    if ($DSCat) {
                        while ($row1 = $DSCat->fetch_array()) {
                    ?>
                            <option value="<?php echo $row1["id"] ?>"><?php echo $row1["title"] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>

                <label for="email">Detail</label>
                <input value="<?php echo $row["detail"] ?>" type="text" name="detail" id="detail" />

                <label for="email">Sale</label>
                <input value="<?php echo $row["sale"] ?>" type="text" name="sale" id="sale" />

                <label for="email">Description</label>
                <input value="<?php echo $row["description"] ?>" type="text" name="description" id="description" />

                <button type="submit" name="UpdateProduct" class="col-md-3 btn btn-sm btn-success btn-Update">Update Product</button>

            </form>



        </div>
    </div>
    <!-- Basic Example End -->


</div>