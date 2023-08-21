<?	
include "db_info.php";
$room_id=$_GET['room_id'];
$query = "select * from room where room_id='$room_id'";
$rs=mysql_query($query,$conn);
list($room_id,$room_name,$room_maxperson,$room_price,$room_price1,$room_price2,$room_desc1,$room_desc2,$room_desc3,$room_img_main,$room_img_sub1,$room_img_sub2,$room_img_thumb,$room_img_sub3,$room_img_sub4,$room_img_sub5,$room_img_sub6,$room_img_sub7,$room_img_sub8)=mysql_fetch_array($rs);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>초록원</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="" />

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

		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">
		
		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">



		<!-- Magnific Popup core CSS file -->
		<link rel="stylesheet" href="css/magnific-popup.css">
		<!-- Jquery src -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<!-- Magnific javascript -->
		<script src="./jquery.magnific-popup.js"></script>



		<!-- Flexslider  -->
		<link rel="stylesheet" href="css/flexslider.css">
		<!-- Owl Carousel -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		
		<!-- Date Picker -->
		<link rel="stylesheet" href="css/bootstrap-datepicker.css">
		<!-- Flaticons  -->
		<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

		<!-- Theme style  -->
		<link rel="stylesheet" href="css/style.css">

		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
		<![endif]-->


		<!-- From w3 tmp / by jen //////////////////////////////////////////////////// -->
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
		<style>
			body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif;}
			body, html {
				height: 100%;
				color: #777;
				line-height: 1.8;
			}

			/* Create a Parallax Effect */
			.bgimg-1, .bgimg-2, .bgimg-3 {
				background-attachment: fixed;
				background-position: center;
				background-repeat: no-repeat;
				background-size: cover;
			}

			/* First image (Logo. Full height) */
			.bgimg-1 {
				background-image: url(<?=$room_img_main?>);
				min-height: 100%;
			}

			/* Second image (Portfolio) */
			.bgimg-2 {
				background-image: url("/w3images/parallax2.jpg");
				min-height: 400px;
			}

			/* Third image (Contact) */
			.bgimg-3 {
				background-image: url("/w3images/parallax3.jpg");
				min-height: 400px;
			}

			.w3-wide {letter-spacing: 10px;}
			.w3-hover-opacity {cursor: pointer;}

			/* Turn off parallax scrolling for tablets and phones */
			@media only screen and (max-device-width: 1024px) {
				.bgimg-1, .bgimg-2, .bgimg-3 {
					background-attachment: scroll;
				}
			}

			/*modal css / by jen */
			#myImg {
				border-radius: 5px;
				cursor: pointer;
				transition: 0.3s;
			}

			#myImg:hover {opacity: 0.7;}

			/* slicde gallay by jen ///////////////////////////////////////// */
			
			#myImg {
			border-radius: 5px;
			cursor: pointer;
			transition: 0.3s;
			}

			#myImg:hover {opacity: 0.7;}

			/* The Modal (background) */
			.modal {
				display: none; /* Hidden by default */
				position: fixed; /* Stay in place */
				z-index: 1; /* Sit on top */
				padding-top: 100px; /* Location of the box */
				left: 0;
				top: 0;
				width: 100%; /* Full width */
				height: 100%; /* Full height */
				overflow: auto; /* Enable scroll if needed */
				background-color: rgb(0,0,0); /* Fallback color */
				background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
			}

			/* Modal Content (image) */
			.modal-content {
				margin: auto;
				display: block;
				width: 80%;
				max-width: 700px;
			}

			/* Caption of Modal Image */
			#caption {
				margin: auto;
				display: block;
				width: 80%;
				max-width: 700px;
				text-align: center;
				color: #ccc;
				padding: 10px 0;
				height: 150px;
			}

			/* Add Animation */
			.modal-content, #caption {    
				-webkit-animation-name: zoom;
				-webkit-animation-duration: 0.6s;
				animation-name: zoom;
				animation-duration: 0.6s;
			}

			@-webkit-keyframes zoom {
				from {-webkit-transform:scale(0)} 
				to {-webkit-transform:scale(1)}
			}

			@keyframes zoom {
				from {transform:scale(0)} 
				to {transform:scale(1)}
			}

			/* The Close Button */
			.close {
				position: absolute;
				top: 15px;
				right: 35px;
				color: #f1f1f1;
				font-size: 40px;
				font-weight: bold;
				transition: 0.3s;
			}

			.close:hover,
			.close:focus {
				color: #bbb;
				text-decoration: none;
				cursor: pointer;
			}

			/* 100% Image Width on Smaller Screens */
			@media only screen and (max-width: 700px){
				.modal-content {
					width: 100%;
				}
			}
		</style>
	</head>

	<body>
	<div class="colorlib-loader"></div>

<div id="page">
	<nav id="topMenu" class="colorlib-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="colorlib-logo"><a href="index.php"><img src="images/logo.png" width="80px" alt=""></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li class="has-dropdown active">
								<a href="rooms.php">Rooms</a>
							</li>
							<li><a href="do.html">Do</a></li>
							<lis><a href="tour.php">Tour</a></li>
							<li><a href="info.html">Info</a></li>
							<li><a href="reservation.php">Reservation</a></li>
							<li><a href="notice.php">Notice</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>			
		<!-- 상단 탑 고정 이미지 -->
			<div class="bgimg-1 w3-display-container w3-opacity-min" id="home">
				<div class="w3-display-middle" style="white-space:nowrap;">
				<span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity"><span class="w3-hide-small">초록원</span> <?=$room_name?></span>
				</div>
			</div>
			
		<!-- 객실 서비스 아이템 테이블 -->
			<div class="w3-content w3-container w3-padding-64" id="about">
				<p style="font-size: 20px;font-weight: bold;color:black;">객실 서비스 아이템</p>
				<div class="tableWraper">
					<table border="1" cellpadding="10">
						<tr>
							<td><img src="images/bedroom_icon.jpg"></td>
							<td><img src="images/bathroom_icon.jpg"></td>
							<td><img src="images/minibar_icon.jpg"></td>
							<td><img src="images/facility_icon.jpg"></td>
						</tr>
						<tr>
							<td class="vT">
							- 침대<br>- 베개 셀렉션 (Soft or Firm)<br>- 42인치 LCD TV <br>- 케이블 채널<br>- 커피 포트<br>- 개인 금고<br>- 업무용 책상<br>- 슬리퍼, 목욕가운<br>- 와인잔, 커피잔<br>- 모닝콜 서비스<br>- 다리미, 다리미 판<br>- 110V, 220V
							</td>
							<td class="vT">
								- 대형 편백나무 욕조<br>- 샤워부스<br>- ETRO 어메니티 5종<br>- 헤어 드라이기<br>- 비데
							</td>
							<td class="vT">
								- 네스프레소 커피캡슐 3개<br>- 맥주 2캔<br>- 믹스 너츠<br>- 젤리<br>- 초코바<br>- 소프트 드링크 3캔<br>- 생수 2병
							</td>
							<td class="vT">
								- 무료 WIFI<br>- 천장 에어컨 &amp; 히터<br>- 온돌<br>- 공기청정기 &amp; 가습기<br>- 개별 냉난방 조절 시스템
							</td>		
						</tr>
					</table>
				</div>
			</div>

			<!-- 객실 세부  큰 이미지 갤러리 -->	
			<div class="w3-row-padding w3-center">
				<div class="w3-col m3">
				<img id="myImg1" src="<?=$room_img_sub1?>" style="width:100%" onclick="enlarge(this)" class="w3-hover-opacity" alt="화장실">
				</div>

				<div class="w3-col m3">
				<img id="myImg2" src="<?=$room_img_sub2?>" style="width:100%" onclick="enlarge(this)" class="w3-hover-opacity" alt="방 입구">
				</div>

				<div class="w3-col m3">
				<img id="myImg3" src="<?=$room_img_sub3?>" style="width:100%" onclick="enlarge(this)" class="w3-hover-opacity" alt="공용 화장대">
				</div>

				<div class="w3-col m3">
				<img id="myImg4" src="<?=$room_img_sub4?>" style="width:100%" onclick="enlarge(this)" class="w3-hover-opacity" alt="공용 거실">
				</div>
			</div>

			<div class="w3-row-padding w3-center w3-section">
				<div class="w3-col m3">
				<img id="myImg5" src="<?=$room_img_sub5?>" style="width:100%" onclick="enlarge(this)" class="w3-hover-opacity" alt="공용 식당">
				</div>

				<div class="w3-col m3">
				<img id="myImg6" src="<?=$room_img_sub6?>" style="width:100%" onclick="enlarge(this)" class="w3-hover-opacity" alt="공용 입구">
				</div>

				<div class="w3-col m3">
				<img id="myImg7" src="<?=$room_img_sub7?>" style="width:100%" onclick="enlarge(this)" class="w3-hover-opacity" alt="공용 카페">
				</div>

				<div class="w3-col m3">
				<img id="myImg8" src="<?=$room_img_sub8?>" style="width:100%" onclick="enlarge(this)" class="w3-hover-opacity" alt="공용 대기실">
				</div>
				<button class="btn btn-primary" style="margin-top:64px;"><a href="reservation.php">예약하기</a></button>
			</div>
		</div> 


		<!-- The Modal -->
		<div id="myModal" class="modal">
			<span class="close">&times;</span>
			<img class="modal-content" id="img01">
		<div id="caption"></div>
		</div>

		<script>
		function enlarge(obj) {	
			var topMenu = document.getElementById('topMenu');
			var modal = document.getElementById('myModal');// 모달 div
			var img = document.getElementById(obj.id);// 원이미지
			var modalImg = document.getElementById("img01");// 모달 이미지 (확대 이미지)
			var captionText = document.getElementById("caption");// 캡션			
			topMenu.style.display = "none";
			modal.style.display = "block";
			modalImg.src = obj.src;
			captionText.innerHTML = obj.alt;
			

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() { 
				modal.style.display = "none";
				topMenu.style.display = "block";
			}
		}
		</script>


		<!-- end of  container -->
		


		<!-- footer 시작 -->
		<!-- <footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>Luxehotel</h4>
						<p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-3 colorlib-widget">
						<h4>Quick Links</h4>
						<p>
							<ul class="colorlib-footer-links">
								<li><a href="#">Accomodation</a></li>
								<li><a href="#">Dining &amp; Bar</a></li>
								<li><a href="#">Restaurants</a></li>
								<li><a href="#">Beach &amp; Resorts</a></li>
							</ul>
						</p>
					</div>
					<div class="col-md-3">
						<h4>Recents Blog Post</h4>
						<ul class="colorlib-footer-links">
							<li><a href="#">The Ultimate Packing List For Female Travelers</a></li>
							<li><a href="#">How These 5 People Found The Path to Their Dream Trip</a></li>
							<li><a href="#">A Definitive Guide to the Best Dining and Drinking Venues in the City</a></li>
						</ul>
					</div>

					<div class="col-md-3 col-md-push-1">
						<h4>Contact Information</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920">+ 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="http://luxehotel.com">luxehotel.com</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							<small class="block">Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart3" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							</small> 
							<small class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></small>
						</p>
					</div>
				</div>
			</div>
		</footer> -->
		

		<div class="gototop js-top">
			<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
		</div>
		
		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<!-- Flexslider -->
		<script src="js/jquery.flexslider-min.js"></script>
		<!-- Owl carousel -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- Magnific Popup -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<script src="js/magnific-popup-options.js"></script>
		<!-- Date Picker -->
		<script src="js/bootstrap-datepicker.js"></script>
		<!-- Main -->
		<script src="js/main.js"></script>

	</body>
</html>


