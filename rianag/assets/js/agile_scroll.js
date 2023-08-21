
	$(document).ready(function(){

		$('.ux_method_title>.tit').animate({top:80,opacity:1},500)

		// 스크롤 반응
		sec0=1; sec1=1; sec2=1; sec3=1; sec4=1; sec5=1; sec6=1; sec7=1; sec8=1; sec9=1; 
		//스크롤에 따라 등장시키기
		$(window).scroll(function(){
			sc = $(window).scrollTop();
			
			sc_imgsection1= $('#method_imgsection1 img').offset().top-550 ;		
			if ( sc > sc_imgsection1 ) {
				sec5 = sec5+1;
				if ( sec5 ==2 ){
					$('#method_imgsection1 img').animate({marginTop:0,opacity:1},500)
					$('#method_imgsection1 h3').delay(300).animate({marginTop:0,opacity:1},500)
					$('#method_imgsection1 h5').delay(500).animate({marginTop:15,opacity:1},500)
					$('#method_imgsection1 p').delay(700).animate({marginTop:30,opacity:1},500)
				}
			}
			sc_imgsection2= $('#method_imgsection2 img').offset().top-550 ;		
			if ( sc > sc_imgsection2 ) {
				sec6 = sec6+1;
				if ( sec6 ==2 ){
					$('#method_imgsection2 img').animate({marginTop:0,opacity:1},500)
					$('#method_imgsection2 h3').delay(300).animate({marginTop:0,opacity:1},500)
					$('#method_imgsection2 h5').delay(500).animate({marginTop:15,opacity:1},500)
					$('#method_imgsection2 p').delay(700).animate({marginTop:30,opacity:1},500)
				}
			}
			sc_imgsection3= $('#method_imgsection3 img').offset().top-550 ;		
			if ( sc > sc_imgsection3 ) {
				sec7 = sec7+1;
				if ( sec7 ==2 ){
					$('#method_imgsection3 img').animate({marginTop:0,opacity:1},500)
					$('#method_imgsection3 h3').delay(300).animate({marginTop:0,opacity:1},500)
					$('#method_imgsection3 h5').delay(500).animate({marginTop:15,opacity:1},500)
					$('#method_imgsection3 p').delay(700).animate({marginTop:30,opacity:1},500)
				}
			}
			sc_imgsection4= $('#method_imgsection4 img').offset().top-550 ;		
			if ( sc > sc_imgsection4 ) {
				sec8 = sec8+1;
				if ( sec8 ==2 ){
					$('#method_imgsection4 img').animate({marginTop:0,opacity:1},500)
					$('#method_imgsection4 h3').delay(300).animate({marginTop:0,opacity:1},500)
					$('#method_imgsection4 h5').delay(500).animate({marginTop:15,opacity:1},500)
					$('#method_imgsection4 p').delay(700).animate({marginTop:30,opacity:1},500)
				}
			}

	}); });