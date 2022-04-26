<?php
function Db(){
    return $GLOBALS['db'];
}

function GetBanner(){
    $sql = "SELECT * FROM `tbl_banner`";
    return Db()->query($sql);
}

function GetBannerById($idbanner){
    $sql = "SELECT * FROM `tbl_banner` WHERE `id` = '{$idbanner}'";
    $res =  Db()->query($sql);
    if ($res)
        return $res->fetch_array();
    return null;
}

function GetGiayById($id){
    $sql = "SELECT * FROM `tbl_product` 
    WHERE `id` = '{$id}'";
    $res = Db()->query($sql);
    if ($res)
        return $res->fetch_array();
    return null;
}

function GetGiay(){
    $sql = "SELECT * FROM `tbl_product`";
    return Db()->query($sql);
}

function GetPostGiay(){
    $sql = "SELECT * FROM `tbl_post`";
    return Db()->query($sql);
}

function GetCategory(){
    $sql = "SELECT * FROM `tbl_category`";
    return Db()->query($sql);
}

function GetCategoryById($id){
    $sql = "SELECT * FROM `tbl_category` WHERE `id` = '{$id}'";
    $res =  Db()->query($sql);
    if ($res)
        return $res->fetch_array();
    return null;
}

function GetGiayByCategoryId($id){
    $sql = "SELECT * FROM `tbl_product` WHERE `category` = '{$id}'";
    return Db()->query($sql);
}

function GetProductById($id){
    $sql = "SELECT * FROM `tbl_product` WHERE `id` = '{$id}'";
    return Db()->query($sql);
}

function GetPostById($id){
    $sql = "SELECT * FROM `tbl_post` WHERE `id` = '{$id}'";
    return Db()->query($sql);
}

function FindUserByEmail($email)
{
    $sql = "SELECT * FROM `tbl_user` WHERE `email`='{$email}'";
    $res =  Db()->query($sql);
    return $res;
}

function GetUserByUsername($username){
    $sql = "SELECT * FROM `tbl_user` WHERE `username` = '{$username}'";
    $res = Db()->query($sql);
    if ($res)
        return $res->fetch_array();
    return null;
}

function ThemUser($user)
{
    $sql = "INSERT INTO `tbl_user`(`username`, `name`, `email`, `phone`, `address`, `password`, `randomKey`) 
    VALUES (
        '{$user["username"]}', 
        '{$user["name"]}', 
        '{$user["email"]}', 
        '{$user["phone"]}', 
        '{$user["address"]}', 
        '{$user["password"]}', 
        '{$user["randomkey"]}')";
    $res =  Db()->query($sql);
    return $res;
}

function GetUserByEmailPassword($email, $password)
{
    $sql  = "SELECT * FROM `tbl_user` WHERE `email`='{$email}' 
    and `password` = sha1(concat(`randomkey`,'{$password}'))";   
    $res = Db()->query($sql);
    $total = $res->num_rows;
    if ($total > 0)
        return $res->fetch_array();
    return null;
}

function GetOptionByGroups($Groups)
{
    $sql = "SELECT * FROM `tbl_options` 
    WHERE `groups` ='{$Groups}'";
    $res =  Db()->query($sql);
    return $res;
}

function CreateOrder($order){
    $sql = "INSERT INTO `tbl_oder`(`id`, `diachi`, `tongtien`, `tenkhachhang`, `email`, `phone`, `note`, `giaohang`, `thanhtoan`, `tinhtrang`) 
    VALUES (
        null, 
        '{$order["diachi"]}', 
        '{$order["tongtien"]}', 
        '{$order["tenkhachhang"]}', 
        '{$order["email"]}', 
        '{$order["phone"]}', 
        '{$order["note"]}', 
        '{$order["giaohang"]}', 
        '{$order["thanhtoan"]}', 
        '{$order["tinhtrang"]}'
        )";
    $res = Db()->query($sql);
    return DB()->insert_id;
}

function OrderDetail($OrderDetail){
    $sql = "INSERT INTO `tbl_oder_detail`(`maOrder`, `idproduct`, `soluong`) 
    VALUES (
        '{$OrderDetail["maOrder"]}', 
        '{$OrderDetail["idproduct"]}', 
        '{$OrderDetail["soluong"]}'
        )";
    $res = Db()->query($sql);
    return $res;
}

function GetProductByName($keyword){
    $sql = "SELECT * FROM `tbl_product` 
            WHERE `name` LIKE '%{$keyword}%'
            OR `detail` LIKE '%{$keyword}%' ORDER BY `id` DESC";
    $res = Db()->query($sql);
    return $res;
}

function LinkProduct($IdProduct){
    return "/index.php?pages=single&ma={$IdProduct}";
}

function LinkAddToCart($IdProduct){
    return "/index.php?pages=xulymycart&ThemGH={$IdProduct}";
}

function UrlImage($fileName)
{
    return "/images/product/{$fileName}";
}

function PriceVND($number)
{
    return number_format($number, 0, ",", ".") . "<sup>đ</sup>";
}

function UpdateUser($user){
    $sql = "UPDATE `tbl_user` SET 
    `name`='{$user["name"]}',
    `email`='{$user["email"]}',
    `phone`='{$user["phone"]}',
    `address`='{$user["address"]}',
    `password`='{$user["password"]}',
    `randomKey`='{$user["randomKey"]}' 
    WHERE `username` = '{$user["username"]}'";
    return Db()->query($sql);
}

function UserUpdatePassword($username, $password)
{
    $sql = "UPDATE `tbl_admin` 
     SET  `Password`= SHA1(concat(`Randomkey`,'{$password}')) 
     WHERE `Username` = '{$username}'";
    return Db()->query($sql);
}

function AdminUpdate($username, $info)
{
    $sql = "UPDATE `tbl_admin` SET 
    `Name`='{$info["Name"]}',
    `Email`='{$info["Email"]}',
    `Phone`='{$info["Phone"]}',
    `BOD`='{$info["BOD"]}',
    `Sex`='{$info["Sex"]}',
    `Address`='{$info["Address"]}'
     WHERE `Username` = '{$username}'";
    return Db()->query($sql);
}

function UserUpdate($username, $info){
    echo $sql = "UPDATE `tbl_user` SET 
    `name`='{$info["Name"]}',
    `email`='{$info["Email"]}',
    `phone`='{$info["Phone"]}',
    `address`='{$info["Address"]}'
    WHERE `username` = '{$username}'";
    return Db()->query($sql);
}

function PhanTrang($totalPages, $curentPage, $link)
{
    $next = $curentPage + 1;
    $next = min($totalPages, $next);

    $prev = $curentPage - 1;
    $prev = max(1, $prev);

    $start = $curentPage - 3;
    $start = max(1, $start);
    $end = $curentPage + 3;
    $end = min($totalPages, $end);
    // linh next
    $linkNext = str_replace("[i]", $next, $link);
    // linh prev
    $linkPrev = str_replace("[i]", $prev, $link);
    // linh Last
    $linkLast = str_replace("[i]", $totalPages, $link);
    // linh First
    $linkFirst = str_replace("[i]", 1, $link);
    //?pages=danhsachtaikhoan&pagesNumber=[i]

    $isFirst = $curentPage == 1 ? "hidden" : "";
    $isLast = $curentPage == $totalPages ? "hidden" : "";

    $String = <<<PHANTRANG

<ul class="pagination">
    <li class="{$isFirst}" >
        <a href="$linkFirst">
        First
        </a>
    </li>
    <li class="{$isFirst}" >
        <a href="$linkPrev">
            Prev
        </a>
    </li>
     __for__   
    <li class="{$isLast}" >   
        <a href="$linkNext">
            next
        </a>
    </li>
    <li class="{$isLast}" >
        <a href="$linkLast">
            Last
        </a>
    </li>

</ul>

PHANTRANG;

    $forString = "";

    for ($i = $start; $i <= $end; $i++) {
        // tao linnk cho trang
        $linkPages = str_replace("[i]", $i, $link);
        // xac dinh có active
        $active = $curentPage == $i ? "active" : "";
        // thêm trang đó vào forString
        $strPages = "<li class='{$active}' ><a href='{$linkPages}'>{$i}</a></li>";
        $forString .= $strPages;
    }
    // đổi __for__ thành danh sach lap
    $String = str_replace("__for__", $forString, $String);
    return $String;
}

function GetAdminsPT($keyword, $pagesNumber, $rowNumber, &$total)
{
    // tính vị trí bắt đầu
    $pagesNumber = ($pagesNumber - 1) * $rowNumber;
    // cau lenh truy vấn
    $sql = "SELECT * FROM `tbl_admin` 
    WHERE `Name` LIKE '%{$keyword}%' 
    OR `Username` LIKE '%{$keyword}%' 
    OR `Email` LIKE '%{$keyword}%' 
    OR `Phone` LIKE '%{$keyword}%'";
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    // giới hạn số lượng dòng trả về
    $sql = $sql . " limit {$pagesNumber},{$rowNumber}";
    // trả về các dòng hiển thị
    return Db()->query($sql);
}

function GetUsersPT($keyword, $pagesNumber, $rowNumber, &$total){
// tính vị trí bắt đầu
    $pagesNumber = ($pagesNumber - 1) * $rowNumber;
    // cau lenh truy vấn
    $sql = "SELECT * FROM `tbl_user` 
    WHERE `name` LIKE '%{$keyword}%' 
    OR `username` LIKE '%{$keyword}%' 
    OR `email` LIKE '%{$keyword}%' 
    OR `phone` LIKE '%{$keyword}%'";
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    // giới hạn số lượng dòng trả về
    $sql = $sql . " limit {$pagesNumber},{$rowNumber}";
    // trả về các dòng hiển thị
    return Db()->query($sql);
}

function GetProductsPT($keyword, $pagesNumber, $rowNumber, &$total){
    $pagesNumber = ($pagesNumber - 1) * $rowNumber;
    // cau lenh truy vấn
    $sql = "SELECT * FROM `tbl_product` 
    WHERE `name` LIKE '%{$keyword}%' 
    OR `code` LIKE '%{$keyword}%'";
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    // giới hạn số lượng dòng trả về
    $sql = $sql . " limit {$pagesNumber},{$rowNumber}";
    // trả về các dòng hiển thị
    return Db()->query($sql);
}

function GetOrdersPT($keyword, $pagesNumber, $rowNumber, &$total){
    $pagesNumber = ($pagesNumber - 1) * $rowNumber;
    // cau lenh truy vấn
    $sql = "SELECT * FROM `tbl_oder` 
    WHERE `tenkhachhang` LIKE '%{$keyword}%' 
    OR `email` LIKE '%{$keyword}%'
    OR `phone` LIKE '%{$keyword}%'";
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    // giới hạn số lượng dòng trả về
    $sql = $sql . " limit {$pagesNumber},{$rowNumber}";
    // trả về các dòng hiển thị
    return Db()->query($sql);
}

function GetPostsPT($keyword, $pagesNumber, $rowNumber, &$total){
    $pagesNumber = ($pagesNumber - 1) * $rowNumber;
    // cau lenh truy vấn
    $sql = "SELECT * FROM `tbl_post` 
    WHERE `title` LIKE '%{$keyword}%' 
    OR `content` LIKE '%{$keyword}%'
    OR `description` LIKE '%{$keyword}%'";
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    // giới hạn số lượng dòng trả về
    $sql = $sql . " limit {$pagesNumber},{$rowNumber}";
    // trả về các dòng hiển thị
    return Db()->query($sql);
}

function GetCategorysPT($keyword, $pagesNumber, $rowNumber, &$total){
    $pagesNumber = ($pagesNumber - 1) * $rowNumber;
    // cau lenh truy vấn
    $sql = "SELECT * FROM `tbl_category` 
    WHERE `title` LIKE '%{$keyword}%' 
    OR `content` LIKE '%{$keyword}%'";
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    // giới hạn số lượng dòng trả về
    $sql = $sql . " limit {$pagesNumber},{$rowNumber}";
    // trả về các dòng hiển thị
    return Db()->query($sql);
}

function GetBannersPT($keyword, $pagesNumber, $rowNumber, &$total){
    $pagesNumber = ($pagesNumber - 1) * $rowNumber;
    // cau lenh truy vấn
    $sql = "SELECT * FROM `tbl_banner` 
    WHERE `title` LIKE '%{$keyword}%' ";
    $res = Db()->query($sql);
    // lấy tổng số dòng
    $total = $res->num_rows;
    // giới hạn số lượng dòng trả về
    $sql = $sql . " limit {$pagesNumber},{$rowNumber}";
    // trả về các dòng hiển thị
    return Db()->query($sql);
}

function GetAdminById($id){
    $sql = "SELECT * FROM `tbl_admin` WHERE `Id` = '{$id}'";
    $res =  Db()->query($sql);
    if ($res)
        return $res->fetch_array();
    return null;
}

// function UpdateAdmin($user){
//     $sql = "UPDATE `tbl_admin` SET
//     `Id`='[value-1]',
//     `Name`='[value-2]',
//     `Username`='[value-3]',
//     `Password`='[value-4]',
//     `Randomkey`='[value-5]',
//     `Email`='[value-6]',
//     `Phone`='[value-7]',
//     `BOD`='[value-8]',
//     `Sex`='[value-9]',
//     `Address`='[value-10]',
//     `Active`='[value-11]',
//     `GGCode`='[value-12]',
//     `Avatar`='[value-13]' WHERE 1";

// }

// function GuiMailCapNhatMatKhau($email)
// {
//     //Instantiation and passing `true` enables exceptions
//     $mail = new PHPMailer(true);
//     try {
//         //Server settings
//         $mail->SMTPDebug = false;                      //Enable verbose debug output
//         $mail->isSMTP();                                            //Send using SMTP
//         $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
//         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//         $mail->Username   = 'soaivong01@gmail.com';                     //SMTP username
//         $mail->Password   = 'smklwiqeppexqpkc';                               //SMTP password
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
//         $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
//         $mail->CharSet = 'UTF-8';

//         //Recipients
//         $mail->setFrom('soaivong01@gmail.com', 'Mailer');
//         //$mail->addAddress('namdong92@gmail.com', 'Joe User');     //Add a recipient
//         $mail->addAddress($email);               //Name is optional

//         //Content
//         $mail->isHTML(true);                                  //Set email format to HTML
//         $mail->Subject = '[namdong]Tieu Đề Mail' . date("Y-m-d H:i:s", time());
//         $mail->Body    = 'Có ai do dang nhap vao tai khoản cua bạn <b>in bold!</b>';
//         $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

//         $mail->send();
//         // echo 'Message has been sent';
//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
// }

function GetOrderByUser($email){
    $sql = "SELECT * FROM `tbl_oder` 
    WHERE `email` = '{$email}'";
    return Db()->query($sql);
}

function GetOrder(){
    $sql = "SELECT * FROM `tbl_oder`";
    return Db()->query($sql);
}

function GetOrderDetail($IdOrder, $encode = false){
    if ($encode == true) {
        $sql = "SELECT * FROM `tbl_oder_detail` 
        WHERE sha1(`maOrder`) = '{$IdOrder}'";
    } else {
        $sql = "SELECT * FROM `tbl_oder_detail` 
        WHERE `maOrder` = '{$IdOrder}'";
    }
    return Db()->query($sql);
}

function Login($username, $password)
{
    $sql = "SELECT * FROM `tbl_admin` 
 WHERE (
     `Username` = '{$username}' 
     or `Email` = '{$username}'
     ) and 
     `Password` = sha1(CONCAT(`Randomkey`,'{$password}'))";
    //thực hien truy vấn     
    $res = Db()->query($sql);
    if ($res == null)
        return null;
    // lấy tổng số dòng
    $total = $res->num_rows;
    if ($total > 0)
        return $res->fetch_array();

    return null;
}

function UploadFile($fileUpload, $filePath)
{
    copy($fileUpload["tmp_name"], $filePath);
}

function BoDauTiengViet($str)
{
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
    $str = preg_replace("/(đ)/", "d", $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
    $str = preg_replace("/(Đ)/", "D", $str);
    $str = str_replace(" ", "-", str_replace("&*#39;", "", $str));
    $str = strtolower($str);
    return $str;
}

function PutBanner($Banner)
{
    $sql = "UPDATE `tbl_banner` SET 
    `title`='{$Banner["title"]}',
    `image`='{$Banner["image"]}',
    `active`='{$Banner["active"]}'
     WHERE `id`='{$Banner["id"]}'";
    return Db()->query($sql);
}

function PostBanner($banner){
    $sql = "INSERT INTO `tbl_banner`(`id`, `title`, `image`, `active`) 
    VALUES 
    (null,
    '{$banner["title"]}',
    '{$banner["image"]}',
    '{$banner["active"]}')";
    return Db()->query($sql);
}

function PutCat($cat){
    $sql = "UPDATE `tbl_category` SET 
    `title`='{$cat["title"]}',
    `content`='{$cat["content"]}'
     WHERE `id`='{$cat["id"]}'";
    return Db()->query($sql);
}

function PostCat($cat){
    $sql = "INSERT INTO `tbl_category`(`id`, `title`, `content`) 
    VALUES (
    null,
    '{$cat["title"]}',
    '{$cat["content"]}')";
    return Db()->query($sql);
}

function PutProduct($product){
    $sql = "UPDATE `tbl_product` SET 
    `name`='{$product["name"]}',
    `code`='{$product["code"]}',
    `price`='{$product["price"]}',
    `amount`='{$product["amount"]}',
    `image`='{$product["image"]}',
    `category`='{$product["category"]}',
    `detail`='{$product["detail"]}',
    `sale`='{$product["sale"]}',
    `description`='{$product["description"]}',
    `uploaded_on`='{$product["uploaded_on"]}' 
    WHERE `id` = '{$product["id"]}'";
    return Db()->query($sql);
}

function PostProduct($product){
    $sql = "INSERT INTO `tbl_product`(`id`, `name`, `code`, `price`, `amount`, `image`, `category`, `detail`, `sale`, `description`, `uploaded_on`) 
    VALUES (
        null,
        '{$product["name"]}',
        '{$product["code"]}',
        '{$product["price"]}',
        '{$product["amount"]}',
        '{$product["image"]}',
        '{$product["category"]}',
        '{$product["detail"]}',
        '{$product["sale"]}',
        '{$product["description"]}',
        '{$product["uploaded_on"]}]')";
    return Db()->query($sql);

}

function PutPost($post){
    $sql = "UPDATE `tbl_post` SET 
    `title`='{$post["title"]}',
    `content`='{$post["content"]}',
    `image`='{$post["image"]}',
    `description`='{$post["description"]}',
    `uploaded_on`='{$post["uploaded_on"]}',
    `author`='{$post["author"]}' 
    WHERE `id` = '{$post["id"]}'";
    return Db()->query($sql);
}

function PostPost($post){
    $sql = "INSERT INTO `tbl_post`(`id`, `title`, `content`, `image`, `description`, `uploaded_on`, `author`) 
    VALUES (
        null,
        '{$post["title"]}',
        '{$post["content"]}',
        '{$post["image"]}',
        '{$post["description"]}',
        '{$post["uploaded_on"]}',
        '{$post["author"]}')";
    return Db()->query($sql);

}

function GetInfo($username){
    $sql = "SELECT * FROM `tbl_admin` WHERE `Username` = '{$username}'";
    $res = Db()->query($sql);
    if ($res)
        return $res->fetch_array();
    return null;
}

function PutProfile($profile){
    $sql = "UPDATE `tbl_admin` SET 
    `Name`='{$profile["Name"]}',
    `Username`='{$profile["Username"]}',
    `Password`='{$profile["Password"]}',
    `Randomkey`='{$profile["Randomkey"]}',
    `Email`='{$profile["Email"]}',
    `Phone`='{$profile["Phone"]}',
    `BOD`='{$profile["BOD"]}',
    `Sex`='{$profile["Sex"]}',
    `Address`='{$profile["Address"]}',
    `Active`='{$profile["Active"]}',
    `GGCode`='{$profile["GGCode"]}',
    `Avatar`='{$profile["Avatar"]}' 
    WHERE `Id` = '{$profile["Id"]}'";
    return Db()->query($sql);
}



?>