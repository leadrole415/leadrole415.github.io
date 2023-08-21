<?
session_start();
$memNm = (!empty($_SESSION['mem_nm'])) ? $_SESSION['mem_nm']  : "";
$memId = (!empty($_SESSION['mem_id'])) ? $_SESSION['mem_id']  : "";

include "db_info.php";
// include "cartCnt.php";
?>

<!DOCTYPE HTML>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>OSEE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive"
	/>
	<meta name="author" content="gettemplates.co" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
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
	<style>

		.t_left {
			text-align: left;
			width: 300px;
		}

		.insta {
			margin: 150px auto;
		}

		.flex-container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
		}

		.flex-container>div {
			background-color: #f1f1f1;
			width: 170px;
			height: 170px;
			margin: 10px;
			text-align: center;
			line-height: 75px;
			font-size: 30px;
		}
		@media screen and (max-width: 768px) {
			.flex-container>div {
				width: 100px;
				height: 100px;
			}
		}
		
		.slide-text{
    		margin-left: 50%;
			text-align:center;
		}

		.slide-h1{
			font-size:100px; 
			color:#fff; 
			font-weight:800;
		}
		
		.slide-p{
			font-size:40px; 
			color:#fff;
		}

		@media screen and (max-width: 768px) and (min-width:425px) {
			.slide-h1{
				font-size:70px; 
			}
		
			.slide-p{
				font-size:25px; 
			}

			.slide-text{
				margin-left: 32.5%;
			}
		}
		
		@media screen and (max-width: 424px) {
			.slide-h1{
				font-size:70px; 
			}
		
			.slide-p{
				font-size:25px; 
			}

			.slide-text{
				margin-left: 10%;
			}
		}
	</style>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script>
       function insertCart(mId,gId,gCnt){
		   	if('<?=$memId?>'==""){
				alert("장바구니 담기, 구매를 원하시면 로그인하세요");
				location.href="login.php";
				return;
			}

            $.ajax({
                   url: "cartProc.php",
                   type: "post",
                   data:{memberId:mId, goodsId:gId, goodsCnt:gCnt},
                   dataType: "json",
                   success:function(data){
					 if(data){
						var cnt = parseInt($("#sm").text())+1;
						$("#sm").empty();
						$("#sm").text(cnt);
						// location.href="index.php";
						var b = confirm("카트에 담았습니다. 이동하시겠습니까?");
						
						if(b) location.href="cart.php";
					}else{
						alert("이미 카트에 담겨 있습니다.");
					}
                   }
               }); 
	    }
    </script>
</head>

<body>

	<div class="fh5co-loader"></div>

	<div id="page">
		<?
			include "navi.php";
		?>

		<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
					<li style="background-image: url(images/img_bg_1.jpg);">
						<div class="overlay-gradient"></div>
						<div class="container">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text slide-text">
								<div class="slider-text-inner">
									<h1 class= "slide-h1">OSEE</h1>
									<p class= "slide-p">OSEE: OSEE? OSEE!</p>
									<!-- <div class="desc">
										<span class="price">$800</span>
										<h2>AMBIENT TRIP</h2>
										<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.
											Separated they live in Bookmarksgrove.</p>
										<p>
											<a href="single.html" class="btn btn-primary btn-outline btn-lg">VIEW MORE</a>
										</p>
									</div> -->
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_2.jpg);">
						<div class="container">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text slide-text">
								<div class="slider-text-inner">
									<h1 class= "slide-h1">OSEE</h1>
									<p class= "slide-p">OSEE: OSEE? OSEE!</p>
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_3.jpg);">
						<div class="container">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text slide-text">
								<div class="slider-text-inner">
									<h1 class= "slide-h1">OSEE</h1>
									<p class= "slide-p">OSEE: OSEE? OSEE!</p>
									<!-- <div class="desc">
		   						<span class="price">$750</span>
		   						<h2>Alato Cabinet</h2>
		   						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.</p>
			   					<p><a href="single.html" class="btn btn-primary btn-outline btn-lg">Purchase Now</a></p>
		   					</div> -->
								</div>
							</div>
						</div>
					</li>
					<li style="background-image: url(images/img_bg_4.jpg);">
						<div class="container">
							<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text slide-text">
								<div class="slider-text-inner">
									<h1 class= "slide-h1">OSEE</h1>
									<p class= "slide-p">OSEE: OSEE? OSEE!</p>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>


<?php
$selNum = 9;
$sql = "SELECT * from goods limit $selNum";
$rs = mysqli_query($conn, $sql);

?>
		<div id="fh5co-product">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<!-- <span>OSEE</span> -->
						<h2>Products.</h2>
						<p>OSEE's design is all OSEE sees, special and beautiful.</p>
					</div>
				</div>
				<div class="row">

<?php 
	while(list($goodsId,$goodsNm,$goodsPrice,$goodsDesc1,$goodsDesc2,$goodsDesc3,$goodsDesc4,$goodsImg1,$goodsImg2,$goodsImg3,$goodsImg4,$goodsImg5,$release_year,$season_id,$category)=mysqli_fetch_array($rs)){
?>
					<div class="col-md-4 text-center animate-box">
						<div class="product" name="product">
							<div class="product-grid" style="background-image:url(./images/<?=$goodsImg1?>);">
								<div class="inner">
									<p>
										<a href="#product" class="icon" onclick="insertCart('<?=trim($memId)?>','<?=trim($goodsId)?>', 1)">
											<i class="icon-shopping-cart"></i>
										</a>
										<a href="single.php?goods_id=<?=$goodsId?>" class="icon">
											<i class="icon-eye"></i>
										</a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3>
									<a href="single.php?goods_id=<?=$goodsId?>"><?=$goodsNm?></a>
								</h3>
								<span class="price"><?=number_format("$goodsPrice")?></span>
								<span>원</span>
							</div>
						</div>
					</div>
<?}?>

					<!-- <div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/img_bg_1.jpg);">
								<span class="sale">Sale</span>
								<div class="inner">
									<p>
										<a href="single.html" class="icon">
											<i class="icon-shopping-cart"></i>
										</a>
										<a href="single.html" class="icon">
											<i class="icon-eye"></i>
										</a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3>
									<a href="single.html">Pavilion Speaker</a>
								</h3>
								<span class="price">$600</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/product-3.jpg);">
								<div class="inner">
									<p>
										<a href="single.html" class="icon">
											<i class="icon-shopping-cart"></i>
										</a>
										<a href="single.html" class="icon">
											<i class="icon-eye"></i>
										</a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3>
									<a href="single.html">Ligomancer</a>
								</h3>
								<span class="price">$780</span>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/product-4.jpg);">
								<div class="inner">
									<p>
										<a href="single.html" class="icon">
											<i class="icon-shopping-cart"></i>
										</a>
										<a href="single.html" class="icon">
											<i class="icon-eye"></i>
										</a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3>
									<a href="single.html">Alato Cabinet</a>
								</h3>
								<span class="price">$800</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/product-5.jpg);">
								<div class="inner">
									<p>
										<a href="single.html" class="icon">
											<i class="icon-shopping-cart"></i>
										</a>
										<a href="single.html" class="icon">
											<i class="icon-eye"></i>
										</a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3>
									<a href="single.html">Earing Wireless</a>
								</h3>
								<span class="price">$100</span>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/product-6.jpg);">
								<div class="inner">
									<p>
										<a href="single.html" class="icon">
											<i class="icon-shopping-cart"></i>
										</a>
										<a href="single.html" class="icon">
											<i class="icon-eye"></i>
										</a>
									</p>
								</div>
							</div>
							<div class="desc">
								<h3>
									<a href="single.html">Sculptural Coffee Table</a>
								</h3>
								<span class="price">$960</span>
							</div>
						</div>
					</div>-->
				</div>
				<div class="" style="text-align:center;">
						<a href="product.php" style="padding:10px; border:2px solid gray;">View More</a>
				</div>
			</div>
		</div> 

		<div id="fh5co-product">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<h2>OSEE COLLECTION</h2>
						<p>OSEE 2018 S/S COLLECTION SEASON CONCEPT : 'AMBIENT TRIP</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/img_fall.jpg);">
								<a href="2018_fall.php"><div class="inner"></div></a>
							</div>
							<div class="desc">
								<h3>
									<a href="2018_fall.php">2018 FALL</a>
								</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/img_summer.jpg);">
								<!-- <span class="sale">Sale</span> -->
								<a href="2018_summer.php"><div class="inner"></div></a>							</div>
							<div class="desc">
								<h3>
									<a href="2018_summer.php">2018 SUMMER</a>
								</h3>
							</div>
						</div>
					</div>
					<div class="col-md-4 text-center animate-box">
						<div class="product">
							<div class="product-grid" style="background-image:url(images/img_spring.jpg);">
							<a href="2018_spring.php"><div class="inner"></div></a>							</div>
							<div class="desc">
								<h3>
									<a href="2018_spring.php">2018 SPRING</a>
								</h3>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>


		<!-- <div id="fh5co-services" class="fh5co-bg-section">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<figure>
								<img src="images/img_fall.jpg" width="300" alt="user">
							</figure>
							<h3>2018 FALL COLLECTION</h3>
							<p>Far far away, behind the word</p>
							<p>
								<a href="#" class="btn btn-primary btn-outline">View More</a>
							</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<figure>
								<img src="images/img_summer.jpg" width="300" alt="user">
							</figure>
							<h3>2018 SUMMER COLLECTION</h3>
							<p>Far far away, behind the word</p>
							<p>
								<a href="#" class="btn btn-primary btn-outline">View More</a>
							</p>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 text-center">
						<div class="feature-center animate-box" data-animate-effect="fadeIn">
							<figure>
								<img src="images/img_spring.jpg" width="300" alt="user">
							</figure>
							<h3>2018 SPRING COLLECTION</h3>
							<p>Far far away, behind the word</p>
							<p>
								<a href="#" class="btn btn-primary btn-outline">View More</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<div id="fh5co-testimonial" class="fh5co-bg-section">
			<div class="container">
				<div class="row animate-box">
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
						<!-- <span>Great style for everyone</span> -->
						<h2>O,SEE?
							<br>O!OSEE'S lookbook!
							<br>O? O, did you see?</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="row animate-box">
							<div class="owl-carousel owl-carousel-fullwidth">
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="images/img_b_1.jpg" alt="user">
										</figure>
										<!-- <span>Jean Doe, via 
											<a href="#" class="twitter">Twitter</a>
										</span>
										<blockquote>
												<p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
													blind texts.&rdquo;</p>
											</blockquote> -->
									</div>
								</div>
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="images/img_b_2.jpg" alt="user">
										</figure>
										<!-- <span>John Doe, via
											<a href="#" class="twitter">Twitter</a>
										</span>
										<blockquote>
												<p>&ldquo;Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
											</blockquote> -->
									</div>
								</div>
								<div class="item">
									<div class="testimony-slide active text-center">
										<figure>
											<img src="images/img_b_3.jpg" alt="user">
										</figure>
										<!-- <span>John Doe, via
											<a href="#" class="twitter">Twitter</a>
										</span>
										<blockquote>
												<p>&ldquo;Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove
													right at the coast of the Semantics, a large language ocean.&rdquo;</p>
											</blockquote> -->
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
					<div class="col-md-8 col-md-offset-2 text-center fh5co-heading t_left">
						<h2>OSEE</h2>
						<p>A decent designer provides the customer with the chance/opportunity to express themselves or makes changes in lifestyle.
OSEE is led by Such designer, launched in Spring 2018 .</p>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="insta text-center">
			<p>INSTAGRAM OSEE:</p>
			<div class="container">
				<div class="row animate-box flex-container">
					<div>1</div>
					<div>2</div>
					<div>3</div>
					<div>4</div>
					<div>5</div>
					<div>6</div>
				</div>
			</div>
		</div> -->
		<?
			include "footer.php";
		?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop">
			<i class="icon-arrow-up"></i>
		</a>
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