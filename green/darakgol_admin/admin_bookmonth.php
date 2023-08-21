<?
// session_start();
// if(!isset($_SESSION['adminnm'])){
// echo "잘못된 경로입니다.";
$adminnm = "다락골 초록원";
?>
<html>
<head>
	<meta charset="utf-8" />
	<!-- <link rel="icon" type="image/png" href="assets/img/favicon.ico"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>다락골초록원_관리자</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

<!-- w3.css-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

<style>
a {
    color: black;
}
a:hover {
    color: black;
}
</style>
<style>
	table{
		border-collapse: collapse;
		width:100%;
		max-width: 100%;
		text-align:center;
		border-spacing: 1;
		padding: 2;
	}
	tr,td {
			border-spacing: 5;
            padding: 10px 15px;
        }

/* table th, table td {padding: 0} */


	.bookred{
		background-color: #ffe6e6;
		border: 1px solid red;
		/* background: #5ee; */
	}
	.bookgreen{
		background-color: #ccffdd;
		border: 1px solid green;
	}
	.bookblue{
		background-color: #e6e6ff;
		border: 1px solid blue;
	}
</style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">

		    <div class="logo" style="text-align:center">
                <a href="../index.php"><img src="./img/logo1.gif" width="100" height="100" alt="메인로고" >
                </a>
            </div>

            <div class="logo">
                <a href="admin_reservation.php" class="simple-text">
                다락골초록원 admin
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="admin_reservation.php">
                        <i class="pe-7s-note2"></i>
                        <p>객실 예약 정보</p>
                    </a>
                    <ul>
                        <li>
                            <a href="admin_booklist.php">
                                <p>예약목록</p>
                            </a>
                        </li>
                        <li class="active">
                            <a href="admin_bookmonth.php">
                                <p>월별예약현황</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="admin_notice.php">
                        <i class="pe-7s-user"></i>
                        <p>공지 사항</p>
                    </a>
                </li>
    
                
            </ul>

    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">객실예약정보 </a> 
                </div>
                <div class="collapse navbar-collapse">
                   

                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="">
                    <p>안녕하세요! [<?=$adminnm?>님] 관리자페이지에 접속하셨습니다.</p></a>
                    </li>
                        <li>
                        <a href="sess_logout.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="w3-container w3-green">
                                <h3>월별예약현황</h3>
                            </div>
                            <div class="content table-responsive table-full-width">

					<?
	date_default_timezone_set('Asia/Seoul');

	$yy = isset($_REQUEST['yy']) ? $_REQUEST['yy'] : date('Y');
	$mm = isset($_REQUEST['mm']) ? $_REQUEST['mm'] : date('m');

	// global $room_name,$room_id;

	include "zdb_mysqli.php";
	$conn = dbconn();
	$query = "select * from room";
	$result = dbquery($conn,$query);
	$roomcount = mysqli_num_rows($result);
	if($roomcount != 0){
		for($i = 0; $i < $roomcount; $i++)
		{
			$row = dbfetch_array($result);
			$room_id[$i] = $row['room_id'];
			$room_name[$i] = $row['room_name'];
		}
	}	

	function sel_yy($yy, $func) {
		if($yy == '') $yy = date('Y');

		if($func=='') {
			$str = "<select name='yy' style='font-size:12pt'>\n<option value=''></option>\n";
		} else {
			$str = "<select name='yy' style='font-size:12pt' onChange='$func'>\n<option value=''></option>\n";
		}
		$gijun = date('Y');
		for($i=$gijun-3;$i<$gijun+3;$i++) {
			if($yy == $i) $str .= "<option value='$i' selected>$i</option>";
			else $str .= "<option value='$i'>$i</option>";
		}
		$str .= "</select>";
		return $str;
	}

	function sel_mm($mm, $func) {
		if($func=='') {
			$str = "<select width='10%' height='30'	name='mm' style='font-size:12pt'>\n";
		} else {
			$str = "<select name='mm' onChange='$func' style='font-size:12pt'>\n";
		}
		for($i=1;$i<13;$i++) {
			if($mm == $i) $str .= "<option value='$i' selected>{$i}</option>";
			else $str .= "<option value='$i'>{$i}</option>";
		}
		$str .= "</select>";
		return $str;
	}

	//해당하는 날짜에 room의 상태를 출력한다
	function get_schedule($conn,$dtstr,$room_name,$room_id) {
		$str="<br>";
		for($i=0; $i<9; $i++){
			$roomno = $room_name[$i];
			$roomid = $room_id[$i];
			if($dtstr >= date("Y-m-d")){
				$room_slist[$i] = "<a href='../reservation.php?date_from=$dtstr&room_id=$roomid' style='color:black'><span class='bookblue'>가</span>&nbsp; &nbsp; $roomno</a><br>";
				$room_status[$i] = 4; //4-예약가능 0-입금대기 1-예약완료
			}
			else{
				$room_slist[$i] = "<span'></span>";
				$room_status[$i] = 5; //4-예약가능 0-입금대기 1-예약완료
			}
		}

		$query = "SELECT *
				FROM reservation
				WHERE book_datefrom <= '$dtstr'
				AND book_dateto > '$dtstr'";
				//ORDER BY frdt, todt";
		//$ret = dbquery($sql) or die(mysql_error());
		$result = dbquery($conn,$query);
		
		$rowcount = mysqli_num_rows($result);
		$roomcount = count($room_id);
		if($rowcount != 0){
			for($i = 0; $i < $rowcount; $i++)
			{
				$row = dbfetch_array($result);
				for($j = 0; $j < $roomcount; $j++)
				{
					if($row['room_id'] == $room_id[$j]){
						$book_id = $row['book_id'];
						if($room_status[$j]==4){ //4-예약가능 0-입금대기 1-예약완료
							if($row['book_status']==1){
								$room_slist[$j] =  "<a href='admin_bookread.php?book_id=$book_id' style='color:black'><span class='bookred'>완</span><span style='color:black'>&nbsp; &nbsp; $room_name[$j]</a></span><br>";
								// $room_status[$j] = 1;
							}
							// else if($row['book_status']==0){
							else{
								$room_slist[$j] =  "<a href='admin_bookread.php?book_id=$book_id' style='color:black'><span class='bookgreen'>대</span><span style='color:black'>&nbsp; &nbsp; $room_name[$j]</a></span><br>";
								// $room_status[$j] = 0;
							}
						}
						else{  //room_status==5
							if($row['book_status']==1){
								$room_slist[$j] =  "<a href='admin_bookread.php?book_id=$book_id' style='color:black'><span class='bookred'>완</span><span style='color:black'>&nbsp; &nbsp; $room_name[$j]</a></span><br>";
								// $room_status[$j] = 1;
							}
							// else if($row['book_status']==0){
							else{
								$room_slist[$j] =  "<a href='admin_bookread.php?book_id=$book_id' style='color:black'><span class='bookgreen'>대</span><span style='color:black'>&nbsp; &nbsp; $room_name[$j]</a></span><br>";
								// $room_status[$j] = 0;
							}
						}
					}
				}
			}
		}	
		for($i=0; $i<9; $i++){
					$str .= $room_slist[$i];
		}
		$str .= "<font style='font-size:8pt;'>";
		$str .= "</font><br>";

		return $str;
	}


	// 1. 총일수
	$last_day = date("t", strtotime($yy."-".$mm."-01"));

	// 2. 시작요일 구하기
	$start_week = date("w", strtotime($yy."-".$mm."-01"));

	// 3. 총 몇 주인지 구하기
	$total_week = ceil(($last_day + $start_week) / 7);

	// 4. 마지막 요일 구하기
	$last_week = date('w', strtotime($yy."-".$mm."-".$last_day));
	?>
	<form name="form" method="get">
		<!-- <center> -->
		<table  bgcolor="#999999" border="1">
			<tr  style='font-size:18pt' bgcolor="#FFFFFF">
				<td colspan="7" cellpadding='8' cellspacing='10' align="center">
				<span>&nbsp; &nbsp;</span> <span >&nbsp; &nbsp; </span>
				<span><?=sel_yy($yy,'submit();')?>년 <?=sel_mm($mm,'submit();')?>월 예약현황</span></td>
			</tr>
			<tr  style='font-size:12pt' bgcolor="#FFFFFF">
				<td  colspan="7" cellpadding='1' cellspacing='1'  align="right">
				<span><?echo "Today : " . date("Y-m-d") ."   ";?></span>
			</tr>
			<tr  style='font-size:12pt' bgcolor="#FFFFFF">
				<td  colspan="7" cellpadding='1' cellspacing='1'  align="left">
				<span class="bookred">완</span>  <span > 예약완료 </span><span>&nbsp; &nbsp;</span>
				<span class="bookgreen">대</span><span > 입금대기 </span><span>&nbsp; &nbsp;</span>
				<span class="bookblue">가</span> <span > 예약가능</span>
			</tr>
			<tr height="10">
				<td width="10%" align="center" bgcolor="#DDDDDD" style="color:red"><b>일</b></td>
				<td width="10%" align="center" bgcolor="#DDDDDD"><b>월</b></td>
				<td width="10%" align="center" bgcolor="#DDDDDD"><b>화</b></td>
				<td width="10%" align="center" bgcolor="#DDDDDD"><b>수</b></td>
				<td width="10%" align="center" bgcolor="#DDDDDD"><b>목</b></td>
				<td width="10%" align="center" bgcolor="#DDDDDD"><b>금</b></td>
				<td width="10%" align="center" bgcolor="#DDDDDD"style="color:blue"><b>토</b></td>
			</tr>

<?
			$today_yy = date('Y');
			$today_mm = date('m');
			// 5. 화면에 표시할 초기값을 1로 설정
			$day=1;

			// 6. 총 주 수에 맞춰서 세로줄 만들기
			for($i=1; $i <= $total_week; $i++){?>
			<tr>
<?
		// 7. 총 가로칸 만들기
			  for ($j=0; $j<7; $j++){
?>
				<td width="10%"  align="left" valign="top" bgcolor="#FFFFFF">
<?
				// 8. 첫번째주이고 시작요일보다 $j가 작거나 마지막주이고 
				//    $j가 마지막 요일보다 크면 표시하지 않아야 하므로
				//    그 반대의 경우 -! 으로 표현-에만 날자를 표시한다.
				if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))){

				if($j == 0){
					// 9. $j== 0이면 일요일이므로 빨간색
					echo "<font color='#FF0000'><b>";
				}else if($j == 6){
					// 10. $j==6이면 토요일이므로 파란색
					echo "<font color='#0000FF'><b>";
				}else{
					// 11. 그외는 평일이므로 검정색
					echo "<font color='#000000'><b>";
				}

				// 12. 오늘 날짜면 굵은 글씨와 under_bar
				if($today_yy == $yy && $today_mm == $mm && $day == date("j")){
					echo "<b><u>$day</u>";
				}
				else echo $day;
				echo "</b></font> &nbsp;";

				//13. 스케줄 출력

				//str_pad — 문자열을 지정한 길이가 되도록 다른 문자열로 채웁니다
				$mm = str_pad($mm, 2, "0", STR_PAD_LEFT);
				$dd = str_pad($day, 2, "0", STR_PAD_LEFT);
				$dtstr = $yy."-".$mm."-".$dd;

				$schstr = get_schedule($conn,$dtstr,$room_name,$room_id);
				echo $schstr;
				// 14. 날짜 증가
					$day++;
			}
?>
			</td>
			<?}?>
		</tr>
		<?}?>
	</table> 
</center>
<?		
		dbclose($conn);
?>
</form>	
                            </div>
                             </div>
                    </div>


                    
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
               
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> 다락골 초록원
                </p>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
