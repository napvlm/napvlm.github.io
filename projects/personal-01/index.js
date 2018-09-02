
$(document).ready(function(){

	// Scroll to section 
		$('a[href^="#"]').on('click', function(event) {
	    var target = $(this.getAttribute('href'));
	    if( target.length ) {
	        event.preventDefault();
	        $('html, body').stop().animate({
	            scrollTop: target.offset().top
	        }, 500);
	    }
	    });

	//GSAP animations on load (header)
		var img = $('header'),
			content = $('.info'),
			contact = $('.contact');

		TweenLite.from(img, 1, {autoAlpha:0, delay: 0.2});
		TweenLite.from(content, 1, {y:100, ease:Power3.easeOut});
		TweenLite.from(content, 1, {autoAlpha:0, delay: 0.3});


	 // Init ScrollMagic 
		var cntrl = new ScrollMagic.Controller();

	 //	Scene 1 - pin the first article

	 	var pinScene01 = new ScrollMagic.Scene({
	 		triggerElement: '#slide01',
	 		triggerHook: 0,
	 		duration:'100%'
	 	})
	 	.setPin('#slide01 .pin-wrapper')
	 	.addTo(cntrl);

	 //	Scene 2 - pin the second article 

	 	var pinScene01 = new ScrollMagic.Scene({
	 		triggerElement: '#slide01',
	 		triggerHook: 0,
	 		duration:'200%'
	 	})
	 	.setPin('#slide02 .pin-wrapper')
	 	.addTo(cntrl);

	 //	Scene 3 - pin the third article 

	 	var pinScene01 = new ScrollMagic.Scene({
	 		triggerElement: '#slide02',
	 		triggerHook: 0,
	 		duration:'100%'
	 	})
	 	.setPin('#slide03 .pin-wrapper')
	 	.addTo(cntrl);
});

	 
