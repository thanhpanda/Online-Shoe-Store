<?php

if(isset($_POST["AddCat"])) {

    $cat["title"] = $_POST["title"];
    // $cat["Title_KhongDau"] = BoDauTiengViet($cat["title"]);
    // if ($_FILES["image"]["error"] == 0) {
    //     // có file
    //     // upload file hinh
    //     $fileName =  basename($_FILES["image"]["name"]);
    //     $fileName = explode(".", $fileName);
    //     $extention =  end($fileName);
    //     $hinh = "images/banner/" . date("Y-m-d") . $cat["Title_KhongDau"] . ".{$extention}";
    //     UploadFile($_FILES["image"], $hinh);
    //     $cat["image"] = "/images/banner/" . date("Y-m-d") . $cat["Title_KhongDau"] . ".{$extention}";
    // }
    $cat["content"] = $_POST["content"];
    $res =  PostCat($cat);

    header("Location: /admin.php?pages=listcategory");
    exit();

}







?>

<div class="row">

    <!-- Basic Example Start -->
    <div class="boxed no-padding col-md-12">
        <div class="inner">

            <!-- Title Bart Start -->
            <div class="title-bar">
                <h4>Add Category</h4>
            </div>
            <!-- Title Bart End -->

            <form action="" method="POST" enctype="multipart/form-data" class="basic-form">
                
                <label for="email">Title</label>
                <input type="text" name="title" id="title" />
                
                <label for="email">Content</label>
                <input type="text" name="content" id="content" />
                
                <button type="submit" name="AddCat" class="col-md-3 btn btn-sm btn-success btn-Update">Add Category</button>

            </form>

            

        </div>
    </div>
    <!-- Basic Example End -->


</div>