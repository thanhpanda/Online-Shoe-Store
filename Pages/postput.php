<?php

$IdPost = "";
if (isset($_GET["id"])) $IdPost = $_GET["id"];

if (isset($_POST["UpdatePost"])) {
    // xoa hinh cu
    $post = GetPostById($IdPost);
    $row = $post->fetch_array();
    $filePath = "images/post/" . $row["image"];
    if ($_FILES["image"]["error"] == 0){
        unlink($filePath);
    }

    // truy van vao database va gan du lieu moi vao 
    $pro = GetPostById($_POST["idpost"]);
    $post = $pro->fetch_array();
    $post["title"] = $_POST["title"];
    $post["content"] = $_POST["content"];
    $post["Title_KhongDau"] = BoDauTiengViet($post["title"]);
    if ($_FILES["image"]["error"] == 0) {
        // có file
        // upload file hinh
        $ran = rand(1, 100000);
        $fileName =  basename($_FILES["image"]["name"]);
        $fileName = explode(".", $fileName);
        $extention =  end($fileName);
        $hinh = "images/post/" . $post["Title_KhongDau"] . $ran . ".{$extention}";
        UploadFile($_FILES["image"], $hinh);
        $post["image"] =  $post["Title_KhongDau"] . $ran . ".{$extention}";
    }
    $post["author"] = $_POST["author"];
    $post["description"] = $_POST["description"];
    $post["uploaded_on"] = date("Y-m-d");
    $res =  PutPost($post);
}

$post = GetPostById($IdPost);
$row = $post->fetch_array();






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

                <label for="email">Title</label>
                <input name="idpost" type="hidden" value="<?php echo $row["id"] ?>">
                <input value="<?php echo $row["title"] ?>" type="text" name="title" id="title" />

                <label for="email">Content</label>
                <input value="<?php echo $row["content"] ?>" type="text" name="content" id="content" />
            
                <label for="">Image</label>
                <img src="images/post/<?php echo $row['image'] ?>" style="height: 100px;" alt="">
                <input type="file" name="image">

                <label for="email">Description</label>
                <input value="<?php echo $row["description"] ?>" type="text" name="description" id="description" />

                <label for="email">Author</label>
                <input value="<?php echo $row["author"] ?>" type="text" name="author" id="author" />

                <button type="submit" name="UpdatePost" class="col-md-3 btn btn-sm btn-success btn-Update">Update Post</button>

            </form>



        </div>
    </div>
    <!-- Basic Example End -->


</div>
