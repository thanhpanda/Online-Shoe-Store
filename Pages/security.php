<?php


if (isset($_POST["LuuThongTinChung"])) {
    // var_dump($_POST["user"]);
    $userSubmit = $_POST["user"];
    //  var_dump($userSubmit["BOD"]);
    // kiểm tra dữ liệu giới tính
    $userSubmit["Sex"] = isset($userSubmit["Sex"])
        ? $userSubmit["Sex"] : "0";
    //  var_dump($userSubmit["BOD"]);
    $userSubmit["BOD"] =
        date("Y-m-d", strtotime($userSubmit["BOD"]));
    // var_dump($userSubmit["BOD"]);
    $res = UserUpdate($userInfo["Username"], $userSubmit);
    if ($res) {
        $userInfo["Name"] = $userSubmit["Name"];
        $userInfo["Sex"] = $userSubmit["Sex"];
        $userInfo["Phone"] = $userSubmit["Phone"];
        $userInfo["Address"] = $userSubmit["Address"];
        $userInfo["BOD"] = $userSubmit["BOD"];
        // cập nhật vào session
        $_SESSION["UserInfo"] = $userInfo;
    }
}
$loiPassword = "";
if (isset($_POST["Capnhatmatkhau"])) {
    try {
        $password = $_POST["userpassword"]["oldPassword"];
        $newPassword = $_POST["userpassword"]["newPassword"];
        $rePassword = $_POST["userpassword"]["rePassword"];
        $uf = Login($userInfo["Username"], $password);

        if ($uf == null) {
            // mật cũ không đúng
            throw new Exception("Mật khẩu cũ không đúng");
        }
        // mat khau cũ dúng
        if ($newPassword != $rePassword) {
            throw new Exception("Mật khẩu nhập lại không khớp");
        }

        // ok 
        $res = UserUpdatePassword($userInfo["Username"], $newPassword);
        if ($res) {
            throw new Exception("Cập nhật thành công");
        }
    } catch (Exception $ex) {
        $loiPassword = $ex->getMessage();
    }
}
?>

<div class="col-md-12">

    <div class="boxed profile dark">
        <div class="inner">

            <!-- Profile Title Start -->
            <div class="title">
                <h3>Security</h3>
            </div>
            <!-- Profile Title End -->

            <div class="row profile-data">
                <!-- Left Side Start -->
                <div class="col-md-4 text-center">

                    <!-- Profile Avatar Start -->
                    <div class="profile-avatar">
                        <img class="img-circle" src="images/avatar/<?php echo $profile["Avatar"] ?>" alt="Samantha Lenna Wilson" />
                    </div>
                    <!-- Profile Avatar End -->

                    <!-- Send Message Start -->

                    <!-- Send Message End -->

                </div>
                <!-- Left Side End -->

                <!-- Right Side Start -->
                <div class="col-md-8">

                    <form class="send-msg" action="" method="POST" role="form">
                        <div class="form-group col-md-3">
                            <label for="">Full Name</label>
                            <input value="<?php echo $userInfo["Name"]; ?>" name="user[Name]" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Email</label>
                            <input value="<?php echo $userInfo["Email"]; ?>" name="user[Email]" type="email" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Phone Number</label>
                            <input value="<?php echo $userInfo["Phone"]; ?>" name="user[Phone]" type="text" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Date Of Birth</label>
                            <input value="<?php echo $userInfo["BOD"]; ?>" name="user[BOD]" type="date" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Address</label>
                            <input value="<?php echo $userInfo["Address"]; ?>" name="user[Address]" type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="GioiTinh">Men</label>
                            <input value="1" <?php echo $userInfo["Sex"] == 1 ? 'checked' : ''; ?> name="user[Sex]" id="GioiTinh" type="checkbox" class="">
                        </div>
                        <div class="clearfix"></div>
                        <button name="LuuThongTinChung" type="submit" class="btn btn-sm btn-default">Save</button>
                    </form>

                    <form class="send-msg" action="" method="POST" role="form">
                        <p><?php echo $loiPassword; ?></p>
                        <div class="form-group col-md-12">
                            <label for="GioiTinh">Old Password</label>
                            <input required name="userpassword[oldPassword]" type="password" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="GioiTinh">New Password</label>
                            <input required name="userpassword[newPassword]" type="password" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="GioiTinh">Re Password</label>
                            <input required name="userpassword[rePassword]" type="password" class="form-control">
                        </div>
                        <div class="clearfix"></div>
                        <button name="Capnhatmatkhau" type="submit" class="btn btn-sm btn-default">Cập Nhât Mật Khẩu</button>
                    </form>

                </div>
                <!-- Right Side End -->
            </div>

            <!-- Profile Stats Start -->
            <div class="row">
                <ul class="profile-stats">
                    <li class="followers col-md-3 col-lg-3 col-sm-3 col-xs-3">
                        <p>1,315</p>
                        <h3>Followers</h3>
                    </li>
                    <li class="following col-md-3 col-lg-3 col-sm-3 col-xs-3">
                        <p>218</p>
                        <h3>Following</h3>
                    </li>
                    <li class="projects col-md-3 col-lg-3 col-sm-3 col-xs-3">
                        <p>28</p>
                        <h3>Projects</h3>
                    </li>
                    <li class="courses col-md-3 col-lg-3 col-sm-3 col-xs-3">
                        <p>39</p>
                        <h3>Courses</h3>
                    </li>
                </ul>
            </div>
            <!-- Profile Stats End -->

            <!-- Profile About Me Start -->
            <div class="row about-me">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h3>About Me</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget lobortis dui. Quisque congue tellus at sapien vestibulum aliquam. Phasellus in felis congue, lacinia justo id, feugiat urna. Nullam sit amet dolor nec arcu rhoncus condimentum. Pellentesque ut orci velit.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi eget lobortis dui. Quisque congue tellus at sapien vestibulum aliquam. Phasellus in felis congue, lacinia justo id, feugiat urna. Nullam sit amet dolor nec arcu rhoncus condimentum. Pellentesque ut orci velit.</p>
                </div>
            </div>
            <!-- Profile About Me End -->

            <!-- Profile Footer Start -->
            <div class="footer">
                <div class="col-lg-5 col-md-12 col-sm-6 col-xs-6">
                    <h4>Follow my work at</h4>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-6 col-xs-6">
                    <ul class="profile-socials">
                        <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- Profile Footer End -->

        </div>
    </div>

</div>