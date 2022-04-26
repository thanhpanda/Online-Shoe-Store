<?php

$DSCat = GetCategory();

if (isset($_POST["AddProduct"])) {

    $product["name"] = $_POST["name"];
    $product["code"] = $_POST["code"];
    $product["price"] = $_POST["price"];
    $product["amount"] = $_POST["amount"];
    $product["Title_KhongDau"] = BoDauTiengViet($product["name"]);
    if ($_FILES["image"]["error"] == 0) {
        // có file
        // upload file hinh
        $ran = rand(1,100000);
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
    $res =  PostProduct($product);

    header("Location: /admin.php?pages=listproduct");
    exit();
}







?>

<div class="row">

    <!-- Basic Example Start -->
    <div class="boxed no-padding col-md-12">
        <div class="inner">

            <!-- Title Bart Start -->
            <div class="title-bar">
                <h4>Add Product</h4>
            </div>
            <!-- Title Bart End -->

            <form action="" method="POST" enctype="multipart/form-data" class="basic-form">

                <label for="email">Name</label>
                <input required type="text" name="name" id="name" />

                <label for="email">Code</label>
                <input type="text" name="code" id="code" />

                <label for="email">Price</label>
                <input required type="text" name="price" id="price" />

                <label for="email">Amount</label>
                <input type="text" name="amount" id="amount" />

                <label for="">Image</label>
                <input type="file" name="image">

                <label for="email">Category</label>
                <select name="cat">
                    <?php
                    if ($DSCat) {
                        while ($row = $DSCat->fetch_array()) {
                    ?>
                            <option value="<?php echo $row["id"] ?>"><?php echo $row["title"] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>

                <label for="email">Detail</label>
                <input type="text" name="detail" id="detail" />

                <label for="email">Sale</label>
                <input type="text" name="sale" id="sale" />

                <label for="email">Description</label>
                <input type="text" name="description" id="description" />

                <button type="submit" name="AddProduct" class="col-md-3 btn btn-sm btn-success btn-Update">Add Product</button>

            </form>



        </div>
    </div>
    <!-- Basic Example End -->


</div>