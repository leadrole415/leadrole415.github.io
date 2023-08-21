<?
session_start();
if(!isset($_SESSION['adminnm'])){
echo "잘못된 경로입니다.";
?>
<meta http-equiv='refresh' content='2;url=admin_login.html'>
<?
exit;
}
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
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                    <a href="admin_booklist.php">
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
                    <p>안녕하세요! [<?=$_SESSION['adminnm']?>님] 관리자페이지에 접속하셨습니다.</p></a>
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
  <h4>예약내용 수정</h4>
</div>
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
$daynums = $days." 박 ".($days+1)." 일 ";

$query = "select * from room where room_id = '$room_id'";
$roomresult = dbquery($conn,$query);
$roomrow = dbfetch_array($roomresult);
$room_name = $roomrow['room_name'];

$allprice = $book_totalprice;
?>	
    <center>
    <form action='admin_bookupdate.php' method='get' class="w3-container" name="myform">
      <input type="hidden" name="book_id" id="" value = "<?=$book_id?>">
      <table class="table text-right;" id="tblRoom" bored="1">
        <tr>
            <th>객실명</th>
            <th>입실</th>
            <th>퇴실</th>
            <th>이용인원</th>
            <th>이용일수</th>
            <th colspan="2" style="text-align: center; ">적용일</th>
			<th style="text-align: right; ">이용요금</th>
            <th align="center">결제액</th>
            <th align="center">결제상태</th>
        </tr>
<?
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
        <tr>
            <td><?= $room_name ?></td>
            <td><?= $book_datefrom ?></td>
            <td><?= $book_dateto ?></td>
            <td><?= $book_people ?> 명 </td>
            <td><?= $daynums ?></td>
            <td>주중<br>
                주말<br>
                성수기</td>
            <td style="text-align: right; "><?= $wday ?> 일<br>
                <?= $wend ?> 일<br>
                <?= $wpeak ?> 일</td>
                <td style="text-align: right; ">
                <?= number_format($room_price1) ?> 원<br>
                <?= number_format($room_price2) ?> 원<br>
                <?= number_format($room_price3) ?> 원</td>
                <td style="text-align: right; ">
                <?= number_format($sum_pr1) ?> 원<br>
                <?= number_format($sum_pr2) ?> 원<br>
                <?= number_format($sum_pr3) ?> 원</td>
            <td align="center">
                <select name='book_status' style="background-color:#ccffdd;">
                    <? if($book_status==0) $str = "<option value=0 selected>입금대기</option>";
                       else $str = "<option value=0> 입금대기 </option>";
                       if($book_status==1) $str .= "<option value=1 selected>입금완료</option>";
                       else $str .= "<option value=1> 입금완료 </option>";
                    ?>
                    <?= $str?>
                </select>
            </td>
        </tr>
<tr>
					<th colspan="10">부대시설 이용옵션</th>
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
                    <td colspan="8" align="left"><?=$row['option_name']?></td>
                    <td align="right"><?=number_format($optsum_price)?> 원  </td>
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
                    <td colspan="8" align="left"><?=$row['option_name']?></td>
                    <td align="right"><?=number_format($option_price)?> 원  </td>
                    <td>&nbsp;</td>
                </tr>

<?            }
$total_price += $optsum_price;
?>	
    
				<tr>
					<td colspan="8" >총 금 액</td>
					<td style="text-align: right; "><?=number_format($total_price) ?> 원	</td>
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
        </tr>
        <tr>
            <td><?=$book_name?></td>
            <?
                if($book_account=="") $book_account = $book_name;
            ?>
            <td><input type="text" name="book_account" id="book_account" value="<?=$book_account?>"  style="background-color:#ccffdd;"></td>
            <td><?=$book_birth?></td>
            <td><?=$book_mobile?></td>
        </tr>
        <tr>
            <td>예약요청사항</td>
            <td colspan="2"><textarea style="width:100%;border:1;text-overflow:ellipsis;" rows=3 readonly><?=$book_comment?></textarea></td>
        </tr>
        <tr>
            <td colspan='3' align="center">
            <span><input type="button" value='되돌아가기' class="w3-button w3-green" style="width:120px" onclick='history.back(-1)'>&nbsp;&nbsp;</span>
            <span><input type="button" value="수정내용저장" class="w3-button w3-green" style="width:120px" onclick="chkform();"></span>
            </td>   
        </tr>
    </table>
    </form>
  </center>

<script>
    function chkform(){
        var target = document.getElementById('book_account');
		var tname = target.value;
		var regname = /^[가-힣]{2,4}|[a-zA-Z]{2,18}$/;

		if (!regname.test(tname))
		{
			alert("한글은 2 ~ 4글자\n영문은 Firstname(2 ~ 18글자)로 입력해 주세요.");
            target.value="";
			target.focus();
			return false;
		}else{
         document.myform.submit();
        }
    }
</script>
                                  

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
