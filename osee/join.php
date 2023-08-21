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
    <title>OSEE JOIN</title>
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

        #header {
            margin: 50px 0 30px;
            text-align: center;
        }

        #wrap {
            clear: both;
            width: 700px;
            max-width: 100%;
            /* text-align: center; */
            margin: 0 auto 200px;
            padding-top: 100px;
        }

        #wrap h1{
            /* padding: 150px 0 20px; */
        }

        .tabler {
            margin-top: 20px;
            margin-bottom: 40px;
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
        }

        .tabler,
        .tabler th,
        .tabler td {
            /* border-top: 1px solid gray; */
            border-bottom: 1px solid rgb(207, 207, 207);
            text-align: left;
            padding: 8px;
        }

        .tabler th {
            width: 250px;
            padding-right: 50px;
        }

        table input {
            font-size: 20px;
        }


        #add_input {
            margin-bottom: 8px;
        }

        #year {
            width: 80px;
        }

        select {
            padding: 6px;
        }

        /* input {
            margin: 5px;
            padding: 5px;
        } */

        .phone1 {
            width: 40px;
            text-align: center;
            font-size: 15px;
            padding: 3px;
        }

        .phone {
            width: 70px;
            text-align: center;
            font-size: 15px;
            padding: 3px;
        }

        #submit {
            text-align: center;
            margin-top: 20px;
        }

        #submit input {
            padding: 5px 20px;

        }
    </style>
    
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ssl.daumcdn.net/dmaps/map_js_init/postcode.v2.js"></script>

    <script>
        $(function () {
            function isValidEamil(str) {
                var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
                return (str.match(regExp)) ? true : false;
            }
            $("#myForm").submit(function () {
                //아이디 검사
                var idExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z]){4,12}$/i;
                var memId = $("input[name='memId']");
                if (!memId.val().match(idExp)) {
                    alert("아이디는 4~12자 영문 대소문자 포함하여 입력해 주세요");
                    memId.focus();
                    return false;
                }
                // var num = userId.val().length;
                // if (num == 0) {
                //     alert("아이디는 필수입력입니다.");
                //     userId.focus();
                //     return false;
                // } else if (num < 3 || num > 8) {
                //     alert("아이디는 3~8글자로 입력하세요");
                //     userId.focus();
                //     return false;
                // }

                //비밀번호 검사 
                var pw = $("input[name='memPw']");
                var pwc = $("input[name='pwCheck']");
                if (pw.val() == 0) {
                    alert("비밀번호를 입력하세요");
                    pw.focus();
                    return false;

                } else if (pw.val().length < 6 || pw.val().length > 12) {
                    alert("비밀번호는 6~12자리로 입력하세요");
                    pw.focus();
                    return false;
                }

                if (pw.val() != pwc.val()) {
                    alert("비밀번호가 일치하지 않습니다.");
                    pwc.focus();
                    return false;
                }

                //이름 검증
                var nameExp = /^[a-zA-Z가-힣]{3,8}$/;
                var name = $("input[name='memNm']");
                var nNum = name.val().length;
                if (!name.val().match(nameExp)) {
                    alert("이름을 3~8글자로 입력해주세요.");
                    name.focus();
                    return false;
                }

                //생년월일 검증
                // var year = $("input[name='year']");
                // var yearExp = /^[0-9]{4}$/;
                // if (!year.val().match(yearExp)) {
                //     alert("태어난 년도 숫자4자리를 입력하세요");
                //     year.focus();
                //     return false;
                // }

                // if ($("#month option:selected").val() == '') {
                //     alert("태어난 월을 선택하세요.");
                //     return false;
                // }

                // if ($("#date option:selected").val() == '') {
                //     alert("태어난 날짜를 선택하세요.");
                //     return false;
                // }


                // 성별 검증                 
                // var gender = $("input[name='gender']");
                // var radio = 0;
                // for (var i = 0; i < gender.length; i++) {
                //     if (gender[i].checked == true) {  //체크된 상태
                //         radio++;
                //     }
                // }
                // if (radio == 0) {
                //     alert("성별을 체크하세요.");
                //     return false;
                // }

                // 주소 검증
                var address = $("input[name='zip']");
                if (address.val() == 0) {
                    alert("주소를 입력하세요");
                    address.focus();
                    return false;
                }

                //휴대전화 검증
                var phone1 = $("input[name='phone1']");
                var p1exp = /^[0-9]{3}$/;
                // if( phone1.val()==0){
                //     alert("전화번호를 입력하세요");
                //     phone1.focus();
                //     return false;
                // }
                if (!phone1.val().match(p1exp)) {
                    alert("전화번호를 정확하게 입력하세요");
                    phone1.focus();
                    return false;
                }


                var phone2 = $("input[name='phone2']");
                var p2exp = /^[0-9]{3,4}$/;
                if (phone2.val() == 0) {
                    alert("전화번호를 입력하세요");
                    phone2.focus();
                    return false;
                }
                if (!phone2.val().match(p2exp)) {
                    alert("전화번호를 정확하게 입력하세요");
                    phone2.focus();
                    return false;
                }
                var phone3 = $("input[name='phone3']");
                var p3exp = /^[0-9]{4}$/;
                if (phone3.val() == 0) {
                    alert("전화번호를 입력하세요");
                    phone3.focus();
                    return false;
                }
                if (!phone3.val().match(p3exp)) {
                    alert("전화번호를 정확하게 입력하세요");
                    phone3.focus();
                    return false;
                }

                // 이메일 검증
                var email = $("input[name='email']");
                if (email.val() == '') {
                    alert("이메일을 입력하세요")
                    email.focus();
                    return false;
                }
                if (!isValidEamil(email.val())) {
                    alert("이메일 형식으로 입력하세요");
                    email.focus();
                    return false;
                }

                //select 검사

                // if ($("#hobby option:selected").val() == '') {
                //     alert("좋아하는 운동을 선택하세요");
                //     return false;
                // }

                //checkbox 검사
                // var c = 0;
                // $(":checkbox").each(function () {
                //     if ($(this).prop("checked")) {
                //         c++;
                //     };

                // });
                // if (c == 0) {
                //     alert("좋아하는 과일을 한가지 이상 체크하세요");
                //     return false;
                // }
                
                //유효성검사
                return true;
            });
            $("input").focus(function () {
                $(this).css("background-color", "lightgray");
            });

            $("input").blur(function () {
                $(this).css("background-color", "#fff");
            });
        });

    </script>
</head>

<body>
    <!-- <div class="fh5co-loader"></div> -->

    <div id="page">
        <?
            include "navi.php";
        ?>
        <!-- <nav class="fh5co-nav" role="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-xs-2">
                        <div id="fh5co-logo">
                            <a href="index.php">OSEE</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 text-center menu-1">
                        <ul>
                            <li class="has-dropdown">
                                <a href="product.html">OSEE</a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="#">ABOUT</a>
                                    </li>
                                </ul>
                                <ul class="dropdown">
										<li><a href="single.html">Single Shop</a></li>
									</ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="product.html">OSEE?</a>
                                <ul class="dropdown">
								<li><a href="single.html">Single Shop</a></li>
							</ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="about.html">OSEE!</a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="#">2018 FALL</a>
                                    </li>
                                    <li>
                                        <a href="#">2018 SUMMER</a>
                                    </li>
                                    <li>
                                        <a href="#">2018 SPRING</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-dropdown">
                                <a href="services.html">SHOP</a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="#">OUTER</a>
                                    </li>
                                    <li>
                                        <a href="#">TOP</a>
                                    </li>
                                    <li>
                                        <a href="#">DRESS</a>
                                    </li>
                                    <li>
                                        <a href="#">SKIRT</a>
                                    </li>
                                    <li>
                                        <a href="#">PANTS</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact.php">CONTACT</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                        <ul>
                            <li>
                                <a href="login.html">LOGIN</a>
                                <div class="input-group">
									<input type="text" placeholder="Search..">
									<span class="input-group-btn">
										<button class="btn btn-primary" type="button">
											<i class="icon-search"></i>
										</button>
									</span>
								</div>
                            </li>
                            <li>
                                <a href="join.html">JOIN</a>
                            </li>

                            <li class="shopping-cart">
                                <a href="#" class="cart">
                                    <span>
                                        <small>0</small>
                                        <i class="icon-shopping-cart"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav> -->
<!-- 
        <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url(images/img_bg_2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeIn">
                                <h1>JOIN</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header> -->

            
        <div id="wrap">
                <h1 style="text-align: center;">JOIN</h1>
            <form action="joinProc.php" name="myForm" id="myForm" method="POST">
                <table class="tabler">
                    <tr>
                        <th>아이디</th>
                        <td>
                            <input type="text" name="memId">
                        </td>
                    </tr>
                    <tr>
                        <th>비밀번호(6~12자리)</th>
                        <td>
                            <input type="password" name="memPw">
                        </td>
                    </tr>
                    <tr>
                        <th>비밀번호 확인</th>
                        <td>
                            <input type="password" name="pwCheck">
                        </td>
                    </tr>
                    <tr>
                        <th>이름</th>
                        <td>
                            <input type="text" name="memNm">
                        </td>
                    </tr>
                    <!-- <tr>
                        <th>생년월일</th>
                        <td id=monthDate>
                            <input type="text" name="year" id="year">년
                            <script>
                                document.write("<select name=month id=month>");
                                document.write("<option value=''>선택");
                                for (i = 1; i <= 12; i++) document.write("<option>" + i + "</option>");
                                document.write("</select>월  ");
                                document.write("<select name=date id=date>");
                                document.write("<option value=''>선택");
                                for (i = 1; i <= 31; i++) document.write("<option>" + i);
                                document.write("</select>일  </font>"); 
                            </script>
                        </td>
                    </tr> -->
                    <!-- <tr>
                        <th>성별</th>
                        <td>
                            <input type="radio" name="gender" value="1">남성
                            <input type="radio" name="gender" value="2">여성
                        </td>
                    </tr> -->
                    <tr>
                        <th>우편번호</th>
                        <td>
                            <input type="text" name="zip" style="width:80px;" />
                            <button type="button" style="width:60px; height:32px;" onclick="openZipSearch()">검색</button>
                        </td>

                        <tr>
                            <th> 주소</th>
                            <td>
                                <input type="text" name="addr1" id="add_input" style="width:300px;" readonly />

                                <input type="text" name="addr2" style="width:300px;" />
                            </td>
                        </tr>
                        <script type="text/javascript">

                            function openZipSearch() {
                                new daum.Postcode({
                                    oncomplete: function (data) {
                                        $('[name=zip]').val(data.zonecode); // 우편번호 (5자리)
                                        $('[name=addr1]').val(data.address);
                                        $('[name=addr2]').val(data.buildingName);
                                    }
                                }).open();
                            }

                        </script>
                        </td>
                    </tr>
                    <tr>
                        <th>휴대전화</th>
                        <td>
                            <input type="tel" name="phone1" class="phone1" value="010"> -
                            <input type="tel" name="phone2" class="phone"> -
                            <input type="tel" name="phone3" class="phone">
                            <!-- <input type="tel" id="phone" required pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" title="###-####-####"> -->
                        </td>
                    </tr>
                    <tr>
                        <th>이메일</th>
                        <td>
                            <input type="text" name="memEmail">
                        </td>
                    </tr>
                    <!-- <tr>
                    <th>좋아하는 운동</th>
                    <td>
                        <select name="hobby" id="hobby">
                            <option value="">선택하세요</option>
                            <option value="soccer">축구</option>
                            <option value="tenis">테니스</option>
                            <option value="baseball">야구</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>좋아하는 과일</th>
                    <td>
                        <input type="checkbox" name="fruits" vlue="1">사과
                        <input type="checkbox" name="fruits" vlue="2">배
                        <input type="checkbox" name="fruits" vlue="3">딸기
                        <input type="checkbox" name="fruits" vlue="4">바나나
                        <input type="checkbox" name="fruits" vlue="5">오렌지
                    </td>
                </tr> -->
                </table>
                <div id="submit">
                    <input type="submit" value="회원가입">
                    <input type="reset" value="취소">
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