<?
session_start();
$memNm = (!empty($_SESSION['mem_nm'])) ? $_SESSION['mem_nm']  : "";
$memId = (!empty($_SESSION['mem_id'])) ? $_SESSION['mem_id']  : "";

include "db_info.php";
// include "cartCnt.php";

?>

<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OSEE LOGIN</title>
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

    <!-- Modernizr JS -->
    <script src="js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        #page-wrap {
            clear: both;
            text-align: center;
            margin: 0 auto 200px;
        }

        #page-wrap h1 {
            padding: 150px 0 20px;
        }

        #form {
            margin-top: 20px;
        }

        .pad {
            margin: 5px;
            padding: 10px;
        }

        button {
            width: 130px;
            height: 30px;
            margin: 10px 0;
        }

        #naver,
        #kakao,
        #facebook {
            border-radius: 5px;

            font-weight: 700;
        }

        span {
            padding: 0 10px;
        }

        #naver {
            background: rgb(55, 197, 55);
            color: #fff;
        }

        #kakao {
            background: rgb(255, 230, 0);
            color: rgb(56, 30, 0);
        }

        #facebook {
            color: #fff;
            background: rgb(79, 77, 184);
        }
    </style>


</head>

<body>
    <!-- <div class="fh5co-loader"></div> -->

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
                                <h1>LOGIN</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header> -->

        <div id="page-wrap">
            <h1>LOGIN</h1>
            <form method="post" action="loginProc.php" id="form">
                <input type="text" name="memId" placeholder=" ID" class="pad">
                <br>
                <input type="text" name="memPw" placeholder="PW" class="pad">
                <br>
                <input type="submit" value="LOGIN" style="width: 130px; height: 30px; margin: 10px 0;">
                <!-- <br>
                <input type="checkbox">보안접속 -->

            </form>
            <br>
            <h4 style="margin:10px 0;">회원가입을 하시면 더 많은 혜택을 받을 수 있습니다.</h4>
            <a href="join.html" style="color: inherit">
                <button>회원가입</button>
            </a>
            <button>ID/PW 찾기</button>
            <br>
            <!-- <p>간편로그인</p> -->
            <button id="naver">네이버 로그인</button>
            <button id="kakao">카카오 로그인</button>
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