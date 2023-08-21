<?
session_start();
$memNm = (!empty($_SESSION['mem_nm'])) ? $_SESSION['mem_nm']  : "";
$memId = (!empty($_SESSION['mem_id'])) ? $_SESSION['mem_id']  : "";

include "db_info.php";

?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>OSEE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

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

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
	#paging{
		clear:both;
	}
	</style>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script>
       function insertCart(mId,gId,gCnt){
		   	if('<?=$memId?>'==""){
				alert("장바구니 담기, 구매를 원하시면 로그인하세요");
				return;
			}

            $.ajax({
				url: "cartProc.php",
				type: "post",
				data:{memberId:mId, goodsId:gId, goodsCnt:gCnt},
				dataType: "json",
				success:function(data){
					if(data){
						var b = confirm("카트에 담았습니다. 이동하시겠습니까?");
						if(b) location.href="cart.php";
					}else{
						alert("이미 카트에 담겨 있습니다.");
					}
                }
            }); 
	    }
    </script>
	</head>
	<body>
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
		<?
			include "navi.php";
		?>


<?php

$no = (!empty($_GET['no'])) ? $_GET['no'] : 0;
$page_size = 9;        // 한페이지 게시물 갯수
$page_list_size = 10;   // 한리스트 페이지 갯수

$PHP_SELF = $_SERVER['PHP_SELF'];
    
$query = "SELECT * FROM goods
		  ORDER BY goods_nm DESC
		  LIMIT $no, $page_size";
$rs = mysqli_query($conn, $query);   // 결과세트

$query = "SELECT count(*) FROM goods";
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
	<div id="fh5co-product">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>OSEE</span>
					<h2>Products.</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">

<?php 
	while(list($goodsId,$goodsNm,$goodsPrice,$goodsDesc1,$goodsDesc2,$goodsDesc3,$goodsDesc4,$goodsImg1,$goodsImg2,$goodsImg3,$goodsImg4,$goodsImg5,$release_year,$season_id,$category)=mysqli_fetch_array($rs)){
?>

				<div class="col-md-4 text-center animate-box">
					<div class="product">
						<div class="product-grid" style="background-image:url(./images/<?=$goodsImg1?>);">
							<div class="inner">
								<p>
									<a href="#" class="icon" onclick="insertCart(<?=trim($memId)?>','<?=trim($goodsId)?>', 1)">
										<i class="icon-shopping-cart"></i>
									</a>
									<a href="single.php?goods_id=<?=$goodsId?>" class="icon"><i class="icon-eye"></i></a>
								</p>
							</div>
						</div>
						<div class="desc">
							<h3><a href="single.html"><?=$goodsNm?></a></h3>
							<span class="price"><?=number_format("$goodsPrice")?></span>
							<span>원</span>
						</div>
					</div>
				</div>

<?}?>	
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
	</div> 

	<div id="fh5co-started" style="margin-top:150px;">
		<div class="container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<h2>Newsletter</h2>
					<p>If you want to see the OSEE's new product. Now you can subscribe</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?
		include "footer.php";
	?>
	
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
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

