


<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>다락골 초록원</title>
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

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<!--jQuery UI CSS파일-->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" type="text/css" />
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">


	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>

		 <style>
		a{
			color:grey;
		}	 
        body {
            margin: 0;
            padding: 0;
        }
        table{
			border-collapse: collapse;
			width:100%;
			max-width: 100%;
			text-align:center;
		
        }
        #wrap {
			padding: 100px 0 0;
			clear:both;
            width: 1170px;
            /* margin: 20px auto; */
        }

        #rHeader {
            /* margin-top: 30px; */
        }

        #rTopmenu {
            list-style: none;
            /* padding-top: 100px; */
        }

        #rList {
            height: 31px;
            padding: 0px;
            margin: 0px;
            border-bottom: 1px solid silver;
        }

        #rTopmenu li {
            display: inline;
        }
       
        #rTopmenu li a{
            background: rgb(255, 255, 255);
            border-bottom: 1px solid rgb(255, 255, 255);
            text-decoration: none;
            position: relative;
            float: left;
            width: 130px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            font-size: 14px;
            /* color: grey; */
            margin: 0px -1px -1px 0px;
            border-width: 1px;
            border-style: solid;
            border-color: rgb(210, 210, 210);
        }
		
		
		@media screen and (max-width: 480px) {
			#rTopmenu li a {
				width:80px;
			} 
		}
		
        .selected{
            color: black;
        }
		#select_list{
			text-align:center;
		}
        .alist{
			/* margin:0 auto; */
			width: 1170px;
			border-collapse: collapse;
        }
        .alist input{
            border-style:none;
			text-align:center;
			height: inherit;
        }
        #stitle{
            text-align: left;
            margin: 10px 0 10px;
        }
        #myForm {
            padding-top: 30px;
            clear: both;
        }

        .blist {
            width: 1170px;
            border-collapse: collapse;
            /* border-collapse:separate;
            border-spacing: 2px;
            border-color: gray;  */
        }
		.blist input{
			height: inherit;
		}
        tr,
        td {
            padding: 10px 15px;
        }

        .red {
            color: red;
        }

        .green {
            color: green;
            font-size: 0.8em;
        }

        .right {
            font-size: 0.8em;
            text-align: right;
        }

        textarea {
            width: 99%;
            border: 1px solid silver;
        }

        #submit {
            margin: 30px 0;
            text-align: center;
				}
		.sunmi{width: 100%; left: 0%;}
		.td1{width:16.6%;} 
		.td2{width:16.6%;}
		.td3{width:16.6%;}
		.td4{width:16.6%;}
		.td5{width:16.6%;}
		.td6{width:16.6%;}

		.main-text{
			width:100%;
			margin:0 auto;
		}

	</style>
<?	
include "db_info.php";

$query = "select * from room";
$rs = mysql_query($query,$conn);

?>


	</head>
	<body>
	<div class="colorlib-loader"></div>

<div id="page">
	<nav class="colorlib-nav" role="navigation">
		<div class="top-menu">
			<div class="container">
				<div class="row">
					<div class="col-xs-2">
						<div id="colorlib-logo"><a href="index.php"><img src="images/logo.png" width="80px" alt=""></a></div>
					</div>
					<div class="col-xs-10 text-right menu-1">
						<ul>
							<li ><a href="index.php">Home</a></li>
							<li class="has-dropdown">
								<a href="rooms-suites.html">Rooms</a>
							</li>
							<li><a href="do.html">Do</a></li>
							<li><a href="tour.php">Tour</a></li>
							<li><a href="info.html">Info</a></li> 
							<li class="active"><a href="reservation.php">Reservation</a></li>
							<li><a href="notice.php">Notice</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>	

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image:url(images/lavender.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text main-text">
				   				<div class="slider-text-inner slider-text-inner2 text-center">
								   <h2>Awesome days !!!</h2>
				   					<h1>Reservation</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
	
	<div width=100%>	
	<center>
			<div id="wrap" width=100%>
            <div id="rTopmenu" width=100%>
                <ul id="rList">
					<li>
                        <a href="reservation_guide.php" style="color:#fff; background-color:#F96D00;">예약안내</a>
                    </li>
                    <li>
                        <a href="reservation_status.php" style="color:grey">예약현황</a>
                    </li>
                    <li>
                        <a href="reservation.php" style="color:grey">예약하기</a>
                    </li>
                    <li>
                        <a href="reservation_check.php" style="color:grey">예약확인</a>
                    </li>
                </ul>
            </div>
			</div>	

		<div id="colorlib-testimony">
			<div class="container">
				<div class="row">
                    <table class="table text-center;" id="tblRoom">
                    <h4 id="stitle">&nbsp;&nbsp;객실안내</h4>
						<tr style="font-size:1.1em"  align="center" ><b>
							<td colspan='2' align="center" class="td1">객실명</th>
							<td class="td2">기준인원</th>
							<td class="td3">최대인원</th>
							<td class="td4">평일</th>
							<td class="td5">주말(금,토)</th>
							<td class="td6">성수기(07.15-08.15)</th></b>
                        </tr>
<?
while(list($room_id,$room_name,$room_maxperson,$room_price,$room_price1,$room_price2,$room_desc1,$room_desc2,$room_desc3,$room_img_main,$room_img_sub1,$room_img_sub2,$room_img_thumb,$room_img_sub3,$room_img_sub4,$room_img_sub5,$room_img_sub6,$room_img_sub7,$room_img_sub8)=mysql_fetch_array($rs)){
	$room_highperson = $room_maxperson + 5;
	// $room_high = $room_price + 50000;
?>					
                        <tr>
							<td colspan='2' align="center"><a href="roomDetail.php?room_id=<?=$room_id?>"><?=$room_name ?></a></td>
							<td><?=$room_maxperson?></td>
							<td><?=$room_highperson?></td>
							<td><?=number_format($room_price)?></td>
							<td><?=number_format($room_price1)?></td>
							<td><?=number_format($room_price2)?></td>
                        </tr>
<?
}
?>
					 </table>
                </div>
                <div class="row">
               
                <div class="col-md-7 col-md-push-5 sunmi">
											<article class="animate-box">
												<div class="blog-img" style="background-image: url(images/furniture-731449_640.jpg);"></div>
												<div class="desc">
													<div class="meta">
														
													</div>
													<h2><a href="#">01. 기본안내</a></h2>
													<span>+ 성수기:2018년 7월 15일 부터 2018년 8월 15일 까지 </span><br>
													<span>+ 입실하실 때 바베큐 이용시간 말씀해주세요.<br>
														&nbsp;&nbsp;&nbsp;바베큐 이용시간 : 오후9시까지   /   바베큐 숯불주문 : 오후5시~7시까지<br>
													 
													 + 조식이용시간은 오전8시부터 오전9시30분시까지 카페에서 이용하실 수 있습니다.<br>
													 + 방충망 및 유리창문을 꼭 닫아주시기 바랍니다. 벌레기피제가 필요하신 분들은 말씀해주세요.<br>
													 + 입실 하신 후에 집기류나 시설에 문제가 있다면 펜션지기에서 말씀해주세요.<br></span>
													 <span style="color:red;">+ 계좌번호 : 농협 0108772-831709(예금주:신옥연)</span>
													 

												</div>
											</article>
											<article class="animate-box">
												<div class="blog-img" style="background-image: url(images/desk-1081708_640.jpg);"></div>
												<div class="desc">
													<div class="meta">
														
													</div>
													<h2><a href="#">02. 유의사항</a></h2>
													<span>+ 예약하신후 전액 입금하셔야만 예약이 완료됩니다.<br>
														+ 입금은 예약자명으로 하시고 만약 예약자명과 다를시에는 전화를 주시면 예약이 됩니다.<br>
														+ 다른이용고객에게 불편함이 없도록 23시 이후에는 무분별한 음주 및 고성방가를 자제해 주시기 바랍니다.<br>
														+ 애완동물은 부득이 타객실 및 손님을 위해 동반을 중지하오니 양해바랍니다. (동물병원에 맡기시면 됩니다.)<br>
														+ 객실내 냄새가 심한 음식의 조리는 금하며 지정된 장소와 바베큐장을 이용해 주시기 바랍니다. (생선,육류구이 및 튀김,청국장 등)<br>
														+ 객실내 촛불 및 가스 절대 사용 금지입니다.<br>
														+ 미성년자는 부모님의 동의없이 펜션을 이용할 수 없습니다.<br>
														+ 쓰레기 배출시 음식물.소각용,재활용으로 구분하여 지정된 장소에 버려주시기 바랍니다.<br>
														+ 퇴실시 객실내의 사전점검을 받으시고 퇴실하시기 바랍니다.<br>
														+ 이용객의 부주의로 일어나는 사고에 대해서는 책임을 지지않습니다.</span>
												</div>
											</article>
											<article class="animate-box">
												<div class="blog-img" style="background-image: url(images/space-3197611_640.jpg);"></div>
												<div class="desc">
													<div class="meta">
														<!-- <p>
															<span>August 24, 2017 </span>
															<span>admin </span>
															<span><a href="#">0 Comments</a></span>
														</p> -->
													</div>
													<h2><a href="#">03. 환불기준</a></h2>
													<span><strong>+ 예약절차안내</strong><br>
														1. 원하시는 방을 예약달력창에 신청을 클릭해주세요.<br>
														2. 예약신청서를 작성해주세요.<br>
														3. 정해진 시간내에 입금해주시면 예약자에게 문자메세지와 이메일이 통보됩니다.<br><br>
							
							
														<strong>+ 환불안내</strong><br>
														- 당일취소는 환불이 없습니다.<br>
														- 1일전 취소시는 이용금액의 10% 환불<br>
														- 2일전 취소시는 이용금액의 20% 환불<br>
														- 3일전 취소시는 이용금액의 30% 환불<br>
														- 4일전 취소시는 이용금액의 40% 환불<br>
														- 5일전 취소시는 이용금액의 50% 환불<br>
														- 6일전 취소시는 이용금액의 60% 환불<br>
														- 7일전 취소시는 이용금액의 70% 환불<br>
														- 8일전 취소시는 이용금액의 80% 환불<br>
														- 9일전 취소시는 이용금액의 90% 환불<br>
														- 성수기 및 준성수기에는 10일전이라도 취소시엔 10%의 공제가 있습니다.</span>
												</div>
											</article>
										</div>
					
                

               </div>
			</div>
		</div>
	</center>
	</div>	


<div id="colorlib-subscribe" style="background-image: url(images/01_01.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<span><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i><i class="icon-star-full"></i></span>
						<h2>초록원의 소식을 이메일로 받기</h2>
						<p>지금 예약하고 50%할인된 가격으로 예약하세요</p>
						<form class="form-inline qbstp-header-subscribe">
							<div class="row">
								<div class="col-md-12 col-md-offset-0">
									<div class="form-group">
										<input type="text" class="form-control" id="email" placeholder="이메일을 입력하세요">
										<button type="submit" class="btn btn-primary">등록하기</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<footer id="colorlib-footer" role="contentinfo">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-3 colorlib-widget">
						<h4>다락골 초록원</h4>
						<!-- <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p> -->
						<!-- <p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p> -->
					</div>
					<div class="col-md-3 colorlib-widget">
						<!-- <h4>Quick Links</h4> -->
						<p>
							<ul class="colorlib-footer-links">
								<!-- <li><a href="#">Accomodation</a></li>
								<li><a href="#">Dining &amp; Bar</a></li>
								<li><a href="#">Restaurants</a></li>
								<li><a href="#">Beach &amp; Resorts</a></li>-->
							</ul>
						</p>
					</div>
					<div class="col-md-3">
						<!-- <h4>Recents Blog Post</h4> -->
						<ul class="colorlib-footer-links">
						<li>주소 : 경북 문경시 농암면 서재로 703번지</li>
						<li>TEL : 054.571.8388</a></li>
							<!-- <li><a href="#">A Definitive Guide to the Best Dining and Drinking Venues in the City</a></li> -->
						</ul>
					</div> 

					<div class="col-md-3 col-md-push-1">
						<!-- <h4>Contact Information</h4> -->
						<ul class="colorlib-footer-links">
							<li><a href="mailto:jsg1039@naver.com">jsg1039@naver.com</a></li>
							<li><a href="./darakgol_admin/admin_index.html">관리자 로그인</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							<small class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Back-end &#38; front-end 1조(김재연,김주연,박선미,박영주,신재순,장미경)
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	</body>
	
	 <!-- jQuery 기본 js파일-->
	 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	 <!-- jQuery UI 라이브러리 js파일-->
	 <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.min.js"></script>

	
	<!-- jQuery -->
	<!-- <script src="js/jquery.min.js"></script> -->
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
	<!-- <script src="js/bootstrap-datepicker.js"></script> -->
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>