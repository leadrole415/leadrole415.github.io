
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>green-객실예약프로그램</title>
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
		}
		
		input[type="text"]{
			height: inherit;
		}
		
		h4{
			text-align:left;
		}
        #wrap {
			padding-top: 100px;
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
		
		.col-md-6{
			width:100%;
			margin:0 auto;
		}
		
		#myForm {
            padding-top: 30px;
            clear: both;
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
	

<?
	// echo $_REQUEST['fdate'].$_REQUEST['tdate']."<br>";

		$dpeople = 4;	//defalut 4명
		$roomno = array("r1","r2","r3","r4","r5","r6","r7","r8","r9");
		$roomsize = count($roomno);	//room 갯수 9개


		$date_today  = date('Y-m-d');

		$date_from   = isset($_REQUEST['date_from']) ? $_REQUEST['date_from'] : date("Y-m-d");
		$date_to     = isset($_REQUEST['date_to']) ? $_REQUEST['date_to'] : $date_from;

		if($date_from == $date_to){
			$date_to = date("Y-m-d", strtotime($date_from."+1day"));		
		}
		
		//배열이 아니면 
        if((isset($_REQUEST['people'])) && (!empty($_REQUEST['people']))){
			if(is_array($_REQUEST['people'])) {
				$people = $_REQUEST['people'] ;
				foreach($people as $key => $value) {
					$people[$key] = $value;
					// echo "people[$key] = $value  ";
				}
			} else{
				for($i=0; $i<$roomsize; $i++){
					$people[$i] = $_REQUEST['people'] ;
					// echo "people[$key] = $value  ";
				}
	
			}
			
		}
		else {
			for($i=0; $i<$roomsize; $i++){
				$people[$i] = $dpeople ;
			}
		}
		$speople="";
		for($i=0; $i<$roomsize; $i++){
			$speople .= $people[$i] ;
			$speople .= "," ;
		}

		
		$roomcnt = 0;
		$sroomid="";
		if(!empty($_REQUEST['check_roomid'])){
			$roomid = ($_REQUEST['check_roomid']);
			foreach($roomid as $key => $value) {
				$room_id[$roomcnt++] = $value;
				if($roomcnt==0) $sroomid = $value;
				else $sroomid .= ",$value";
			}
		}

		$sendt = "?date_from=$date_from";
		$sendt .= "&date_to=$date_to";
		$sendt .= "&people=$speople";
		$sendt .= "&room_id=$sroomid";
		if($roomcnt==0){
?>
			<script> 
				alert('예약할 객실을 선택하지 않았습니다.');
				location.href="reservation.php<?=$sendt?>"; 
			</script>
<?
		}
		$optioncnt = 0;
		$option_name="";
		if(!empty($_REQUEST['check_option'])){
			$check_option = ($_REQUEST['check_option']);
			foreach($check_option as $key => $value) {
				$option_name[$optioncnt++] = $value;
				// echo "$key = $value";
			}
		}


		$diff  = abs(strtotime($date_to) - strtotime($date_from));
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		$days  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
		$daynums = $days."박 ".($days+1)."일";
		if($diff==0){
			$sendt = "?date_from=$date_from";
			$sendt .= "&date_to=$date_to";
			$sendt .= "&people=$speople";
			$sendt .= "&room_id=$sroomid";
	?>
			<script> 
				alert('예약날짜를 확인하세요.');
				location.href="reservation.php<?=$sendt?>"; 
			</script>
<?
		}
?>

		<div width=100%>	
	    <center>
			<div id="wrap" width=100%>
            <div id="rTopmenu" width=100%>
                <ul id="rList">
					<li>
                        <a href="reservation_guide.php?room_id=<?=$sendroomid?>" style="color:grey">예약안내</a>
                    </li>
                    <li>
                        <a href="reservation_status.php" style="color:grey">예약현황</a>
                    </li>
                    <li>
                        <a href="reservation.php<?$sendt?>" style="color:#fff; background-color:#F96D00;">예약하기</a>
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
						
				<table class="table text-center;" id="tblRoom" bored="1">
				<caption><h4>선택객실목록</h4></caption>	
					<tr><b>
						<td>객실명</td>
						<td>CHECK_IN</td>
						<td>CHECK OUT</td>
						<td>이용인원</td>
						<td>이용일수</td>
						<td colspan="2" style="text-align: center; ">적용일</td>
						<td style="text-align: right; ">적용요금</td>
					</b></tr>
<?
		include "zdb_mysqli.php";
		$conn = dbconn();

		$wday=$wend=$wpeak=0; 
		$dayfrom = $date_from;
		$peakfrom = "2018-07-15";   //성수기시작일
		$peakto = "2018-08-15";		//성수기시작일

		for($i=0; $i<$days; $i++){
			$week = date("w",strtotime("$dayfrom"));
			if($dayfrom>=$peakfrom && $dayfrom<=$peakto) $wpeak++;
			else{
				if($week==5 || $week==6) $wend++;
				else $wday++;
			}
			$dayfrom = date("Y-m-d", strtotime($dayfrom."+1day"));
		}




		// 룸에 대한정보
		$total_price = 0;
		for($i=0; $i<$roomcnt; $i++)
		{
			$roomid = $room_id[$i];
			$query = "select * from room where room_id='$roomid'";
			$result = dbquery($conn,$query);
			$row = dbfetch_array($result);
			$room_name = $row['room_name']; 
			$room_price1 = $row['room_price']; //주중
			$room_price2 = $row['room_price1']; //주말
			$room_price3 = $row['room_price2']; //성수기 = 주말
			$sum_pr1 = $room_price1 * $wday;
			$sum_pr2 = $room_price2 * $wend;
			$sum_pr3 = $room_price3 * $wpeak;
			$sum_price[$i] = $sum_pr1 + $sum_pr2 + $sum_pr3;
			$total_price += $sum_price[$i];

			//roomid와 같은 roomno의 index가져와서 people결정
			for($id=0; $id<$roomsize; $id++){
				if($roomid == $roomno[$id]){
					$person = $people[$id];
				}
			}
			if($i==0){
				$get_roomid = $roomid;
				$get_people = $person;
				$get_sumprice = $sum_price[$i];
			}else{
				$get_roomid .= "," . $roomid;
				$get_people .= "," . $person;
				$get_sumprice .= "," . $sum_price[$i];
			}

?>					
				<tr>
					<td><?= $room_name ?></td>
					<td><?= $date_from ?></td>
					<td><?= $date_to ?></td>
					<td><?= $person ?> 명</td>
					<td><?= $daynums ?></td>
					<td>주중<br>
						주말<br>
					    성수기</td>
					<td style="text-align: right; "><?= $wday ?> 일<br>
						<?= $wend ?> 일<br>
					    <?= $wpeak ?> 일</td>
						<td style="text-align: right; ">
						<?= number_format($sum_pr1) ?> 원<br>
						<?= number_format($sum_pr2) ?> 원<br>
						<?= number_format($sum_pr3) ?> 원</td>
				</tr>
<?		}?>				
				<tr>
					<th colspan="9">부대시설 이용옵션</th>
				</tr>
<?
		if($optioncnt!=0){
			$get_option="";
			for($i=0; $i<$optioncnt; $i++){
				$query = "select * from roomoption where option_name = '$option_name[$i]' ";
				$result = dbquery($conn,$query);
				$row = dbfetch_array($result);
				$option_id[$i] = $row['option_id'];
				$option_name[$i] = $row['option_name'];
				$option_price[$i] = $row['option_price']; 
				$option_num[$i] = $row['option_num']; 
				if($i==0){
					$get_option = $option_id[$i];
				}else{
					$get_option .= "," . $option_id[$i];
				}
				$optsum_price[$i]=  $option_price[$i];
				$total_price += $optsum_price[$i];
	?>	
				<tr>
					<td colspan="6"><?=$option_name[$i]?></td>
					<td style="text-align: right; "><?=number_format($option_price[$i]) ?> 원	</td>
					<td style="text-align: right; "><?=number_format($optsum_price[$i]) ?> 원	</td>
				</tr>
<?  		} //for($i=0; $i<$optioncnt; $i++) ?>
					
<?  	} //if($optioncnt!=0) ?>					
				<tr>
					<td colspan="7" >총 금 액</td>
					<td style="text-align: right; "><?=number_format($total_price) ?> 원	</td>
				</tr>
			</table>

<?
// echo "get_roomid = $get_roomid <br>";
// echo "get_people = $get_people <br>";
// echo "get_sumprice = $get_sumprice <br>";
// echo "book_fire = $book_fire <br>";
// echo "book_camp = $book_camp <br>";
// echo $get_option;

?>

			<!-- <form action="" method="POST" id="myForm"> -->
			<!-- <form action="book_datasave.php" method="get"> -->
			<form action="reservation_save.php" method="post">
				<input type="hidden" name="date_from" value="<?= $date_from?>">
				<input type="hidden" name="date_to" value="<?= $date_to?>">
				<input type="hidden" name="room_id" value="<?= $get_roomid?>">
				<input type="hidden" name="people" value="<?= $get_people?>">
				<input type="hidden" name="sum_price" value="<?= $get_sumprice?>">
				<input type="hidden" name="option_id" value="<?= $get_option?>">
				<input type="hidden" name="total_price" value="<?= $total_price?>">

                <table class="table" id="tblRoom" bored="1">
					<h4 id="stitle">예약자 정보</h4>
                    <tr>
                        <td>예약자명
                            <span class="red">*</span>
                        </td>
                        <td>
                            <input type="text" name="name" id="name">
                            <span class="green">
                                <img src="star.png" width="10px" alt=""> 예약자 실명을 입력하세요. 예약확인시 혼동이 될 수 있습니다.</span>
                        </td>
                    </tr>
                    <tr>
                        <td>생년월일
                            <span class="red">*</span>
                        </td>
                        <td>
                            <input type="text" name="birthday" id="testDatepicker" autocomplete=off readonly>
                            <!-- <span class="green"> 예)800722</span> -->
                        </td>
                    </tr>
                    <tr>
                        <td>연락처
                            <span class="red">*</span>
                        </td>
                        <td>
                            <select name="phone1" id="phone1">
                                <option value="010" selected>010</option>
                                <option value="011">011</option>
                                <option value="016">016</option>
                                <option value="017">017</option>
                                <option value="018">018</option>
                                <option value="019">019</option>
                            </select> -
                            <input type="text" name="phone2" id="phone2" maxlength="4" size="5"> -
                            <input type="text" name="phone3" id="phone3" maxlength="4" size="5">
                            <span class="green">
                                <img src="star.png" width="10px" alt=""> 예약관련 정보가 문자메세지로 전송됩니다.</span>
                        </td>
                    </tr>
                    <tr>
                        <td>예약요청사항</td>
                        <td>
                            <span class="green">
                                <img src="star.png" width="10px" alt=""> 기타 펜션측에 요청하실 사항을 입력하세요.</span>
                            <br>
                            <textarea type="text" name="comment" id="" cols="50" rows="5" maxlength="250"></textarea>
                            <br>
                            <p class="right">0/250 bytes (최대 한글 125자, 영문 250자</p>
                        </td>
                    </tr>
                </table>
                <div id="submit">
					<a href='reservation.php<?=$sendt?>'><button type="button" class="btn btn-primary">이전</button></a> &nbsp;&nbsp;
					<button type="reset"  class="btn btn-primary">취소</button> &nbsp;&nbsp;
					<button type="submit" class="btn btn-primary" onclick="return CheckValue();">예약</button>
                </div>
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
		
			
			


	function CheckValue() {

        //이름의 유효성 검사
		var nametext = document.getElementById("name");
		var name = nametext.value;
		var regname = /^[가-힣]{2,4}|[a-zA-Z]{2,18}$/;

		if (!regname.test(name))
		{
			alert("공백없이 한글은 2 ~ 4글자\n영문은 2 ~ 18글자로 입력해 주세요.");
			nametext.value = "";
			nametext.focus();
			return false;
		} 
		
		//생년월일 유효성 검사
		var birth = document.getElementById("testDatepicker").value;
		var year = Number(birth.substr(0,4)); 
		var month = Number(birth.substr(5,2));
		var day = Number(birth.substr(8,2));
		var today = new Date(); // 날자 변수 선언
		var yearNow = today.getFullYear();
		var adultYear = yearNow-20;
 
		if(!regname.test(birth)){
 
			if (year < 1900 || year > adultYear){
				alert("생년월일 년도를 확인하세요. "+adultYear+"년생 이전 출생자만 등록 가능합니다.");
				return false;
			}
			if (month < 1 || month > 12) { 
				alert("달은 1월부터 12월까지 입력 가능합니다.");
				return false;
			}
			if (day < 1 || day > 31) {
				alert("일은 1일부터 31일까지 입력가능합니다.");
				return false;
			}
			if ((month==4 || month==6 || month==9 || month==11) && day==31) {
				alert(month+"월은 31일이 존재하지 않습니다.");
				return false;
			}
			if (month == 2) {
				var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
				if (day>29 || (day==29 && !isleap)) {
					alert(year + "년 2월은  " + day + "일이 없습니다.");
					return false;
				}
			}
		}



        //전화번호의 유효성 검사
		var phone2text = document.getElementById("phone2");
		var phone2 = phone2text.value;
		var regphone2 = /^[0-9]{3,4}$/;
		if (!regphone2.test(phone2))
		{
			alert("전화번호를 제대로 입력하세요");
			phone2text.value = "";
			phone2text.focus();
			return false;
		} 
        //전화번호의 유효성 검사
		var phone3text = document.getElementById("phone3");
		var phone3 = phone3text.value;
		var regphone3 = /^[0-9]{3,4}$/;
		if (!regphone3.test(phone3))
		{
			alert("전화번호를 제대로 입력하세요");
			phone3text.value = "";
			phone3text.focus();
			return false;
		} 
		
	}

	 $(function () {
           
		   $("#testDatepicker").datepicker({
			   closeText: '닫기',
			   showButtonPanel: true,
			   changeMonth: true,
			   changeYear: true,
			   nextText: '다음 달',
			   prevText: '이전 달',
			   dateFormat: 'yy-mm-dd',
			   showMonthAfterYear: true,
			   yearRange: "1920:2018",
			   defaultDate: '1980-01-01'
		   });
	   });
	   
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

	

