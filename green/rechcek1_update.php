<?
	include "db_info.php";
	$book_name = $_POST['book_name'];
	$book_mobile = $_POST['book_mobile'];

	$query = "select count(*) from reservation where book_name='$book_name' and book_mobile='$book_mobile'";

	$result = mysql_query($query, $conn);
	$row = mysql_fetch_row($result);
?>


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
			
			/* text-align:center; */
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
		.tdtitle{
				text-align : center;
				border :1px solid #ddd;
				}
				.table .tdin{
					padding: 8px 8px 8px 30px ;
					border :1px solid #ddd;
					
				}

		.main-text{
			width:100%;
			margin:0 auto;
		}
</style>
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
							<li><a href="index.php">Home</a></li>
							<li class="has-dropdown">
								<a href="rooms.php">Rooms</a>
							</li>
							<li><a href="do.html">Do</a></li>
							<li><a href="tour.html">Tour</a></li>
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
                        <a href="reservation_guide.php" style="color:grey">예약안내</a>
                    </li>
                    <li>
                        <a href="bookstatus.php" style="color:grey">예약현황</a>
                    </li>
                    <li>
                        <a href="reservation.php" style="color:grey">예약하기</a>
                    </li>
                    <li>
                        <a href="reservation_check.php" style="color:#fff; background-color:#F96D00;">예약확인</a>
                    </li>
                </ul>
            </div>
			</div>	

		<div id="colorlib-testimony">
			<div class="container">
				<div class="row">
				<table id="tblRoom">
						<tr>
							<td>고객님의 예약정보는 아래와 같습니다.</td>
						</tr>
				</table>	
<?
	$bfire=$bcamp=0;
	
	if($row[0]>=1){
		$query = "select * from reservation where book_name='$book_name' and book_mobile='$book_mobile'";
		$rs = mysql_query($query, $conn);

		$allprice = 0;
		while(list($book_id, $book_rdate, $book_datefrom, $book_dateto, $room_id, $book_person, $book_name, $book_mobile, $book_account, $book_birth, $book_fire, $book_camp, $book_comment, $book_status, $book_totalprice)=mysql_fetch_array($rs)){

			$diff = abs(strtotime($book_dateto) - strtotime($book_datefrom));
			$years = floor($diff / (365*60*60*24));
			$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
			$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
			$daynums = $days."박".($days+1)."일";

			$query = "select * from room where room_id = '$room_id'";
			$roomresult = mysql_query($query,$conn);
			$roomrow = mysql_fetch_array($roomresult);
			$room_name = $roomrow['room_name'];
		
			
			if($book_fire) $bfire=1;
			if($book_camp) $bcamp=1;
			$allprice += $book_totalprice;
?>					
                    <table class="table" id="tblRoom" >
						<tr>
							<td class="tdtitle">예약자</td>
							<td class="tdin"><?= $book_name ?></td>
                        </tr>
                        <tr>
							<td class="tdtitle">객실명</td>
							<td class="tdin"><?= $room_name ?></td>
						</tr>
						<tr>
							<td class="tdtitle">이용기간</td>
							<td class="tdin"><?= $book_datefrom."~".$book_dateto."(".$daynums.")" ?></td>
						</tr>
						<tr>
							<td class="tdtitle">인원수</td>
							<td class="tdin"><?= $book_person?></td>
						</tr>
						<tr>
                            <td class="tdtitle">요청사항</td>
                            <td class="tdin"><?= $book_comment?></td>
						</tr>
						<tr>
                        <td class="tdtitle">예약상태</td>
                        <td class="tdin">
								<?=
								(($book_status)==1) ?  "예약확정" :  "예약대기";			
								?>
						</td>
						</tr>
					</table><br>
<?
		}  
		
	    }else{
			// echo $book_name.$book_mobile;
?>
		
		<script>
			 alert("입력하신 정보와 일치하는 예약내역이 없습니다.");
			 location.href="reservation_check.php";
		 </script>
		 
<?		
		exit;
	   }	

?>
	     
       <table class="table" id="tblRoom">
	   <tr>
			<td class="tdtitle" width=22.8%>기타이용옵션</td>
			<td class="tdin">
				<?
				$query = "select * from roomoption";
				$result = mysql_query($query,$conn);
				$row = mysql_fetch_array($result);
				$option_price['camp'] = $row['option_price']; 
				$row = mysql_fetch_array($result);
				$option_price['fire'] = $row['option_price']; 


                if($bcamp){
					$allprice += $option_price['camp'];
					echo " 캠프파이어";}
                if($bfire){
					$allprice += $option_price['fire'];
					echo "숯불바베큐 ";}
                ?>
            </td>
        </tr>
		<tr>
			<td class="tdtitle">총결제금액</td>
			<td class="tdin"><?=number_format($allprice)?> 원</td>
		</tr>
		</table>			
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
</html>

	

