//GSAP animations on load (navbar and first section)
	var navbar = $('.navbar'),
		content = $('.slidesContainer');

	TweenLite.from(navbar, 1, {x:-500, ease:Power3.easeOut});
	TweenLite.from(navbar, 1, {autoAlpha:0, delay: 0.3});

	TweenLite.from(content, 1, {y:500, ease:Power3.easeOut});
	TweenLite.from(content, 1, {autoAlpha:0, delay: 0.3});

	// Variables
	var sectionFrom,
		$slide = $('.slide'),
		$slideActive = $('.slide.active'),
		$navLink = $('.side-nav a'),
		$navLi = $('.side-nav li'),
		$body = $('body');