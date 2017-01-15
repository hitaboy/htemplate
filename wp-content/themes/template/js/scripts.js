// DOM Ready
function new_map( $el ) {

	var $markers = $el.find('.marker');
	
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
	       	
	var map = new google.maps.Map( $el[0], args);
	
	
	map.markers = [];
	
	$markers.each(function(){
		
    	add_marker( $(this), map );
		
	});
	
	center_map( map );
	
	return map;
	
}

function add_marker( $marker, map ) {

	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});

	map.markers.push( marker );

	if( $marker.html() )
	{
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});

		google.maps.event.addListener(marker, 'click', function() {

			infowindow.open( map, marker );

		});
	}

}

function center_map( map ) {

	var bounds = new google.maps.LatLngBounds();

	$.each( map.markers, function( i, marker ){

		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

		bounds.extend( latlng );

	});

	if( map.markers.length == 1 )
	{
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		map.fitBounds( bounds );
	}

}

var map = null;

$(document).ready(function(){

	$('.acf-map').each(function(){

		map = new_map( $(this) );

	});
	
	$('.lightGallery').lightGallery(); 
	
	// ALL CLICKS
	$('.mobileMenu').on('click', function(){
  	$('.header').addClass('activeMobile');
	});
	$('.mobileClose').on('click', function(){
  	$('.header').removeClass('activeMobile');
	});

});


$(function() {
  for(cont = 0; cont < layoutCarrousel.length; cont++ ){
  	$('#'+layoutCarrousel[cont][0]).owlCarousel({
      loop:true,
      margin:10,
      nav:false,
      dots:true,
      autoplay: $.parseJSON(layoutCarrousel[cont][2]),
      autoplayHoverPause: $.parseJSON(layoutCarrousel[cont][3]),
      items:layoutCarrousel[cont][1]
    });
  }
	// Galery 
/*	for(galery in galeries) {
		slides = parseInt(galeries[galery].slides,10);
		$('.carrusel_'+galeries[galery].class).owlCarousel({
		    loop:true,
		    margin:10,
		    nav:true,
			items:slides,
			autoHeight:true
		});	
	}*/

});