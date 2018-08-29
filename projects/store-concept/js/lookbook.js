

$(document).ready(function(){

	//GSAP
	var navbar = $('.navbar'),
		content = $('#main');

	TweenLite.from(navbar, 1, {x:-500, ease:Power3.easeOut});
	TweenLite.from(navbar, 1, {autoAlpha:0, delay: 0.3});

	TweenLite.from(content, 1, {y:500, ease:Power3.easeOut});
	TweenLite.from(content, 1, {autoAlpha:0, delay: 0.3});


     //Scrollmagic
	var cntrl = new ScrollMagic.Controller();

	var horizontalMoveTL = new TimelineMax();

	horizontalMoveTL
		.to('.horizontal-container', 1, {x:'-66.6666%',ease:Linear.easeNone});

	var pinMainScene = new ScrollMagic.Scene({
		triggerElement: '#main',
		triggerHook: 0,
		duration: '300%' 
	})
	.setTween(horizontalMoveTL)
	.setPin('#main')
	.addTo(cntrl);

});

