<?
session_start();
$memNm = (!empty($_SESSION['mem_nm'])) ? $_SESSION['mem_nm']  : "";
$memId = (!empty($_SESSION['mem_id'])) ? $_SESSION['mem_id']  : "";
?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>OSEE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script>
       function insertCart(div,mId,gId,gCnt){
		   	if('<?=$memId?>'==""){
				alert("장바구니 담기, 구매를 원하시면 로그인하세요");
				return;
			}

            $.ajax({
                   url: "cartProc.php",
                   type: "post",
                   data:{memberId:mId, goodsId:gId, goodsCnt:gCnt},
                   dataType: "json",
                   success:function(data){
						if(data){
                        	if(div=='c'){
								var b = confirm("카트에 담았습니다. 이동하시겠습니까?");
								if(b) location.href="cart.php";;
                        	}else{
                            	alert("구매페이지로 이동합니다.");
                            	location.href="cart.php";
                        	}
                    	}else{
							if(div=='c'){
								alert("이미 카트에 담겨있습니다.");
							}else{
								alert("구매페이지로 이동합니다.");
								location.href="cart.php";
							}
                   		}
				    }
               }); 
	    }
	</script>
	
	<body>
		
	<div class="fh5co-loader"></div>

<div id="page">
	<?
		include "navi.php";
	?>

	<!-- <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Product Details</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header> -->

<?php
include "db_info.php";
$goodsId=$_GET['goods_id'];
$sql = "SELECT * from goods where goods_id='$goodsId'";
$rs = mysqli_query($conn, $sql);
?>
	<div id="fh5co-product">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 animate-box">
					<div class="owl-carousel owl-carousel-fullwidth product-carousel">
<?
	while(list($goodsId,$goodsNm,$goodsPrice,$goodsDesc1,$goodsDesc2,$goodsDesc3,$goodsDesc4,$goodsImg1,$goodsImg2,$goodsImg3,$goodsImg4,$goodsImg5)=mysqli_fetch_array($rs)){
?>						
						<div class="item">
							<div class="active text-center">
								<figure>
									<img src="images/<?=$goodsImg1?>" alt="user">
								</figure>
							</div>
						</div>
						<div class="item">
							<div class="active text-center">
								<figure>
									<img src="images/<?=$goodsImg2?>" alt="user">
								</figure>
							</div>
						</div>
						<div class="item">
							<div class="active text-center">
								<figure>
									<img src="images/<?=$goodsImg3?>" alt="user">
								</figure>
							</div>
						</div>
						<div class="item">
							<div class="active text-center">
								<figure>
									<img src="images/<?=$goodsImg4?>" alt="user">
								</figure>
							</div>
						</div>
						<div class="item">
							<div class="active text-center">
								<figure>
									<img src="images/<?=$goodsImg5?>" alt="user">
								</figure>
							</div>
						</div>
					</div>
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
							<h2><?=$goodsNm?></h2>
							<p>
								<a href="#" class="btn btn-primary btn-outline btn-lg" onclick="insertCart('c','<?=trim($memId)?>','<?=trim($goodsId)?>', 1)">Add to Cart</a>
								<a href="#" class="btn btn-primary btn-outline btn-lg" onclick="insertCart('o','<?=trim($memId)?>','<?=trim($goodsId)?>', 1)">Buy it now</a>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="fh5co-tabs animate-box">
						<ul class="fh5co-tab-nav">
							<li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-file"></i></span><span class="hidden-xs">Product Details</span></a></li>
							<li><a href="#" data-tab="2"><span class="icon visible-xs"><i class="icon-bar-graph"></i></span><span class="hidden-xs">Specification</span></a></li>
							<li><a href="#" data-tab="3"><span class="icon visible-xs"><i class="icon-star"></i></span><span class="hidden-xs">Review</span></a></li>
						</ul>

						<!-- Tabs -->
						<div class="fh5co-tab-content-wrap">

							<div class="fh5co-tab-content tab-content active" data-tab-content="1">
								<div class="col-md-10 col-md-offset-1">
									<span class="price"><?=number_format("$goodsPrice")?>원</span>
									<h2><?=$goodsNm?></h2>
									<p><?=$goodsDesc1?></p>
									<h2>상품설명</h2>
									<p><?=$goodsDesc2?></p>

									<!-- <div class="row">
										<div class="col-md-6">
											<h2 class="uppercase">소재</h2>
											<p><?=$goodsDesc3?></p>
										</div>
										<div class="col-md-6">
											<h2 class="uppercase">사이즈</h2>
											<p><?=$goodsDesc4?></p>
										</div>
									</div> -->

								</div>
							</div>

							<div class="fh5co-tab-content tab-content" data-tab-content="2">
								<div class="col-md-10 col-md-offset-1">
									<h3>Product Specification</h3>
									<div class="row">
										<div class="col-md-6">
											<h2 class="uppercase">소재</h2>
											<p><?=$goodsDesc3?></p>
										</div>
										<div class="col-md-6">
											<h2 class="uppercase">사이즈</h2>
											<p><?=$goodsDesc4?></p>
										</div>
									</div>

<?}?>									
								</div>
							</div>

							<div class="fh5co-tab-content tab-content" data-tab-content="3">
								<div class="col-md-10 col-md-offset-1">
									<!-- <h3>Happy Buyers</h3>
									<div class="feed">
										<div>
											<blockquote>
												<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>
											</blockquote>
											<h3>&mdash; Louie Knight</h3>
											<span class="rate">
												<i class="icon-star2"></i>
												<i class="icon-star2"></i>
												<i class="icon-star2"></i>
												<i class="icon-star2"></i>
												<i class="icon-star2"></i>
											</span>
										</div>
										<div>
											<blockquote>
												<p>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit? Veritatis tenetur odio delectus quibusdam officiis est.</p>
											</blockquote>
											<h3>&mdash; Joefrey Gwapo</h3>
											<span class="rate">
												<i class="icon-star2"></i>
												<i class="icon-star2"></i>
												<i class="icon-star2"></i>
												<i class="icon-star2"></i>
												<i class="icon-star2"></i>
											</span>
										</div>
									</div> -->
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="fh5co-started">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Newsletter</h2>
					<p>If you want to see the OSEE's new product. Now you can subscribe</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?
		include "footer.php";
	?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

