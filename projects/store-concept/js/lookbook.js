

$(document).ready(function(){

	//GSAP
	var navbar = $('.navbar'),
		content = $('.row'),
		$body = $('body');

	TweenLite.from(navbar, 1, {x:-500, ease:Power3.easeOut});
	TweenLite.from(navbar, 1, {autoAlpha:0, delay: 0.3});

	TweenLite.from(content, 1, {y:500, ease:Power3.easeOut});
	TweenLite.from(content, 1, {autoAlpha:0, delay: 0.3});

	//Fade main content in 
	TweenLite.set($body, {className: '-=loading'});

	
});

