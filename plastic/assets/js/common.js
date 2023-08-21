/***********************************************************
 * widget Ui
 ************************************************************/
$(document).ready(function() {
	header();
	naviBox();
	mNaviBox();
	selectBox();
	quick();
	inputfile();
	jqueryUI();
	// subMenu()

});

/***********************************************************
 * header
 ************************************************************/
function header() {

	$(window).on('scroll', function(){
	var scTop = $(window).scrollTop();
	//var hTop = $('.gnbArea').height();
		if(scTop >= 60){
			$('.headerWrap').addClass('on');
			$('#wrap').css('padding-top', '0px');
		}else{
			$('.headerWrap').removeClass('on');
			$('#wrap').css('padding-top', 0);
		}
   });

	//headerSearch
	$("#searchBoxOn").on("click",function(){
		$("#searchBox").toggleClass("active");
		$("#gnbArea").toggleClass("on");
		$(this).toggleClass("active");
	}).on("keydown",function(){
		$("#searchBox").toggleClass("active");
	});

	//headerSearch
	$("#searchBoxOn02").on("click",function(){
		$("#searchBox02").toggleClass("active");
		$("#drawerOnf").toggleClass("on");
		$(this).toggleClass("active");
	}).on("keydown",function(){
		$("#searchBox02").toggleClass("active");
	});

}
/***********************************************************
 * naviBox
 ************************************************************/
function naviBox() {

	function chk(){
        if(cc == 1){
            $("#gnb").addClass('active');
        }else{
            $("#gnb").removeClass('active');
        }
    }

    $('#gnb > ul > li').mouseover(function(){
        setTimeout(chk, 100);
        cc = 1;
        $(this).addClass('active');
		$("#gnbArea").addClass('active on');
		$("#searchBox").removeClass("active");
		$("#searchBoxOn").removeClass("active");
    });

    $('#gnb ul').mouseout(function(){
        setTimeout(chk, 400);
        cc = 0;
        $('#gnb ul li').removeClass('active');
        $("#gnbArea").removeClass('active on');
    });

    $('#gnb ul li a').focus(function(){
        setTimeout(chk, 100);
        cc = 1;
		$(this).parent().addClass('active');
		$("#gnbArea").addClass('active on');
		$("#searchBox").removeClass("active");
    });

    $('#gnb ul li a').blur(function(){
        setTimeout(chk, 100);
        cc = 0;
		//$('#gnb ul li').removeClass('active');
		$("#gnbArea").removeClass('active');

    });


}

/***********************************************************
 * mNaviBox
 ************************************************************/
function mNaviBox() {

    //mobile navi on
	$("#btnNavi").on("click",function(){
		$("#drawerOnf").addClass("active");
		$('body').addClass("ovhidden");
	});

	//mobile navi off
	$("#drawerDim , #btnNaviClose").on("click",function(){
		$("#drawerOnf").removeClass("active");
		$('body').removeClass("ovhidden");
	});

	$('#mNavi > ul > li > a').click(function(e){
		e.preventDefault();
        $(this).parent().addClass('active').siblings().removeClass('active');
	});


}

/***********************************************************
 * selectBox
 ************************************************************/
function selectBox() {

	$('.selectWrap .selectBox .selectNum').on('click', function(e) {
		e.preventDefault();
		$(this).parent().addClass("active").siblings().removeClass("active");
	}).on("keydown",function(){
		$(this).parent().addClass("active").siblings().removeClass("active");
	});

	$('.selectBox .selectList').mouseleave(function(e) {
		e.preventDefault();
		$(this).parent().removeClass("active");
	})

	$('.selectBox .selectList li:last-child a').focusout(function(e) {
		e.preventDefault();
		$(".selectWrap .selectBox").removeClass("active");
	})

	$('.selectBox .selectList .selectDim').on('click', function(e) {
		e.preventDefault();
		$(".selectWrap .selectBox").removeClass("active");
	})
}


/***********************************************************
 * quick
 ************************************************************/
function quick() {
	// 메인 퀵메뉴
	$(window).scroll(function(){
		var height = $(document).scrollTop(); //실시간으로 스크롤의 높이를 측정
		if(height > 600){
			$('#quickTop').addClass('fixed');
		}else if(height < 600){
			$('#quickTop').removeClass('fixed');
		}
	});

	// 상단으로 이동
	$("#goTop").click(function() {
	   $('html, body').animate({ scrollTop: 0 }, 600);
	   return false;
	});

}

/***********************************************************
 * inputfile
 ************************************************************/
function inputfile() {
	// selectmenu
	//$(".uiSelect").selectmenu();
	// input type=file design
	$( '.inputfile' ).each( function()
	{
		var $input	 = $( this ),
			$label	 = $input.next( 'label' ),
			labelVal = $label.html();

		$input.on( 'change', function( e )
		{
			var fileName = '';

			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else if( e.target.value )
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				$label.find( 'span' ).html( fileName );
			else
				$label.html( labelVal );
		});

		// Firefox bug fix
		$input
		.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
		.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
	});

}

/***********************************************************
 * jqueryUI
 ************************************************************/
function jqueryUI() {

	$( function() {
		$( "#tabs" ).tabs();
	} );

}


/*subMenu*/
// function subMenu() {

	
// 	  $(".side_menu .lnb ul li").on("click",function(){
// 		$(this).addClass("active");
// 		$('body').addClass("ovhidden");
// 	});

	
// 	$(".side_menu .lnb ul li a").on("click",function(){
// 		$(this).parent().removeClass("active");
// 		$('body').removeClass("ovhidden");
// 	});


//     $('.side_menu .lnb ul li a').click(function(e){
// 		e.preventDefault();
// 		$(this).parent().addClass('active').siblings().removeClass('active');
// 	});


// }