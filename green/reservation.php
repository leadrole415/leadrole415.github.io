<?
		date_default_timezone_set('Asia/Seoul');
		$date_today  = date('Y-m-d');
		
		$date_from   = isset($_REQUEST['date_from']) ? $_REQUEST['date_from'] : date("Y-m-d");
		$date_to     = isset($_REQUEST['date_to']) ? $_REQUEST['date_to'] : $date_from;
		if(!empty($_REQUEST['people'])) $speople = $_REQUEST['people'];
		else {$speople = "2";}
		$people = explode(",",$speople);
		$pcnt = count($people);
		if($pcnt == 0) $person = "2";
		else $person = $people[0];


		$sroomno=$roomname="";
		if(isset($_REQUEST['room_id'])){
			$sroomno =  $_REQUEST['room_id'];
		} else {
			$sroomno =  "r1";
		}
		$sroom_id = explode(",",$sroomno);
		$sroomcnt = count($sroom_id);
		if($sroomcnt == 0) $sroomno =  "r1";
		$roomno = $sroom_id[0];
		

		// echo $date_from;
		// echo $date_to;
		$sendroomid=$roomno;

		if($date_from<$date_today){
			$date_from = $date_today;
			$date_to   = $date_from;
		}
		else if($date_from > $date_to){
			$diff      = $date_from;
			$date_from = $date_to;
			$date_to   = $date_from;
		}
		if($date_from == $date_to){
			$date_to = date("Y-m-d", strtotime($date_from."+1day"));		
		}

		$diff  = strtotime($date_to) - strtotime($date_from);
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$daynums = $days."박".($days+1)."일";

		// echo "<script><alert(".$date_from."-".$date_to.")></script>";
		// echo "<script><alert()></script>";

		include "zdb_mysqli.php";
		$conn = dbconn();

		// 룸에 대한정보
		// $room_name = array("1학년","2학년","3학년","4학년","5학년","6학년","숙직실","교장실","교감실");
		$room_id   = array("r1","r2","r3","r4","r5","r6","r7","r8","r9");
		$query = "select * from room";
		$result = dbquery($conn,$query);
		$roomcount = 0;
		$room_id = array();
		$roomcount = mysqli_num_rows($result);
		if($roomcount != 0){
			for($i = 0; $i < $roomcount; $i++)
			{
				$row = dbfetch_array($result);
				$room_id[$i] = $row['room_id'];
				$room_name[$i] = $row['room_name'];
				$room_maxperson[$i] = $row['room_maxperson'] ;
				$room_price[$i] = $row['room_price']; 
				$room_price1[$i] = $row['room_price1']; 
				$room_price2[$i] = $row['room_price2']; 
				$room_thumb[$i] = $row['room_img_thumb'];
				$room_status[$i] = "4";  //4:가능 0:입금대기 1:예약완료
				if($roomno==$room_id[$i]) $roomname=$room_name[$i];

			}
		}	


		if($pcnt < $roomcount) {
			for($i=0; $i < $roomcount; $i++){
				$people[$i] = $person;
			}
		}

		$query = "select * from roomoption";
		$result = dbquery($conn,$query);

		// 옵션정보 부대시설과 금액()
		$optcount = mysqli_num_rows($result);
		if($optcount != 0){
			for($i=0; $i < $optcount; $i++)
			{
				$row = dbfetch_array($result);
				$option_name[$i] = $row['option_name'];
				$option_price[$i] = $row['option_price']; 
				$option_num[$i] = $row['option_num']; 
			}	
		}

		// 선택된기간의 예약정보
		$query = "select * from reservation
				  where book_datefrom < '$date_to' 
				  and  book_dateto > '$date_from'";
		$result = dbquery($conn,$query);
		$rowcount=mysqli_num_rows($result);
		if($rowcount > 0){
			while($row = dbfetch_array($result)){
				for($i=0; $i<$roomcount; $i++){
					if($room_id[$i] == $row['room_id']){
						$room_status[$i] = ($row['book_status']==1) ? 1 : 0;
						// echo $row['room_id'];
					}
				}
			}	
		}

//		dbclose($conn);
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
		.main-text{
			width:100%;
			margin:0 auto;
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
		th{
			text-align:center;
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
        @media screen and (max-width: 480px) {
			#rTopmenu li a {
				width:80px;
			   } }
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
		.book_echo {
			margin-bottom:30px; 
			font-size: 18px;
		}	
		.unselect{
			/* color:lightgrey; */
			opacity: 0.7;
		}	
		.active_tr:hover {
			background-color: #f0f0f0;
			cursor:pointer;
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
							<li><a href="rooms.php">Rooms</a></li>
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
			   	<li style="background-image:url(images/01_01.jpg);">
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
	

		<div>	
	    <center>
			<div id="wrap">
            <div id="rTopmenu">
                <ul id="rList">
					<li>
                        <a href="reservation_guide.php?room_id=<?=$sendroomid?>" style="color:grey">예약안내</a>
					</li>
                    <li>
                        <a href="reservation_status.php" style="color:grey">예약현황</a>
                    </li>
                    <li>
                        <a href="reservation.php" style="color:#fff; background-color:#F96D00;">예약하기</a>
                    </li>
                    <li>
                        <a href="reservation_check.php" style="color:grey">예약확인</a>
                    </li>
                </ul>
            </div>
			</div>	
		<div id="colorlib-reservation">
			<div class="container">
				<div class="row">
					<div class="col-md-12 search-wrap">
						<form action="<?= $_SERVER["PHP_SELF"];?>" method="get" class="colorlib-form">
		              	<div class="row">
		                <div class="col-md-3">
		                  <div class="form-group">
		                    <label for="date_from">Check-in:</label>
		                    <div class="form-field">
		                      <!-- <i class="icon icon-calendar2"></i> -->
		                      <input  class="form-control" autocomplete="off" type="text" name ="date_from" id="date_from" readonly>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-3">
		                  <div class="form-group">
		                    <label for="date_to">Check-out:</label>
		                    <div class="form-field">
		                      <!-- <i class="icon icon-calendar2"></i> -->
		                      <input  class="form-control" autocomplete="off" type="text" name ="date_to" id="date_to" readonly>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-2">
		                  <div class="form-group">
		                    <label for="adults">People</label>
		                    <div class="form-field">
		                      <i class="icon icon-arrow-down3"></i>
							  <?  
								$str = "<select name='people' id='people' class='form-control'>\n";
								$person = ($people[0] >= 5)? 5:$people[0];
								for($i=1;$i<6;$i++) {
									if($person == $i){ 
										$str .= "<option value='$i' selected>{$i}";
									}
									else $str .= "<option value='$i'>{$i}";
									if($i==5){
										$str .= "+";
									}
									$str .= "</option>";
								}
								$str .= "</select>";
								echo $str;
							?>

		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-2">
		                  <div class="form-group">
		                    <label for="room">Room</label>
		                    <div class="form-field">
		                      <i class="icon icon-arrow-down3"></i>
							  <?  
							 	$str = "<select name='room_id' id='room_id' class='form-control'>\n";
								for($i=0;$i<$roomcount;$i++) {
									if($roomno == $room_id[$i]){ 
										$str .= "<option value='$room_id[$i]' selected>{$room_name[$i]}</option>";
										$roomname = $room_name[$i];
									}
									else $str .= "<option value='$room_id[$i]'>{$room_name[$i]}</option>";
								}
								$str .= "</select>";
								echo $str;
							?>
		                    </div>
		                  </div>
		                </div>
		                <div class="col-md-2">
		                  <input type="submit" name="submit" id="submit" value="Search" class="btn btn-primary btn-block">
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div id="colorlib-testimony" class="colorlib-light-grey">
			<div class="container">
				<div class="row">
					<div class="book_echo">
<?					
						$yoil = array("일요일","월요일","화요일","수요일","목요일","금요일","토요일");
						$yoil_f=$yoil[date('w',strtotime($date_from))];
						$yoil_t=$yoil[date('w',strtotime($date_to))];

						//  echo "<span><b style='color: red;'>$date_from </b>$yoil_f 부터 </span>";
						//  echo "<span><b style='color: red;'>$date_to </b>$yoil_t 까지 </span>";
						//  echo "<span><b style='color: red;'> (".$daynums.") </b>예약상황입니다.  </span>";
						//  echo "<span><b> (".$people.") </b> </span>";
						//  echo "<span><b> (".$roomname.") </b> </span>";
?>
					</div>
					<!-- <form name="RealFm" method="get" target="HiddenFrm" action="http://www.hwajinpension.com/psm/reserve/index.php?" onsubmit="return false;"> -->
					<!-- <form action="book_confirm.php" method="get" mode="" target=""> -->
						<form action="reservation_info.php" method="get" mode="" target="">
						<input type="hidden" name="date_from" id="book_datefrom">
						<input type="hidden" name="date_to" id="book_dateto">
						
						<table class="table text-center" id="tblRoom" bored="1">
							
						<tr>
							<th>선택</th>
							<th>이미지</th>
							<th align="center">객실명</th>
							<th>인원선택</th>
							<th>주중</th>
							<th>주말요금</th>
							<th>성수기요금</th>
							<th>예약상태</th>
						</tr>
						<?						
						 for($i=0; $i < $roomcount; $i++){
							if($room_status[$i]==4){   //4:가능 0:입금대기 1:예약완료
								$str = "<tr class='active_tr'>";
								// $str .= "<td onclick='event.cancelBubble = true;'>";
								$str .= "<td>";
								$str .= "<i class='fa fa-fw fa-check-square-o'><input type='checkbox' name='check_roomid[$i]' value='$room_id[$i]'";
								for($j=0; $j<$sroomcnt; $j++){
									if($sroom_id[$j]== $room_id[$i]){
										$str .= "checked";
									}
								}
								$str .= "></i>";
								$str .= "</td>";
								$str .= "<td><img src='$room_thumb[$i]' width='80px' ></td>";	
								}
							else{
								$str = "<tr class='unselect'>";
								$str .= "<td>";
								$str .= "<i class='fa fa-fw fa-check-square-o'><input type='checkbox' name='roomno' disabled ></i>";
								$str .= "</td>";
								$str .= "<td  class='unselect'><img src='$room_thumb[$i]' width='80px' ></td>";	
								}
							//people select...
							$pstr = "<select name='people[$i]'><option value=''></option>\n";
							for($j=1; $j<=$room_maxperson[$i]; $j++) {
								if($people[$i] == $j) $pstr .= "<option value='$j' selected>{$j}</option>";
								else $pstr .= "<option value='$j'>{$j}</option>";
							}
							$pstr .= "</select>";
													
							//	$roomno = $room_id[$i];
							$str .= "<td>$room_name[$i]</td>";	
							$str .= "<td>$pstr 명</td>";	
							$str .= "<td>";
							$str .= number_format($room_price[$i]);
							$str .= "</td>";
							$str .= "<td>";
							$str .= number_format($room_price1[$i]);
							$str .= "</td>";
							$str .= "<td>";
							$str .= number_format($room_price2[$i]);
							$str .= "</td>";
							if($room_status[$i]==1){
								$str .= "<td><span style='color: red;'>예약완료</span>";
							}else if($room_status[$i]==0){
								$str .= "<td onclick ='Javascript:'><span style='color: green;'>입금대기</span>";
							}else{ //$room_status==4
								$str .= "<td onclick ='Javascript:'><span style='color: blue;'>예약가능</span>";
							}
							$str .= "</td></tr>";
							echo $str;
						}
?>
						
						<!-- <tr><td></td><td></td><td></td>	<td></td><td></td><td></td><td></td><td></td>
						<td></td><td></td></tr> -->

						
						</table>
						<table class="table table-hover text-center" align=center bored="1">
						<caption>		원하는 옵션을 체크하면 함께 예약됩니다.</caption>
							<tr>
								<td><i class="fa fa-fw fa-check-square-o"><input type="checkbox" name="check_option[0]" id="" disabled></i></td>
								<td><b>부대시설명</b></td>
								<td>이용금액</td>
								<td>이용횟수</td>
							</tr>
							<tr class='active_tr'>
								<td><i class="fa fa-fw fa-check-square-o">
								<input type="checkbox" name="check_option[]" id="" value="<?=$option_name[0]?>"></i></td>
								<td><?=$option_name[0]?></td>
								<td><?=number_format($option_price[0])?></td>
								<td><?=$option_num[0]?></td>
							</tr>
							<tr class='active_tr'>
								<td><i class="fa fa-fw fa-check-square-o">
								<input type="checkbox" name="check_option[]" id="" value="<?=$option_name[1]?>"></i></td>

								<td><?=$option_name[1]?></td>
								<td><?=number_format($option_price[1])?></td>
								<td><?=$option_num[1]?></td>
							</tr>
							<tr>
								<td colspan='4'>
							<!-- <input type="submit" name="submit" id="submit" value="예약하기" class="btn btn-primary"> -->
							<button type="submit" class="btn btn-primary" onclick="CheckValue();" style="margin-top:64px;">예약하기</button>
								</td>
							</tr>
						</table>
						</form>
				</div>
				<div class="row">
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
	<script>
		$( function() {
			$.datepicker.regional['ko'] = {
			closeText: '닫기',
			prevText: '이전달',
			nextText: '다음달',
			currentText: '오늘',
			monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)',
			'7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
			monthNamesShort: ['1월','2월','3월','4월','5월','6월',
			'7월','8월','9월','10월','11월','12월'],
			dayNames: ['일','월','화','수','목','금','토'],
			dayNamesShort: ['일','월','화','수','목','금','토'],
			dayNamesMin: ['일','월','화','수','목','금','토'],
			weekHeader: 'Wk',
			dateFormat: 'yy-mm-dd',
			firstDay: 0,
			isRTL: false,
			showMonthAfterYear: true,
			yearSuffix: '',
			// showOn: 'both',
			minDate: 0,
			// buttonText: "달력",
			changeMonth: true,
			// changeYear: true,
			showButtonPanel: true,
			yearRange: 'c-1:c+2',
			};
			$.datepicker.setDefaults($.datepicker.regional['ko']);
		
			$("#date_from").val('<?= $date_from?>');	
			$("#date_to").val('<?= $date_to?>');	
			
			$( "#date_from" ).datepicker({
				onClose: function(selectedDate){
					$('#date_to').datepicker("option", "minDate", selectedDate);
				},
				onSelect: function(dateText,inst){
					$("#date_to").val(dateText);
					}
			});
			$( "#date_to" ).datepicker({
				onSelect: function(dateText,inst){
				}
			});


			$('.active_tr').on('click',function(e){
				if (event.target.type == 'checkbox') return;

				if($(this).find(":input").prop("checked")){
					$(this).find(":input").prop("checked",false);
				}else{
					$(this).find(":input").prop("checked",true);
				}
			});

		} );

	function CheckValue() {
		// 날짜 변경후 예약 검색하지 않았을 경우 ..날짜변경해서 submit..
		var dfrom = $('#date_from').val();
		var dto = $('#date_to').val();
		if(dfrom >= dto) dto = dfrom;
		$("#book_datefrom").val(dfrom);
		$("#book_dateto").val(dto);

		if (
			GetCheckBoxCheckedValues('chk') == ""
			&&
			GetCheckBoxCheckedValues('option') == ""

		) {
			alert("예약 할 객실 또는 부대시설옵션을 선택하세요.");
			return false;
		}

		//객실 예약없이 이용옵션만 선택하였음
		if (
			GetCheckBoxCheckedValues('chk') == ""
			&&
			GetCheckBoxCheckedValues('option') != ""
		) {
			return confirm("객실을 선택하지 않으셨습니다.");
		}


		if ($("#date_from").text() == $("#date_to").text()) {
			return confirm("출발일과 도착일이 같습니다. 다시 한번 확인하세요.");
		}
	}
	</script>



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

	

