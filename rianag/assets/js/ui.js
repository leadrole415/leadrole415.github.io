$(document).ready(function(){
    
    init();
    $(window).resize(function(){
        init();
    });
    
    $(".m_gnb").on("click", function(e){
        if($(this).hasClass("on")){
            $(this).removeClass("on");
            $(".drawer_nav").removeClass("on");
            $(".drawer_nav").css({ 'right' : - $(window).width() });
            html_unfixed_setting();
        }else{
            $(this).addClass("on");
            $(".drawer_nav").addClass("on");
            $(".drawer_nav").css({ 'right' : 0 });
            html_fixed_setting();
        } 
    });
    
    $(".drawer_close a").on("click", function(e){
        $(".m_gnb").removeClass("on");
        $(".drawer_nav").css({ 'right' : - $(window).width() }, function(){
            
        $(".drawer_nav").removeClass("on");
        });
        html_unfixed_setting();
    });
});
$(function(){
	$(".familyGroup>a").click(function(){
		var prt = $(this).parent();
		var list = prt.find(".famList");

		if(list.is(":visible")){
			prt.removeClass("active");
			list.slideUp();
		}else{
			prt.addClass("active");
			list.slideDown();
		}
	});					

	$(".famList-closeBtn").click(function(){
		var list = $(this).parent();
		var prt2 = list.parent();

		if(list.is(":visible")){
			prt2.removeClass("active");
			list.slideUp();
		}
	});
});

function init(){
    //$(".drawer_nav").css({ 'right' : - $(window).width() });
}

function html_fixed_setting(){
    var scroll_v = $(window).scrollTop();
    $("html").addClass("off");
    $("body").css({ 'margin-top' : (scroll_v) * -1 });
}

function html_unfixed_setting(){
    $("html").removeClass("off");
    var scroll_v = $("body").css("margin-top") || 0;			
    scroll_v = parseInt(scroll_v, 10) * -1;
    $("body").css({ 'margin-top' : 0 });
    $("html, body").stop().animate({ scrollTop : scroll_v }, 1);
}

