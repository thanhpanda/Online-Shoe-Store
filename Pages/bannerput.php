<?php
$IdBanner = "";
if(isset($_GET["id"])) $IdBanner = $_GET["id"];
if(isset($_POST["UpdateBanner"])) {
    // xoa hinh cu
    $post = GetBannerById($IdBanner);
    $filePath = "images/banner/" . $post["image"];
    if ($_FILES["image"]["error"] == 0){
        unlink($filePath);
    }

    $banner = GetBannerById($_POST["idbanner"]);
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
    $res =  PutBanner($banner);

}




$banner = GetBannerById($IdBanner);





?>

<div class="row">

    <!-- Basic Example Start -->
    <div class="boxed no-padding col-md-12">
        <div class="inner">

            <!-- Title Bart Start -->
            <div class="title-bar">
                <h4>Update Banner</h4>
            </div>
            <!-- Title Bart End -->

            <form action="" method="POST" enctype="multipart/form-data" class="basic-form">
                <label for="email">Title</label>
                <input name="idbanner" type="hidden" value="<?php echo $banner["id"] ?>">
                <input value="<?php echo $banner["title"] ?>" type="text" name="title" id="title" />
                <label for="password">Image</label>
                <img src="/images/product/<?php echo $banner['image'] ?>" style="height: 100px;" alt="">
                <input type="file" name="image">
                <label for="email">Display</label>
                <input value="<?php echo $banner["active"] ?>" type="text" name="display" id="display" />
                
                <button type="submit" name="UpdateBanner" class="col-md-3 btn btn-sm btn-success btn-Update">Update</button>

            </form>

            

        </div>
    </div>
    <!-- Basic Example End -->


</div>