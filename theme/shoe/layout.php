<?php
include_once("Router.php");
include_once("FunctionLayout.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Free Style A Ecommerce Category Flat Bootstarp Resposive Website Template | Home :: w3layouts</title>
	<link href="/public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/public/js/jquery-1.11.0.min.js"></script>
	<!-- Custom Theme files -->
	<!--theme-style-->
	<link href="/public/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!--//theme-style-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Free Style Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC:100,300,400,500,700,800,900,100italic,300italic,400italic,500italic,700italic,800italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<!--//fonts-->
	<script type="text/javascript" src="/public/js/move-top.js"></script>
	<script type="text/javascript" src="/public/js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- start menu -->
	<script src="/public/js/simpleCart.min.js"> </script>
	<link href="/public/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="/public/js/memenu.js"></script>
	<!-- <script>
		$(document).ready(function() {
			$(".memenu").memenu();
		});
	</script> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./CSS/style.css">
</head>

<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){
			$(".ajaxHtml").each(function() {
                var data = $(this).data();
                console.log(data);
                $.ajax({
                        method: "GET",
                        url: data.url,
                    })
                    .done(function(msg) {
                        //console.log(msg);
                        $(data.id).html(msg);
                    });

            });

			$(".btnAjax").click(function(){
                var data = $(this).data();
                console.log(data);
                $.ajax({
                        method: "GET",
                        url: data.url,
                    })
                    .done(function(msg) {
                        //console.log(msg);
                        $(data.id).html(msg);
                    });

            });

			$("#GoiY").click(function() {
                $("#GoiY").html("").hide();
            });

            $(".input-search input").keyup(function() {
                var keyword = $(this).val();
                console.log(keyword.length);
                console.log(keyword);
                if (keyword.length >= 3) {
                    $.ajax({
                        "url": "/ajax.php?pages=suggest&keyword=" + keyword
                    }).done(function(res) {

                        console.log(res);
                        $("#GoiY").html(res).show();

                    });
                }

            });
			
		});
	</script>
	<!--top-header-->
	<?php
	include_once("TopHeader.php");
	?>
	<!--top-header-->
	<!--bottom-header-->
	<?php
	include_once("BottomHeader.php");
	?>


	<!--start-footer-->
	<?php
	include_once($_Content);
	include_once("Footer.php");
	?>
	<!--end-footer-text-->
</body>

</html>