$(document).ready(function(){ 
    var main = $('.bxslider').bxSlider({ 
    mode: 'fade', 
    auto: true,	//자동으로 슬라이드 
    controls : false,	//좌우 화살표	
    autoControls: false,	//stop,play 
    pager:true,	//페이징 
    pause: 3000, 
    autoDelay: 0,	
    slideWidth: 955, 
    speed: 1000, 
    stopAutoOnclick:true 
    }); 
}); 