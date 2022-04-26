<?php
$Username = "";
if (isset($_GET["username"])) $Username = $_GET["username"];
if (isset($_POST["LuuThongTinChung"])) {
    // var_dump($_POST["user"]);
    $userInfo = GetUserByUsername($_POST["username"]);
    $userSubmit = $_POST["user"];
    //  var_dump($userSubmit["BOD"]);
    // kiểm tra dữ liệu giới tính
    // var_dump($userSubmit["BOD"]);
    $res = UserUpdate($userInfo["username"], $userSubmit);
}




$user = GetUserByUsername($Username);





?>

<div class="row">

    <!-- Basic Example Start -->
    <div class="boxed no-padding col-md-12">
        <div class="inner">

            <!-- Title Bart Start -->
            <div class="title-bar">
                <h4>Update Admin</h4>
            </div>
            <!-- Title Bart End -->

            <form class="send-msg" action="" method="POST" role="form">
                <div class="form-group col-md-4">
                    <label for="">Full Name</label>
                    <input name="username" type="hidden" value="<?php echo $user["username"] ?>">
                    <input value="<?php echo $user["name"]; ?>" name="user[Name]" type="text" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Email</label>
                    <input value="<?php echo $user["email"]; ?>" name="user[Email]" type="email" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="">Phone Number</label>
                    <input value="<?php echo $user["phone"]; ?>" name="user[Phone]" type="text" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label for="">Address</label>
                    <input value="<?php echo $user["address"]; ?>" name="user[Address]" type="text" class="form-control">
                </div>
                <div class="clearfix"></div>
                <button name="LuuThongTinChung" type="submit" class="btn btn-sm btn-default">Save</button>
            </form>



        </div>
    </div>
    <!-- Basic Example End -->


</div>