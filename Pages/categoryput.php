<?php
$IdCat = "";
if(isset($_GET["id"])) $IdCat = $_GET["id"];
if(isset($_POST["UpdateCat"])) {
    $cat = GetCategoryById($_POST["idcat"]);
    $cat["title"] = $_POST["title"];
    $cat["content"] = $_POST["content"];
    $res =  PutCat($cat);

}




$cat = GetCategoryById($IdCat);





?>

<div class="row">

    <!-- Basic Example Start -->
    <div class="boxed no-padding col-md-12">
        <div class="inner">

            <!-- Title Bart Start -->
            <div class="title-bar">
                <h4>Update Category</h4>
            </div>
            <!-- Title Bart End -->

            <form action="" method="POST" enctype="multipart/form-data" class="basic-form">

                <label for="email">Title</label>
                <input name="idcat" type="hidden" value="<?php echo $cat["id"] ?>">
                <input value="<?php echo $cat["title"] ?>" type="text" name="title" id="title"/>
                
                <label for="email">Content</label>
                <input value="<?php echo $cat["content"] ?>" type="text" name="content" id="content"/>
                
                <button type="submit" name="UpdateCat" class="col-md-3 btn btn-sm btn-success btn-Update">Update</button>

            </form>

            

        </div>
    </div>
    <!-- Basic Example End -->


</div>