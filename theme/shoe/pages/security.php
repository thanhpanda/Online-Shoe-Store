<?php
$khachHang = $_SESSION["KhachHang"];
if (isset($_POST["OldPassword"])) {
    try {
        //code...

        // b1 kiểm tra mat khẩu cũ có dung không
        $email = $_SESSION["KhachHang"]["email"];
        $password = $_POST["OldPassword"];
        // kiểm tra trong database
        $user = GetUserByEmailPassword($email, $password);
        if ($user == null) {
            throw new Exception("Old Password Incorrect");
        }
        // mật khẩu đã chính xác
        if ($_POST["NewPassword"] != $_POST["RePassword"]) {
            throw new Exception("New Password Doesn't Match");
        }
        // mật  kẩu ok
        $user["password"] = sha1($user["randomKey"].$_POST["NewPassword"]);
        UpdateUser($user);
        throw new Exception("Change Password Successfully");
        // gửi  mail thông báo có người dang nhap tai khoản
        // GuiMailCapNhatMatKhau($email);
    } catch (Exception $th) {
        $loi = $th->getMessage();
    }
}
?>
<div class="container">
    <div class="col-md-3">
        <div class="list-group">
            <a href="/index.php?pages=profile" class="list-group-item">
                <p class="list-group-item-text">Account Information</p>
            </a>
            <a href="/index.php?pages=myorder" class="list-group-item  ">
                <p class="list-group-item-text">My Order</p>
            </a>
            <a href="/index.php?pages=security" class="list-group-item active">
                <p class="list-group-item-text">Security</p>
            </a>
            <a href="/index.php?pages=logout" class="list-group-item  ">
                <p class="list-group-item-text">Logout</p>
            </a>
        </div>
    </div>
    <div class="col-md-9">

        <form action="" method="POST" role="form">
            <legend>Security </legend>

            <div class="form-group">
                <label for="">Old Password</label>
                <input required type="password" name="OldPassword" class="form-control">
            </div>

            <div class="form-group">
                <label for="">New Password</label>
                <input required type="password" name="NewPassword" class="form-control">
            </div>
            <div class="form-group">
                <label for="">ReEnter New Password</label>
                <input required type="password" name="RePassword" class="form-control">
            </div>
            <span><?php if(isset($loi)) echo $loi ?></span>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>



    </div>
</div>