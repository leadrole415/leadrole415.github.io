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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

<style>
{
    color: black;
}
a {
    color: black;
}
/* tr:hover {
    /* color: blue; */
    background-color: #ccffcc;
} */
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
                    <a href="admin_booklist.php">
                        <i class="pe-7s-note2"></i>
                        <p>객실 예약 정보</p>
                    </a>
                    <ul>
                        <!-- <li style="display:none"> -->
                        <li>
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
                    <a class="navbar-brand" href="#">객실 예약 정보</a>
                </div>
                <div class="collapse navbar-collapse">
                   

                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="">
                    <p>안녕하세요! [<?=$_SESSION['adminnm']?>님] 관리자페이지에 접속하셨습니다.</p></a>
                    </li>
                        <li>
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

        <?
        include 'zdb_mysqli.php';
        $conn = dbconn();
        $no=(isset($_GET['no']))? $_GET['no'] : 0;

        $date_today = date("Y-m-d");

        $page_size = 10; //한페이지 게시물 갯수
        $page_list_size = 10;

        $PHP_SELF = $_SERVER['PHP_SELF'];

        $query="select room_id,room_name from room";
        $result=dbquery($conn,$query);
        $i=0;
        while(list($room_id[$i],$room_name[$i])=dbfetch_array($result)){
            $i++;
        }
        $roomcnt = $i;

        $query="select count(*) from reservation where book_datefrom = '$date_today';";
        $count=dbquery($conn,$query);
        $result=dbfetch_row($count);
        $total_row=$result[0];
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="header">
                            <h5>오늘 입실팀은 <?=$total_row?>팀입니다.</h5>
                        </div>
        <div class="content table-responsive table-full-width">
        <table class="table table-hover">
            <tr>
                <th>입실</th>
                <th>퇴실</th>
                <th>객실명</th>
                <th>예약자</th>
                <th>전화번호</th>
            </tr>
            <tbody>
<?
        if($total_row!=0){
            $query="select book_id,room_id,book_dateto,book_name,book_mobile from reservation where book_datefrom = '$date_today';";
            $result=dbquery($conn,$query);
            while(list($book_id,$roomid,$book_dateto,$book_name,$book_mobile)=dbfetch_array($result)){
                for($i=0; $i<$roomcnt ;$i++){
                    if($room_id[$i]==$roomid){
                        $roomnm = $room_name[$i];
                        $i = $roomcnt;
                    }
                }
    
?>           
                <tr style = "cursor:pointer;" onClick = " location.href='admin_bookread.php?book_id=<?=$book_id?>'">
                    <td><?= $date_today ?></td>
                    <td><?= $book_dateto ?></td>
                    <td><?= $roomnm ?></td>
                    <td><?= $book_name ?></td>
                    <td><?= $book_mobile ?></td>
                </tr>
<?           
            }    
        }
?>
            </tbody>
        </table>

                            </div>
                        </div>
                    </div>

<?                            
        $query="select count(*) from reservation where book_dateto = '$date_today';";
        $count=dbquery($conn,$query);
        $result=dbfetch_row($count);
        $total_row=$result[0];
?>

    <div class="col-md-12">
        <!-- <div class="card card-plain"> -->
        <div class="card">
            <div class="header">
                <h5>오늘 퇴실팀은 <?=$total_row?>팀입니다.</h5>
            </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover">
            <tr>
                <th>입실</th>
                <th>퇴실</th>
                <th>객실명</th>
                <th>예약자</th>
                <th>전화번호</th>
            </tr>
            <tbody>
<?
        if($total_row!=0){
            $query="select book_id,room_id,book_datefrom,book_name,book_mobile from reservation where book_dateto = '$date_today';";
            $result=dbquery($conn,$query);
            while(list($book_id,$roomid,$book_datefrom,$book_name,$book_mobile)=dbfetch_array($result)){
                for($i=0; $i<$roomcnt ;$i++){
                    if($room_id[$i]==$roomid){
                        $roomnm = $room_name[$i];
                        $i = $roomcnt;
                    }
                }
?>           
                <tr style = "cursor:pointer;" onClick = " location.href='admin_bookread.php?book_id=<?=$book_id?>'">
                    <td><?= $book_datefrom ?></td>
                    <td><?= $date_today ?></td>
                    <td><?= $roomnm ?></td>
                    <td><?= $book_name ?></td>
                    <td><?= $book_mobile ?></td>
                </tr>
<?           
            }    
        }
?>
            </tbody>
        </table>

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
