<?
include "db_info.php";
session_start();
$memNm = (!empty($_SESSION['mem_nm'])) ? $_SESSION['mem_nm']  : "";
$memId = (!empty($_SESSION['mem_id'])) ? $_SESSION['mem_id']  : "";


// include "cartCnt.php";

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
	$orderId = $_GET['orderId'];
	$PHP_SELF = $_SERVER['PHP_SELF'];

	$sql = "SELECT * FROM order_detail
			WHERE order_id='$orderId'";
	$rs = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($rs);
?>
			<div id="cartTable">
				<h2>ORDER COMPLETED</h2>
				<p style="text-align:center; padding-bottom:20px;">구매해 주셔서 감사합니다.</p>
				<table>
					<tr>
						<td colspan="4">주문 내역 </td>
						<td><?=$row['reg_dt']?></td>
					</tr>
					<tr>
						<th>Img</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
					</tr>

<?
	$sql = "SELECT * FROM order_detail
			WHERE order_id='$orderId'";
	$rs = mysqli_query($conn, $sql);

	$id=0; $totalPrice = 0;
	while(list($orderId,$goodsId,$goodsNm,$goodsPrice,$goodsCnt,$goodsImg1,$regDt)=mysqli_fetch_array($rs)){
		$porderId=$orderId;
		if($id==$orderId){$orderId="";$regDt="";}
		else{$id=$orderId;}
		$sumPrice = $goodsPrice*$goodsCnt;
		
?>					
					<tr>
						<td><img src="images/<?=$goodsImg1?>" alt="" width="80px"></td>
						<td><?=$goodsNm?></td>
						<td><span><?=number_format($goodsPrice)?></span><span>원</span></td>
						<td><?=$goodsCnt?></td>
						<td><?=number_format($sumPrice)?>원</td>
					</tr>
					
<?
	$totalPrice += $sumPrice;
}?>
					<tr>
						<td colspan="3"></td>
						<td>Total Price:</td>
						<td><?=number_format($totalPrice)?>원</td>
					</tr>

				
				<!-- <p style="text-align:center; padding-bottom:20px;"></p> -->
				</table>
<?
$query = "SELECT * FROM orders
		  WHERE order_id ='$porderId'";
$rs2 = mysqli_query($conn, $query);
$row2 = mysqli_fetch_array($rs2);
?>
				<table>
					<tr>
						<td colspan="7">주문 정보</td>
					</tr>
					<tr>
						<th colspan="2">이름</th>
						<th colspan="2">연락처</th>
						<th colspan="3">주소</th>
					</tr>
					<tr>
						<td colspan="2"><?= $row2[2]?></td>
						<td colspan="2"><?= $row2[3]?></td>
						<td colspan="3"><?= substr($row2[5],5)?></td>
					</tr>
					</table>
   
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


