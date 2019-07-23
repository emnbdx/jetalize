"use strict";

$(document).ready(function() {

	// SMOOTH SCROLL SETTINGS
	smoothScroll.init({
		speed: 900, // How fast to complete the scroll in milliseconds
		easing: 'easeInOutCubic', // Easing pattern to use
		updateURL: false, // Boolean. Whether or not to update the URL with the anchor hash on scroll
	});
	
	// MAIN SLIDER OWL CAROUSEL
	var owl_slider = $("#owl-slider");

	owl_slider.owlCarousel({
		pagination : false, // Show paggination dots
		navigation : false, // Show next and prev buttons
		slideSpeed : 100,
		rewindSpeed : 100,
		singleItem: true,
		autoPlay: 5000,
		stopOnHover: true,
		transitionStyle : "fadeUp"
	});

	// Custom Navigation Events
	$(".next").click(function(){ owl_slider.trigger('owl.next'); });
	$(".prev").click(function(){ owl_slider.trigger('owl.prev'); });
	
	// DESTINATIONS OWL CAROUSEL
	$("#owl-destinations").owlCarousel({
		pagination : true, // Show paggination dots
		navigation : false, // Show next and prev buttons
		slideSpeed : 1000,
		rewindSpeed : 1000,
		items : 3, //10 items above 1000px browser width
		itemsDesktop : [1000,3], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,3], // betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0
		itemsMobile : [480,1] // itemsMobile disabled - inherit from itemsTablet option
	});
		
	// DEALS OWL CAROUSEL
	$("#owl-business").owlCarousel({
		pagination : true, // Show paggination dots
		navigation : false, // Show next and prev buttons
		slideSpeed : 1000,
		rewindSpeed : 1000,
		items : 2, //10 items above 1000px browser width
		itemsDesktop : [1000,4], //5 items between 1000px and 901px
		itemsDesktopSmall : [900,3], // betweem 900px and 601px
		itemsTablet: [600,2], //2 items between 600 and 0
		itemsMobile : [480,1] // itemsMobile disabled - inherit from itemsTablet option
	});
		
	// Flights & Hotels Tabs Settings
	$(".tabs a").click(function(){
		$(this).css("outline", "none");
		$(".tabs li").removeClass("active");
		$(this).parent().addClass("active");
		var target = $(this).attr("class");
		$(".tabs-content .content").css("display", "none");
		$("#"+target).css("display", "block").nanoScroller({ alwaysVisible: true });
	});
	
	// nanoScroller Settings
	$(".nano").nanoScroller({ alwaysVisible: true });
	
	// Read more link actions for small screen
	$(".read-about").click(function(){
		$(".read-about").hide();
		$(".about-more").removeClass("hidden-sm").removeClass("hidden-xs");
	});
	
	// Tour details actions
	$(".custom button").click(function(){
	
		var data_page = $(this).data("page");
		
		$(".custom .custom-detail").html("");
		$(".custom .custom-detail").append('<div class="loading">Chargement...</div>');
		
		$(".custom-row").addClass("hidden");
		$(".custom .custom-detail").removeClass("hidden");
		
		setTimeout(function(){
		
			// perform ajax request
			$.ajax({
				url: "detail/" + data_page,
				type: 'GET',
				dataType: 'HTML'
			}).done( function (result) {
				
				$(".custom .custom-detail .loading").remove();
				$(".custom .custom-detail").append(result);
				
				// custom details close icon actions
				$(".custom .custom-detail .close").click(function(){
					$(".custom-row").removeClass("hidden");
					$(".custom .custom-detail").addClass("hidden");
				});
				
			}).fail(function() { $(".custom .custom-detail .loading").html("File not loading : detail/" + data_page); });
		
		}, 1000);

	});

	$(".menu-rents").click(function () {
		$('.rents').click();
	});

	$(".menu-treks").click(function () {
		$('.treks').click();
	});

	$(".menu-boats").click(function () {
		$('.boats').click();
	});

	$(".menu-bouys").click(function () {
		$('.buoys').click();
	});

	if($("#copyright").text() != new Date().getFullYear()) {
		$("#copyright").append(" - " + new Date().getFullYear());
	}
	
});

//HEADER ANIMATION
$(window).scroll(function(){

	if ( $(window).scrollTop() > 49 ) {
		
		$(".topnav .navbar").removeClass("navbar-static-top").addClass("navbar-fixed-top").addClass("top-nav-collapse");
	
	} else {
		
		$(".topnav .navbar").removeClass("navbar-fixed-top").removeClass("top-nav-collapse").addClass("navbar-static-top");
	
	}
	
});

// WOW Settings
var wow = new WOW({

	boxClass:     'wow',      // animated element css class (default is wow)
	animateClass: 'animated', // animation css class (default is animated)
	offset:       0,          // distance to the element when triggering the animation (default is 0)
	mobile:       false       // trigger animations on mobile devices (true is default)

});

// CONTACT FORM FUNCTION
var contact_send = function(){
	
	var name 	= $("#name").val();
	var email	= $("#email").val();
	var phone	= $("#phone").val();
	var message = $("#message").val();
	
	$(".mail-error").addClass('hidden'); 
	$(".mail-success").addClass('hidden'); 

	if (name == "") { 
		$(".mail-error").text("Le nom est obligatoire"); 
		$(".mail-error").removeClass('hidden'); 
		$("#name").focus(); 
		return;
	}
	
	if (email == "") {
		$(".mail-error").text("L'email est obligatoire");
		$(".mail-error").removeClass('hidden');
		$("#email").focus();
		return;
	}

	var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if(!regex.test(email)) {
    	$(".mail-error").text("L'email est invalide");
		$(".mail-error").removeClass('hidden');
		$("#email").focus();
		return;
    }

	if (message == "") { 
		$(".mail-error").text("Le message est obligatoire");
		$(".mail-error").removeClass('hidden');
		$("#message").focus();
		return;
	}

	$.post("contact.php", { 
				name:name, 
				email:email, 
				phone:phone, 
				message:message 
			}, 
			function (result) {
				if (result == "SUCCESS") {
					$(".mail-success").text("Votre message a bien été envoyé"); 
					$(".mail-success").removeClass('hidden');

					setTimeout(function () {
						$("#name").val("");
						$("#email").val("");
						$("#phone").val("");
						$("#message").val("");
					}, 3000);
				} else {
					$(".mail-error").text("Erreur lors de l'envoi du message");
					$(".mail-error").removeClass('hidden');
				}
			});
};

function initialize() {
				
	var point = new google.maps.LatLng(45.6832407, -1.1798334000000068);

	// Basic options for a simple Google Map
	// For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
	var mapOptions = {
		// How zoomed in you want the map to start at (always required)
		zoom: 11,

		// The latitude and longitude to center the map (always required)
		center: point,

	};

	// Get the HTML DOM element that will contain your map 
	// We are using a div with id="map" seen below in the <body>
	var mapCanvas = document.getElementById('map');

	// Create the Google Map using out element and options defined above
	var map = new google.maps.Map(mapCanvas, mapOptions);

	var marker = new google.maps.Marker({
    	position: point,
    	map: map,
    	title: 'Jet Alizé'
	});
}

wow.init();
if(google) {
	google.maps.event.addDomListener(window, 'load', initialize);
}