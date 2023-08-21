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

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
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
                        <li class="active">
                            <a href="admin_booklist.php">
                                <p>예약목록</p>
                            </a>
                        </li>
                        <li>
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
                                <h4>예약내용 보기</h4>
                            </div>                           
                            <div class="content table-responsive table-full-width">

                            <?



    include 'zdb_mysqli.php';
    $conn = dbconn();
    $book_id=(isset($_GET['book_id']))? $_GET['book_id'] : 0;

    $PHP_SELF = $_SERVER['PHP_SELF'];

    $query="select * from reservation where book_id=$book_id";
    $result=dbquery($conn,$query);

	$bfire=$bcamp=0;
	list($book_id, $book_rdate, $book_datefrom, $book_dateto, $room_id, $book_people, $book_name, $book_mobile, $book_account, $book_birth, $book_fire, $book_camp, $book_comment, $book_status, $book_totalprice)=dbfetch_array($result);

    $diff = abs(strtotime($book_dateto) - strtotime($book_datefrom));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
    $daynums = $days."박 ".($days+1)."일";

    $query = "select * from room where room_id = '$room_id'";
    $roomresult = dbquery($conn,$query);
    $roomrow = dbfetch_array($roomresult);
    $room_name = $roomrow['room_name'];

    $wday=$wend=$wpeak=0; 
    $dayfrom = $book_datefrom;
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
        
        $query = "select * from room where room_id='$room_id'";
        $result = dbquery($conn,$query);
        $row = dbfetch_array($result);
        $room_name = $row['room_name']; 
        $room_price1 = $row['room_price']; //주중
        $room_price2 = $row['room_price1']; //주말
        $room_price3 = $row['room_price2']; //성수기 = 주말
        $sum_pr1 = $room_price1 * $wday;
        $sum_pr2 = $room_price2 * $wend;
        $sum_pr3 = $room_price3 * $wpeak;
        $sum_price = $sum_pr1 + $sum_pr2 + $sum_pr3;
        $total_price += $sum_price;
?>		

    <center>
    <table class="table text-right;" id="tblRoom" bored="1">
        <tr>
            <th>객실명</th>
            <th>입실</th>
            <th>퇴실</th>
            <th>인원</th>
            <th>기간</th>
            <th>적용일</th>
			<th align="right">요금</th>
            <th align="right">결제액</th>
            <th align="center">결제상태</th>
        </tr>
<?


    // 룸에 대한정보
    $total_price = 0;
    
    $query = "select * from room where room_id='$room_id'";
    $result = dbquery($conn,$query);
    $row = dbfetch_array($result);
    $room_name = $row['room_name']; 
    $room_price1 = $row['room_price']; //주중
    $room_price2 = $row['room_price1']; //주말
    $room_price3 = $row['room_price2']; //성수기 = 주말
    $sum_pr1 = $room_price1 * $wday;
    $sum_pr2 = $room_price2 * $wend;
    $sum_pr3 = $room_price3 * $wpeak;
    $sum_price = $sum_pr1 + $sum_pr2 + $sum_pr3;
    $total_price += $sum_price;
?>		
    <tr>
        <td><?= $room_name ?></td>
        <td><?= $book_datefrom ?></td>
        <td><?= $book_dateto ?></td>
        <td><?= $book_people ?>명 </td>
        <td><?= $daynums ?></td>
        <td>주중(<?= $wday ?>일)<br>
            주말(<?= $wend ?>일)<br>
            성수기(<?= $wpeak ?>일)</td>
        <td style="text-align: right; ">
            <?= number_format($room_price1) ?><br>
            <?= number_format($room_price2) ?><br>
            <?= number_format($room_price3) ?></td>
        <td style="text-align: right; ">
            <?= number_format($sum_pr1) ?><br>
            <?= number_format($sum_pr2) ?><br>
            <?= number_format($sum_pr3) ?></td>
        <td align="center"><?
                if($book_status==0)  echo "입금대기";
                else  echo "입금완료";
            ?></td>
    </tr>
<tr>
                <th colspan="9">부대시설 이용옵션</th>
            </tr>
<?
            $optsum_price = 0;
            $query = "select * from roomoption";
            $result = dbquery($conn,$query);
            $row = dbfetch_array($result);
            $option_price = $row['option_price']; 
            if($book_camp) {
                $optsum_price =  $option_price;
            ?>				
            <tr>
                <td colspan="7" align="left"><?=$row['option_name']?></td>
                <td align="right"><?=number_format($optsum_price)?>  </td>
                <td>&nbsp;</td>
            </tr>
            <?
            }
            $row = dbfetch_array($result);
            $option_price = $row['option_price']; 
            if($book_fire) {
                $optsum_price +=  $option_price;
            ?>				
            <tr>
                <td colspan="7" align="left"><?=$row['option_name']?></td>
                <td align="right"><?=number_format($option_price)?>  </td>
                <td>&nbsp;</td>
            </tr>

<?            }
            $total_price += $optsum_price;
?>	

            <tr>
                <td colspan="7" >총 금 액</td>
                <td style="text-align: right; "><?=number_format($total_price) ?>  </td>
                <td>&nbsp;</td>
            </tr>
        </table>

        <table class="table" bored="1">
            <caption><h5>예약자 정보</h5></caption>
            <tr>
                <th>예약자명</th>
                <th>입금자명</th>
                <th>생년월일</th>
                <th>연락처</th>
                <th>예약일</th>
            </tr>
            <tr>
                <td><?=$book_name?></td>
                <td><?=$book_account?></td>
                <td><?=$book_birth?></td>
                <td><?=$book_mobile?></td>
                <td><?=$book_rdate?></td>
            </tr>
            <tr>
                <td>예약요청사항</td>
                <td colspan="2"><textarea style="width:100%;border:1;text-overflow:ellipsis;" rows=3 readonly><?=$book_comment?></textarea></td>
            </tr>
        </table>

        <a href='admin_booklist.php'><button class="w3-button w3-green" >예약목록보기</button></a> &nbsp;&nbsp;
        <a href="admin_bookedit.php?book_id=<?=$book_id?>"><button class="w3-button w3-green">예약수정</button></a> &nbsp;&nbsp;
        <a href="admin_bookpredel.php?book_id=<?=$book_id?>"><button class="w3-button w3-green" onclick="if(!confirm('정말 삭제하시겠습니까?')){return false};">예약삭제</button></a>
        </center>









       	</div>

                   
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
