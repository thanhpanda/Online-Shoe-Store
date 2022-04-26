<?php
$IdAdmin = "";
if (isset($_GET["id"])) $IdAdmin = $_GET["id"];
if (isset($_POST["LuuThongTinChung"])) {
    // var_dump($_POST["user"]);
    $userInfo = GetAdminById($_POST["idadmin"]);
    $userSubmit = $_POST["user"];
    //  var_dump($userSubmit["BOD"]);
    // kiểm tra dữ liệu giới tính
    $userSubmit["Sex"] = isset($userSubmit["Sex"])
        ? $userSubmit["Sex"] : "0";
    //  var_dump($userSubmit["BOD"]);
    $userSubmit["BOD"] =
        date("Y-m-d", strtotime($userSubmit["BOD"]));
    // var_dump($userSubmit["BOD"]);
    $res = AdminUpdate($userInfo["Username"], $userSubmit);
    
}




$admin = GetAdminById($IdAdmin);





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
                <div class="form-group col-md-3">
                    <label for="">Full Name</label>
                    <input name="idadmin" type="hidden" value="<?php echo $admin["Id"] ?>">
                    <input value="<?php echo $admin["Name"]; ?>" name="user[Name]" type="text" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Email</label>
                    <input value="<?php echo $admin["Email"]; ?>" name="user[Email]" type="email" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Phone Number</label>
                    <input value="<?php echo $admin["Phone"]; ?>" name="user[Phone]" type="text" class="form-control">
                </div>

                <div class="form-group col-md-3">
                    <label for="">Date Of Birth</label>
                    <input value="<?php echo $admin["BOD"]; ?>" name="user[BOD]" type="date" class="form-control">
                </div>
                <div class="form-group col-md-12">
                    <label for="">Address</label>
                    <input value="<?php echo $admin["Address"]; ?>" name="user[Address]" type="text" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="GioiTinh">Men</label>
                    <input value="1" <?php echo $admin["Sex"] == 1 ? 'checked' : ''; ?> name="user[Sex]" id="GioiTinh" type="checkbox" class="">
                </div>
                <div class="clearfix"></div>
                <button name="LuuThongTinChung" type="submit" class="btn btn-sm btn-default">Save</button>
            </form>



        </div>
    </div>
    <!-- Basic Example End -->


</div>