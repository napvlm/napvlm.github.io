
(function($){
	var logowrap = $('.logowrap'),
		about = $('.about'),
		nav = $('.nav'),
		credit = $('.credit');

	TweenLite.from(logowrap, 1, {x:-200, ease:Power3.easeOut});
	TweenLite.from(logowrap, 1, {autoAlpha:0, delay: 0.3});

	TweenLite.from(about, 1, {y:200, ease:Power3.easeOut});
	TweenLite.from(about, 1, {autoAlpha:0, delay: 0.3});

	TweenLite.from(nav, 1, {x:-200, ease:Power3.easeOut});
	TweenLite.from(nav, 1, {autoAlpha:0, delay: 0.3});

	TweenLite.from(credit, 1, {y:200, ease:Power3.easeOut});
	TweenLite.from(credit, 1, {autoAlpha:0, delay: 0.3});
})(jQuery);