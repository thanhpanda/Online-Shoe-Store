<?php
$khachHang = $_SESSION["KhachHang"];
if (isset($_POST["user"])) {
    $postUser =  $_POST["user"];
    $email = $khachHang["email"];
    // từ db
    $user =  FindUserByEmail($email)->fetch_array();
    $user["name"] = $postUser["name"];
    $user["phone"] = $postUser["phone"];
    $user["address"] = $postUser["address"];
    UpdateUser($user);
    $khachHang["name"] = $postUser["name"];
    $khachHang["phone"] = $postUser["phone"];
    $khachHang["address"] = $postUser["address"];
    $_SESSION["KhachHang"] = $khachHang;
}
?>
<div class="container">
    <div class="col-md-3">
        <div class="list-group">
            <a href="/index.php?pages=profile" class="list-group-item active">
                <p class="list-group-item-text">Account Information</p>
            </a>
            <a href="/index.php?pages=myorder" class="list-group-item  ">
                <p class="list-group-item-text">My Order</p>
            </a>
            <a href="/index.php?pages=security" class="list-group-item">
                <p class="list-group-item-text">Security</p>
            </a>
            <a href="/index.php?pages=logout" class="list-group-item  ">
                <p class="list-group-item-text">Logout</p>
            </a>
        </div>
    </div>
    <div class="col-md-9">

        <form action="" method="POST" role="form">
            <legend>General information</legend>

            <div class="form-group">
                <label for="">Name</label>
                <input value="<?php echo $khachHang["name"] ?>" type="text" name="user[name]" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Phone Number</label>
                <input value="<?php echo $khachHang["phone"] ?>" type="text" name="user[phone]" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Email</label>
                <input value="<?php echo $khachHang["email"] ?>" type="text" name="user[email]" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input value="<?php echo $khachHang["address"] ?>" type="text" name="user[address]" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>



    </div>
</div>