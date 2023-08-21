<?
header('Content-Type: text/html; charset=utf-8');

include "db_info.php";
session_start();
$memNm = (!empty($_SESSION['mem_nm'])) ? $_SESSION['mem_nm']  : "";
$memId = (!empty($_SESSION['mem_id'])) ? $_SESSION['mem_id']  : "";
if($memId==""){
	echo "<script>";
	echo "alert('장바구니 보기를 원하시면 로그인하세요');";
	echo "location.href='login.php';";
	echo "</script>";
	exit;
}


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

			tr:nth-child(even) {
				background-color: #f2f2f2
			}

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

			#submit{
				margin-top:50px;
				text-align: center;
			}
		</style>
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script>
       function updateCnt(div,mId,gId,gCnt){
		   	if('<?=$memId?>'==""){
				alert("장바구니 담기, 구매를 원하시면 로그인하세요");
				return;
			}

            $.ajax({
                   url: "cartCntProc.php",
                   type: "post",
                   data:{memberId:mId, goodsId:gId, goodsCnt:gCnt},
                   dataType: "json",
                   success:function(data){
					 if(data){
						if(div=='p'){
							var cnt = parseInt($(".goodsCnt").text())+1;
							$(".goodsCnt").empty();
							$(".goodsCnt").text(cnt);
							alert("수량 올림");
						}else{
							alert('수량 올림 실패');
						}
					}else{
						if(div=='m'){
							var cnt = parseInt($(".goodsCnt").text())-1;
							$(".goodsCnt").empty();
							$(".goodsCnt").text(cnt);
							alert("수량 내림");
						}else{
							alert("수량 내림 실패");
						}
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
	
	$sql = "SELECT * FROM cart WHERE mem_id = '$memId'";
	$rs = mysqli_query($conn, $sql);
?>
			<div id="cartTable">
			<form action="orderProc.php" method="post">	
				<h2>CART</h2>
				<table>
					<tr>
						<th></th>
						<th>Img</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Total</th>
						<th></th>
					</tr>
<script>
	$(function(){
		$(".plus").click(function(){
			parent = $(this).parents(".opt");
			gCnt = parseInt(parent.find(".goodsCnt").val())+1;
			mId = parent.find(".memId").val();
			gId = parent.find(".goodsId").val();
			
			$.ajax({
                   url: "cartCntProc.php",
                   type: "post",
                   data:{memberId:mId, goodsId:gId, goodsCnt:gCnt},
                   dataType: "json",
                   success:function(data){
						if(data.goodsCnt > 0){
							parent.find(".goodsCnt").val(data.goodsCnt);
							parent.find(".totalPrice").val(data.totalPrice);
						}else{
							alert("수량 올림 실패");
						}
                   }
               });
		});
		$(".minus").click(function(){
			parent = $(this).parents(".opt");
			gCnt = parseInt(parent.find(".goodsCnt").val());
			if(gCnt<=1){
				alert("1개 이상 주문하셔야 합니다.")
				return;
			}
			gCnt = gCnt - 1;
			mId = parent.find(".memId").val();
			gId = parent.find(".goodsId").val();
			
			$.ajax({
                   url: "cartCntProc.php",
                   type: "post",
                   data:{memberId:mId, goodsId:gId, goodsCnt:gCnt},
                   dataType: "json",
                   success:function(data){
						if(data.goodsCnt > 0){
							parent.find(".goodsCnt").val(data.goodsCnt);
							parent.find(".totalPrice").val(data.totalPrice);
						}else{
							alert("수량 내림 실패");
						}
                   }
               });
		});
		
		$(".delete").click(function(){
			var b = confirm("삭제하시겠습니까?");
			if(b){
				var goodsId = $(this).attr("id");
				location.href="deleteProc.php?goods_id="+goodsId;
			}
		});

		$(".cartDel").click(function(){
			var b = confirm("장바구니를 비우시겠습니까?");
			if(b){
				var goodsId = $(this).attr("id");
				location.href="cartDelProc.php";
			}
		});
	});
 
</script>

<?
	$i=0;
	while(list($memId,$goodsId,$goodsNm,$goodsPrice,$goodsCnt,$totalPrice,$goodsImg1,$regDT)=mysqli_fetch_array($rs)){
?>				
					<tr class="opt">
						<td><input type="checkbox" name="check_option[]" id="" value="<?=$goodsId?>"></td>
						<td><img src="./images/<?=$goodsImg1?>" alt="" width="130px"></td>
						<td><?=$goodsNm?></td>
						<td><span><?=number_format($goodsPrice)?></span><span>원</span></td>
						<td>
						<div class="gcnt_button">
							<input type="text" name="goodsCnt[]"  	 class='goodsCnt'	value="<?=$goodsCnt?>" size="3">
							<input type="button" class="plus" 			value="+"  >
							<input type="button" class="minus" 			value="-" >
							<input type="hidden" name="memId[]" 	 class='memId'		value="<?=$memId?>"> 
							<input type="hidden" name="goodsId[]" 	 class='goodsId'	value="<?=$goodsId?>">
							<input type="hidden" name="goodsPrice[]" class='goodsPrice' value="<?= $goodsPrice ?>">
						</div>
						</td>
						<td><input type="text" name="totalPrice[]" class='totalPrice' value="<?=$goodsPrice*$goodsCnt?>"></td>
						<td><button type="button" class="delete" id="<?=$goodsId?>">X</button></td>
					</tr>

<?
$i++;
}?>

					<!-- <tr>
						<td><input type="checkbox" name="check_option[]" id="" value=""></td>
						<td><img src="" alt=""></td>
						<td>Griffin</td>
						<td>$150</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="check_option[]" id="" value=""></td>
						<td><img src="" alt=""></td>
						<td>Swanson</td>
						<td>$300</td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td><input type="checkbox" name="check_option[]" id="" value=""></td>
						<td><img src="" alt=""></td>
						<td>Brown</td>
						<td>$250</td>
						<td></td>
						<td></td>
						<td></td>
					</tr> -->
				</table>
				<div id="submit">
					<input type="submit" value="구매하기">
					<a href="index.php" style="color:gray"><input type="button" value="계속 쇼핑하기"></a>
					<input type="reset" value="장바구니 비우기" class="cartDel" id="<?=$goodsId?>">
                </div>
			</form>
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