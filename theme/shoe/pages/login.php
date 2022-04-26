<?php 
if(isset($_POST["Email"])){
	try{
		$email = $_POST["Email"];
		$password = $_POST["Password"];
		$user = GetUserByEmailPassword($email, $password);
		
		if ($user == null){
			throw new Exception("Wrong Email or Password");
		}
		$_SESSION["KhachHang"] = $user;
		header("Location: index.php");
	} catch(Exception $ex){
		$loi = $ex->getMessage();
	}
}
?>
<!--start-account-->
<div class="account">
		<div class="container"> 
			<div class="account-bottom">
				
				<div class="col-md-8 account-left">
					<form action="" method="POST">
					<div class="account-top heading">
						<h3>REGISTERED CUSTOMERS</h3>
					</div>
					<div class="address">
						<span>Email Address</span>
						<input required name="Email" id="email_login" type="text">
					</div>
					<div class="address">
						<span>Password</span>
						<input required name="Password" id="password_login" type="password">
					</div>
					<div class="address">
						<a class="forgot" href="#">Forgot Your Password?</a>
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
				</div>
				</form>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--end-account-->