<?
session_start();
$memNm = (!empty($_SESSION['mem_nm'])) ? $_SESSION['mem_nm']  : "";
$memId = (!empty($_SESSION['mem_id'])) ? $_SESSION['mem_id']  : "";

include "db_info.php";
// include "cartCnt.php";

?>
<?php
  // 네이버 로그인 접근토큰 요청 예제
  $client_id = "YOUR_CLIENT_ID";
  $redirectURI = urlencode("YOUR_CALLBACK_URL");
  $state = "RAMDOM_STATE";
  $apiURL = "https://nid.naver.com/oauth2.0/authorize?response_type=code&client_id=".$client_id."&redirect_uri=".$redirectURI."&state=".$state;
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
        ul{
            list-style:none;
        }
        #page-wrap {
            clear: both;
            text-align: center;
            margin: 0 auto 200px;
            padding-top: 100px;
        }

        #page-wrap h1 {
            /* padding: 150px 0 20px; */
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

        #findWrap {
            max-width: 1098px;
            margin: 0 auto;
            margin-top: 50px;
            padding-bottom: 65px;
            border: 1px solid #e9e9e9;
            }

        .c_Title h2 {
            font-size: 25px;
            color: #343434;
            padding-bottom: 5px;
            font-weight: 700;
        }
        #findWrap #find_id {
            padding-left: 82px;
            padding-right: 81px;
            padding-bottom: 20px;
            border-right: 1px solid #e9e9e9;
        }

        #findWrap .find_idpw {
            margin-top: 64px;
            float: left;
            width: 386px;
        }

        #findWrap .find_idpw .tit {
            padding-top: 15px;
            font-size: 18px;
            color: #000;
            font-weight: bold;
            line-height: 18px;
        }

        #findWrap .find_idpw .sub-tit {
            padding-top: 20px;
            font-size: 11px;
            color: #8d8d8d;
            line-height: 18px;
        }
        
        #findWrap #find_id .radio-wrap {
            margin-top: 33px;
        }

        #findWrap .find_idpw .radio-wrap {
            margin-top: 15px;
            font-size: 11px;
            color: #000;
        }

        #findWrap .find_idpw .frm-list li label {
            padding-left: 11px;
            position: absolute;
            top: 0;
            left: 0;
            width: 375px;
            height: 50px;
            color: #adadad;
            line-height: 50px;
            cursor: text;
        }

        #findWrap .find_idpw .btn-area a {
            display: block;
            margin-bottom: 6px;
            height: 58px;
            font-size: 16px;
            line-height: 58px;
        }

        .CSSbuttonWhite {
            display: inline-block;
            color: #231f20;
            text-align: center;
            border: 1px solid #231f20;
            background: #fff;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }
        
        .CSSbuttonBlack {
            display: inline-block;
            color: #fff;
            text-align: center;
            border: 1px solid #231f20;
            background: #231f20;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        button, input, select, textarea, a {
            vertical-align: middle;
        }
        a {
            color: #1c1c1c;
            text-decoration: none;
            background: none;
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
        <div class="c_Title">
    <h2>FIND ID/PW</h2>
</div>
<div id="findWrap">
                    
                    
<form name="form1" method="post" action="/shop/lostpass.html" target="loginiframe">
<input type="hidden" name="focus_ok"> 
<input type="hidden" name="msecure_key">
<input type="hidden" name="sslid" value="mgmmdl">
<input type="hidden" name="sslip" value="www.kongstyle.co.kr">
<input type="hidden" name="mail">
<input type="hidden" name="authtext" value="">
<input type="hidden" name="authid">
<input type="hidden" name="find_type" value="find_pw"/>                    <div id="find_id" class="find_idpw">
                        <h1 class="tit">아이디 찾기</h1>
                        <p class="sub-tit">회원가입 시, 입력하신 이름 + 이메일 또는 휴대폰 번호로 아이디를 확인하실 수 있습니다.</p>
                        <div class="radio-wrap">
                            <!-- <label>        <input type="radio" name="find_id_type" value="email" checked="checked" /> 이메일로 찾기</label>
                            <label>        <input type="radio" name="find_id_type" value="mobile" /> 휴대폰 번호로 찾기</label> -->
                        </div>
                        <div class="find-info">
                            <ul class="frm-list">
                                <li>
                                    <label>NAME</label>
                                         <input type="text" id="name" name="name"  class="MS_input_txt" value="" maxlength="30" title="이름" placeholder="">                                </li> 
                                <li id="find_id_email_wrap">
                                    <label>E-MAIL</label>
                                           <input type="text" id="find_id_email" name="find_id_email"  class="MS_input_txt" value="" maxlength="80" title="이메일 주소" placeholder="">                                </li>
                                <li id="find_id_mobile_wrap" style="display:none;">
                                    <label>PHONE NUMBER</label>
                                           <input type="text" id="find_id_mobile" name="find_id_mobile"  class="MS_input_txt" value="" maxlength="20" title="휴대폰번호">                                </li>
                            </ul>
                            <div class="btn-area">
                                <a class="CSSbuttonWhite" href="javascript:find_type('find_id');">아이디 찾기</a>
                                <a class="CSSbuttonBlack" href="/shop/member.html?type=login&returnurl=%2Fhtml%2Fmainm.html">로그인</a>
                            </div>
                        </div>	
                    </div><!--/#find_id/-->

                    <div id="find_pw" class="find_idpw">
                        <h1 class="tit">임시 비밀번호 발급</h1>
                        <p class="sub-tit">
                            가입하신 아이디+이메일 또는 휴대폰번호를 입력, 본인인증을 통해 이메일<br />
                            또는 휴대폰번호로 임시 비밀번호를 보내드립니다.<br />
                            확인 후 로그인하셔서 반드시 비밀번호를 변경하시기 바랍니다.
                        </p>
                        <div class="radio-wrap">
                            <label>        <input type="radio" name="find_pw_type" value="email" checked="checked" /> 이메일로 찾기</label>
                            <label>        <input type="radio" name="find_pw_type" value="mobile" /> 휴대폰 번호로 찾기</label>
                                                    </div>
                        <div id="find_pw_input_wrap">                        <div class="find-info">
                            <ul class="frm-list">
                                <li>
                                    <label>ID</label>
                                    <input type="text" name="user_id" id="user_id" value=""  class="MS_input_txt" size="10" maxlength="12" />                                </li>
                                <li id="find_pw_email_wrap">
                                    <label>E-MAIL</label>
                                            <input type="text" id="email" name="email"  class="MS_input_txt" value="" maxlength="80" title="이메일 주소" placeholder="" onfocus="document.form1.focus_ok.value='yes'">                                </li>
                                <li id="find_pw_mobile_wrap" style="display:none;">
                                    <label>PHONE NUMBER</label>
                                           <input type="text" id="mobile" name="mobile"  class="MS_input_txt" value="" maxlength="20" title="휴대폰번호">                                </li>
                            </ul>
                            <div class="btn-area">
                                <a href="javascript:find_type('find_pw');" class="CSSbuttonWhite info-confirm">임시 비밀번호 발급</a>
                                <a href="/shop/member.html?type=login&returnurl=%2Fhtml%2Fmainm.html" class="CSSbuttonBlack info-confirm">로그인</a>
                            </div>
                        </div>
                        </div>                                            </div><!--/#find_pw/-->
                    </form>                
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