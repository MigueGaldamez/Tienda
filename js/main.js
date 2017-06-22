$( document ).ready(function(){

      $(".button-collapse").sideNav();
      $('.carousel').carousel();
      
    
      $('.collapsible').collapsible();  
      $('.parallax').parallax();
      $('.slider').slider({ });
      $(".dropdown-button").dropdown({belowOrigin:true});
      
    $('.ir-arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});
 
	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('.ir-arriba').slideDown(300);
		} else {
			$('.ir-arriba').slideUp(300);
		}
	});




})
	function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {zoom: 17});
  var geocoder = new google.maps.Geocoder;
  geocoder.geocode({'address': 'arzobispado de san salvador'}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      new google.maps.Marker({
        map: map,
        position: results[0].geometry.location
      });
    } else {
      window.alert('Geocode was not successful for the following reason: ' +
          status);
    }
  });

}
;
