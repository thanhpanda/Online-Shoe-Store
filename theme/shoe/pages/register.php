<!--start-account-->
<div class="account">
    <div class="container">
        <div class="account-bottom">
            <div class="col-md-8 account-left">
                <form id="formDangKy" action="/index.php?pages=xulyregister" method="POST" role="form">
                    <div class="account-top heading">
                        <h3>NEW CUSTOMERS</h3>
                    </div>
                    <div class="address">
                        <span>First Name</span>
                        <input type="text" name="FirstName" id="FirstName">
                    </div>
                    <div class="address">
                        <span>Last Name</span>
                        <input type="text" name="LastName" id="LastName">
                    </div>
                    <div class="address">
                        <span>Email Address</span>
                        <input type="text" name="Email" id="Email">
                    </div>
                    <div class="address">
                        <span>Phone</span>
                        <input type="text" name="Phone" id="Phone">
                    </div>
                    <div class="address">
                        <span>Address</span>
                        <input type="text" name="Address" id="Address">
                    </div>
                    <div class="address">
                        <span>User Name</span>
                        <input type="text" name="Username" id="Username">
                    </div>
                    <div class="address">
                        <span>Password</span>
                        <input type="password" name="Password" id="Password">
                    </div>
                    <div class="address">
                        <span>Reenter Password</span>
                        <input type="password" name="RePassword" id="RePassword">
                    </div>
                    <div class="address new">
                        <button type="submit" class="btn btn-primary">REGISTER</button>
                    </div>
                </form>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--end-account-->

<script type="text/javascript">
    $(function() {

        $("#formDangKy").submit(function() {
            try {
                if ($("#FirstName").val() == "") {
                    /* chưa nhập firstname */
                    $("#FirstName").focus();
                    throw "Bạn Chưa Nhập FirstName";
                }
                if ($("#LastName").val() == "") {
                    /* chưa nhập lastname */
                    $("#LastName").focus();
                    throw "Bạn Chưa Nhập LastName";
                }
                if ($("#Email").val() == "") {
                    /* chưa nhập EMAIL */
                    $("#Email").focus();
                    throw "Bạn Chưa Nhập Email";
                }
                /* kiểm tra có phải email không? */
                var userinput = $("#Email").val();
                var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

                if (pattern.test(userinput) == false) {
                    // alert("Email Không Đúng Định Dạng");
                    $("#Email").focus().select();
                    throw "Email Không Đúng Định Dạng";
                }
                // kiểm tra email đã dùng chưa
                var formDataSend = {
                    "Email": $("#Email").val()
                };
                $.ajax({
                    method: "POST",
                    url: "/ajax.php?pages=checkEmail",
                    data: formDataSend,
                    async: false,
                }).done(function(res) {
                    console.log(res);
                    if (res.haveEmail == 1) {
                        // đã có email
                        $("#Email").focus().select();
                        throw "Email Đã Được Sử Dụng";
                    }
                });
                if ($("#Phone").val() == "") {
                    /* chưa nhập phone */
                    $("#Phone").focus();
                    throw "Bạn Chưa Nhập SDT";
                }
                if ($("#Address").val() == "") {
                    /* chưa nhập address */
                    $("#Address").focus();
                    throw "Bạn Chưa Nhập Address";
                }
                if ($("#Username").val() == "") {
                    /* chưa nhập Username */
                    $("#Username").focus();
                    throw "Bạn Chưa Nhập Username";
                }
                var Password = $("#Password").val();
                var RePassword = $("#RePassword").val();
                if (Password == "") {
                    $("#Password").focus();
                    throw "Bạn Chưa Nhập Mật Khẩu";
                }
                if (Password != RePassword) {
                    $("#RePassword").focus();
                    throw "Mật Khẩu Không Khớp";
                }
                return true;
            } catch (error) {
                console.log(error);
                alert(error);
                return false
            }
        });
    });
</script>