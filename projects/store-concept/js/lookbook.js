//GSAP
(function($){
	var logowrap = $('.logowrap'),
		list = $('.list');

	TweenLite.from(logowrap, 1, {x:-200, ease:Power3.easeOut});
	TweenLite.from(logowrap, 1, {autoAlpha:0, delay: 0.3});

	TweenLite.from(list, 1, {y:200, ease:Power3.easeOut});
	TweenLite.from(list, 1, {autoAlpha:0, delay: 0.3});
})(jQuery);

//ScrollMagic

$(document).ready(function(){
	var cntrl = new ScrollMagic.Controller();

	var horizontalMoveTL = new TimelineMax();

	horizontalMoveTL
		.to('.horizontal-container', 1, {x:'-90%',ease:Linear.easeNone});

	var pinMainScene = new ScrollMagic.Scene({
		triggerElement: '#main',
		triggerHook: 0,
		duration: '1000%' 
	})
	.setTween(horizontalMoveTL)
	.setPin('#main')
	.addTo(cntrl);

});

