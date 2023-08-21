$(document).ready(function(){
    $(".top_slider").slick({                            
        dots: true,
        autoplay : true,	
        infinite: true,
        speed: 250,
        slidesToShow: 1,
        centerMode: false,                            
    });	
       
});    

// $(document).ready(function(){
//     let didScroll = false;
//     let paralaxTitles = document.querySelectorAll('.moving');

//     const scrollInProgress = () => {
//     didScroll = true
//     }

//     const raf = () => {
//     if(didScroll) {
//         paralaxTitles.forEach((element, index) => {
//         element.style.transform = "translateX("+ window.scrollY / 10 + "%)"
//         })
//         didScroll = false;
//     }
//     requestAnimationFrame(raf);
//     }


//     requestAnimationFrame(raf);
//     window.addEventListener('scroll', scrollInProgress)

// });




$(document).ready(function(){
    $(".main_slider_wrap .main_slider").slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 2,
        centerMode: false,
        variableWidth: true
    });

    $(window).scroll(function(){
        var scroll_top = $(window).scrollTop();
        if(scroll_top > 50){
            $(".arr_dn").fadeOut("fast");
        }else{
            $(".arr_dn").fadeIn();
        }
    });
});

$(document).ready(function(){
    
    $('.arrow_more').click(function(){
        $('.awards_con').removeClass('showstep1');
        $('.arrow_more').addClass('hide');
        $('.arrow_up').removeClass('hide');
        $('.text_hide').removeClass('text_opacity');
    })
    $('.arrow_up').click(function(){
        $('.awards_con').addClass('showstep1');
        $('.arrow_up').addClass('hide');
        $('.arrow_more').removeClass('hide');
        $('.text_hide').addClass('text_opacity');
    })


});


