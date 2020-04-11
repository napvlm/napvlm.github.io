
$(document).ready(function(){

	// ===============================

// Scrolldown 

$('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top
        }, 1000);
    }
});

//End Scrolldown 

// ===============================

 // Init ScrollMagic 
	var controller = new ScrollMagic.Controller();
	//about section
	$('.scrollfade').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.scrollfade',
		reverse: false
	})
	.setClassToggle('.scrollfade', 'fade-in')
	.addTo(controller); 
	});
	//callouts
	$('.callout').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.callout',
		reverse: false
	})
	.setClassToggle('.callout', 'fade-in')
	.addTo(controller); 
	});

	$('.callout2').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.callout2',
		reverse: false
	})
	.setClassToggle('.callout2', 'fade-in')
	.addTo(controller); 
	});

	$('.callout3').each(function(){
	var myScene = new ScrollMagic.Scene({
		triggerElement: '.callout3',
		reverse: false
	})
	.setClassToggle('.callout3', 'fade-in')
	.addTo(controller); 
	});

});

//End Scrollmagic effects