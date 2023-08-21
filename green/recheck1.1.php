<?
    include "../db_info.php";
    $book_name = $_POST['book_name'];
    $book_mobile = $_POST['book_mobile'];

    $query = "select count(*) from reservation where book_name='$book_name' and book_mobile='$book_mobile'";
    $result = mysql_query($query, $conn);
	$row = mysql_fetch_row($result);

    // if($row[0]>=1){
	// 	$query = "select * from reservation where book_name='$book_name' and book_mobile='$book_mobile'";
    //     $rs = mysql_query($query, $conn);
	// 	list($book_id, $book_rdate, $book_datefrom, $book_dateto, $room_id, $book_person, $book_name, $book_mobile, $book_account, $book_birth, $book_fire, $book_camp, $book_comment, $book_status, $book_totalprice)=mysql_fetch_array($rs);       
	// 	// echo $book_datefrom;
	// 	// echo $book_dateto;
	// 	// $from_date : check in date
	// 	// $to_date: check out date
	// 	$diff = abs(strtotime($book_dateto) - strtotime($book_datefrom));

    //     $years = floor($diff / (365*60*60*24));
    //     $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
	// 	$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	// 	// printf(" %d 박 %d 일\n",  $days, $days+1);
	// 	$daynums = $days."박".($days+1)."일";
		
	
	// 	$query = "select * from room where room_id = '$room_id'";
	// 	$roomresult = mysql_query($query,$conn);
	// 	$roomrow = mysql_fetch_array($roomresult);
	// 	// $room_id = $roomrow['room_id'];
	// 	$room_name = $roomrow['room_name'];

    // }else{
// ?>
    <!-- <script>
         alert("입력하신 정보와 일치하는 예약내역이 없습니다.");
         location.href="reservation_check.php";
     </script> -->
 <?		
   //  }
?> 

<!DOCTYPE HTML>
<html lang="ko">
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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

	<!--jQuery UI CSS파일-->
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
    <!-- jQuery 기본 js파일-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <!-- jQuery UI 라이브러리 js파일-->
    <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>

	<title>다락골 초록원</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        table{
            border-collapse: collapse;
        }
	
        #wrap {
			            padding: 100px 0 150px;
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
        
		#rList .selected{
            color: black;
			background-color : bisque;;
        }
				#select_list{
					/* text-align:center; */
				}
        .alist{
						width: 1170px;
						border-collapse: collapse;
        }
		.alist #tdtitle{
			background-color : #f2f2f2;
			text-align: center;

		}
        .alist input{
            border-style:none;
						text-align:center;
						height: inherit;
        }
        #stitle{
            text-align: left;
            margin: 30px 0 10px;
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
				
				@media screen and (max-width: 768px){
					#wrap{
						margin:0 auto;
					}
					.slist{
						text-align:center;
					}
					.alist{
						width: 760px;
						border-collapse: collapse;
					}

					.alist input{
						width:120px
					}
					#myForm{
						/* text-align:center; */
					}

					.blist {
						text-align:left;
            width: 760px;
						border-collapse: collapse;
            /* border-collapse:separate;
            border-spacing: 2px;
            border-color: gray;  */
					}
				

				}
    </style>

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<!-- <div class="top">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<p class="site">www.yoursitehere.com</p>
						</div>
						<div class="col-xs-8 text-right">
							<p class="num">Call: +01-123-456</p>
							<ul class="colorlib-social">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div> -->
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.php"><img src="images/logo.png" width="80px" alt=""></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="active"><a href="index.php">Home</a></li>
								<li class="has-dropdown">
									<a href="rooms-suites.html">Rooms</a>
									<!-- <ul class="dropdown">
										<li><a href="#">Web Design</a></li>
										<li><a href="#">eCommerce</a></li>
										<li><a href="#">Branding</a></li>
										<li><a href="#">API</a></li>
									</ul> -->
								</li>
								<li><a href="aminities.html">Do</a></li>
								<li><a href="dining-bar.html">Tour</a></li>
								<li><a href="about.html">Info</a></li> 
								<li><a href="bookdate.php">Reservation</a></li>
								<!-- <li><a href="blog.html">Q&amp;A</a></li> -->
								<li><a href="#">Notice</a></li>
								<!-- <li><a href="#">관리자 로그인</a></li> -->


							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(images/lavender.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner slider-text-inner2 text-center">
								   <h2>Awesome days !!!</h2>
									<h1>Reservation</h1>				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>
		<div>	
	    <center>
        <div id="wrap">
            <div id="rTopmenu">
                <ul id="rList">
                    <li>
                        <a href="#" style="color:grey">예약현황</a>
                    </li>
                    <li>
                        <a href="#" style="color:grey">예약하기</a>
                    </li>
                    <li>
                        <a href="reservation_check.php" class="selected">예약확인</a>
                    </li>
                </ul>
            </div>

            <div id="select_list">
                <div id="stitle"><b>고객님의 예약정보는 아래와 같습니다.</b></div>
				<div id="slist">
<?
	
	if($row[0]>=1){
		$query = "select * from reservation where book_name='$book_name' and book_mobile='$book_mobile'";
		$rs = mysql_query($query, $conn);
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

?>
			 <table class="alist" border="1">
                        <tr>
                            <td id="tdtitle">예약자</td>
                            <td><?= $book_name?></td>
                        </tr>
                        <tr>
							<td id="tdtitle">객실명</td>
							<td><?= $room_name ?></td>
						</tr>
						<tr>
						<td id="tdtitle">이용기간</td>
						<td><?=$book_datefrom."~".$book_dateto." (".$daynums.")"?></td>
						</tr>
						<tr>
							<td id="tdtitle">인원수</td>
							<td><?=$book_person?></td>
                        </tr>
						<tr>
							<td id="tdtitle">기타이용옵션</td>
                            <td>
                                <script>
                                   if(<?=$book_fire?>){
                                       document.write("숯불바베큐 ");
                                   }
                                   if(<?=$book_camp?>){
                                       document.write(" 캠프파이어");
                                   }
                                </script>
                            </td>
                        </tr>
                        <tr>
							<td id="tdtitle">결제금액</td>
							<td><?=$book_totalprice?> </td>
						</tr>
						<tr>
                            <td id="tdtitle">예약상태</td>
                            <td>
								<?=
								(($book_status)==1) ?  "예약확정" :  "예약대기";			
								?>
							</td>
						</tr>
						<tr>
                            <td id="tdtitle">요청사항</td>
                            <td><?= $book_comment?></td>
                        </tr>
                    </table><br><br>
<?
		}  
	    }else{
?>
		<script>
			 alert("입력하신 정보와 일치하는 예약내역이 없습니다.");
			 location.href="reservation_check.php";
		 </script>
<?		
	   }		
?>
                </div>
            </div>
        </div>
    </center>
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
							<li>경상북도 문경시 농암면 서재로 703번지 다락골 초록원</li>
							<li>054.571.8388</a></li>
							<li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
							<li><a href="#">관리자 로그인</a></li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 text-center">
						<p>
							<small class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart3" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small> 
							<small class="block">Demo Images: <a href="http://unsplash.com/" target="_blank">Unsplash</a></small>
						</p>
					</div>
				</div>
			</div>
		</footer>
	</div>

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

