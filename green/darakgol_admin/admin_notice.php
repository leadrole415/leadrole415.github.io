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
                <li>
                    <a href="admin_reservation.php">
                        <i class="pe-7s-note2"></i>
                        <p>객실 예약 정보</p>
                    </a>
                </li>
                <li class="active">
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
                    <a class="navbar-brand" href="#">공지사항 </a> 
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
                            <div class="header">
                                <h4 class="title">공지사항 리스트</h4>
                                <p class="category">공지사항 작성,수정,삭제를 할 수 있습니다.</p>
                            </div>
                            <div class="content table-responsive table-full-width">

                            <?
include 'db_info.php';
$no=(isset($_GET['no']))? $_GET['no'] : 0;



$page_size = 10; //한페이지 게시물 갯수
$page_list_size = 10;

$PHP_SELF = $_SERVER['PHP_SELF'];

$query = "select * from notice ORDER BY notice_id DESC limit $no, $page_size";

$result= mysql_query($query,$conn);


$query="select count(*) from notice";
$count=mysql_query($query,$conn);
$result1=mysql_fetch_row($count);

$total_row=$result1[0];
echo "<p style='text-align: right;'>총 공지 수: ".$total_row."</p>";?>
 <?
//음수일때 예외처리//
if($total_row <= 0){
    $total_row = 0;
}
//total_page는 0부터 시작하기때문에 페이지 갯수는 10/10=1  <--2페이지를 뜻함  //
$total_page= floor(($total_row -1) / $page_size);

$current_page=floor($no / $page_size);

?>


                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th style="text-align: center;" width="10%">No</th>
                                    	<th style="text-align: center;">제목</th>
                                    	<th style="text-align: center;" width="15%">쓴 날짜</th>
                                                                        </thead>
                                    <tbody>
                                    <?
          while(list($notice_id,$notice_title,$notice_content,$notice_wdate)=mysql_fetch_array($result)){
              ?>
<tr style = "cursor:pointer;" onClick = " location.href='admin_notice_read.php?notice_id=<?=$notice_id?>'">
    <td style="text-align: center;"><?=$notice_id?></a></td>
    <td><?=$notice_title?></a></td>
    <td style="text-align: center;"><?=$notice_wdate?></a></td>

</tr>
              <?
          }
          ?>
                                    </tbody>
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
    echo "$page_num ";
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
                         <center><a href='admin_notice_write.php'><button class="w3-button w3-teal w3-round-xlarge" >공지 글 쓰기</button></a></center>

                    
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
