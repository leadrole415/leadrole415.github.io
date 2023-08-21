/*gnb*/
$(function() {

    $(".gnb>li").mouseover( function(){
        $(this).find("ul.menu01").stop().slideDown();
    });

        $(".gnb>li").mouseleave( function(){
        $(this).find("ul.menu01").stop().slideUp();
    });

    $(".gnb>li>ul>li").mouseover( function(){
        $(this).find("ul.menu02").stop().slideDown();
    });

        $(".gnb>li>ul>li").mouseleave( function(){
        $(this).find("ul.menu02").stop().slideUp();
    });

});

/*infomation*/
$("#info_btn").click( function(){
    $(".info_table").css("display", "block");
});
$("#info_btn02").click( function(){
    $(".info_table").css("display", "none");
});
