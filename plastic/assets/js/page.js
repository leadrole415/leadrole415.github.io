/***********************************************************
 * widget Ui
 ************************************************************/
$(document).ready(function() {
	viewSlider();

});


/***********************************************************
 * viewSlider
 ************************************************************/
function viewSlider() {

    $('#viewSlider').bxSlider( {
		mode: 'horizontal',// 가로 방향 수평 슬라이드
		speed: 500,        // 이동 속도를 설정
		pager: true,      // 현재 위치 페이징 표시 여부 설정
		moveSlides: 1,     // 슬라이드 이동시 개수
		//slideWidth: 100,   // 슬라이드 너비
		adaptiveHeight: true,
		minSlides: 1,      // 최소 노출 개수
		maxSlides: 1,      // 최대 노출 개수
		slideMargin:0,    // 슬라이드간의 간격
		//auto: true,        // 자동 실행 여부
		autoControls:true,  //  play/stop/pause 슬라이드 컨트롤 버튼
		autoHover: true,   // 마우스 호버시 정지 여부
		controls: true,    // 이전 다음 버튼 노출 여부
		autoControlsCombine: true, // 다시 찾아보기
		hideControlOnEnd: false,
		infiniteLoop: true,
		ariaLive: true,
		ariaHidden: true,
		touchEnabled: true,
		responsive: true

	});

	// 탭포커스
	$('#viewSlider > li:first > a').on('focus',function(){
		var v_curMySliderCnt = mySlider.getCurrentSlide() + 2;   // minSliders 값만큼 더해준다.
		// alert(v_curMySliderCnt);
		$('#viewSlider > li:eq('+v_curMySliderCnt+') > a').focus();
		return false;
	});


};