<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        div {
            display: block;
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
                            <label>        <input type="radio" name="find_id_type" value="email" checked="checked" /> 이메일로 찾기</label>
                            <label>        <input type="radio" name="find_id_type" value="mobile" /> 휴대폰 번호로 찾기</label>
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
    </body>
</html>          