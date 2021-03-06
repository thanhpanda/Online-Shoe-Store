<!doctype html>

<?php

include "ConnectDB.php";
include "Functions.php";

$_SESSION["UserInfo"] = isset($_SESSION["UserInfo"])
    ? $_SESSION["UserInfo"] : null;
if ($_SESSION["UserInfo"]) {
    // đã đăng nhap
    header("Location: ./admin.php");
}
$loi  = "";
// chưa đăng nhập
if (isset($_POST["DangNhap"])) {
    try {
        // kiểm tra đăng nhập
        $password = $_POST["password"];
        $username = $_POST["username"];
        $userInfor =  Login($username, $password);
        if ($userInfor == null) {
            // đăng nhập không thành công
            throw new Exception("Incorrect Account or Password");
        }
        // đăng nhập thành công
        $_SESSION["UserInfo"] = $userInfor;
        header("Location: ./admin.php");
    } catch (Exception $e) {
        $loi  = $e->getMessage();
    }
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administrator</title>

    <link rel="stylesheet" type="text/css" href="/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="/assets/css/animate.css">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300,700,700italic,900,100' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->


</head>

<body class="login-page" background="">

    <section class="content login-page">

        <div class="content-liquid">
            <div class="container">

                <div class="row">

                    <div class="login-page-container">

                        <div class="boxed animated flipInY">
                            <div class="inner">
                                <form class="form-admin" action="" method="POST">
                                    <div class="login-title text-center">
                                        <h4>Login to your account</h4>
                                        <h5>We're happy to see you return</h5>
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" name="username" class="form-control" placeholder="Username" />
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" name="password" class="form-control" placeholder="Password" />
                                    </div>

                                    <!-- <input type="submit" class="btn btn-lg btn-success" value="Login to your account" name="submit" id="submit" /> -->
                                    <button class="btn btn-lg btn-success btn-DangNhap" name="DangNhap" type="submit">Login to your account</button>

                                    <p class="footer">We respect your privacy.<br /><a class="footer" href="#">Forgot Password</a></p>
                                    <p class="footer"><?php echo $loi ?></p>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

    </section>

    <!-- Javascript -->
    <script src="/assets/jquery/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/flippy/jquery.flippy.min.html"></script>


    <script type="text/javascript">
        jQuery(document).ready(function($) {

            var min_height = jQuery(window).height();
            jQuery('div.login-page-container').css('min-height', min_height);
            jQuery('div.login-page-container').css('line-height', min_height + 'px');

            //$(".inner", ".boxed").fadeIn(500);
        });
    </script>
</body>

</html>