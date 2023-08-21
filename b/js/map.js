jQuery(function($){

	var longitude = 37.293294;
	var latitude = 127.108070;/*https://www.google.co.kr/maps/@37.5651,126.98955,11z 에서 좌표갑 찾기*/
	var canvas = "map";/*id="map"으로 지정해줌*/

	
	function randing_map(canvas, lan, lat){			
			var myLatlng = new google.maps.LatLng(lan,lat);
			var myOptions = {
						zoom: 13,
						center: myLatlng,
						mapTypeId: google.maps.MapTypeId.ROADMAP,
						maxZoom   : 20,
    					disableDefaultUI: true
					}			
			var map = new google.maps.Map( document.getElementById(canvas), myOptions );
			var marker = new google.maps.Marker({
			    position : myLatlng,
			    map      : map,
			    icon     : "images/point.png"/*아이콘*/
			});
			var styles = [
			  {
			    featureType: "all",
			    stylers: [
			      { saturation: -80 }
			    ]
			  },{
			    featureType: "road.arterial",
			    elementType: "geometry",
			    stylers: [
			      { hue: "#00ffee" },
			      { saturation: 50 }
			    ]
			  },{
			    featureType: "poi.business",
			    elementType: "labels",
			    stylers: [
			      { visibility: "off" }
			    ]
			  }
			];	
			var infowindow = new google.maps.InfoWindow({
				content:"<div class='map_adresse'><div class='map_address'><span class='address'>Address : </span>경기도 용인시 기흥구 마북동 431</div> <div class='map_tel'><span class='tel'>Phone : </span>(031) 000-0000</div></div>"
			});	
			
			map.setOptions({styles: styles});

			google.maps.event.addListener(marker, 'click', function() {
			  infowindow.open(map,marker);
			});
	}
	randing_map(canvas, longitude, latitude);

});

