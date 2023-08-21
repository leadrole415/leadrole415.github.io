

$( document ).ready(function() {  
    setInterval(function(){
        $(".neon02").css('display','block');
    }, 500);
  });



  $(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 500) {
            $('.share').addClass('active');
        } else {
            $('.share').removeClass('active');
        }
    });
});


$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 500) {
            $('.btn_go').addClass('fixed');
        } else {
            $('.btn_go').removeClass('fixed');
        }
    });
        
    $(".btn_go").click(function() {
        location.href="kakao02.html";
    });
    
});

$(function() {
            
    $(".btn_close").click(function() {
        location.href="kakao01.html";
    });
    
});