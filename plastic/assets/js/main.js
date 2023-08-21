/***********************************************************
 * widget Ui
 ************************************************************/
$(document).ready(function() {
	mkvSlider();
	mainSlider();
	prSlider();
    eduBox();
    eduSlider();
    educateSlider();
});


/***********************************************************
 * mkvSlider
 ************************************************************/
function mkvSlider() {

	var windowsize = $(window).width();

    if (windowsize < 767) {
		$('#mkvSlider').bxSlider( {
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			speed: 500,        // 이동 속도를 설정
			pager: true,      // 현재 위치 페이징 표시 여부 설정
			moveSlides: 1,     // 슬라이드 이동시 개수
			//slideWidth: 100,   // 슬라이드 너비
			adaptiveHeight: true,
			minSlides: 1,      // 최소 노출 개수
			maxSlides: 1,      // 최대 노출 개수
			slideMargin:0,    // 슬라이드간의 간격
			auto: true,        // 자동 실행 여부
			autoControls:false,  //  play/stop/pause 슬라이드 컨트롤 버튼
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: false,    // 이전 다음 버튼 노출 여부
			autoControlsCombine: true, // 다시 찾아보기
			hideControlOnEnd: false,
			infiniteLoop: true,
			ariaLive: true,
			ariaHidden: true,
			touchEnabled: true

		});

	} else {
		$('#mkvSlider').bxSlider( {
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			speed: 500,        // 이동 속도를 설정
			pager: true,      // 현재 위치 페이징 표시 여부 설정
			moveSlides: 1,     // 슬라이드 이동시 개수
			//slideWidth: 100,   // 슬라이드 너비
			adaptiveHeight: true,
			minSlides: 1,      // 최소 노출 개수
			maxSlides: 1,      // 최대 노출 개수
			slideMargin:0,    // 슬라이드간의 간격
			auto: true,        // 자동 실행 여부
			autoControls:false,  //  play/stop/pause 슬라이드 컨트롤 버튼
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: false,    // 이전 다음 버튼 노출 여부
			autoControlsCombine: true, // 다시 찾아보기
			hideControlOnEnd: false,
			infiniteLoop: true,
			ariaLive: true,
			ariaHidden: true,
			touchEnabled: false

		});
	};

	// 탭포커스
	$('#mkvSlider > li:first > a').on('focus',function(){
		var v_curMySliderCnt = mySlider.getCurrentSlide() + 2;   // minSliders 값만큼 더해준다.
		// alert(v_curMySliderCnt);
		$('#mkvSlider > li:eq('+v_curMySliderCnt+') > a').focus();
		return false;
	});


};

/***********************************************************
 * mainSlider
 ************************************************************/
function mainSlider() {

	var windowsize = $(window).width();

    if (windowsize < 767) {
		$('#mainSlider').bxSlider( {
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			speed: 500,        // 이동 속도를 설정
            pager: true,      // 현재 위치 페이징 표시 여부 설정
            pagerType: 'short',
			moveSlides: 1,     // 슬라이드 이동시 개수
			slideWidth: 765,   // 슬라이드 너비
			adaptiveHeight: true,
			minSlides: 1,      // 최소 노출 개수
			maxSlides: 1,      // 최대 노출 개수
			slideMargin:0,    // 슬라이드간의 간격
			auto: true,        // 자동 실행 여부
			autoControls:true,  //  play/stop/pause 슬라이드 컨트롤 버튼
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: true,    // 이전 다음 버튼 노출 여부
			autoControlsCombine: true, // 다시 찾아보기
			hideControlOnEnd: false,
			infiniteLoop: true,
			ariaLive: true,
			ariaHidden: true,
			touchEnabled: true

		});

	} else {
		$('#mainSlider').bxSlider( {
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			speed: 500,        // 이동 속도를 설정
            pager: true,      // 현재 위치 페이징 표시 여부 설정
            pagerType: 'short',
			moveSlides: 1,     // 슬라이드 이동시 개수
			//slideWidth: 100,   // 슬라이드 너비
			adaptiveHeight: true,
			minSlides: 1,      // 최소 노출 개수
			maxSlides: 1,      // 최대 노출 개수
			slideMargin:0,    // 슬라이드간의 간격
			auto: true,        // 자동 실행 여부
			autoControls:true,  //  play/stop/pause 슬라이드 컨트롤 버튼
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: true,    // 이전 다음 버튼 노출 여부
			autoControlsCombine: true, // 다시 찾아보기
			hideControlOnEnd: false,
			infiniteLoop: true,
			ariaLive: true,
			ariaHidden: true,
			touchEnabled: false

		});
	};

	// 탭포커스
	$('#mainSlider > li:first > a').on('focus',function(){
		var v_curMySliderCnt = mySlider.getCurrentSlide() + 2;   // minSliders 값만큼 더해준다.
		// alert(v_curMySliderCnt);
		$('#mainSlider > li:eq('+v_curMySliderCnt+') > a').focus();
		return false;
	});


};

/***********************************************************
 * prSlider
 ************************************************************/
function prSlider() {

	var windowsize = $(window).width();

    if (windowsize < 767) {
		$('#prSlider').bxSlider( {
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			speed: 500,        // 이동 속도를 설정
            pager: true,      // 현재 위치 페이징 표시 여부 설정
			pagerCustom: '.bx-pager',
            //pagerType: 'short',
			moveSlides: 1,     // 슬라이드 이동시 개수
			//slideWidth: 298,   // 슬라이드 너비
			adaptiveHeight: true,
			minSlides: 1,      // 최소 노출 개수
			maxSlides: 1,      // 최대 노출 개수
			slideMargin:0,    // 슬라이드간의 간격
			auto: true,        // 자동 실행 여부
			autoControls:false,  //  play/stop/pause 슬라이드 컨트롤 버튼
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: true,    // 이전 다음 버튼 노출 여부
			autoControlsCombine: true, // 다시 찾아보기
			hideControlOnEnd: false,
			infiniteLoop: true,
			ariaLive: true,
			ariaHidden: true,
			touchEnabled: true

		});

	} else {
		$('#prSlider').bxSlider( {
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			speed: 500,        // 이동 속도를 설정
            pager: true,      // 현재 위치 페이징 표시 여부 설정
			pagerCustom: '.bx-pager',
            //pagerType: 'short',
			moveSlides: 1,     // 슬라이드 이동시 개수
			//slideWidth: 298,   // 슬라이드 너비
			adaptiveHeight: true,
			minSlides: 1,      // 최소 노출 개수
			maxSlides: 1,      // 최대 노출 개수
			slideMargin:0,    // 슬라이드간의 간격
			auto: true,        // 자동 실행 여부
			autoControls:false,  //  play/stop/pause 슬라이드 컨트롤 버튼
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: true,    // 이전 다음 버튼 노출 여부
			autoControlsCombine: true, // 다시 찾아보기
			hideControlOnEnd: false,
			infiniteLoop: true,
			ariaLive: true,
			ariaHidden: true,
			touchEnabled: false

		});
	};

	// 탭포커스
	$('#prSlider > li:first > a').on('focus',function(){
		var v_curMySliderCnt = mySlider.getCurrentSlide() + 2;   // minSliders 값만큼 더해준다.
		// alert(v_curMySliderCnt);
		$('#prSlider > li:eq('+v_curMySliderCnt+') > a').focus();
		return false;
	});


};



/***********************************************************
 * eduBox
 ************************************************************/
function eduBox() {

    $('#eduTab').on( 'click', function () {
        $(".eduBoxTabs ul li a").removeClass("active");
        $(this).addClass("active");
        $("#eduWrap").removeClass("hidden");
		$("#educateWrap").addClass("hidden");
		eduSlider(function(){
			slider.reloadSlider();
		})

    } );

    $('#educateTab').on( 'click', function () {
        $(".eduBoxTabs ul li a").removeClass("active");
        $(this).addClass("active");
		$("#eduWrap").addClass("hidden");
		$("#educateWrap").removeClass("hidden");
		educateSlider(function(){
			slider.reloadSlider();
		})
	} );


};



/***********************************************************
 * eduSlider
 ************************************************************/
function eduSlider() {

	var windowsize = $(window).width();

    if (windowsize < 767) {
		var mediaslider = $('#eduSlider').bxSlider( {
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			speed: 500,        // 이동 속도를 설정
			pager: false,      // 현재 위치 페이징 표시 여부 설정

			moveSlides: 1,     // 슬라이드 이동시 개수
			slideWidth: 280,   // 슬라이드 너비
			minSlides: 1,      // 최소 노출 개수
			maxSlides: 1,      // 최대 노출 개수
			slideMargin:19,    // 슬라이드간의 간격
			auto: false,        // 자동 실행 여부
			autoControls:false,  //  play/stop/pause 슬라이드 컨트롤 버튼
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: false,    // 이전 다음 버튼 노출 여부
			//autoControlsCombine: true, // 다시 찾아보기
			hideControlOnEnd: false,
			infiniteLoop: true,
			ariaLive: true,
			ariaHidden: true,
			touchEnabled: true
		});

	} else {
		var mediaslider = $('#eduSlider').bxSlider( {
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			speed: 500,        // 이동 속도를 설정
			pager: false,      // 현재 위치 페이징 표시 여부 설정

			moveSlides: 1,     // 슬라이드 이동시 개수
			slideWidth: 280,   // 슬라이드 너비
			minSlides: 1,      // 최소 노출 개수
			maxSlides: 4,      // 최대 노출 개수
			slideMargin:19,    // 슬라이드간의 간격
			auto: false,        // 자동 실행 여부
			autoControls:false,  //  play/stop/pause 슬라이드 컨트롤 버튼
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: false,    // 이전 다음 버튼 노출 여부
			//autoControlsCombine: true, // 다시 찾아보기
			hideControlOnEnd: false,
			infiniteLoop: true,
			ariaLive: true,
			ariaHidden: true,
			touchEnabled: false
		});
	}


	$('#eduPrevBtn').on( 'click', function () {
		mediaslider.goToPrevSlide();  //이전 슬라이드 배너로 이동
		return false;              //<a>에 링크 차단
	} );

	//다음 버튼을 클릭하면 다음 슬라이드로 전환
	$('#eduNextBtn').on( 'click', function () {
		mediaslider.goToNextSlide();  //다음 슬라이드 배너로 이동
		return false;
	} );

	// 탭포커스
	$('#eduSlider > li:first > a').on('focus',function(){
		var v_curMySliderCnt = mySlider.getCurrentSlide() + 4;   // minSliders 값만큼 더해준다.
		// alert(v_curMySliderCnt);
		$('#eduSlider > li:eq('+v_curMySliderCnt+') > a').focus();
		return false;
	});


};


/***********************************************************
 * educateSlider
 ************************************************************/
function educateSlider() {

	var windowsize = $(window).width();

    if (windowsize < 767) {
		var mediaslider = $('#educateSlider').bxSlider( {
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			speed: 500,        // 이동 속도를 설정
			pager: false,      // 현재 위치 페이징 표시 여부 설정

			moveSlides: 1,     // 슬라이드 이동시 개수
			slideWidth: 280,   // 슬라이드 너비
			minSlides: 1,      // 최소 노출 개수
			maxSlides: 1,      // 최대 노출 개수
			slideMargin:19,    // 슬라이드간의 간격
			auto: false,        // 자동 실행 여부
			autoControls:false,  //  play/stop/pause 슬라이드 컨트롤 버튼
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: false,    // 이전 다음 버튼 노출 여부
			//autoControlsCombine: true, // 다시 찾아보기
			hideControlOnEnd: false,
			infiniteLoop: true,
			ariaLive: true,
			ariaHidden: true,
			touchEnabled: true
		});

	} else {
		var mediaslider = $('#educateSlider').bxSlider( {
			mode: 'horizontal',// 가로 방향 수평 슬라이드
			speed: 500,        // 이동 속도를 설정
			pager: false,      // 현재 위치 페이징 표시 여부 설정

			moveSlides: 1,     // 슬라이드 이동시 개수
			slideWidth: 280,   // 슬라이드 너비
			minSlides: 1,      // 최소 노출 개수
			maxSlides: 4,      // 최대 노출 개수
			slideMargin:19,    // 슬라이드간의 간격
			auto: false,        // 자동 실행 여부
			autoControls:false,  //  play/stop/pause 슬라이드 컨트롤 버튼
			autoHover: true,   // 마우스 호버시 정지 여부
			controls: false,    // 이전 다음 버튼 노출 여부
			//autoControlsCombine: true, // 다시 찾아보기
			hideControlOnEnd: false,
			infiniteLoop: true,
			ariaLive: true,
			ariaHidden: true,
			touchEnabled: false
		});
	}


	$('#educatePrevBtn').on( 'click', function () {
		mediaslider.goToPrevSlide();  //이전 슬라이드 배너로 이동
		return false;              //<a>에 링크 차단
	} );

	//다음 버튼을 클릭하면 다음 슬라이드로 전환
	$('#educateNextBtn').on( 'click', function () {
		mediaslider.goToNextSlide();  //다음 슬라이드 배너로 이동
		return false;
	} );

	// 탭포커스
	$('#educateSlider > li:first > a').on('focus',function(){
		var v_curMySliderCnt = mySlider.getCurrentSlide() + 4;   // minSliders 값만큼 더해준다.
		// alert(v_curMySliderCnt);
		$('#educateSlider > li:eq('+v_curMySliderCnt+') > a').focus();
		return false;
	});


};



/***********************************************************
 * shwoTabNav
 ************************************************************/
function shwoTabNav(eName, totalNum, showNum) {
	for(i=1; i<=totalNum; i++){
		var zero = (i >= 10) ? "" : "0";
		var e = document.getElementById("tabNav" + eName + zero + i);
		var eTitle = document.getElementById("tabNavTitle" + eName + zero + i);
		e.style.display = "none";
		eTitle.className = "";
	}

	var zero = (showNum >= 10) ? "" : "0";
	var e = document.getElementById("tabNav" + eName + zero + showNum);
	var eTitle = document.getElementById("tabNavTitle" + eName + zero + showNum);
	e.style.display = "block";
	eTitle.className = "on";
}



/******************************** 배너존 ********************************************************************/
var bannerAuto=null;
var bannerDirect="left"; 

function bRightMv(){
	$(".banner_img").stop().animate(   
		{left:"-=942px"},0,function(){
				var $bannerObj=$(".banner_img li:first").clone(true);
				$(".banner_img li:first").remove(); 
				$(".banner_img").css("left",0); 
				$(".banner_img").append($bannerObj);
		} 
	)
		if(bannerAuto)clearTimeout(bannerAuto);
		bannerAuto=setTimeout(bRightMv,3000)
}


function bLeftMv(){
	$(".banner_img").stop().animate(
		{left:"0px"},0,function(){
				var $bannerObj=$(".banner_img li:last").clone(true);
				$(".banner_img li:last").remove(); 
				$(".banner_img").css("left","-942px"); 
				$(".banner_img").prepend($bannerObj);
		} 
	)
		
		if(bannerAuto)clearTimeout(bannerAuto);
		bannerAuto=setTimeout(bRightMv,3000) 
}


$(document).ready(function(){
bannerAuto=setTimeout(bRightMv,4000) 


	$bleftBtn=$(".banner_control .prev_banner a");
	$brightBtn=$(".banner_control .next_banner a");
	$bpauseBtn=$(".banner_control .pause_banner a");
	$bp_btn=$(".banner_control .pause_banner a img")
	var bplay = false;

	$bleftBtn.click(function(){
		if (bplay == true){	
		bLeftMv();
		clearTimeout(bannerAuto); 
		}else{			
		bannerDirect="left"
		clearTimeout(bannerAuto);
		bLeftMv();
		return false;
		}
	})

	$brightBtn.click(function(){
		if (bplay == true){	
		bRightMv();
		clearTimeout(bannerAuto); 
		}else{			
		bannerDirect="right"
		clearTimeout(bannerAuto);
		bRightMv();
		return false;
		}
	});

	$bpauseBtn.click(function(){
		clearTimeout(bannerAuto);
		return false;
		bplay = false;
	});
	
	$bpauseBtn.click(function(){	
		if (bplay == false){	
		clearTimeout(bannerAuto); 
		$bp_btn.attr("src","assets/img/main/sBanner_icon04.png");
		$bp_btn.attr("alt","배너재생");
		bplay = true;
		}else{			
		bplay = false;
		$bp_btn.attr("src","assets/img/main/sBanner_icon02.png");
		$bp_btn.attr("alt","배너정지");
		bannerAuto=setTimeout(bRightMv,500) 
		}
	});
	//$(".banner_img a").bind('mouseover focusin' , function(){
	//	clearTimeout(bannerAuto);
	//});

	//$(".banner_img a").mouseleave(function(){
	//	bplay = false;
	//	clearTimeout(bannerAuto);
	//	bRightMv();
	//	$bp_btn.attr("src","/gmi/main/banner_btn_stop.gif");
	//	$bp_btn.attr("alt","배너정지");
	//});


});