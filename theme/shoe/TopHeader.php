<?php
if (isset($_SESSION["GioHang"])) {
	$gioHang = $_SESSION["GioHang"];
	$tongTien = 0;
	if ($gioHang)
		foreach ($gioHang as $idSanPham => $SanPham) {
			$thanhTien = $SanPham["SoLuong"] * $SanPham["sale"];
			$tongTien += $thanhTien;
		}
}

$_REQUEST["keyword"] = isset($_REQUEST["keyword"]) ? $_REQUEST["keyword"] : "";
?>
<div class="top-header">
	<div class="container">
		<div class="top-header-main">
			<div class="col-md-4 top-header-left">
				<div class="header-search-box">
					<form action="/index.php" class="form-inline">
						<input type="hidden" value="search" name="pages">
						<div class="form-group input-search">
							<input class="search" autocomplete="off" value="<?php echo $_REQUEST["keyword"] ?>" type="text" name="keyword" placeholder="Keyword here...">
							<button type="submit" class="pull-right btn-search">Search</button>
							<div class="goiY" id="GoiY">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-4 top-header-middle">
				<a href="index.php"><img src="/public/images/logo-4.png" alt="" /></a>
			</div>
			<div class="col-md-2 top-header-right">
				<div class="cart box_1">
					<a href="index.php?pages=mycart">
						<h3>
							<div class="total">
								<span class=""><?php
												if (isset($_SESSION["GioHang"]))
													echo $tongTien . "$";
												?></span> (<span><?php
																	if (isset($_SESSION["GioHang"])) {
																		echo count($_SESSION["GioHang"]);
																	} ?></span> items)
							</div>
							<img src="/public/images/cart-1.png" alt="" />
					</a>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-2 top-header-right">
				<?php
				if (isset($_SESSION["KhachHang"])) {
				?>
					<div class="cart box_1">
						<div class="dropdown">
							<label for="">hello <?php echo $_SESSION["KhachHang"]["username"] ?></label>
							<div class="dropdown-content">
								<a href="index.php?pages=profile" class="simpleCart_empty">Account Information</a>
								<a href="index.php?pages=myorder" class="simpleCart_empty">My Order</a><br>
								<a href="index.php?pages=security" class="simpleCart_empty">Security</a><br>
								<a href="index.php?pages=logout" class="simpleCart_empty">Logout</a>
							</div>
						</div>
					</div>
				<?php
				} else {
				?>
					<div class="cart box_1">
						<a href="index.php?pages=login" class="simpleCart_empty">LOGIN</a>
					</div>
					<div class="cart box_1">
						<p>/</p>
					</div>
					<div class="cart box_1">
						<a href="index.php?pages=register" class="simpleCart_empty">REGISTER</a>
					</div>
				<?php
				}
				?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>