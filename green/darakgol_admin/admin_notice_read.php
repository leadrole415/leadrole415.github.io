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
                <a href="#" class="simple-text">
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
$notice_id=$_GET['notice_id'];
include 'db_info.php';
$query="select * from notice where notice_id='$notice_id'";
$result=mysql_query($query,$conn);
list($notice_id, $notice_title, $notice_content, $notice_wdate)=mysql_fetch_array($result);
?>


                                <table class="w3-table-all w3-hoverable">
                                    <tr class="w3-light-grey">
                                    <td width='2.5%'>No</td>
        <td width='2.5%'><?=$notice_id?></td>
        <td width='95%'><?=$notice_title?></td></tr></table>
        <div style="text-align: justify;">
        <br>
   <pre><?=$notice_content?></pre>
        
        <br>  <br><div style="text-align: right;"><?=$notice_wdate?></div>
<hr> 

<div class="w3-container">

<center>
<a href='admin_notice.php'><button class="w3-button w3-teal w3-round-xlarge" >목록보기</button></a> &nbsp&nbsp
<a href='admin_notice_write.php'><button class="w3-button w3-green w3-round-xlarge" >쓰기</button></a> &nbsp&nbsp
<a href="admin_notice_edit.php?notice_id=<?=$notice_id?>"><button class="w3-button w3-teal w3-round-xlarge">수정</button></a> &nbsp&nbsp
<button class="w3-button w3-green w3-round-xlarge" onclick='del();'>삭제</button>
</center>

</div>





      
             
                                  
<br><br>
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
<script>
function del(){

    if (confirm("<?=$notice_id?>번 공지글을 삭제하시겠습니까?")) {
        location.href="admin_notice_predel.php?notice_id=<?=$notice_id?>"
    } else {
        
    }

}
</script>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
