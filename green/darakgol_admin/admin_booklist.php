<?
session_start();
$adminnm = "다락골 초록원";
$date_from = (!isset($_SESSION['date_from'])) ? date("Y-m-d"):($_SESSION['date_from']);
$date_to = (!isset($_SESSION['date_to'])) ? $date_from : ($_SESSION['date_to']);
$order = (!isset($_SESSION['order'])) ? "book_datefrom" : ($_SESSION['order']);
$no=(isset($_SESSION['no']))? $_SESSION['no'] : 0;

$no=(isset($_GET['no']))? $_GET['no'] : $no;
if(!empty($_GET['date_from'])) $no = 0;
$date_from=(isset($_GET['date_from']))? $_GET['date_from'] : $date_from;
$date_to=(isset($_GET['date_to']))? $_GET['date_to'] : $date_to;
$order=(isset($_GET['order']))? $_GET['order'] : $order;

$_SESSION['date_from'] = $date_from;
$_SESSION['date_to'] = $date_to;
$_SESSION['order'] = $order;
$_SESSION['no'] = $no;

$PHP_SELF = $_SERVER['PHP_SELF'];
$page_size = 10; //한페이지 게시물 갯수
$page_list_size = 10;


include 'zdb_mysqli.php';
$conn = dbconn();

$query="select room_id,room_name from room";
$result=dbquery($conn,$query);
$i=0;
while(list($room_id[$i],$room_name[$i])=dbfetch_array($result)){
    $i++;
}
$roomcnt = $i;

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
/* tr:hover {
    background-color: blue;
} */
.form-control{
    background-color: #ccffcc;
    cursor: default;
}
</style>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="assets/img/sidebar-5.jpg">

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

                <div class="form-group row">
                    <form action="<?= $_SERVER["PHP_SELF"];?>" method="get" id="myform">
                        <div class="col-sm-3">
                            <label for="date_from">시작일</label>
                            <input type="text" id="date_from" name="date_from" class="form-control"  autocomplete="off"  onkeydown="return false" >
                        </div>
                        <!-- <div class="col-xs-3"> -->
                        <div class="col-sm-3">
                            <label for="date_to">종료일</label>
                            <input type="text" id="date_to" name="date_to" class="form-control"  autocomplete="off" onkeydown="return false" >
                        </div>
                        <div class="col-sm-3">
                            <label for="date_to">결과 내 정렬순서</label><br>
                            <select name="order" form="myform"  class="form-control">
                                <option value="book_datefrom" <? if($order == "book_datefrom"){ ?> selected <? } ?>>입실날짜</option>
                                <option value="book_dateto" <? if($order == "book_dateto") {?> selected <? } ?>>퇴실날짜</option>
                                <option value="room_id" <? if($order == "room_id") {?> selected <? } ?>>객실명</option>
                                <option value="book_rdate" <? if($order == "book_rdate"){ ?> selected <? } ?>>예약일</option>
                                <option value="book_name" <? if($order == "book_name") {?> selected <? } ?>>예약자</option>
                                <option value="book_mobile" <? if($order == "book_mobile"){ ?> selected <? } ?>>전화번호</option>
                                <option value="book_status" <? if($order == "book_status") {?> selected <? } ?>>입금상태</option>
                            </select> 
                        </div>
                        <div class="col-sm-3">
                            <label for="submit">&nbsp;</label>
                            <input class="form-control w3-button w3-green" id="submit" type="submit" value="검색">
                        </div>
                    </form>                         
                </div>   


                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="w3-container w3-green">
                                <h3>예약목록</h3>
                            </div>

                            <!-- <p class="category">예약사항 작성,수정,삭제를 할 수 있습니다.</p> -->
                            <div class="content table-responsive table-full-width">

<?
//예약등록일
$query="select count(*) from reservation ";
$result=dbquery($conn,$query);
$row=dbfetch_array($result);
$total_no=$row[0];

$query = "select * from reservation 
          where book_datefrom >= '$date_from'
          and book_datefrom <= '$date_to'";
// echo $query;          
$result= dbquery($conn,$query);
$total_row=mysqli_num_rows($result);
// echo "<p style='text-align: right;'>검색예약수/총예약수: ".$total_row."&#8725;".$total_no."&nbsp;&nbsp;"."</p>";
$query = "select * from reservation 
          where book_datefrom >= '$date_from'
          and book_datefrom <= '$date_to'
          ORDER BY $order
          limit $no, $page_size";
//   echo $query;          
$result= dbquery($conn,$query);

?>
 <?
//음수일때 예외처리//
if($total_row <= 0){
    $total_row = 0;
}
//total_page는 0부터 시작하기때문에 페이지 갯수는 10/10=1  <--2페이지를 뜻함  //
$total_page= floor(($total_row -1) / $page_size);

$current_page=floor($no / $page_size);
?>


    <table class="table table-hover">
        <tr>
            <td colspan="7" style="text-align: right;">검색수 / 총예약수 : <?=$total_row?> &#8725; <?=$total_no?>&nbsp;&nbsp;</td>
        </tr>
        <tr style = "bgcolor:#e6fff2;">
            <th style="text-align: center; 'width=10%'">입실</th>
            <th style="text-align: center; 'width=10%'">퇴실</th>
            <th style="text-align: center; 'width=10%'">객실명</th>
            <th style="text-align: center; 'width=10%'">예약자</th>
            <th style="text-align: center; 'width=10%'">전화번호</th>
            <th style="text-align: center; 'width=10%'">예약일</th>
            <th style="text-align: center; 'width=10%'">입금상태</th>
       </tr> 
<?
        while($row=dbfetch_array($result)){
            $book_id = $row['book_id'];
            $book_rdate = $row['book_rdate'];
            $roomid = $row['room_id'];
            $book_datefrom = $row['book_datefrom'];
            $book_dateto = $row['book_dateto'];
            $book_person = $row['book_person'];
            $book_name = $row['book_name'];
            $book_mobile = $row['book_mobile'];
            $book_birth = $row['book_birth'];
            $book_totalprice = $row['book_totalprice'];
            $book_account = $row['book_account'];
            $book_status = ($row['book_status']==0) ? "대기":"완료";
            
            for($i=0; $i<$roomcnt ;$i++){
                if($room_id[$i]==$roomid){
                    $roomnm = $room_name[$i];
                    $i = $roomcnt;
                }
            }

?>
            <tr style = "cursor:pointer;" onClick = "location.href='admin_bookread.php?book_id=<?=$book_id?>'">
                <td style="text-align: center; "><?=$book_datefrom?></td>
                <td style="text-align: center; "><?=$book_dateto?></td>
                <td style="text-align: center; "><?=$roomnm?></td>
                <td style="text-align: center; "><?=$book_name?></td>
                <td style="text-align: center; "><?=$book_mobile?></td>
                <td style="text-align: center; "><?=$book_rdate?></td>
                <td style="text-align: center; "><?=$book_status?></td>

            </tr>


<?  }  ?>
           
        </table>
        <center>  <?

//페이지리스트 첫번째 페이지 구하기
// 0,10,20,30,40... 계산하는 방법 1 / 10=(int)0.1=0   을 뜻함 //
$start_page=(int)($current_page / $page_list_size) * $page_list_size;
//페이지리스트 마지막 페이지 구하기
//0부터 시작함. 첫번째 페이지 +9페이지 = 마지막페이지
$end_page=$start_page + $page_list_size -1;
if($total_page<$end_page) $end_page=$total_page;


if($start_page>= $page_list_size){
    $prev_list=($start_page-1) * $page_size;
    echo "<div class='w3-container'>
	<div class='w3-bar'><a href=\"$PHP_SELF?no=$prev_list\" class='w3-button'>«</a>";
  
} 


## 페이징
for($i = $start_page; $i <= $end_page; $i++){
    $page = $i * $page_size;  //페이지값을 넘버로 변환
    $page_num= $i + 1; //보여질 페이지 번호
    echo"<a href= \"$PHP_SELF?no=$page\" class='w3-button'>";
    if(($current_page+1)==$page_num) echo "<u>$page_num</u>";
    else echo "$page_num ";
    echo "</a>";
}


#다음 페이지 리스트가 필요할 때//총 페이지가 마지막 리스트 페이지보다 클때
if($total_page>$end_page){
    $next_list=($end_page+1)*$page_size;
    echo "<a href=\"$PHP_SELF?no=$next_list\" class='w3-button'>»</a>
	</div>
	
	</div>";
}

?>

</center>
   <br>
                         <!-- <center><a href='admin_notice_write.php'><button class="w3-button w3-teal w3-round-xlarge" >공지 글 쓰기</button></a></center> -->

                    
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



<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>

<script>
    $(function() {
        $("#date_from").val('<?= $date_from?>');	
			$("#date_to").val('<?= $date_to?>');	

        $("#date_from, #date_to").datepicker({
            monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
            monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
            closeText: '닫기',
            changeMonth: true,
            changeYear: true,
            nextText: '다음 달',
            prevText: '이전 달',
            dateFormat: 'yy-mm-dd',
            showMonthAfterYear: true,
			showButtonPanel: true,
            yearRange: 'c-1:c+2'
        });

        $( "#date_from" ).datepicker({
				onClose: function(selectedDate){
					$('#date_to').datepicker("option", "minDate", selectedDate);
				},
				onSelect: function(selectedDate,inst){
					$("#date_to").val(selectedDate);
					}
        });
    });


</script>

</body>
</html>
