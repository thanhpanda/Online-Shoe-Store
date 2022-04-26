<?php

if (isset($_POST["AddPost"])) {

    $post["title"] = $_POST["title"];
    $post["content"] = $_POST["content"];
    $post["Title_KhongDau"] = BoDauTiengViet($post["title"]);
    if ($_FILES["image"]["error"] == 0) {
        // có file
        // upload file hinh
        $ran = rand(1,100000);
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
    $res =  PostPost($post);

    header("Location: /admin.php?pages=listpost");
    exit();
}







?>

<div class="row">

    <!-- Basic Example Start -->
    <div class="boxed no-padding col-md-12">
        <div class="inner">

            <!-- Title Bart Start -->
            <div class="title-bar">
                <h4>Add Post</h4>
            </div>
            <!-- Title Bart End -->

            <form action="" method="POST" enctype="multipart/form-data" class="basic-form">

                <label for="email">Title</label>
                <input required type="text" name="title" id="title" />

                <label for="email">Content</label>
                <textarea class="editor" name="content" id="textareaContent" class="form-control"></textarea>

                <label for="">Image</label>
                <input type="file" name="image">

                <label for="">Description</label>
                <textarea class="editor" name="description" id="textareaDescription" class="form-control"></textarea>

                <label for="email">Author</label>
                <input type="text" name="author" id="author" />

                <button type="submit" name="AddPost" class="col-md-3 btn btn-sm btn-success btn-Update">Add Post</button>

            </form>



        </div>
    </div>
    <!-- Basic Example End -->


</div>

<script>
        CKEDITOR.replace('textareaContent');
        CKEDITOR.replace('textareaDescription');

</script>