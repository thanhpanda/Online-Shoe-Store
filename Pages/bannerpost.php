<?php

if(isset($_POST["AddBanner"])) {

    $banner["title"] = $_POST["title"];
    $banner["Title_KhongDau"] = BoDauTiengViet($banner["title"]);
    if ($_FILES["image"]["error"] == 0) {
        // có file
        // upload file hinh
        $fileName =  basename($_FILES["image"]["name"]);
        $fileName = explode(".", $fileName);
        $extention =  end($fileName);
        $hinh = "images/banner/" . date("Y-m-d") . $banner["Title_KhongDau"] . ".{$extention}";
        UploadFile($_FILES["image"], $hinh);
        $banner["image"] = "/images/banner/" . date("Y-m-d") . $banner["Title_KhongDau"] . ".{$extention}";
    }
    $banner["active"] = $_POST["display"];
    $res =  PostBanner($banner);

    header("Location: /admin.php?pages=listbanner");
    exit();

}







?>

<div class="row">

    <!-- Basic Example Start -->
    <div class="boxed no-padding col-md-12">
        <div class="inner">

            <!-- Title Bart Start -->
            <div class="title-bar">
                <h4>Add Banner</h4>
            </div>
            <!-- Title Bart End -->

            <form action="" method="POST" enctype="multipart/form-data" class="basic-form">
                
                <label for="email">Title</label>
                <input type="text" name="title" id="title" />
                
                <label for="">Image</label>
                <input type="file" name="image">
                
                <label for="email">Display</label>
                <input value="1" type="text" name="display" id="display" />
                
                <button type="submit" name="AddBanner" class="col-md-3 btn btn-sm btn-success btn-Update">Add Banner</button>

            </form>

            

        </div>
    </div>
    <!-- Basic Example End -->


</div>