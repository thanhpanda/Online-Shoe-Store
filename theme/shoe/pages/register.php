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
                    /* ch??a nh???p firstname */
                    $("#FirstName").focus();
                    throw "B???n Ch??a Nh???p FirstName";
                }
                if ($("#LastName").val() == "") {
                    /* ch??a nh???p lastname */
                    $("#LastName").focus();
                    throw "B???n Ch??a Nh???p LastName";
                }
                if ($("#Email").val() == "") {
                    /* ch??a nh???p EMAIL */
                    $("#Email").focus();
                    throw "B???n Ch??a Nh???p Email";
                }
                /* ki???m tra c?? ph???i email kh??ng? */
                var userinput = $("#Email").val();
                var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

                if (pattern.test(userinput) == false) {
                    // alert("Email Kh??ng ????ng ?????nh D???ng");
                    $("#Email").focus().select();
                    throw "Email Kh??ng ????ng ?????nh D???ng";
                }
                // ki???m tra email ???? d??ng ch??a
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
                        // ???? c?? email
                        $("#Email").focus().select();
                        throw "Email ???? ???????c S??? D???ng";
                    }
                });
                if ($("#Phone").val() == "") {
                    /* ch??a nh???p phone */
                    $("#Phone").focus();
                    throw "B???n Ch??a Nh???p SDT";
                }
                if ($("#Address").val() == "") {
                    /* ch??a nh???p address */
                    $("#Address").focus();
                    throw "B???n Ch??a Nh???p Address";
                }
                if ($("#Username").val() == "") {
                    /* ch??a nh???p Username */
                    $("#Username").focus();
                    throw "B???n Ch??a Nh???p Username";
                }
                var Password = $("#Password").val();
                var RePassword = $("#RePassword").val();
                if (Password == "") {
                    $("#Password").focus();
                    throw "B???n Ch??a Nh???p M???t Kh???u";
                }
                if (Password != RePassword) {
                    $("#RePassword").focus();
                    throw "M???t Kh???u Kh??ng Kh???p";
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