<?
header('Content-Type: text/html; charset=utf-8');

include "db_info.php";
session_start();
$memNm = (!empty($_SESSION['mem_nm'])) ? $_SESSION['mem_nm']  : "";
$memId = (!empty($_SESSION['mem_id'])) ? $_SESSION['mem_id']  : "";
if($memId==""){
	echo "<script>";
	echo "alert('주문내역 보기를 원하시면 로그인하세요');";
	echo "location.href='login.php';";
	echo "</script>";
	exit;
}


?>

	<!DOCTYPE HTML>
	<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>OSEE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
		<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive"
		/>
		<meta name="author" content="gettemplates.co" />

		<!-- Facebook and Twitter integration -->
		<meta property="og:title" content="" />
		<meta property="og:image" content="" />
		<meta property="og:url" content="" />
		<meta property="og:site_name" content="" />
		<meta property="og:description" content="" />
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />

		<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
		<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->

		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Bootstrap  -->
		<link rel="stylesheet" href="css/bootstrap.css">

		<!-- Flexslider  -->
		<link rel="stylesheet" href="css/flexslider.css">

		<!-- Owl Carousel  -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">

		<!-- Theme style  -->
		<link rel="stylesheet" href="css/style.css">
		<!-- Table style  -->
		<link rel="stylesheet" href="/w3css/4/w3.css">

		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
		<style>
			.t_left {
				text-align: left;
				width: 300px;
			}

			.insta {
				margin: 150px auto;
			}

			.flex-container {
				display: flex;
				flex-wrap: wrap;
				justify-content: center;
			}

			.flex-container>div {
				background-color: #f1f1f1;
				width: 170px;
				height: 170px;
				margin: 10px;
				text-align: center;
				line-height: 75px;
				font-size: 30px;
			}
			
			#cartTable{
				clear:both;
				width:100%;
				max-width:1170px;
				/* text-align:center; */
				margin: 0 auto 100px;
				padding-top:100px;
			}
			
			#cartTable h2{
				padding-bottom:20px;
				text-align:center;
			}

			table {
				border-collapse: collapse;
				width: 100%;
			}

			th,
			td {
				/* text-align: center; */
				padding: 8px;
			}

			/* tr:nth-child(even) {
				background-color: #f2f2f2
			} */

			th {
				background-color: rgb(73, 189, 160);
				color: white;
			}
			
			.cart_quantity_input {
   				color: #696763;
   				float: left;
   				font-size: 16px;
    			text-align: center;
    			font-family: 'Roboto', sans-serif;
			}

			.cart_quantity_button a {
    			background: lightgray;
    			color: #696763;
    			display: inline-block;
    			font-size: 16px;
    			height: 33px;
    			overflow: hidden;
    			text-align: center;
    			width: 25px;
    			float: left;
				line-height: 33px;
				/* margin-top:5px; */
			}

			a:hover {
   				outline: none;
    			text-decoration: none;
			}

			#submit{
				margin-top:50px;
				text-align: center;
			}
		</style>
	</head>

	<body>

		<div class="fh5co-loader"></div>

		<div id="page">
			<?
				include "navi.php";
			?>

			<!-- <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
							<div class="display-t">
								<div class="display-tc animate-box" data-animate-effect="fadeIn">
									<h1>Cart</h1>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header> -->


<?
	$no = (!empty($_GET['no'])) ? $_GET['no'] : 0;
	$page_size = 10;        // 한페이지 게시물 갯수
	$page_list_size = 10;   // 한리스트 페이지 갯수

	$PHP_SELF = $_SERVER['PHP_SELF'];

	$sql = "SELECT o.mem_id,o.order_id, od.goods_id, od.goods_nm, od.goods_price, od.goods_cnt, od.goods_img1, od.reg_dt
			FROM orders o, order_detail od
			WHERE o.order_id= od.order_id
			AND o.mem_id = '$memId'			
			ORDER BY order_id desc
			LIMIT $no, $page_size";
	
	$rs = mysqli_query($conn, $sql);

	$query = "SELECT count(*) 
				FROM orders o, order_detail od
				WHERE o.order_id= od.order_id
				AND o.mem_id = '$memId'";
	$count = mysqli_query($conn, $query);
	$result = mysqli_fetch_row($count);

	// 총게시물 갯수와 총페이지수 계산
	$total_row = $result[0];
	// echo "total_row : " . $total_row ."<br>";
	if($total_row <= 0) $total_row = 0;

	// total_page는 0부터 시작 페이지갯수 10/10=1 : 2페이지의 의미 그래서 내림
	$total_page = floor(($total_row - 1) / $page_size);
	// $no (0 : 10 : 20 : 30) 10으로 나우면 페이지 숫자 나옴.
	$current_page = floor($no / $page_size);

?>
			<div id="cartTable">
				<h2>ORDER HISTORY</h2>
				<table>
					
<?
	$id=0;
	$totalPrice=0;
	while(list($memId,$orderId,$goodsId,$goodsNm,$goodsPrice,$goodsCnt,$goodsImg1,$regDt)=mysqli_fetch_array($rs)){
		if($id==$orderId){
			$orderId="";
			$regDt="";
		}else if($id!=0){
?>
					<tr>
						<td colspan="3"></td>
						<td>Total Price:</td>
						<td><?=number_format($totalPrice)?>원</td>
					</tr>
<?			
			$id = $orderId;
			$totalPrice=0;
		}
		else{
			$id = $orderId;
			$totalPrice=0;
		}
	$sumPrice = $goodsPrice*$goodsCnt;
	if($orderId!=""){
?>
					<tr>
						<th colspan="5">Order <?=substr($regDt,0,11)?>&#40;No.<?=$orderId?>&#41;</th>
					</tr>
<?}?>
					<tr>
						<td><img src="images/<?=$goodsImg1?>" alt="" width="100px"></td>
						<td><?=$goodsNm?></td>
						<td><span><?=number_format($goodsPrice)?></span><span>원</span></td>
						<td><?=$goodsCnt?></td>
						<td><?=number_format($sumPrice)?></td>
					</tr>

<?
	$totalPrice += $sumPrice;
}?>
			

					
				</table>
				<div id="paging" align="center">
<?
//페이지리스트 첫번째 페이지 구하기
//0, 10, 20, 30, 40.. 계산 1 / 10 = (int)0.1 = 0 의미
$start_page = (int)($current_page / $page_list_size) * $page_list_size;

//페이지리스트 마지막 페이지 구하기
//0부터 시작함 첫번째페이지 + 9페이지 = 마지막 페이지
$end_page = $start_page + $page_list_size -1;
//그런데 마지막 리스트가 10개가 안 될수도 있기 때문에
//마지막 페이지와 전체 페이지를 비교해서 다시 계산
if($total_page < $end_page) $end_page = $total_page;

# 이전 페이지 리스트 필요할때 
// 시작페이지가 페이지가 페이지리스트보다 클때
if($start_page >= $page_list_size){
	$prev_list = ($start_page-1) * $page_size;
	echo "<a href=\"$PHP_SELF?no=$prev_list\"> << </a>";
}
// 0~9   10~19    20~29
##페이징
for($i = $start_page; $i <= $end_page; $i++){
	$page = $i * $page_size; //전달될 페이지 값 no로 변환
	$page_num = $i + 1;      //보여질 페이지 번호
	echo "<a href=\"$PHP_SELF?no=$page\">";
	echo " $page_num ";
	echo "</a>";
}

# 다음페이지 리스트 필요할 때
// 총페이지가 마지막 리스트페이지보다 클 때
if($total_page > $end_page){
	$next_list = ($end_page + 1) *$page_size;
	echo "<a href=\"$PHP_SELF?no=$next_list\"> >> </a>";
}

?>    
				</div>
			</div>
			



			<?
				include "footer.php";
			?>
		</div>

		<div class="gototop js-top">
			<a href="#" class="js-gotop">
				<i class="icon-arrow-up"></i>
			</a>
		</div>

		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
		<!-- jQuery Easing -->
		<script src="js/jquery.easing.1.3.js"></script>
		<!-- Bootstrap -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Waypoints -->
		<script src="js/jquery.waypoints.min.js"></script>
		<!-- Carousel -->
		<script src="js/owl.carousel.min.js"></script>
		<!-- countTo -->
		<script src="js/jquery.countTo.js"></script>
		<!-- Flexslider -->
		<script src="js/jquery.flexslider-min.js"></script>
		<!-- Main -->
		<script src="js/main.js"></script>

	</body>

	</html>


