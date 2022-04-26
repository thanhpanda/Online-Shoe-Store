<?php
try {
    if ($_POST["Password"] != $_POST["RePassword"]) {
        throw new Exception("Mật Khẩu Không Khớp");
    }

    $user["randomkey"] = sha1(time() . rand(1, time()) . rand(1, time()));
    $user["name"] = $_POST["FirstName"].$_POST["LastName"];
    $user["password"] = sha1($user["randomkey"].$_POST["Password"]);
    $user["address"] = $_POST["Address"];
    $user["phone"] = $_POST["Phone"];
    $user["email"] = $_POST["Email"];
    $user["username"] = $_POST["Username"];
   
    

    $kt = FindUserByEmail($user["email"]);
    if ($kt->num_rows > 0) {
        throw new Exception("Email Đã Được Sử Dụng");
    }
    $isInsert = ThemUser($user);
    if($isInsert == false){
        throw new Exception("Đăng Ký Không Thành Công");
    }
    
    $kt = FindUserByEmail($user["email"]);
    $_SESSION["User"] = $kt->fetch_assoc();
    header("Location: index.php?pages=login");
} catch (Exception $ex) {
    // có lỗi khi đăng ký
    echo $ex->getMessage();
    $_SESSION["Error"] = $ex->getMessage();
    header("Location: index.php?pages=register");
}
